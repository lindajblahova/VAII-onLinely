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
        <div class="group_content col-lg-12" >
            <a class="my_group_link" href="../Gate/gate.view.php?module=posts&gid=<?php echo $dbGroupRow['group_id']; ?>">
                <?php echo $dbGroupRow["group_name"]; ?>
            </a>
        </div>
    <?php } ?>

</div>


