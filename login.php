<?php 
// Cek Session Login

require 'auth.php';

if(isset($_SESSION['nama'])){
    header('Location:index.php');
}

if (isset($_POST["btn_login"])){
    login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <body>
        <?php if(isset($error)) : ?>
            <p style="color:red;font-style:italic;">Username / Password Salah!</p>
        <?php endif; ?>

        <form method="post" action=''>
            <section class="h-100">
                    <div class="container h-100">
                        <div class="row justify-content-sm-center h-100">
                            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                                <div class="text-center my-5">

                                </div>
                                <div class="card shadow-lg">
                                    <div class="card-body p-5">
                                        <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                                        <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                            <div class="mb-3">
                                                <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                                <div class="invalid-feedback">
                                                    Email is invalid
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="mb-2 w-100">
                                                    <label class="text-muted" for="password">Password</label>
                                                    <a href="#" class="float-end">
                                                        Forgot Password?
                                                    </a>
                                                </div>
                                                <input id="password" type="password" class="form-control" name="password" required>
                                                <div class="invalid-feedback">
                                                    Password is required
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <div class="form-check">
                                                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                                    <label for="remember" class="form-check-label">Remember Me</label>
                                                </div>
                                                <button type="submit" name="btn_login" id="btn_login" class="btn btn-primary ms-auto">
                                                    Login
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer py-3 border-0">
                                        <div class="text-center">
                                            Don't have an account? <a href="register.php" class="text-dark">Register here!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </form>

    </body>
</html>