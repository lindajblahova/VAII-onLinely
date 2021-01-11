<?php
session_start();
require('system.controller.php');

if (!isset($_SESSION["uid"]) || $_SESSION["uid"] == "") {
    header('Location: index.php');
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>onLinely</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/onlinely.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">onLinely</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if ($_GET['module']=='') {echo 'active'; } ?>">
                <a class="nav-link" href="gate.php">Home<?php if ($_GET['module']=='') { ?>
                        <span class="sr-only">(current)</span><?php } ?></a>
            </li>
            <li class="nav-item <?php if ($_GET['module']=='settings') {echo 'active'; } ?>">
                <a class="nav-link" href="gate.php?module=settings">Settings<?php if ($_GET['module']=='settings') { ?>
                        <span class="sr-only">(current)</span><?php } ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.controller.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">

    <!-- SYSTEM-WIDE FEEDBACK -->
    <?php if (isset($_SESSION["msgid"]) && $_SESSION["msgid"]!="" && phpShowSystemFeedback($_SESSION["msgid"])[0]!="") { ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-<?php echo (phpShowSystemFeedback($_SESSION['msgid'])[0]); ?>" role="alert">
                    <?php echo (phpShowSystemFeedback($_SESSION['msgid'])[1]); ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- SYSTEM-WIDE FEEDBACK -->

    <!-- LOAD MODULE -->
    <?php
    switch ($_GET["module"]) {
        case "settings":
            include('settings.php');
            break;

        default:
            break;
    }
    ?>
    <!-- LOAD MODULE -->

</div>


<?php $_SESSION["msgid"]=""; ?>

<script src="gate.js"></script>


<!-- Optional Javascript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
