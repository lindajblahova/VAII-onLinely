<?php
$db_data = array($_SESSION["uid"]);
$dbUserRow = phpFetchDB('SELECT COUNT(*) FROM messages WHERE message_recipient_id = ? AND message_read_by_recipient = 0', $db_data);
$db_data = "";
?>


<h5>Welcome!</h5>
<hr>


<p>You have <strong><?php echo $dbUserRow["COUNT(*)"]; ?></strong> unread messages.</p>


<?php

$db_data = array($_GET["gid"]);
$dbPostsList = phpFetchAllDB('SELECT * FROM posts ORDER BY post_date DESC', $db_data);
$db_data = "";

?>

<div class="container">
<p><strong>News</strong></p>
<hr>

<div class="row">
    <div class="col-lg-8" style="margin: auto">

        <?php foreach ($dbPostsList as $dbPostRow) { ?>

            <div class="message_header smaller_margin" style="clear: both">
                <h5 style="float: left"><?php echo phpGetUserEmail($dbPostRow["post_author_id"]); ?>
                </h5>
                <h5 style="float: right"> <?php echo phpGetGroupName($dbPostRow["post_group_id"]); ?> |
                    <?php echo $dbPostRow["post_date"]; ?></h5>
            </div>
            <hr style="border-top: 1px solid white;">

            <div id="databasePostsContent<?php echo $dbPostRow['post_id'];?>"
                 class="message_content"><?php echo $dbPostRow["post_content"]; ?></div>

        <?php } ?>

    </div>
</div>
</div>
