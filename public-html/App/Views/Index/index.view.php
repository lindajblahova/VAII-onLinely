<?php session_start();
require('../../model.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>onLinely</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="../../../CSS/onlinely.css">
</head>
<body style="background-color: azure">
<div class="container-fluid">
    <div class="row sign-in-row">
        <div class="col-lg-6">

            <h1>onLinely</h1>
        </div>
        <div class="col-lg-6">
            <form name="formSignIn" action="../../Controllers/Index/signin.controller.php" method="post">
                <div class="form-inline">
                    <label class="sr-only" for="formSignInEmail">Email</label>
                    <input type="email"
                           class="form-control form-control-sm mb-2 mr-sm-2 mb-sm-0  <?php if ($_SESSION['msgid'] != "805" && $_SESSION['msgid'] != "") {
                               echo 'is-valid';
                           } else {
                               echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                           } ?>"
                           id="formSignInEmail"
                           name="formSignInEmail" placeholder="Email" required>

                    <label class="sr-only" for="formSignInPassword">Password</label>
                    <input type="password"
                           class="form-control form-control-sm mb-2 mr-sm-2 mb-sm-0  <?php if ($_SESSION['msgid'] != "806" && $_SESSION['msgid'] != "") {
                               echo 'is-valid';
                           } else {
                               echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                           } ?>"
                           id="formSignInPassword" name="formSignInPassword" placeholder="Password" required>

                    <button type="submit" id="formSignInSubmit" class="btn btn-warning btn-sm">Sign In</button>
                </div>
                <?php if ($_SESSION['msgid'] == "805") { ?>
                    <div class="mt-2 text-warning">
                        <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['msgid'] == "806") { ?>
                    <div class="mt-2 text-warning">
                        <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['msgid'] == "807") { ?>
                    <div class="mt-2 text-warning">
                        <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                    </div>
                <?php } ?>

            </form>
        </div>
    </div>
    <!-- SYSTEM-WIDE FEEDBACK -->
    <?php if (isset($_SESSION["msgid"]) && $_SESSION["msgid"] != "" && phpShowSystemFeedback($_SESSION["msgid"])[0] != "") { ?>

        <div class="row mt-3">
            <div class="col-12">
                <div class="alert alert-<?php echo(phpShowSystemFeedback($_SESSION['msgid'])[0]); ?>" role="alert">
                    <?php echo(phpShowSystemFeedback($_SESSION['msgid'])[1]); ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- SYSTEM-WIDE FEEDBACK -->

    <h4 class="col-lg-6 my_text">Create a new account</h4>
    <hr>

    <div class="row">
        <div class="col-lg-6 mycontent-left">
            <form name="formSignUp" action="../../Controllers/Index/signup.controller.php" method="post"
                  class="my_form_group" novalidate>
                <div class="form-group">
                    <label for="formSignUpEmail">Email address</label>
                    <input type="email" <?php echo(phpShowEmailInputValue($_SESSION['formSignUpEmail'])[0]); ?>
                           class="form-control <?php if ($_SESSION['msgid'] != "801" && $_SESSION['msgid'] != "") {
                               echo 'is-valid';
                           } else {
                               echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                           } ?>"
                           id="formSignUpEmail" placeholder="Enter your email address"
                           name="formSignUpEmail"
                           onkeyup="jsSignUpValidateEmail()">
                    <?php if ($_SESSION['msgid'] == "801") { ?>
                        <div class="invalid-feedback">
                            <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="formSignUpPassword">Password</label>
                    <input type="password"
                           class="form-control <?php echo(phpShowInputFeedback($_SESSION['msgid'])[0]); ?>"
                           id="formSignUpPassword" placeholder="Enter your password"
                           name="formSignUpPassword"
                           onkeyup="jsSignUpValidatePassword()">
                    <?php if ($_SESSION['msgid'] == "802") { ?>
                        <div class="invalid-feedback">
                            <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                        </div>
                    <?php } ?>

                    <input type="password"
                           class="form-control mt-4 <?php echo(phpShowInputFeedback($_SESSION['msgid'])[0]); ?>"
                           id="formSignUpPasswordConf"
                           placeholder="Confirm your password"
                           name="formSignUpPasswordConf"
                           onkeyup="jsSignUpValidatePassword()">
                    <?php if ($_SESSION['msgid'] == "803") { ?>
                        <div class="invalid-feedback">
                            <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                        </div>
                    <?php } ?>
                </div>
                <button type="submit" id="formSignUpSubmit" class="btn btn-info ">Sign Up</button>
            </form>
        </div>

        <div class="col-lg-6">
            <img src="../../../IMG/index.gif" class="index_img" alt="Ideas">
            <h5>Hello and welcome to onLinely! We are very happy that you want to join our great community!</h5>

            <p>We hope you'll enjoy onLinely!</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card bg-warning card_margin mb-4">
                <div class="card-header">Groups&Posts</div>
                <div class="card-body text-white">
                    <h5 class="card-title">Create a group and add some posts</h5>
                    <p class="card-text">In Groups, you can create your group where you can share some posts with other
                        people, as well as in other existing group. </p>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-info card_margin mb-4">
                <div class="card-header">Messaging</div>
                <div class="card-body text-secondary">
                    <h5 class="card-title">Send and recieve private messages</h5>
                    <p class="card-text">Use the email-like communication to communicate via private messages with users
                        from all around the world.</p>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-info card_margin mb-4">
                <div class="card-header">Settings&Profiles</div>
                <div class="card-body text-white">
                    <h5 class="card-title">Update your profile, and check others' too</h5>
                    <p class="card-text">Add information such as your age to your profile in the settings. See others'
                        profile to find out what you have in common!</p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $_SESSION["msgid"] = "";
$_SESSION["formSignUpEmail"] = ""
?>

<script src="../../../JS/index.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.,,,,,,,,,,,,,,,,js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
