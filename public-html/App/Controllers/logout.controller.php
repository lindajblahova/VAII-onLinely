<?php
session_start();
require('../model.php');

$dbIsAdmin = phpGetUserData($_SESSION["uid"]);

//check if session uid exists and not empty
if (isset($_SESSION["uid"]) && $_SESSION["uid"]!="") {
    //empty session uid
    $_SESSION["uid"]="";
    if ($dbIsAdmin["user_role"] == 0) {
        session_destroy();
        header('Location: ../Views/Index/indexAdmin.view.php');
    } else {
        session_destroy();
        header('Location: ../Views/Index/index.view.php');
    }
}else{
    session_destroy();
    header('Location: ../Views/Index/index.view.php');
}
?>
