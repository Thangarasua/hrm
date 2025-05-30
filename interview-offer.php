<?php require_once("includes/config.php"); ?>
<?php
$id = base64_decode($_GET['id']); 
$value = base64_decode($_GET['val']); 

$query = "SELECT i.*,c.candidate_name,r.job_position FROM `interview_process` AS i INNER JOIN candidates AS c ON i.candidate_id=c.candidate_id INNER JOIN recruitment AS r ON r.ticket_request_id=c.ticket_request_id  WHERE i.`candidate_id` = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);  
$status = $row['training_offer_status']; 

if ($status == 0) {
    if ($value == 1) {
        $currentDatetime = date('Y-m-d H:i:s'); 
        $query = "UPDATE `interview_process` SET `training_offer_responced`= '$currentDatetime', `training_offer_status`= 1 WHERE `candidate_id`='$id'"; 
        $result = mysqli_query($conn, $query);
        $content = 'accepted';
    } elseif ($value == 2) {
        $content = 'updateStatus';
    }
} elseif ($status == 1) {
    $content = 'accepted';
} elseif ($status == 2) {
    $content = 'rejected';
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
        <?php if ($content == 'updateStatus') { ?>
            <div class="content">
                <p>Dear <b> <?php echo $row['candidate_name']; ?></b>,</p>

                <p>I would like to offering you to attend a mandatory training session for the position of <b><?php echo $row['job_position']; ?></b> role.
                </p>
                <p>
                  Kindly tell me about offer rejection comment, we would like to provide you with responce:
                </p>

                <form id="update">
                    <div class="row">
                        <textarea class="form-control" name="comments" id="comments" rows="4" cols="60"></textarea>
                        <input type="hidden" name="rowId" value="<?php echo $row['interview_id']; ?>">
                        <button type="submit" class="form-control button yes"><span>Submit </span></button>
                    </div>
                </form>
            </div>
        <?php } elseif ($content == 'accepted') { ?>
            <div class="content">
                <h4 style="text-align: center;">Thank you for responce</h4>
                <p>Dear <b> <?php echo $row['candidate_name']; ?></b>,</p>
                <p>Welcome to join with our team  .</p>
                </p>Please confirm your attendance by <b><?php echo $row['training_offer_send']; ?>,</b> so that I can reserve your spot for the training.</p>
            </div>
        <?php } elseif ($content == 'rejected') { ?>
            <div class="content">
                <h4 style="text-align: center;">Thank you for responce</h4>

                <p style="text-align: center;">We appreciate your responce.</p>
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
                let form = formValidation();
                if (form === 0) {
                    return false;
                }
                let formData = new FormData(this);
                formData.append("flag", "offerRejection");
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

            function formValidation() {
                let comments = $("#comments").val().trim();
                if (comments.length == 0) {
                    $("#comments").focus();
                    return 0;
                } 
            }

        })
    </script>
</body>

</html>