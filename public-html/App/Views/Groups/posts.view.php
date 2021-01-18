<div class="row">
    <div class="col-lg-6">
        <h5><?php echo phpGetGroupName($_GET["gid"]); ?></h5>
    </div>
    <div class="col-lg-6">
        <?php if (phpGetGroupOwnerID($_GET["gid"]) == $_SESSION["uid"]) { ?>
            <a href="../Gate/gate.view.php?module=group&gid=<?php echo $_GET["gid"]; ?>" class="btn btn-primary btn-sm float-right mt-3" role="button">Settings</a>
        <?php } ?>
    </div>
</div>
<hr>


<div class="row">
    <div class="col-lg-12">
        <form name="formPosts" action="../../Controllers/Groups/posts.controller.php" method="post" novalidate>

            <div class="form-group">
                <label for="formPostsContent">Create a new post</label>
                <textarea class="form-control <?php if ($_SESSION['msgid']!='501' && $_SESSION['msgid']!='')
                { echo 'is-valid'; }else{ echo (phpShowInputFeedback($_SESSION['msgid'])[0]); } ?>"
                          id="formPostsContent" name="formPostsContent"
                          placeholder="Write the post here. Tags are not allowed."
                          onkeyup="jsPostsValidateTextArea('formPostsContent')"><?php echo $_SESSION["posts_content"];?></textarea>

                <?php if ($_SESSION["msgid"]=="501") { ?>
                    <div class="invalid-feedback">
                        <?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                    </div>
                <?php } ?>
            </div>

            <input type="hidden" id="formPostsGroupID" name="formPostsGroupID" value="<?php echo $_GET['gid']; ?>">

            <button type="submit" id="formPostsSubmit" name="formPostsSubmit" class="btn btn-primary btn-success mb-5">Send</button>
        </form>
    </div>
</div>

<?php

$dbPostsList = phpGetPostsInGroup($_GET["gid"]);

$dbUserIsAdmin = phpGetUserData($_SESSION["uid"]);

?>

<p><strong>Latest posts</strong></p>
<hr>

<div class="row">
    <div class="col-lg-8" style="margin: auto;">
        <?php foreach ($dbPostsList as $dbPostRow) { ?>
            <div class="my_button_float_right">
                <?php if ($dbPostRow["post_author_id"] == $_SESSION["uid"]) { ?>
                    <a href="#formPostsContentEdited<?php echo $dbPostRow['post_id'];?>" class="btn btn-primary
                             btn-sm"
                       id="formPostsEditButton<?php echo $dbPostRow["post_id"];?>" role="button"
                       onclick="showTextAreaByPostId('<?php echo $dbPostRow["post_id"];?>')">Edit</a>
                <?php } ?>

                <?php if (($_SESSION["uid"] == $dbPostRow["post_author_id"]) || ($_SESSION["uid"] == phpGetGroupOwnerID($_GET["gid"]))
                    || ($dbUserIsAdmin["user_role"] == 0)) { ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePostModal<?php echo $dbPostRow['post_id']; ?>">Delete</button>
                <?php }?>
            </div>

            <div class="message_header">
                <h4><?php echo phpGetUserEmail($dbPostRow["post_author_id"]); ?>
                    |  <?php echo $dbPostRow["post_date"]; ?></h4>
            </div>

            <div id="databasePostsContent<?php echo $dbPostRow['post_id'];?>"
                 class="message_content"><?php echo $dbPostRow["post_content"]; ?></div>

            <form action="../../Controllers/Groups/posts.edit.controller.php" method="post" novalidate>



                <input type="hidden" id="formPostsGroupID" name="formPostsGroupID" value="<?php echo $_GET['gid'];?>">
                <input type="hidden" id="formPostsPostID" name="formPostsPostID" value="<?php echo $dbPostRow["post_id"];?>">

                <!-- Display modal only if the current user is the author of the post or the owner of the group -->
                <?php if (($_SESSION["uid"] == $dbPostRow["post_author_id"]) || ($_SESSION["uid"] == phpGetGroupOwnerID($_GET["gid"]))
                    || ($dbUserIsAdmin["user_role"] == 0)) { ?>

                    <!-- Modal -->
                    <div class="modal fade" id="deletePostModal<?php echo $dbPostRow['post_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deletePostModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deletePostModalLabel">Delete the post</h5>
                                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this post? This action is irreversible!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" id="formPostsDeleteButton" name="formPostsDeleteButton" value="delete" class="btn btn-primary">Yes, delete it!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </form>
            </form>
            <hr>
        <?php }?>
    </div>

</div>


<script src="../../../JS/posts.js"></script>

<?php
$_SESSION["posts_content"] = "";
?>