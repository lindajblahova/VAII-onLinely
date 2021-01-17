<?php
session_start();
require('../system.controller.php');

$dbData = array($_SESSION["uid"])  ;
$dbIsAdmin = phpFetchDB('SELECT * FROM user WHERE user_id = ?', $dbData)  ;
$dbData = "";

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
