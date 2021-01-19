<?php
session_start();
require('../../model.php');

    $group_name = $_POST["formGroupName"];
    $group_name_pattern = "~^[^<>]{1,}$~";
    $group_name_validation = preg_match($group_name_pattern, $group_name);

if ($group_name_validation) { //regex

    // if edited
    if ($_POST["formPostsGroupID"] != "") {

        phpUpdateGroupName($group_name, $_POST["formPostsGroupID"]);

        $_SESSION["msgid"] = "412";
        header('Location: ../../Views/Gate/gate.view.php?module=posts&gid=' . $_POST["formPostsGroupID"]);

    } else {

        phpInsertGroup($_SESSION["uid"], $group_name);;
        $_SESSION["msgid"] = "411";
        header('Location: ../../Views/Gate/gate.view.php?module=groups');
    }

} else {
    // not regex fine
    $_SESSION["msgid"] = "401";
    $_SESSION["group_name"] = $group_name;

    if ($_POST["formPostsGroupID"] != "") {
        //editing mode
        header('Location: ../../Views/Gate/gate.view.php?module=group&gid=' . $_POST["formPostsGroupID"]);
    } else {
        // creating mode
        header('Location: ../../Views/Gate/gate.view.php?module=group');
    }

}


?>
