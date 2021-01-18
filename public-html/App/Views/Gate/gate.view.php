<?php
session_start();
require('../../model.php');

//fetching the row by email, fetch returns the first (and only) result entry
$dbUserRow = phpGetUserData($_SESSION["uid"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>onLinely</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="../../../CSS/onlinely.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="#">onLinely</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if ($_GET['module']=='home') {echo 'active'; } ?>">
                <a class="nav-link" href="gate.view.php?module=home">Home<?php if ($_GET['module']=='home') { ?>
                        <span class="sr-only">(current)</span><?php } ?></a>
            </li>
            <li class="nav-item <?php if ($_GET['module']=='messaging') {echo 'active'; } ?>">
                <a class="nav-link" href="gate.view.php?module=messaging">Messaging<?php if ($_GET['module']=='messaging') { ?>
                        <span class="sr-only">(current)</span><?php } ?></a>
            </li>
            <li class="nav-item <?php if ($_GET['module']=='groups') { echo 'active'; } ?>">
                <a class="nav-link" href="gate.view.php?module=groups">Groups<?php if ($_GET['module']=='groups')
                { ?><span class="sr-only"> (current)</span><?php } ?></a>
            </li>

            <li class="nav-item <?php if ($_GET['module']=='settings') {echo 'active'; } ?>">
                <a class="nav-link" href="gate.view.php?module=settings">Settings<?php if ($_GET['module']=='settings') { ?>
                        <span class="sr-only">(current)</span><?php } ?></a>
            </li>

            <li class="nav-item <?php if ($_GET['module']=='profiles') {echo 'active'; } ?>">
                <a class="nav-link" href="gate.view.php?module=profiles">Profiles<?php if ($_GET['module']=='settings') { ?>
                        <span class="sr-only">(current)</span><?php } ?></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../../Controllers/logout.controller.php">Logout</a>
            </li>
        </ul>
        <a class="nav-link-user" href="#"><?php if (isset($dbUserRow["user_email"])) {
                echo $dbUserRow["user_email"];
            } ?></a>
    </div>
</nav>

<div class="container">

    <!-- SYSTEM-WIDE FEEDBACK -->
    <?php if (isset($_SESSION["msgid"]) && $_SESSION["msgid"]!="" && phpShowSystemFeedback($_SESSION["msgid"])[0]!="") { ?>
        <div class="row mt-3">
            <div class="col-12">
                <div class="alert alert-<?php echo (phpShowSystemFeedback($_SESSION['msgid'])[0]); ?>" role="alert">
                    <?php echo (phpShowSystemFeedback($_SESSION['msgid'])[1]); ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- SYSTEM-WIDE FEEDBACK -->

    <?php
    if (isset($_SESSION["uid"]) || $_SESSION["uid"] != "") {
        $dbUserRow = phpGetUserData($_SESSION["uid"]);
    ?>

    <!-- LOAD MODULE -->
    <?php
    switch ($_GET["module"]) {

        case "home":
            include('../Home/home.view.php');
            break;

        case "settings":
            include('../Settings/settings.view.php');
            break;

        case "messaging":
            include('../Messaging/messaging.view.php');
            break;

        case "group":
            include('../Groups/group.view.php');
            break;

        case "groups":
            include('../Groups/groups.view.php');
            break;

        case "posts":
            include('../Groups/posts.view.php');
            break;

        case "profiles":
            include('../Profiles/profiles.view.php');
            break;

        default:
            break;
    }
    ?>
    <!-- LOAD MODULE -->

    <?php } ?>
</div>


<?php $_SESSION["msgid"]="";?>

<script src="../../../JS/gate.js">
    <!--not mine -->
    $('.navbar-collapse a').click(function () {
        $(".navbar-collapse").collapse('hide');
    });
</script>


<!-- Optional Javascript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
