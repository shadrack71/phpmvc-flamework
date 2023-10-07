<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="assets/css/register.css" rel="stylesheet">


</head>

<body>



    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Get started</h1>
                        <p class="lead">
                            Start creating the best possible user experience for you customers.
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">

                                <form method="post" action="/register" name="registerForm">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control form-control-lg" type="text" name="name"
                                            placeholder="Enter your name">

                                        <?php 

                                            if (isset($paramsData['name']['errormsg'])){
                                                echo $paramsData['name']['errormsg'];
                                            }
                                            ?>


                                    </div>
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input class="form-control form-control-lg" type="text" name="company"
                                            placeholder="Enter your company name">

                                        <?php 

                                            if (isset($paramsData['company']['errormsg'])){
                                                echo $paramsData['company']['errormsg'];
                                            }

                                            ?>

                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email"
                                            placeholder="Enter your email">

                                        <?php 

                                            if (isset($paramsData['email']['errormsg'])){
                                                echo $paramsData['email']['errormsg'];
                                            }
                                            ?>

                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                            placeholder="Enter password">

                                        <?php 

                                            if (isset($paramsData['password']['errormsg'])){
                                                echo $paramsData['password']['errormsg'];
                                            }

                                            
                                            ?>

                                    </div>
                                    <div class="text-center mt-3">

                                        <button type="submit" class="btn btn-lg btn-primary">Sign up</button>
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>