<?php
session_start();
require('../../model.php');

if ($_POST["formGroupsDeleteButton"] == delete) {

    //delete all posts assigned to the group, delete the group
    phpDeleteGroup($_POST["formGroupsGroupID"]);

    //system feedback - group has been deleted
    $_SESSION["msgid"] = "413";

}

//go to the list of groups
header('Location: ../../Views/Gate/gate.view.php?module=groups');
?>
