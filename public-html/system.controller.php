<?php
require ('db-connection.inc.php');
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

        case "311":
            $feedback_type="success";
            $feedback_text="Message sent successfully!";
            break;

        case "213":
            $feedback_type="success";
            $feedback_text="Password changed successfully!";
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
            $feedback_text="First name must be between 3 and 15 characters long and can contain only letters.";
            break;

        case "202":
            $feedback_type="is-invalid";
            $feedback_text="Last name must be between 3 and 15 characters long and can contain only letters.";
            break;

        case "203":
            $feedback_type="is-invalid";
            $feedback_text="Nickname must be between 3 and 15 characters long and can contain only letters.";
            break;

        case "301":
            $feedback_type="is-invalid";
            $feedback_text="Choose the email address of the recipient.";
            break;

        case "302":
            $feedback_type="is-invalid";
            $feedback_text="Message can not be empty and can not contain '<' and '>' characters.";
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


?>
