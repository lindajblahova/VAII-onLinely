<?php
session_start();
$db_data = array($_SESSION["uid"]);
$dbProfilesList = phpFetchAllDB('SELECT * FROM users WHERE user_id NOT LIKE ? ORDER BY user_email ASC', $db_data);
$db_data = "";

$db_data = array($_SESSION["uid"]);
$dbMyProfile = phpFetchDB('SELECT * FROM users WHERE user_id LIKE ?', $db_data);
$db_data = "";
?>


<div class="row">
    <div class="col-lg-6">
        <h5>Your profile</h5>
    </div>
</div>
<hr>


<div class="row">

    <div class="jumbotron col-lg-12">
        <h1 class="display-4 text-info">
            <img class="icon" src="../../../IMG/icon-email.png" alt="User's email">
            <?php echo $dbMyProfile["user_email"]; ?></h1>
        <hr class="my-4">
        <p><?php if ($dbMyProfile["user_firstname"] != "" || $dbMyProfile["user_lastname"] != "") { ?>
            <img class="icon" src="../../../IMG/icon-name.png" alt="User's name">
            <?php echo $dbMyProfile["user_firstname"]; ?> <?php echo $dbMyProfile["user_lastname"]; ?></p>
            <?php }?>
        <p><?php if ($dbMyProfile["user_nickname"] != "") { ?>
            <img class="icon" src="../../../IMG/icon-nickname.png" alt="User's nickname">
            <?php echo $dbMyProfile["user_nickname"]; ?></p>
            <?php }?>
        <p><?php if ($dbMyProfile["user_age"] != NULL) { ?>
            <img class="icon" src="../../../IMG/icon-age.png" alt="User's age">
            <?php echo $dbMyProfile["user_age"]; ?></p>
            <?php }?>
        <p><?php if ($dbMyProfile["user_town"] != "") { ?>
            <img class="icon" src="../../../IMG/icon-town.png" alt="User's town">
            <?php echo $dbMyProfile["user_town"]; ?></p>
            <?php }?>
        <p><?php if ($dbMyProfile["user_hobbies"] != "") { ?>
            <img class="icon" src="../../../IMG/icon-hobbies.png" alt="User's town">
            <?php echo $dbMyProfile["user_hobbies"]; ?></p>
    <?php }?>
    </div>

    <div class="col-lg-6">
        <h5>Profiles</h5>
        <hr>
    </div>

    <?php foreach ($dbProfilesList as $dbProfileRow) { ?>

        <div class="jumbotron col-lg-12">
            <h1 class="display-4 text-info">
                <img class="icon" src="../../../IMG/icon-email.png" alt="User's email">
                <?php echo $dbProfileRow["user_email"]; ?></h1>
            <hr class="my-4">
            <p><?php if ($dbProfileRow["user_firstname"] != "" || $dbProfileRow["user_lastname"] != "") { ?>
                <img class="icon" src="../../../IMG/icon-name.png" alt="User's name">
                <?php echo $dbProfileRow["user_firstname"]; ?> <?php echo $dbProfileRow["user_lastname"]; ?></p>
            <?php }?>
            <p><?php if ($dbProfileRow["user_nickname"] != "") { ?>
                <img class="icon" src="../../../IMG/icon-nickname.png" alt="User's nickname">
                <?php echo $dbProfileRow["user_nickname"]; ?></p>
        <?php }?>
            <p><?php if ($dbProfileRow["user_age"] != NULL) { ?>
                <img class="icon" src="../../../IMG/icon-age.png" alt="User's age">
                <?php echo $dbProfileRow["user_age"]; ?></p>
        <?php }?>
            <p><?php if ($dbProfileRow["user_town"] != "") { ?>
                <img class="icon" src="../../../IMG/icon-town.png" alt="User's town">
                <?php echo $dbProfileRow["user_town"]; ?></p>
        <?php }?>
            <p><?php if ($dbProfileRow["user_hobbies"] != "") { ?>
                <img class="icon" src="../../../IMG/icon-nickname.png" alt="User's town">
                <?php echo $dbProfileRow["user_hobbies"]; ?></p>
        <?php }?>
        </div>

    <?php } ?>

</div>
