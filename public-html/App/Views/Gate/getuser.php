<?php
require('../../system.controller.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

$q = intval($_GET['q']);

$db_data = array($q);
$dbUserList = phpFetchDB('SELECT * FROM user WHERE user_id = ?',$db_data);
$db_data = "";

$db_data = array($_SESSION["uid"],$_SESSION["uid"],$dbUserList["user_id"],$dbUserList["user_id"]);
$dbAllMessagesList = phpFetchAllDB('SELECT * FROM messages WHERE (message_sender_id = ? OR message_recipient_id = ?)
AND (message_sender_id = ? OR message_recipient_id = ?) ORDER BY message_date DESC',$db_data);
$db_data = "";
?>
<div class="row">
    <div class="col-lg-12">
        <table class="table">

            <?php foreach ($dbAllMessagesList as $dbMessageRow) { ?>
                <tr>
                    <td class="message_header<?php if ($dbMessageRow["message_sender_id"] == $_SESSION["uid"] )
                    {?> message_sender <?php } if ($dbMessageRow["message_read_by_recipient"] == 0 &&
                        $dbMessageRow["message_recipient_id"] == $_SESSION["uid"]) { ?> message_new <?php } ?> ">
                        <?php if ($dbMessageRow["message_sender_id"] == $_SESSION["uid"]) { ?>
                            TO: <?php echo phpGetUserEmail($dbMessageRow["message_recipient_id"]); ?>
                        <?php }else{ ?>
                            FROM: <?php echo phpGetUserEmail($dbMessageRow["message_sender_id"]); ?>
                        <?php } ?>
                        | DATE: <?php echo $dbMessageRow["message_date"]; ?>

                        <?php if ($dbMessageRow["message_sender_id"] == $_SESSION["uid"] && $dbMessageRow["message_read_by_recipient"] == 1) { ?>
                            | READ BY RECIPIENT
                        <?php } ?>

                    </td>
                </tr>
                <tr><td class="message_content"><?php echo $dbMessageRow["message_content"]; ?></td></tr>
            <?php } ?>

        </table>
    </div>
</div>
</body>
</html>