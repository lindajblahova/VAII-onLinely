<?php
require('Configuration/db-connection.inc.php');
/// DAJ TO DO KONTAJNERA !! (ROW)
function phpShowSystemFeedback($feedback_id) {
    switch ($feedback_id) {
        case "211":
            $feedback_type="success";
            $feedback_text="Data updated successfully!";
            break;

        case "212":
            $feedback_type="success";
            $feedback_text="Data removed successfully!";
            break;

        case "213":
            $feedback_type="success";
            $feedback_text="Password changed successfully!";
            break;

        case "311":
            $feedback_type="success";
            $feedback_text="Message sent successfully!";
            break;

        case "411":
            $feedback_type="success";
            $feedback_text="Group has been created successfully!";
            break;

        case "412":
            $feedback_type="success";
            $feedback_text="Group name has been changed successfully!";
            break;

        case "413":
            $feedback_type="success";
            $feedback_text="Group has been deleted!";
            break;


        case "511":
            $feedback_type="success";
            $feedback_text="Post has been successfully created!";
            break;

        case "512":
            $feedback_type="success";
            $feedback_text="Post has been successfully updated!";
            break;

        case "513":
            $feedback_type="success";
            $feedback_text="Post has been deleted";
            break;

        case "804":
            $feedback_type="danger";
            $feedback_text="This email is already used!";
            break;

        case "808":
            $feedback_type="danger";
            $feedback_text="Wrond email or password!";
            break;

        case "811":
            $feedback_type="success";
            $feedback_text="Your account has been created! You can sign in!";
            break;

    }

    return [$feedback_type, $feedback_text];
}

function phpShowInputFeedback($feedback_id) {
    switch ($feedback_id) {
        case "201":
            $feedback_type="is-invalid";
            $feedback_text="First name must be between 3 and 50 characters long and can contain only letters.";
            break;

        case "202":
            $feedback_type="is-invalid";
            $feedback_text="Last name must be between 3 and 50 characters long and can contain only letters.";
            break;

        case "203":
            $feedback_type="is-invalid";
            $feedback_text="Nickname must be between 3 and 50 characters long and can contain only letters.";
            break;

        case "204":
            $feedback_type="is-invalid";
            $feedback_text="Age must be between 0 and 99.";
            break;

        case "205":
            $feedback_type="is-invalid";
            $feedback_text="Town must be between 3 and 50 characters long and can contain only letters.";
            break;

        case "206":
            $feedback_type="is-invalid";
            $feedback_text="Hobbies can not contain '<' and '>' characters.";
            break;

        case "301":
            $feedback_type="is-invalid";
            $feedback_text="Choose the email address of the recipient.";
            break;

        case "302":
            $feedback_type="is-invalid";
            $feedback_text="Message can not be empty and can not contain '<' and '>' characters.";
            break;

        case "401":
            $feedback_type="is-invalid";
            $feedback_text="Group name can not be empty and can not contain '<' and '>' characters.";
            break;

        case "501":
            $feedback_type="is-invalid";
            $feedback_text="Post can not be empty and can not contain '<' and '>' characters.";
            break;

        case "801":
            $feedback_type="is-invalid";
            $feedback_text="This is not a valid email address";
            break;

        case "802":
            $feedback_type="is-invalid";
            $feedback_text="Password must be between 8 and 16 characters long, with at least one uppercase and lowercase character, one number and one special character (@, *, $ or #).";
            break;

        case "803":
            $feedback_type="is-invalid";
            $feedback_text="Passwords don't match";
            break;

        case "805":
            $feedback_type="is-invalid";
            $feedback_text="This email is not registered!";
            break;

        default:
            $feedback_type="";
            $feedback_text="Unspecified error or warning";
            break;
    }

    return [$feedback_type, $feedback_text];
}

// Create, update or delete a record in the database
function phpModifyDB($db_query, $db_data)
{
    global $connection; // need to look outside its scope for this variable

    $statement = $connection->prepare($db_query);
    $statement->execute($db_data);
}

// Get the information from the database
function phpFetchDB($db_query, $db_data) {
    global $connection;

    $statement = $connection->prepare($db_query);
    $statement->execute($db_data);

    //setting the fetch mode and returning the result
    return $statement->fetch(PDO::FETCH_ASSOC);
}

// Get the information from the database
function phpFetchAllDB($db_query, $db_data) {
    global $connection;

    $statement = $connection->prepare($db_query);
    $statement->execute($db_data);

    //setting the fetch mode and returning the result
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function phpShowEmailInputValue($user_email) {
    if ($user_email != "") {
        $content="value='" . $user_email . "'";
    }else{
        $content="";
    }

    return $content;
}

// Return user's email based on his id
function phpGetUserEmail($user_id) {
    $db_data = array($user_id);
    $db_result = phpFetchDB('SELECT user_email FROM users WHERE user_id = ?', $db_data);
    return $db_result['user_email'];
}

// Return group's name based on its id
function phpGetGroupName($group_id) {
    $db_data = array($group_id);
    $db_result = phpFetchDB('SELECT group_name FROM groups WHERE group_id = ?', $db_data);
    return $db_result['group_name'];
}

// Return group's owner id based on group's id
function phpGetGroupOwnerID($group_id) {
    $db_data = array($group_id);
    $db_result = phpFetchDB('SELECT group_owner_id FROM groups WHERE group_id = ?', $db_data);
    return $db_result['group_owner_id'];
}


?>
