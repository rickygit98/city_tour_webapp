<?php 
    session_start();
    // Cek Session Login
    if(!isset($_SESSION['nama'])){
        header('Location:login.php');
    }

    require_once 'functions.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Dashboard User</title>
  </head>
  <body>

<?php include 'navbar.php'; ?>

  <div class="container">
    