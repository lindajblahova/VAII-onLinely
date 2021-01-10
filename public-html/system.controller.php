<?php
require ('db-connection.inc.php');
/// DAJ TO DO KONTAJNERA !! (ROW)
function phpShowSystemFeedback($feedback_id) {
    switch ($feedback_id) {

        case "804":
            $feedback_type="danger";
            $feedback_text="This email is already used!";
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
            $feedback_type="is-invalid";
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

function phpShowEmailInputValue($user_email) {
    if ($user_email != "") {
        $content="value='" . $user_email . "'";
    }else{
        $content="";
    }

    return $content;
}


?>
