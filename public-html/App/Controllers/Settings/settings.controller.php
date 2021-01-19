<?php
session_start();
require('../../model.php');

//BASICS FORM
if (isset($_POST["formSettingsBasicsSubmit"])) {
    $user_firstname = $_POST["formSettingsBasicsFirstName"];
    $user_lastname = $_POST["formSettingsBasicsLastName"];
    $user_nickname = $_POST["formSettingsBasicsNickName"];
    $user_age = $_POST["formSettingsBasicsAge"];
    $user_town = $_POST["formSettingsBasicsTown"];
    $user_hobbies = $_POST["formSettingsBasicsHobbies"];
    $user_names_pattern = "~^[a-zA-Z]{1,}$~";
    $user_nickname_pattern = "~^[a-zA-Z0-9]{1,}$~";
    $user_age_pattern = "~^[0-9]{1,2}$~";
    $hobbies_content_pattern = "~^[^<>]{1,}$~";

    $firstname_validation = preg_match($user_names_pattern, $user_firstname);
    $lastname_validation = preg_match($user_names_pattern, $user_lastname);
    $nickname_validation = preg_match($user_nickname_pattern, $user_nickname);
    $town_validation = preg_match($user_names_pattern, $user_town);
    $age_validation = preg_match($user_age_pattern, $user_age);
    $hobbies_validation = preg_match($hobbies_content_pattern, $user_hobbies);


    if ($firstname_validation || $lastname_validation || $nickname_validation || $town_validation || $age_validation || $hobbies_validation) {
        //get the current values from the database if empty submit
        $dbUserRow = phpGetUserData($_SESSION["uid"]);

        //if not valid, assign db value
        if (!$firstname_validation) {
            $user_firstname = $dbUserRow["user_firstname"];
        }
        if (!$lastname_validation) {
            $user_lastname = $dbUserRow["user_lastname"];
        }
        if (!$nickname_validation) {
            $user_nickname = $dbUserRow["user_nickname"];
        }
        if (!$town_validation) {
            $user_town = $dbUserRow["user_town"];
        }
        if (!$age_validation) {
            $user_age = $dbUserRow["user_age"];
        }
        if (!$hobbies_validation) {
            $user_hobbies = $dbUserRow["user_hobbies"];
        }

        phpUpdateUserData($user_firstname, $user_lastname, $user_nickname, $user_age, $user_town, $user_hobbies, $_SESSION["uid"]);

        //system feedback
        $_SESSION["msgid"] = "211";

    } else {
        //input feedback
        if (!$firstname_validation && $user_firstname != "") {
            $_SESSION["msgid"] = "201";
        } else if (!$lastname_validation && $user_lastname != "") {
            $_SESSION["msgid"] = "202";
        } else if (!$nickname_validation && $user_nickname != "") {
            $_SESSION["msgid"] = "203";
        } else if (!$age_validation && $user_age != "") {
            $_SESSION["msgid"] = "204";
        } else if (!$town_validation && $user_town != "") {
            $_SESSION["msgid"] = "205";
        } else if (!$hobbies_validation && $user_hobbies != "") {
            $_SESSION["msgid"] = "206";
        }
    }
    header('Location: ../../Views/Gate/gate.view.php?module=settings');
}


if (isset($_POST["formSettingsBasicsClear"])) {
    //clear
    phpUpdateUserData("", "", "", NULL, "", "", $_SESSION["uid"]);

    //system feedback
    $_SESSION["msgid"] = "212";
    header('Location: ../../Views/Gate/gate.view.php?module=settings');
}



if (isset($_POST["deleteUserAccount"])) {
    //delete account
    phpDeleteUser($_SESSION["uid"]);

    $_SESSION["msgid"] = "212";
    $_SESSION["uid"] = "";
    header('Location: ../../Views/Index/index.view.php');
}
?>
