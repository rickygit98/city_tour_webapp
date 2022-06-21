<?php 

// Cek Session Login

require 'auth.php';

if(isset($_SESSION['nama'])){
    header('Location:index.php');
}

if (isset($_POST["btn_register"])){
    if(registration($_POST)>0){
        echo ("
             <script>
                 alert('Registrasi Berhasil');
                 document.location.href='login.php';
             </script>
        ");
    }else{
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Register Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <form action="" method="post">
        <section class="h-100 mb-5">
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="text-center my-5">
                            
                        </div>
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
                                <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="name">Nama</label>
                                        <input id="nama" type="text" class="form-control" name="nama" value="" required autofocus>
                                        <div class="invalid-feedback">
                                            Name is required	
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" value="" required>
                                        <div class="invalid-feedback">
                                            Username is invalid
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                        <input id="email" type="email" class="form-control" name="email" value="" required>
                                        <div class="invalid-feedback">
                                            Email is invalid
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" required>
                                        <div class="invalid-feedback">
                                            Password is required
                                        </div>
                                    </div>

                                    <p class="form-text text-muted mb-3">
                                        By registering you agree with our terms and condition.
                                    </p>

                                    <div >
                                        <button type="submit" name="btn_register" id="btn_register" class="btn btn-primary ms-auto">
                                            Register	
                                        </button>
                                        <button type="reset" name="btn_reset" id="btn_reset" class="btn btn-danger ms-auto">
                                            Reset	
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer py-3 border-0">
                                <div class="text-center">
                                    Already have an account? <a href="login.php" class="text-dark">Login</a>
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