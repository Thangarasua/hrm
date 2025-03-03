<?php require_once("includes/config.php"); ?>
<?php
$id = base64_decode($_GET['id']);
$value = base64_decode($_GET['val']);

$query = "SELECT c.*,r.job_position FROM `candidates` AS c INNER JOIN `recruitment` AS r ON c.ticket_request_id = r.ticket_request_id WHERE `candidate_id` = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$status = $row['date_confirm_status'];
$interviewDate = $row['interview_re_date'];
if($interviewDate == ''){
    $interviewDate = $row['interview_date'];
}  

if ($status == 0) {
    if ($value == 1) {
        $query = "UPDATE `candidates` SET `interview_status`= 3 AND `date_confirm_status`= 1 WHERE `candidate_id`='$id'";
        $result = mysqli_query($conn, $query);

        $content = 'scheduledDate';
    } elseif ($value == 2) {
        $content = 'updateDate';
    }
} elseif ($status == 1) {
    $content = 'scheduledDate';
} elseif ($status == 2) {
    $content = 'scheduledDate';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <link rel="stylesheet" href="./css/shortlist-mail-content.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="https://actecrm.com/hrm/mails/mail-images/form-header.png" alt="">
        </div>
        <?php if ($content == 'updateDate') { ?>
            <div class="content">
                <p>Dear <?php echo $row['candidate_name']; ?>,</p>
                <p> We are pleased to inform you that you have been shortlisted for the <b><?php echo $row['ticket_request_id']; ?></b> at <b>Markerz Global Solutions</b>. Your skills and experience align well with our requirements</p>
                <p>Your interview is scheduled for <b><?php echo $row['interview_date']; ?> (IST)</b>. Our team will share further details soon. If you have any questions, feel free to reach out.</p>
                <p>Kindly choice your date & time</p>

                <form id="update">
                    <div class="row">
                        <input type="date" class="form-control" name="interview_date" id="interview_date" min=<?php echo date('Y-m-d') ?>>
                        <input type="time" class="form-control" name="interview_time" id="interview_time">
                        <input type="hidden" name="rowId" value="<?php echo $row['candidate_id']; ?>">
                        <button type="submit" class="form-control button yes"><span>Submit </span></button> 
                    </div>
                </form>
            </div>
        <?php } elseif ($content == 'scheduledDate') { ?>
            <div class="content">
                <h4 style="text-align: center;">Thank you for responce</h4>

                <p> Dear <b><?php echo $row['candidate_name']; ?></b>, We are pleased to invite you for an interview for the position of <b><?php echo $row['job_position']; ?></b> at Markerz Global Solutions.</p>

                <p>Interview Details:</p>
                <p>📅 Date: <?php echo date("Y-m-d", strtotime($interviewDate)); ?></p>
                <p>⏰ Time: <?php echo date(" h:i a", strtotime($interviewDate)); ?></p>
                <p>📍 Location/Mode: [No 1A Sai Adhithya Building, Taramani Link Rd, next to Athipathi Hospital, Velachery, Chennai, Tamil Nadu 600042 / Offline]</p>

                <p>Please confirm your availability by replying to this email. If you have any questions, feel free to reach out.</p>

                <p>Looking forward to speaking with you!</p>
            </div>
        <?php } ?>
        <div class="footer">
            <img src="https://actecrm.com/hrm/mails/mail-images/form-footer.png" alt="">
        </div>
    </div>
    <script src="js/plugins/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {

            $(document).on("submit", "#update", function(e) {
                e.preventDefault();
                let form = shortlistForm();
                if (form === 0) {
                    return false;
                }
                let formData = new FormData(this);
                formData.append("flag", "interviewDateUpdate");
                $.ajax({
                    type: "POST",
                    url: "queries/candidates.php",
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == "success") {
                            location.reload();
                        } else {
                            toastr.error(response.message, "Error");
                        }
                    },
                });
            });

            function shortlistForm() {
                let interview_date = $("#interview_date").val().trim();
                if (interview_date.length == 0) {
                    $("#interview_date").focus();
                    return 0;
                }
                let interview_time = $("#interview_time").val().trim();
                if (interview_time.length == 0) {
                    $("#interview_time").focus();
                    return 0;
                }
            }

        })
    </script>
</body>

</html>