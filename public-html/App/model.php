<?php
require ('system.controller.php');

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
    $db_result = phpFetchDB('SELECT user_email FROM user WHERE user_id = ?', $db_data);
    $db_data = "";
    return $db_result['user_email'];
}

// Return user's email based on his id
function phpGetUserData($user_id) {
    $db_data = array($user_id);
    $db_result = phpFetchDB('SELECT * FROM user WHERE user_id = ?', $db_data);
    $db_data = "";
    return $db_result;
}

function phpGetAllGroups() {
    $db_data = array();
    $dbGroupsList = phpFetchAllDB('SELECT * FROM groups', $db_data);
    $db_data = "";
    return $dbGroupsList;
}

function phpGetAllUserForMessaging() {
    $db_data = array();
    $dbRecipientsList = phpFetchAllDB('SELECT user_email, user_id FROM user ORDER BY user_email', $db_data);
    $db_data = "";
    return $dbRecipientsList;
}

// Return user's email based on his id
function phpUpdateUserData($user_firstname, $user_lastname, $user_nickname, $user_age, $user_town, $user_hobbies, $user_id) {
    $db_data = array($user_firstname, $user_lastname, $user_nickname, $user_age, $user_town, $user_hobbies, $user_id);
    phpModifyDB('UPDATE user SET user_firstname = ?, user_lastname = ?, user_nickname = ?, 
        user_age = ?, user_town = ?, user_hobbies = ? WHERE user_id = ?', $db_data);
    $db_data = "";
}
function phpClearUserData($user_id) {
    $db_data = array("", "", "", NULL, "", "", $user_id);
    phpModifyDB('UPDATE user SET user_firstname = ?, user_lastname = ?, user_nickname = ?, 
        user_age = ?, user_town = ?, user_hobbies = ? WHERE user_id = ?', $db_data);
    $db_data = "";
}

function phpDoesUserExist($user_email) {
    $db_data = array($user_email);
    //fetching the row by email, fetch returns the first (and only) result entry
    $db_result = phpFetchDB('SELECT * FROM user WHERE user_email = ?', $db_data);
    $db_data = "";
    return $db_result;
}
function phpDoesUserEmailExist($user_email) {
    $db_data = array($user_email);
    //fetching the row by email, fetch returns the first (and only) result entry
    $db_result = phpFetchDB('SELECT user_email FROM user WHERE user_email = ?', $db_data);
    $db_data = "";
    return $db_result;
}


// Return group's name based on its id
function phpGetGroupName($group_id) {
    $db_data = array($group_id);
    $db_result = phpFetchDB('SELECT group_name FROM groups WHERE group_id = ?', $db_data);
    $db_data = "";
    return $db_result['group_name'];
}

function phpGetAllProfiles($user_id) {
    $db_data = array($user_id);
    $dbProfilesList = phpFetchAllDB('SELECT user_id, user_email ,user_firstname, user_lastname, user_nickname, user_age, user_town, user_hobbies
 FROM user WHERE (user_id != ? AND user_role != 0) ORDER BY user_email ASC', $db_data);
    $db_data = "";
    return $dbProfilesList;
}

// Return group's owner id based on group's id
function phpGetGroupOwnerID($group_id) {
    $db_data = array($group_id);
    $db_result = phpFetchDB('SELECT group_owner_id FROM groups WHERE group_id = ?', $db_data);
    return $db_result['group_owner_id'];
}

function phpInsertUser($user_role, $user_email, $hashed_user_password)
{
    $db_data = array($user_role, $user_email, $hashed_user_password, "", "", "", NULL, "", "");
    phpModifyDB('INSERT INTO user (user_role ,user_email, user_password, user_firstname, user_lastname, user_nickname, user_age, user_town, user_hobbies) 
        values ( ?, ?, ?, ?, ?, ?, ?, ?, ?)', $db_data);
    $db_data = "";
}

function phpUpdateGroupName($group_name,$group_id)
{
    $db_data = array($group_name, $group_id);
    phpModifyDB('UPDATE groups SET group_name = ? WHERE group_id = ?', $db_data);
    $db_data = "";
}

function phpInsertGroup($group_owner,$group_name)
{
    $db_data = array($group_owner,$group_name);
    phpModifyDB('INSERT INTO groups (group_owner_id, group_name) values (?, ?)', $db_data);
    $db_data = "";
}

function phpDeleteGroup($group_id)
{
    $db_data = array($group_id);
    phpModifyDB('DELETE FROM posts WHERE post_group_id = ?', $db_data);
    phpModifyDB('DELETE FROM groups WHERE group_id = ?', $db_data);
    $db_data = "";
}

function phpDeletePost($posts_id)
{
    $db_data = array($posts_id);
    phpModifyDB('DELETE FROM posts WHERE post_id = ?', $db_data);
    $db_data = "";

}

function phpInsertPost($posts_group_id, $user_id, $posts_content) {
    $db_data = array($posts_group_id,$user_id, nl2br($posts_content));
    phpModifyDB('INSERT INTO posts (post_group_id, post_author_id, post_content) values (?, ?, ?)', $db_data);
    $db_data = "";
}

function phpUpdatePost($posts_content,$posts_id)
{
    $db_data = array(nl2br($posts_content), $posts_id);
    phpModifyDB('UPDATE posts SET post_content = ? WHERE post_id = ?', $db_data);
    $db_data = "";

}

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

function phpInsertMessage($user_id,$messaging_recipient,$messaging_content)
{
    $db_data = array($user_id, $messaging_recipient, $messaging_content, 0);
    phpModifyDB('INSERT INTO messages (message_sender_id, message_recipient_id, message_content, message_read_by_recipient) values (?, ?, ?, ?)', $db_data);
    $db_data = "";
}

function phpGetMessages($messaging_sender,$messaging_recipient)
{
    $db_data = array($messaging_sender,$messaging_sender,$messaging_recipient,$messaging_recipient);
    $dbAllMessagesList = phpFetchAllDB('SELECT * FROM messages WHERE (message_sender_id = ? OR message_recipient_id = ?)
AND (message_sender_id = ? OR message_recipient_id = ?) ORDER BY message_date DESC',$db_data);
    $db_data = "";
    return $dbAllMessagesList;
}

function phpGetUserMessages($user_id) {
    $db_data = array($user_id,$user_id);
    $dbUserMessagesList = phpFetchAllDB('SELECT * FROM messages WHERE message_sender_id = ? OR message_recipient_id = ?
    ORDER BY message_date DESC', $db_data);
    $db_data = "";
    return $dbUserMessagesList;
}

function phpUpdateReadMessages($user_id) {
    $db_data = array($user_id);
    phpModifyDB('UPDATE messages SET message_read_by_recipient = 1 WHERE message_recipient_id = ?', $db_data);
    $db_date = "";
}

function phpCountNewMessages($user_id) {
    $db_data = array($user_id);
    $dbUserRow = phpFetchDB('SELECT COUNT(*) FROM messages WHERE message_recipient_id = ? AND message_read_by_recipient = 0', $db_data);
    $db_data = "";
    return $dbUserRow;
}
?>