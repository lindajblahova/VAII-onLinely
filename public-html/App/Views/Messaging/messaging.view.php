<?php
if (isset($_SESSION["uid"]) || $_SESSION["uid"] != "") {

$dbRecipientsList = phpGetAllUserForMessaging();
$dbUserMessagesList = phpGetUserMessages($_SESSION["uid"]);

?>
    <script src="../../../JS/messaging.js"></script>
    <h5>Messaging</h5>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <form name="formMessaging" action="../../Controllers/Messaging/messaging.controller.php" method="post">
                <div class="form-group">
                    <label for="formMessagingRecipient">Select message recipient</label>
                    <select class="form-control <?php if ($_SESSION['msgid'] != '301' && $_SESSION['msgid'] != '') {
                        echo 'is-valid';
                    } else {
                        echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                    } ?>" id="formMessagingRecipient" name="formMessagingRecipient" data-live-search="true">
                        <option value="default">Select email</option>
                        <?php foreach ($dbRecipientsList as $dbRecipientRow) { ?>
                            <option value="<?php echo $dbRecipientRow["user_id"]; ?>">
                                <?php echo $dbRecipientRow["user_email"]; ?></option>
                        <? } ?>
                    </select>
                    <?php if ($_SESSION["msgid"] == "301") { ?>
                        <div class="invalid-feedback">
                            <?php echo(phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                        </div>
                    <?php } ?>

                </div>

                <div class="form-group">
                    <label for="formMessagingContent">Message</label>
                    <textarea class="form-control <?php if ($_SESSION['msgid'] != '302' && $_SESSION['msgid'] != '') {
                        echo 'is-valid';
                    } else {
                        echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                    } ?>" id="formMessagingContent" name="formMessagingContent"
                              placeholder="Write the message here. Tags are not allowed." required></textarea>
                    <?php if ($_SESSION["msgid"] == "302") { ?>
                        <div class="invalid-feedback">
                            <?php echo(phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                        </div>
                    <?php } ?>
                </div>
                <button type="submit" id="formMessagingSubmit" name="formMessagingSubmit"
                        class="btn btn-primary btn-success mb-5">Send</button>
            </form>
        </div>
    </div>


    <div>
        <form>
            <select class="form-control col-lg-4"  onchange="showUser(this.value)" data-live-search="true">
                <option value="">Select a person</option>
                <option value="<?php echo $_SESSION["uid"] ?>" style="color: #e2b709; font-weight: bold">Show all
                </option>
                <?php foreach ($dbRecipientsList as $dbRecipientRow) {?>
                        <option value="<?php echo $dbRecipientRow["user_id"]; ?>"
                            <?php if ($_SESSION['messaging_recipient'] != '' &&
                                $_SESSION['messaging_recipient'] == $dbRecipientRow["user_id"]) {
                                echo 'selected';
                            } ?>>
                            <?php echo $dbRecipientRow["user_email"]; ?></option>
                    <?} ?>
            </select>
        </form>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <table class="table" id="messagesUserConversation">
                    <?php foreach ($dbUserMessagesList as $dbMessageRow) { ?>
                        <tr>
                            <td class="message_header<?php if ($dbMessageRow["message_sender_id"] == $_SESSION["uid"]) {
                                ?> message_sender <?php }
                            if ($dbMessageRow["message_read_by_recipient"] == 0 &&
                                $dbMessageRow["message_recipient_id"] == $_SESSION["uid"]) { ?> message_new <?php } ?> ">
                                <?php if ($dbMessageRow["message_sender_id"] == $_SESSION["uid"]) { ?>
                                    TO: <?php echo phpGetUserEmail($dbMessageRow["message_recipient_id"]); ?>
                                <?php } else { ?>
                                    FROM: <?php echo phpGetUserEmail($dbMessageRow["message_sender_id"]); ?>
                                <?php } ?>
                                | DATE: <?php echo $dbMessageRow["message_date"]; ?>
                                <?php if ($dbMessageRow["message_sender_id"] == $_SESSION["uid"] &&
                                    $dbMessageRow["message_read_by_recipient"] == 1) { ?>
                                    | READ BY RECIPIENT
                                <?php } ?>

                            </td>
                        </tr>
                        <tr>
                            <td class="message_content"><?php echo $dbMessageRow["message_content"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>


<?php
    //UPDATE MESSAGES READ BY RECIPIENT
    phpUpdateReadMessages($_SESSION["uid"]);
}
?>




