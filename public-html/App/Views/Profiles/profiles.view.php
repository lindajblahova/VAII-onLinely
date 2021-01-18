<?php
session_start();

$dbProfilesList = phpGetAllProfiles($_SESSION["uid"]);

$dbMyProfile = phpGetUserData($_SESSION["uid"]);

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

    <div class="col-lg-9">
        <h5>Profiles</h5>
        <hr>
    </div>


    <div class="form-group col-lg-3 mt-3" >
        <input type="text" class="form-control "
               id="searchUserProfilesForm" onkeyup="jssearchUserProfilesForm()"  placeholder="Search profile by email" title="Search email">
        <ul id="searchUserProfilesFormMenu" style="float: top">

            <?php foreach ($dbProfilesList as $dbProfileRow) { ?>

                <li><a class="my_link" style="font-size: large" href="#jumbotronUser<?php echo $dbProfileRow['user_id'];?>"><?php echo $dbProfileRow["user_email"]?></a></li>

            <?php } ?>
        </ul>
    </div>


    <?php foreach ($dbProfilesList as $dbProfileRow) { ?>

        <div class="jumbotron col-lg-12" id="jumbotronUser<?php echo $dbProfileRow['user_id'];?>"
             name="jumbotronUser<?php echo $dbProfileRow['user_id'];?>">
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



<script src="../../../JS/profiles.js"></script>

