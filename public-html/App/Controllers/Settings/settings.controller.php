<?php
session_start();
require('../../model.php');

//BASICS FORM
if(isset($_POST["formSettingsBasicsSubmit"])) {
    $user_firstname = $_POST["formSettingsBasicsFirstName"];
    $user_lastname = $_POST["formSettingsBasicsLastName"];
    $user_nickname = $_POST["formSettingsBasicsNickName"];
    $user_age = $_POST["formSettingsBasicsAge"];
    $user_town = $_POST["formSettingsBasicsTown"];
    $user_hobbies = $_POST["formSettingsBasicsHobbies"];
    $user_names_pattern = "~^[a-zA-Z]{3,15}$~";
    $user_age_pattern = "~^[0-9]{1,2}$~";
    $hobbies_content_pattern = "~^[^<>]{1,}$~";

    $firstname_validation = preg_match($user_names_pattern, $user_firstname);
    $lastname_validation = preg_match($user_names_pattern, $user_lastname);
    $nickname_validation = preg_match($user_names_pattern, $user_nickname);
    $town_validation = preg_match($user_names_pattern, $user_town);
    $age_validation = preg_match($user_age_pattern, $user_age);
    $hobbies_validation = preg_match($hobbies_content_pattern, $user_hobbies);

    //query the database only if at least one name matches the regex pattern
    if ($firstname_validation || $lastname_validation || $nickname_validation || $town_validation || $age_validation || $hobbies_validation) {
        //get the current values from the database and store them so we can potentially save them back if some value is actually empty
        $dbUserRow = phpGetUserData($_SESSION["uid"]);

        //check each of the three inputs validation, if not valid, assign the db value instead
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

        //update the database row
        phpUpdateUserData($user_firstname, $user_lastname, $user_nickname, $user_age, $user_town, $user_hobbies, $_SESSION["uid"]);

        //system feedback - your settings has been updated
        $_SESSION["msgid"] = "211";

    } else {
        //input feedback - for Javascript turned off
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
}

if(isset($_POST["formSettingsBasicsClear"])) {
    //update the database row by setting empty strings
    phpClearUserData( $_SESSION["uid"]);

    //system feedback - your settings has been updated
    $_SESSION["msgid"] = "212";
}

header('Location: ../../Views/Gate/gate.view.php?module=settings');
?>
