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
    if ($email_validation && $password_validation) {//query the database only if email and password are regex pattern compliant

        //fetching the row by email, fetch returns the first (and only) result entry
        $dbUserRow = phpDoesUserExist($user_email);

        if (!is_array($dbUserRow)) { //even regex compliant attempt can result in nonexistent record
            //echo "regex ok -> user does not exist ->feedback message";
            $_SESSION["msgid"] = "805";
            header('Location: ../../Views/Index/index.view.php');

        } else if (!password_verify($user_password, $dbUserRow["user_password"])) { //user OK, password WRONG

            // echo "user ok, password wrong -> feedback message";
            $_SESSION["msgid"] = "806";
            header('Location: ../../Views/Index/index.view.php');

        } else if (password_verify($user_password, $dbUserRow["user_password"])) { //user OK, password Ok

            //echo "user ok, password ok -> allow user in the system -> feedback message";
            $_SESSION["uid"] = $dbUserRow["user_id"];
            header('Location: ../../Views/Gate/gate.view.php?module=home');
        }


    } else { //not regex pattern compliant -> cannot be in the database, don't query the database, return feedback

        //echo "not regex compliant -> wrong email or password -> feedback message";
        $_SESSION["msgid"] = "807";
        header('Location: ../../Views/Index/index.view.php');
    }
}

if ($admin_email != "" && $admin_password != "") {
    if ($email_admin_validation && $password_admin_validation) {//query the database only if ADMIN email and password are regex pattern compliant

        //fetching the row by email, fetch returns the first (and only) result entry
        $dbAdminRow = phpDoesUserExist($admin_email);

        if (!is_array($dbAdminRow)) { //even regex compliant attempt can result in nonexistent record
            //echo "regex ok -> user does not exist ->  feedback message";
            $_SESSION["msgid"] = "805";
            header('Location: ../../Views/Index/indexAdmin.view.php');

        } else if (!password_verify($admin_password, $dbAdminRow["user_password"])) { //user OK, password WRONG

            // echo "user ok, password wrong -> feedback message";
            $_SESSION["msgid"] = "806";
            header('Location: ../../Views/Index/indexAdmin.view.php');

        } else if (password_verify($admin_password, $dbAdminRow["user_password"])) { //user OK, password OK

            //echo "user ok, password ok -> allow user in the system -> feedback message";
            $_SESSION["uid"] = $dbAdminRow["user_id"];
            header('Location: ../../Views/Gate/gate.view.php?module=home');
        }


    } else if ((!$email_admin_validation || !$password_admin_validation) && (!$email_validation && !$password_validation)) { //not regex pattern compliant -> cannot be in the database, don't query the database, return feedback

        //echo "not regex compliant -> wrong email or password -> feedback message";
        $_SESSION["msgid"] = "807";
        header('Location: ../../Views/Index/indexAdmin.view.php');
    }
}

?>
