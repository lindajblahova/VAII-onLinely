<?php

$dbGroupsList = phpGetAllGroups();
$dbUserIsAdmin = phpGetUserData($_SESSION["uid"]);

?>
<div class="row">
    <div class="col-lg-6">
        <h5 class="mt-3">Groups</h5>
    </div>
    <div class="col-lg-6">
        <a href="../Gate/gate.view.php?module=group" class="btn btn-success float-right mt-2" role="button">Create new
            group</a>
    </div>
</div>
<hr>

<div class="row">


    <?php foreach ($dbGroupsList as $dbGroupRow) { ?>
        <div class="group_content col-lg-6">
            <a href="../Gate/gate.view.php?module=posts&gid=<?php echo $dbGroupRow['group_id']; ?>">
                <?php echo $dbGroupRow["group_name"]; ?>
            </a>
        </div>

        <div class="group_content col-lg-6">

            <!-- Display modal for admin only -->
            <?php if (isset($_SESSION["uid"]) && $dbUserIsAdmin["user_role"] == 0) { ?>

                <form action="../../Controllers/Groups/group.delete.controller.php" method="post">
                    <input type="hidden" name="formGroupsGroupID" value="<?php echo $dbGroupRow["group_id"]; ?>">

                    <!-- Button modal -->
                    <button type="button" class="btn btn-danger btn-sm float-right" data-toggle="modal"
                            data-target="#deleteGroupModal<?php echo $dbGroupRow['group_id']; ?>">Delete</button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteGroupModal<?php echo $dbGroupRow['group_id']; ?>" >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete the group</h5>
                                    <button type="button" class="close" data-dismiss="modal" >
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this group? This action is irreversible!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="formGroupsDeleteButton" value="delete" class="btn btn-primary">Yes, delete it!</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            <?php } ?>
        </div>

    <?php } ?>

</div>
