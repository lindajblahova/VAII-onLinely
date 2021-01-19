<?php
session_start();
require('../../model.php');


    $user_email = $_POST["formSignInEmail"];
    $admin_email = $_POST["formSignInEmailAdmin"];
    $user_email_pattern = "~^[\w]+@[\w]+\.+[\w]{2,3}$~";

    $user_password = $_POST["formSignInPassword"];
    $admin_password = $_POST["formSignInPasswordAdmin"];
    $user_password_pattern = "~(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}$~";

    $email_validation = preg_match($user_email_pattern, $user_email);
    $email_admin_validation = preg_match($user_email_pattern, $admin_email);
    $password_validation = preg_match($user_password_pattern, $user_password);
    $password_admin_validation = preg_match($user_password_pattern, $admin_password);


if ($user_email != "" && $user_password != "") {
    if ($email_validation && $password_validation) {//query the database only if email and password are regex fine

        //fetching the row by email
        $dbUserRow = phpDoesUserExist($user_email);

        if (!is_array($dbUserRow)) {
            //echo regex ok -> user does not exist
            $_SESSION["msgid"] = "104";
            header('Location: ../../Views/Index/index.view.php');

        } else if (!password_verify($user_password, $dbUserRow["user_password"])) { //user OK, password WRONG

            $_SESSION["msgid"] = "105";
            header('Location: ../../Views/Index/index.view.php');

        } else if (password_verify($user_password, $dbUserRow["user_password"])) { //user OK, password Ok

            $_SESSION["uid"] = $dbUserRow["user_id"];
            header('Location: ../../Views/Gate/gate.view.php?module=home');
        }


    } else { //not regex pattern compliant

        $_SESSION["msgid"] = "106";
        header('Location: ../../Views/Index/index.view.php');
    }
}

if ($admin_email != "" && $admin_password != "") {
    if ($email_admin_validation && $password_admin_validation) {

        $dbAdminRow = phpDoesUserExist($admin_email);

        if (!is_array($dbAdminRow)) {
            //echo "regex ok -> user does not exist
            $_SESSION["msgid"] = "104";
            header('Location: ../../Views/Index/indexAdmin.view.php');

        } else if (!password_verify($admin_password, $dbAdminRow["user_password"])) { //user OK, password WRONG

            $_SESSION["msgid"] = "105";
            header('Location: ../../Views/Index/indexAdmin.view.php');

        } else if (password_verify($admin_password, $dbAdminRow["user_password"])) { //user OK, password OK

            $_SESSION["uid"] = $dbAdminRow["user_id"];
            header('Location: ../../Views/Gate/gate.view.php?module=home');
        }


    } else if ((!$email_admin_validation || !$password_admin_validation) && (!$email_validation && !$password_validation)) { //not regex pattern compliant -> cannot be in the database, don't query the database, return feedback

        //echo "not regex compliant -> wrong email or password -> feedback message";
        $_SESSION["msgid"] = "106";
        header('Location: ../../Views/Index/indexAdmin.view.php');
    }
}

?>
