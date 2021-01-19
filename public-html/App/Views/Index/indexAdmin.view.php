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
    <script src="../../../JS/index.js"></script>
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
                    <input type="email" class="form-control form-control-sm mb-2 mr-sm-2 mb-sm-0" id="formSignInEmailAdmin"
                           name="formSignInEmailAdmin" placeholder="Email" required>

                    <input type="password" class="form-control form-control-sm mb-2 mr-sm-2 mb-sm-0"
                           id="formSignInPasswordAdmin" name="formSignInPasswordAdmin" placeholder="Password" required>

                    <button type="submit" id="formSignInSubmitAdmin" class="btn btn-info btn-sm">Sign In</button>
                </div>
                <?php if ($_SESSION['msgid'] == "104") { ?>
                    <div class="mt-2 text-info">
                        <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                    </div>
                <?php } ?>

                <?php if ($_SESSION['msgid'] == "105") { ?>
                    <div class="mt-2 text-info">
                        <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['msgid'] == "106") { ?>
                    <div class="mt-2 text-info">
                        <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
    <!-- SYSTEM  FEEDBACK -->
    <?php if (isset($_SESSION["msgid"]) && $_SESSION["msgid"] != "" && phpShowSystemFeedback($_SESSION["msgid"])[0] != "") { ?>

        <div class="row mt-3">
            <div class="col-12">
                <div class="alert alert-<?php echo(phpShowSystemFeedback($_SESSION['msgid'])[0]); ?>" role="alert">
                    <?php echo(phpShowSystemFeedback($_SESSION['msgid'])[1]); ?>
                </div>
            </div>
        </div>

    <?php } ?>

    <h4 class="col-lg-6 my_text">Create a new admin account</h4>
    <hr>

    <div class="row">
        <div class="col-lg-6 mycontent-left">
            <form name="formSignUpAdmin" action="../../Controllers/Index/signup.controller.php" method="post" class="my_form_group">
                <div class="form-group">
                    <label for="formSignUpEmailAdmin">Email address</label>
                    <input type="email" class="form-control" id="formSignUpEmailAdmin" placeholder="Enter your email address"
                           name="formSignUpEmailAdmin" required>
                    <?php if ($_SESSION['msgid'] == "101") { ?>
                        <div class="text-danger">
                            <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="formSignUpPasswordAdmin">Password</label>
                    <input type="password" class="form-control" id="formSignUpPasswordAdmin" placeholder="Enter your password"
                           name="formSignUpPasswordAdmin" required>
                    <?php if ($_SESSION['msgid'] == "102") { ?>
                        <div class="text-danger">
                            <?php echo(phpShowInputFeedback($_SESSION['msgid'])[1]); ?>
                        </div>
                    <?php } ?>

                    <input type="password" class="form-control mt-4" id="formSignUpPasswordConfAdmin" placeholder="Confirm your password"
                           name="formSignUpPasswordConfAdmin" required>
                    <?php if ($_SESSION['msgid'] == "103") { ?>
                        <div class="text-danger">
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

</body>
</html>
