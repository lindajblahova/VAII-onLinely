<?php

if (($_GET["gid"] != "") && (phpGetGroupOwnerID($_GET["gid"]) == $_SESSION["uid"])) {

    $groupHeading = "Edit group name";
    $hiddenField = '<input type="hidden" id="formPostsGroupID" name="formPostsGroupID" value="' . $_GET["gid"] . '">';

    if ($_SESSION["group_name"] == "") {
        $_SESSION["group_name"] = phpGetGroupName($_GET["gid"]);
    }

} else {

    $groupHeading = "Create new group";
    $hiddenField = "";

}

?>
<div class="row">
    <div class="col-lg-6">
<h5 class="mt-3"><?php echo $groupHeading; ?></h5>
<hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form name="formGroup" action="../../Controllers/Groups/group.controller.php" method="post">
            <div class="form-group">
                <label for="formGroupName">Group name</label>
                <input type="text"
                       class="form-control <?php if ($_SESSION['msgid'] != '401' && $_SESSION['msgid'] != '') {
                           echo 'is-valid';
                       } else {
                           echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                       } ?>"
                       id="formGroupName" name="formGroupName" placeholder="Enter group name"
                       value="<?php echo $_SESSION['group_name']; ?>" required>

                <?php if ($_SESSION["msgid"] == "401") { ?>
                    <div class="invalid-feedback">
                        <?php echo(phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                    </div>
                <?php } ?>
            </div><?php echo $hiddenField; ?>
            <button type="submit" id="formGroupSubmit" name="formGroupSubmit" class="btn btn-primary btn-success mb-5">
                Submit
            </button>
        </form>
    </div>
</div>


<?php
$_SESSION['group_name'] = "";
?>
