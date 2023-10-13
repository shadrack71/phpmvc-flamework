<?php  
use app\core\Application;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
    <title>login form</title>

    <style>

    </style>
</head>

<body>

    <div class="container">
        <?php


        $errorMsg = $paramsData['msg'];
        if(!empty($errorMsg)):?>

        <div class="alert alert-danger">
            <?php echo $errorMsg?>
        </div>
        <?php  
        endif;
        
        
        ?>

        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">



                    <div class="login-container animated fadeInDown bootstrap snippets bootdeys">
                        <div class="loginbox bg-white">
                            <div class="loginbox-title">SIGN IN</div>
                            <div class="loginbox-social">
                                <div class="social-title ">Connect with Your Social Accounts</div>
                                <div class="social-buttons">
                                    <a href="" class="button-facebook">
                                        <i class="social-icon fa fa-facebook"></i>
                                    </a>
                                    <a href="" class="button-twitter">
                                        <i class="social-icon fa fa-twitter"></i>
                                    </a>
                                    <a href="" class="button-google">
                                        <i class="social-icon fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="loginbox-or">
                                <div class="or-line"></div>
                                <div class="or">OR</div>
                            </div>

                            <form action="/login" method="post" name="loginForm">





                                <div class="loginbox-textbox">
                                    <input type="text" class="form-control" placeholder="Email" name="email">

                                    <?php 

                                            if (isset($paramsData['email']['errormsg'])){
                                                echo $paramsData['email']['errormsg'];
                                            }
                                            ?>
                                </div>
                                <div class=" loginbox-textbox">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    <?php 

                                            if (isset($paramsData['password']['errormsg'])){
                                                echo $paramsData['password']['errormsg'];
                                            }
                                            ?>
                                </div>
                                <div class="loginbox-forgot">
                                    <a href="">Forgot Password?</a>
                                </div>
                                <div class="loginbox-submit">
                                    <input type="submit" class="btn btn-primary btn-block" value="Login" name="submit">
                                </div>
                                <div class="loginbox-signup">
                                    <a href="/register">Sign Up With Email</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>