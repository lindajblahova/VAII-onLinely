<?php
session_start();
require('../../model.php');

$posts_content = $_POST["formPostsContent"];
$posts_group_id = $_POST["formPostsGroupID"];
$posts_content_pattern = "~^[^<>]{1,}$~";

$posts_content_validation = preg_match($posts_content_pattern, $posts_content);


if ($posts_content_validation) {

    phpInsertPost($posts_group_id, $_SESSION["uid"], $posts_content);

    $_SESSION["msgid"] = "511";

}else{
    if (!$posts_content_validation) {
        // not regex fine
        $_SESSION["msgid"] = "501";
        //return
        $_SESSION["posts_content"] = $posts_content;
    }
}


header('Location: ../../Views/Gate/gate.view.php?module=posts&gid=' . $posts_group_id);

?>