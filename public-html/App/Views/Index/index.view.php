<?php session_start();
require('../../model.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>onLinely</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="../../../JS/index.js"></script>
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
                    <input type="email"
                           class="form-control form-control-sm mb-2 mr-sm-2 mb-sm-0"
                           id="formSignInEmail" name="formSignInEmail" placeholder="Email" required>

                    <input type="password"
                           class="form-control form-control-sm mb-2 mr-sm-2 mb-sm-0 "
                           id="formSignInPassword" name="formSignInPassword" placeholder="Password" required>

                    <button type="submit" id="formSignInSubmit" class="btn btn-warning btn-sm">Sign In</button>
                </div>
                <?php if ($_SESSION['msgid'] == "104") { ?>
                    <div class="mt-2 text-warning">
                        <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['msgid'] == "105") { ?>
                    <div class="mt-2 text-warning">
                        <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['msgid'] == "106") { ?>
                    <div class="mt-2 text-warning">
                        <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                    </div>
                <?php } ?>

            </form>
        </div>
    </div>

    <!-- SYSTEM FEEDBACK  -  sys.ctrl.php -->
    <?php if (isset($_SESSION["msgid"]) && $_SESSION["msgid"] != "" && phpShowSystemFeedback($_SESSION["msgid"])[0] != "") { ?>
        <div class="row mt-3">
            <div class="col-12">
                <div class="alert alert-<?php echo(phpShowSystemFeedback($_SESSION['msgid'])[0]); ?>" role="alert">
                    <?php echo(phpShowSystemFeedback($_SESSION['msgid'])[1]); ?>
                </div>
            </div>
        </div>
    <?php } ?>


    <h4 class="col-lg-6 my_text">Create a new account</h4>
    <hr>

    <div class="row">
        <div class="col-lg-6 mycontent-left">
            <form name="formSignUp" action="../../Controllers/Index/signup.controller.php" method="post" class="my_form_group">
                <div class="form-group">
                    <label for="formSignUpEmail">Email address</label>
                    <input type="email" class="form-control" id="formSignUpEmail" placeholder="Enter your email address"
                           name="formSignUpEmail" onkeyup="jsSignUpValidateEmail()">
                    <?php if ($_SESSION['msgid'] == "101") { ?>
                        <div class="text-danger">
                            <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="formSignUpPassword">Password</label>
                    <input type="password" class="form-control" id="formSignUpPassword" placeholder="Enter your password"
                           name="formSignUpPassword" onkeyup="jsSignUpValidatePassword()">
                    <?php if ($_SESSION['msgid'] == "102") { ?>
                        <div class="text-danger">
                            <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                        </div>
                    <?php } ?>

                    <input type="password" class="form-control mt-4" id="formSignUpPasswordConf" placeholder="Confirm your password"
                           name="formSignUpPasswordConf" onkeyup="jsSignUpValidatePassword()">
                    <?php if ($_SESSION['msgid'] == "103") { ?>
                        <div class="text-danger">
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

</body>
</html>
