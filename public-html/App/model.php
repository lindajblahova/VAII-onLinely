<?php
require('system.controller.php');

function phpShowInputFeedback($feedback_id) {
    switch ($feedback_id) {

        case "101":
            $feedback_type="is-invalid";
            $feedback_text="This is not a valid email address";
            break;

        case "102":
            $feedback_type="is-invalid";
            $feedback_text="Password must be between 8 and 15 characters long, with at least one uppercase and lowercase character and one number.";
            break;

        case "103":
            $feedback_type="is-invalid";
            $feedback_text="Passwords don't match";
            break;

        case "104":
            $feedback_type="is-invalid";
            $feedback_text="This email is not registered!";
            break;

        case "105":
            $feedback_type="is-invalid";
            $feedback_text="The password is incorrect!";
            break;

        case "106":
            $feedback_type="is-invalid";
            $feedback_text="Some of your inputs must be wrong!";
            break;

        case "201":
            $feedback_type="is-invalid";
            $feedback_text="First name must be min. 1 character long and must contain only letters.";
            break;

        case "202":
            $feedback_type="is-invalid";
            $feedback_text="Last name must be min. 1 character long and must contain only letters.";
            break;

        case "203":
            $feedback_type="is-invalid";
            $feedback_text="Nickname must be min. 1 character long and may content only letters and numbers.";
            break;

        case "204":
            $feedback_type="is-invalid";
            $feedback_text="Age must be between 0 and 99.";
            break;

        case "205":
            $feedback_type="is-invalid";
            $feedback_text="Town must be min. 1 character long and must contain only letters.";
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

        default:
            $feedback_type="";
            $feedback_text="Unspecified error or warning";
            break;
    }

    return [$feedback_type, $feedback_text];
}


// ----------------------------------- USER METHODS -------------------


function phpGetUserData($user_id)
{
    $db_data = array($user_id);
    $db_result = phpFetchDB('SELECT * FROM user WHERE user_id = ?', $db_data);
    $db_data = "";
    return $db_result;
}


function phpGetAllUserForMessaging()
{
    $db_data = array();
    $dbRecipientsList = phpFetchAllDB('SELECT user_email, user_id FROM user ORDER BY user_email', $db_data);
    $db_data = "";
    return $dbRecipientsList;
}

function phpDoesUserExist($user_email)
{
    $db_data = array($user_email);
    $db_result = phpFetchDB('SELECT * FROM user WHERE user_email = ?', $db_data);
    $db_data = "";
    return $db_result;
}


function phpGetUserEmail($user_id)
{
    $db_data = array($user_id);
    $db_result = phpFetchDB('SELECT user_email FROM user WHERE user_id = ?', $db_data);
    $db_data = "";
    return $db_result['user_email'];
}

