<?php
date_default_timezone_set('Asia/Kolkata');

// === DATABASE CONFIG ===
$host = 'localhost';
$user = 'root';
$pass = 'CRM@2024Acte';
$db   = 'hrm';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("❌ DB connection failed: " . $conn->connect_error);
}

// === DYNAMIC DATES ===
// ⏱ options: "today", "yesterday", or set manually
$dateMode = "custom";

switch ($dateMode) {
    case "yesterday":
        $fromDate = date("Y-m-d 00:00:00", strtotime("-1 day"));
        $toDate   = date("Y-m-d 23:59:59", strtotime("-1 day"));
        break;
    case "custom":
        $fromDate = "2025-01-01 00:00:00";
        $toDate   = date("Y-m-d 23:59:59");
        break;
    default: // today
        $fromDate = date("Y-m-d 00:00:00");
        $toDate   = date("Y-m-d 23:59:59");
}

// === DEVICE LIST ===
$devices = [
    'CGKK223260328' => 'LPX',
    'A6FE174860464' => 'ACTE AN',
    'CGKK231063361' => 'BDC 2',
    'CGKK210461704' => 'BDC',
    'CGKK212162446' => 'ACTE VLCY',
    'A6FE192760369' => 'ACTE POR',
    'A6FE195160911' => 'ACTE OMR',
];

// === SOAP CONFIG ===
$url        = "http://210.18.138.85:80/iclock/webapiservice.asmx";
$soapAction = "http://tempuri.org/GetTransactionsLog";
$username   = "API";
$password   = "Essl@123";

$logFile = __DIR__ . '/biometric_sync_log_' . date('Ymd') . '.log';
file_put_contents($logFile, "🔁 Biometric Sync Started at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);

foreach ($devices as $serial => $location) {
    $soapBody = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
               xmlns:xsd="http://www.w3.org/2001/XMLSchema"
               xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <GetTransactionsLog xmlns="http://tempuri.org/">
      <FromDate>$fromDate</FromDate>
      <ToDate>$toDate</ToDate>
      <SerialNumber>$serial</SerialNumber>
      <UserName>$username</UserName>
      <UserPassword>$password</UserPassword>
      <strDataList>123</strDataList>
    </GetTransactionsLog>
  </soap:Body>
</soap:Envelope>
XML;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $soapBody);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: text/xml; charset=utf-8",
        "Content-Length: " . strlen($soapBody),
        "SOAPAction: \"$soapAction\""
    ]);
    curl_setopt($ch, CURLOPT_PROXY, ''); // remove proxy
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        $error = "❌ [$serial] $location - cURL Error: " . curl_error($ch) . "\n";
        file_put_contents($logFile, $error, FILE_APPEND);
        continue;
    }
    curl_close($ch);

    $xml = simplexml_load_string($response);
    $xml->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
    $body = $xml->xpath('//soap:Body')[0]->children('http://tempuri.org/');

    $strData = (string)$body->GetTransactionsLogResponse->strDataList;

    if (empty($strData)) {
        file_put_contents($logFile, "❌ [$serial] $location - No data found.\n", FILE_APPEND);
        continue;
    }

    $lines = preg_split('/\r\n|\r|\n/', trim($strData));
    $inserted = 0;
    $updated  = 0;

    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line)) continue;
       $parts = preg_split('/\s+/', $line);
        if (count($parts) < 2) continue;

        $userId    = $conn->real_escape_string($parts[0]);
        $punchTime = $conn->real_escape_string(
            count($parts) >= 3 ? $parts[1] . ' ' . $parts[2] : $parts[1]
        );
        $deviceId = $serial;

        $check = $conn->query("SELECT id FROM attendance_log WHERE user_id='$userId' AND punch_time='$punchTime'");
        if ($check->num_rows > 0) {
            $sql = "UPDATE attendance_log SET device_id='$deviceId' WHERE user_id='$userId' AND punch_time='$punchTime'";
            if ($conn->query($sql)) $updated++;
        } else {
            $sql = "INSERT INTO attendance_log (user_id, punch_time, device_id)
                    VALUES ('$userId', '$punchTime', '$deviceId')";
            if ($conn->query($sql)) $inserted++;
        }
    }

    $logText = "✅ [$serial] $location - Inserted: $inserted | Updated: $updated\n";
    file_put_contents($logFile, $logText, FILE_APPEND);
}

file_put_contents($logFile, "✔ Sync completed at " . date('Y-m-d H:i:s') . "\n\n", FILE_APPEND);
echo "✅ Done! Check log file: $logFile\n";
?>
