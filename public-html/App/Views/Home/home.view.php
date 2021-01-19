<?php
if (isset($_SESSION["uid"]) || $_SESSION["uid"] != "") {
$dbUserMessagesRow = phpCountNewMessages($_SESSION["uid"]);

$dbPostsList = phpGetAllPosts();
?>
    <div class="row">
        <div class="col-lg-12">
            <h5 class="mt-3">Welcome!</h5>
            <hr>
        </div>
    </div>


<p>You have <strong><?php echo $dbUserMessagesRow["COUNT(*)"]; ?></strong> unread messages.</p>


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
                <div id="databasePostsContent<?php echo $dbPostRow['post_id']; ?>"
                     class="message_content"><?php echo $dbPostRow["post_content"]; ?></div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>

