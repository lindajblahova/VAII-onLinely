<?php
session_start();
require('../../model.php');

$user_role = 2;

$user_email = $_POST["formSignUpEmail"];
$user_email_pattern = "~^[\w]+@[\w]+\.+[\w]{2,3}$~";
$email_validation = preg_match($user_email_pattern, $user_email);

$user_password = $_POST["formSignUpPassword"];
$user_password_pattern = "~(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}$~";
$password_validation = preg_match($user_password_pattern, $user_password);


$admin_email = $_POST["formSignUpEmailAdmin"];
$email_admin_validation = preg_match($user_email_pattern, $admin_email);
$admin_password = $_POST["formSignUpPasswordAdmin"];
$password_admin_validation = preg_match($user_password_pattern, $admin_password);

if ($user_email != "" && $user_password != "") {
    if ($email_validation && $password_validation && $user_password == $_POST["formSignUpPasswordConf"]) {

        $user_role = 1;
        $hashed_user_password = password_hash($user_password, PASSWORD_DEFAULT);

        $isAlreadySignedUp = phpDoesUserExist($user_email);

        if (!is_array($isAlreadySignedUp)) {
            phpInsertUser($user_role, $user_email, $hashed_user_password);
            $_SESSION["msgid"] = "111";
        } else {
            $_SESSION["msgid"] = "112";
        }
        header('Location: ../../Views/Index/index.view.php');
    } else if (!$email_validation) {
        $_SESSION["msgid"] = "101";
        //$_SESSION["formSignUpEmail"] = $user_email;
        header('Location: ../../Views/Index/index.view.php');
    } else if (!$password_validation) {
        $_SESSION["msgid"] = "102";
        //$_SESSION["formSignUpEmail"] = $user_email;
        header('Location: ../../Views/Index/index.view.php');
    } else if ($user_password != $_POST["formSignUpPasswordConf"]) {
        $_SESSION["msgid"] = "103";
        //$_SESSION["formSignUpEmail"] = $user_email;
        header('Location: ../../Views/Index/index.view.php');
    }
}


if ($admin_email != "" && $admin_password != "") {
    if ($email_admin_validation && $password_admin_validation && $admin_password == $_POST["formSignUpPasswordConfAdmin"]) {

        $user_role = 0;

        $hashed_admin_password = password_hash($admin_password, PASSWORD_DEFAULT);

        $isAlreadySignedUp = phpDoesUserExist($admin_email);

        //if no result is returned, insert
        if (!is_array($isAlreadySignedUp)) {
            phpInsertUser($user_role, $admin_email, $hashed_admin_password);
            $_SESSION["msgid"] = "111";
        } else {
            $_SESSION["msgid"] = "112";
        }
        header('Location: ../../Views/Index/indexAdmin.view.php');
    } else if (!$email_admin_validation) {
        $_SESSION["msgid"] = "101";
        header('Location: ../../Views/Index/indexAdmin.view.php');
    } else if (!$password_admin_validation) {
        $_SESSION["msgid"] = "102";
        header('Location: ../../Views/Index/indexAdmin.view.php');
    } else if ($admin_password != $_POST["formSignUpPasswordConfAdmin"]) {
        $_SESSION["msgid"] = "103";
        header('Location: ../../Views/Index/indexAdmin.view.php');
    }
}

if ($user_email == "" && $user_password == "") {
    header('Location: ../../Views/Index/index.view.php');
}

?>