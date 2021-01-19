<?php
require('Configuration/db-connection.inc.php');

function phpShowSystemFeedback($feedback_id) {
    switch ($feedback_id) {

        case "111":
            $feedback_type="success";
            $feedback_text="Your account has been created! You can sign in!";
            break;

        case "112":
            $feedback_type="danger";
            $feedback_text="This email is already used!";
            break;

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

        case "411":
            $feedback_type="success";
            $feedback_text="Group has been created successfully!";
            break;

        case "412":
            $feedback_type="success";
            $feedback_text="Group name has been changed successfully!";
            break;

        case "511":
            $feedback_type="success";
            $feedback_text="Post has been successfully created!";
            break;

    }
    return [$feedback_type, $feedback_text];
}

function phpModifyDB($db_query, $db_data)
{
    global $connection; // in db-con.inc.php

    $statement = $connection->prepare($db_query);
    $statement->execute($db_data);
}

function phpFetchDB($db_query, $db_data) {
    global $connection;

    $statement = $connection->prepare($db_query);
    $statement->execute($db_data);

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function phpFetchAllDB($db_query, $db_data) {
    global $connection;

    $statement = $connection->prepare($db_query);
    $statement->execute($db_data);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

?>
