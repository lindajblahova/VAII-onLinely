<?php
$db_data = array($_SESSION["uid"]);
$dbUserRow = phpFetchDB('SELECT COUNT(*) FROM messages WHERE message_recipient_id = ? AND message_read_by_recipient = 0', $db_data);
$db_data = "";
?>


<h5>Welcome!</h5>
<hr>


<p>You have <strong><?php echo $dbUserRow["COUNT(*)"]; ?></strong> unread messages.</p>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card bg-warning card_margin mb-3">
                <div class="card-header">Groups&Posts</div>
                <div class="card-body text-white">
                    <h5 class="card-title">Create a group and add some posts</h5>
                    <p class="card-text">In Groups, you can create your group where you can share some posts with other people, as well as in other existing group. </p>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-info card_margin mb-4">
                <div class="card-header">Messaging</div>
                <div class="card-body text-secondary">
                    <h5 class="card-title">Send and recieve private messages</h5>
                    <p class="card-text">Use the email-like communication to send and recieve private messages with another users</p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card border-warning mb-4" >
                    <div class="card-header">Settings&Profiles</div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Add your informations and see other's profiles</h5>
                        <p class="card-text">Add informations such as your name, nickname or age to your profile through settings, and see profiles of other users.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-info mb-3" >
                    <div class="card-header">Have fun!</div>
                    <div class="card-body text-white">
                        <h5 class="card-title">Bla bla</h5>
                        <p class="card-text">Bla bla bla </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php

$db_data = array($_GET["gid"]);
$dbPostsList = phpFetchAllDB('SELECT * FROM posts ORDER BY post_date DESC', $db_data);
$db_data = "";

?>

<div class="container">
<p><strong>News</strong></p>
<hr>

<div class="row">
    <div class="col-lg-12">

        <?php foreach ($dbPostsList as $dbPostRow) { ?>

            <div class="message_header mt-4 mb-5" style="clear: both">
                <h4 style="float: left"><?php echo phpGetUserEmail($dbPostRow["post_author_id"]); ?>
                | IN GROUP: <?php echo phpGetGroupName($dbPostRow["post_group_id"]); ?></h4>
                <h4 style="float: right"><?php echo $dbPostRow["post_date"]; ?></h4>
            </div>
            <hr style="border-top: 1px solid white;">

            <div id="databasePostsContent<?php echo $dbPostRow['post_id'];?>"
                 class="message_content"><?php echo $dbPostRow["post_content"]; ?></div>

        <?php } ?>

    </div>
</div>
</div>
