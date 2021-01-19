<?php session_start();
require('../../model.php');

?>

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
    <div class="row sign-in-row-admin">
        <div class="col-lg-6">

            <h1>onLinely | Admin</h1>
        </div>
        <div class="col-lg-6">
            <form name="formSignInAdmin" action="../../Controllers/Index/signin.controller.php" method="post">
                <div class="form-inline">
                    <label class="sr-only" for="formSignInEmailAdmin">Email</label>
                    <input type="email"
                           class="form-control form-control-sm mb-2 mr-sm-2 mb-sm-0 <?php echo(phpShowInputFeedback($_SESSION['msgid'])[0]); ?>"
                           id="formSignInEmailAdmin"
                           name="formSignInEmailAdmin" placeholder="Email" required>

                    <label class="sr-only" for="formSignInPasswordAdmin">Password</label>
                    <input type="password"
                           class="form-control form-control-sm mb-2 mr-sm-2 mb-sm-0 <?php echo(phpShowInputFeedback($_SESSION['msgid'])[0]); ?>"
                           id="formSignInPasswordAdmin" name="formSignInPasswordAdmin" placeholder="Password" required>

                    <button type="submit" id="formSignInSubmitAdmin" class="btn btn-info btn-sm">Sign In</button>
                </div>
                <?php if ($_SESSION['msgid'] == "805") { ?>
                    <div class="mt-2 text-info">
                        <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                    </div>
                <?php } ?>

                <?php if ($_SESSION['msgid'] == "806") { ?>
                    <div class="mt-2 text-info">
                        <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['msgid'] == "807") { ?>
                    <div class="mt-2 text-info">
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

    <h4 class="col-lg-6 my_text">Create a new admin account</h4>
    <hr>

    <div class="row">
        <div class="col-lg-6 mycontent-left">
            <form name="formSignUpAdmin" action="../../Controllers/Index/signup.controller.php" method="post"
                  class="my_form_group" novalidate>
                <div class="form-group">
                    <label for="formSignUpEmailAdmin">Email address</label>
                    <input type="email" <?php echo(phpShowEmailInputValue($_SESSION['formSignUpEmailAdmin'])[0]); ?>
                           class="form-control <?php if ($_SESSION['msgid'] != "801" && $_SESSION['msgid'] != "") {
                               echo 'is-valid';
                           } else {
                               echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                           } ?>"
                           id="formSignUpEmailAdmin" placeholder="Enter your email address"
                           name="formSignUpEmailAdmin"
                           onkeyup="jsSignUpValidateEmailAdmin()">
                    <?php if ($_SESSION['msgid'] == "801") { ?>
                        <div class="invalid-feedback">
                            <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="formSignUpPasswordAdmin">Password</label>
                    <input type="password"
                           class="form-control <?php echo(phpShowInputFeedback($_SESSION['msgid'])[0]); ?>"
                           id="formSignUpPasswordAdmin" placeholder="Enter your password"
                           name="formSignUpPasswordAdmin"
                           onkeyup="jsSignUpValidatePasswordAdmin()">
                    <?php if ($_SESSION['msgid'] == "802") { ?>
                        <div class="invalid-feedback">
                            <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                        </div>
                    <?php } ?>

                    <input type="password"
                           class="form-control mt-4 <?php echo(phpShowInputFeedback($_SESSION['msgid'])[0]); ?>"
                           id="formSignUpPasswordConfAdmin"
                           placeholder="Confirm your password"
                           name="formSignUpPasswordConfAdmin"
                           onkeyup="jsSignUpValidatePasswordAdmin()">
                    <?php if ($_SESSION['msgid'] == "803") { ?>
                        <div class="invalid-feedback">
                            <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                        </div>
                    <?php } ?>
                </div>
                <button type="submit" id="formSignUpSubmitAdmin" class="btn btn-warning">Sign Up</button>
            </form>
        </div>

        <div class="col-lg-6">
            <img src="../../../IMG/index.gif" class="index_img" alt="Ideas">
            <h5>Hello and welcome new admin!</h5>

            <p>We hope you'll enjoy onLinely!</p>
        </div>
    </div>
</div>

<?php $_SESSION["msgid"] = "";
$_SESSION["formSignUpEmailAdmin"] = ""
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
