<?php
session_start();
require('system.controller.php');

//check if session uid exists and not empty
if (isset($_SESSION["uid"]) && $_SESSION["uid"]!="") {
    //empty session uid
    $_SESSION["uid"]="";
    header('Location: index.php');
}else{
    header('Location: index.php');
}
?>
