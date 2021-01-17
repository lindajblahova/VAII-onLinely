<?php
session_start();
require('../../system.controller.php');

$user_email = $_POST["formSignInEmail"];
$admin_email = $_POST["formSignInEmailAdmin"];
$user_email_pattern = "~^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$~";

$user_password = $_POST["formSignInPassword"];
$admin_password = $_POST["formSignInPasswordAdmin"];
$user_password_pattern = "~(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@*$#]).{8,16}~";

$email_validation = preg_match($user_email_pattern, $user_email);
$email_admin_validation = preg_match($user_email_pattern, $admin_email);
$password_validation = preg_match($user_password_pattern, $user_password);
$password_admin_validation = preg_match($user_password_pattern, $admin_password);


if ($email_validation && $password_validation) {//query the database only if email and password are regex pattern compliant

    $db_data = array($user_email);
    //fetching the row by email, fetch returns the first (and only) result entry
    $dbUserRow = phpFetchDB('SELECT * FROM user WHERE user_email = ?', $db_data);
    $db_data = "";

    if (!is_array($dbUserRow)) { //even regex compliant attempt can result in nonexistent record
        //echo "regex ok -> user does not exist -> wrong email or password -> feedback message";
        $_SESSION["msgid"] = "805";
        header('Location: ../../Views/Index/index.view.php');

    } else if (!password_verify($user_password, $dbUserRow["user_password"])) { //user OK, password WRONG

       // echo "user ok, password wrong -> wrong email or password -> feedback message";
        $_SESSION["msgid"] = "806";
        header('Location: ../../Views/Index/index.view.php');

    } else if (password_verify($user_password, $dbUserRow["user_password"]) ) { //user OK, password OK, activated

        //echo "user ok, password ok -> allow user in the system -> feedback message";
        $_SESSION["uid"] = $dbUserRow["user_id"];
        header('Location: ../../Views/Gate/gate.view.php?module=home');
    }


} else { //not regex pattern compliant -> cannot be in the database, don't query the database, return feedback

    //echo "not regex compliant -> wrong email or password -> feedback message";
    //$_SESSION["msgid"] = "";
    //header('Location: ../../Views/Index/index.view.php');
}

if ($email_admin_validation && $password_admin_validation) {//query the database only if ADMIN email and password are regex pattern compliant

    $db_data = array($admin_email);
    //fetching the row by email, fetch returns the first (and only) result entry
    $dbAdminRow = phpFetchDB('SELECT * FROM user WHERE user_email = ?', $db_data);
    $db_data = "";

    if (!is_array($dbAdminRow)) { //even regex compliant attempt can result in nonexistent record
        //echo "regex ok -> user does not exist -> wrong email or password -> feedback message";
        $_SESSION["msgid"] = "805";
        header('Location: ../../Views/Index/indexAdmin.view.php');

    } else if (!password_verify($admin_password, $dbAdminRow["user_password"])) { //user OK, password WRONG

        // echo "user ok, password wrong -> wrong email or password -> feedback message";
        $_SESSION["msgid"] = "806";
        header('Location: ../../Views/Index/indexAdmin.view.php');

    } else if (password_verify($admin_password, $dbAdminRow["user_password"]) ) { //user OK, password OK

        //echo "user ok, password ok -> allow user in the system -> feedback message";
        $_SESSION["uid"] = $dbAdminRow["user_id"];
        header('Location: ../../Views/Gate/gate.view.php?module=home');
    }


} else if ((!$email_admin_validation || !$password_admin_validation) && (!$email_validation && !$password_validation) ){ //not regex pattern compliant -> cannot be in the database, don't query the database, return feedback

    //echo "not regex compliant -> wrong email or password -> feedback message";
    //$_SESSION["msgid"] = "";
    header('Location: ../../Views/Index/indexAdmin.view.php');
}

?>