function phpGetAllProfiles($user_id)
{
    $db_data = array($user_id);
    $dbProfilesList = phpFetchAllDB('SELECT user_id, user_email ,user_firstname, user_lastname, user_nickname, user_age, user_town, user_hobbies
 FROM user WHERE (user_id != ? AND user_role != 0) ORDER BY user_email ASC', $db_data);
    $db_data = "";
    return $dbProfilesList;
}

function phpInsertUser($user_role, $user_email, $hashed_user_password)
{
    $db_data = array($user_role, $user_email, $hashed_user_password, "", "", "", NULL, "", "");
    phpModifyDB('INSERT INTO user (user_role ,user_email, user_password, user_firstname, user_lastname, user_nickname, user_age, user_town, user_hobbies) 
        values ( ?, ?, ?, ?, ?, ?, ?, ?, ?)', $db_data);
    $db_data = "";
}

function phpUpdateUserData($user_firstname, $user_lastname, $user_nickname, $user_age, $user_town, $user_hobbies, $user_id)
{
    $db_data = array($user_firstname, $user_lastname, $user_nickname, $user_age, $user_town, $user_hobbies, $user_id);
    phpModifyDB('UPDATE user SET user_firstname = ?, user_lastname = ?, user_nickname = ?, 
        user_age = ?, user_town = ?, user_hobbies = ? WHERE user_id = ?', $db_data);
    $db_data = "";
}

function phpDeleteUser($user_id)
{
    $db_data = array($user_id,$user_id);
    phpModifyDB('DELETE FROM messages WHERE message_sender_id = ? OR message_recipient_id = ?', $db_data);
    $db_data = "";
    $db_data = array($user_id);
    phpModifyDB('DELETE FROM posts WHERE post_author_id = ?', $db_data);
    phpModifyDB('DELETE FROM groups WHERE group_owner_id = ?', $db_data);
    phpModifyDB('DELETE FROM user WHERE user_id = ?', $db_data);
    $db_data = "";
}


// ------------------------------ GROUP -----------------------------------------------------

function phpGetGroupName($group_id)
{
    $db_data = array($group_id);
    $db_result = phpFetchDB('SELECT group_name FROM groups WHERE group_id = ?', $db_data);
    $db_data = "";
    return $db_result['group_name'];
}

function phpGetGroupOwnerID($group_id)
{
    $db_data = array($group_id);
    $db_result = phpFetchDB('SELECT group_owner_id FROM groups WHERE group_id = ?', $db_data);
    return $db_result['group_owner_id'];
}

function phpGetAllGroups()
{
    $db_data = array();
    $dbGroupsList = phpFetchAllDB('SELECT * FROM groups', $db_data);
    $db_data = "";
    return $dbGroupsList;
}

function phpInsertGroup($group_owner, $group_name)
{
    $db_data = array($group_owner, $group_name);
    phpModifyDB('INSERT INTO groups (group_owner_id, group_name) values (?, ?)', $db_data);
    $db_data = "";
}

function phpUpdateGroupName($group_name, $group_id)
{
    $db_data = array($group_name, $group_id);
    phpModifyDB('UPDATE groups SET group_name = ? WHERE group_id = ?', $db_data);
    $db_data = "";
}

// ----------------------------- POST -------------------------------------------

function phpGetPostsInGroup($group_id)
{
    $db_data = array($group_id);
    $dbPostsList = phpFetchAllDB('SELECT * FROM posts WHERE post_group_id = ? ORDER BY post_date DESC', $db_data);
    $db_data = "";
    return $dbPostsList;
}

function phpGetAllPosts()
{
    $db_data = array();
    $dbPostsList = phpFetchAllDB('SELECT * FROM posts ORDER BY post_date DESC', $db_data);
    $db_data = "";
    return $dbPostsList;
}

function phpInsertPost($posts_group_id, $user_id, $posts_content)
{
    $db_data = array($posts_group_id, $user_id, nl2br($posts_content));
    phpModifyDB('INSERT INTO posts (post_group_id, post_author_id, post_content) values (?, ?, ?)', $db_data);
    $db_data = "";
}

// ----------------------------------- MESSAGES ---------------------------------------------

function phpInsertMessage($user_id, $messaging_recipient, $messaging_content)
{
    $db_data = array($user_id, $messaging_recipient, $messaging_content, 0);
    phpModifyDB('INSERT INTO messages (message_sender_id, message_recipient_id, message_content, 
message_read_by_recipient) values (?, ?, ?, ?)', $db_data);
    $db_data = "";
}

function phpGetMessages($messaging_sender, $messaging_recipient)
{
    $db_data = array($messaging_sender, $messaging_sender, $messaging_recipient, $messaging_recipient);
    $dbAllMessagesList = phpFetchAllDB('SELECT * FROM messages WHERE (message_sender_id = ? OR message_recipient_id = ?)
AND (message_sender_id = ? OR message_recipient_id = ?) ORDER BY message_date DESC', $db_data);
    $db_data = "";
    return $dbAllMessagesList;
}

function phpGetUserMessages($user_id)
{
    $db_data = array($user_id, $user_id);
    $dbUserMessagesList = phpFetchAllDB('SELECT * FROM messages WHERE message_sender_id = ? OR message_recipient_id = ?
    ORDER BY message_date DESC', $db_data);
    $db_data = "";
    return $dbUserMessagesList;
}

function phpUpdateReadMessages($user_id)
{
    $db_data = array($user_id);
    phpModifyDB('UPDATE messages SET message_read_by_recipient = 1 WHERE message_recipient_id = ?', $db_data);
    $db_date = "";
}

function phpCountNewMessages($user_id)
{
    $db_data = array($user_id);
    $dbUserRow = phpFetchDB('SELECT COUNT(*) FROM messages WHERE message_recipient_id = ? AND message_read_by_recipient = 0', $db_data);
    $db_data = "";
    return $dbUserRow;
}

?>
