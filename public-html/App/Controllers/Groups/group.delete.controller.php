<?php
session_start();
require('../../model.php');

if ($_POST["formGroupsDeleteButton"] == delete) {

    phpDeleteGroup($_POST["formGroupsGroupID"]);

    //system feedback
    $_SESSION["msgid"] = "413";

}

header('Location: ../../Views/Gate/gate.view.php?module=groups');
?>