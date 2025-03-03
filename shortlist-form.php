<?php require_once("includes/config.php"); ?>
<?php
echo $id = base64_decode($_GET['id']);
echo $value = base64_decode($_GET['val']);

if ($value == 1) {
    $query = "UPDATE `candidates` SET `interview_status`= 3 WHERE `candidate_id`='$id'";
    $result = mysqli_query($conn, $query);
} else {
    $query = "SELECT * FROM `candidates` WHERE `candidate_id` = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result); 
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: 'Arial', 'Helvetica', 'sans-serif';
            font-size: 14px;
            background-color: #e0f7fa;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: aliceblue;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .header img,
        .footer img {
            width: 100%;
            max-width: 600px;
            display: block;
            border-radius: 5px 5px 0 0;
        }

        .content {
            padding: 20px;
            font-size: 14px;
            color: #333;
            line-height: 1.6;
        }

        .form-control {
            border-color: #E5E7EB;
            color: #111827;
            background-color: #ffffff;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.6;
            border-radius: 5px;
            padding: 0.5rem 0.625rem;
            height: 38px;
            transition: all 0.5s;
        }

        .button {
            display: inline-block;
            padding: 8px 25px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 30px;
            cursor: pointer;
        }

        .yes {
            background: white;
            color: #28a745;
            border: 1px solid #28a745;
        }

        .no {
            background: white;
            color: #ec0505;
            border: 1px solid red;
        }

        @media (max-width: 600px) {
            .container {
                padding: 3px;
                max-width: 93%;
            }

            html,
            body {
                overflow-x: hidden;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="https://actecrm.com/hrm/mails/mail-images/form-header.png" alt="">
        </div>
        <div class="content">
            <p>Dear <?php echo $row['candidate_name']; ?>,</p>
            <p> We are pleased to inform you that you have been shortlisted for the <b><?php echo $row['ticket_request_id']; ?></b> at <b>Markerz Global Solutions</b>. Your skills and experience align well with our requirements</p>
            <p>Your interview is scheduled for <b><?php echo $row['interview_date']; ?> (IST)</b>. Our team will share further details soon. If you have any questions, feel free to reach out.</p>
            <p>Kindly choice your date & time</p>

            <form>
                <div class="row">
                    <input type="date" class="form-control" name="" id="" min=<?php echo date('Y-m-d')?>>
                    <input type="time" class="form-control" name="" id="">
                    <button type="submit" class="button yes">Submit</button>
                </div>
            </form>
        </div>
        <div class="footer">
            <img src="https://actecrm.com/hrm/mails/mail-images/form-footer.png" alt="">
        </div>
    </div>
</body>

</html>