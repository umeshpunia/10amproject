<?php
include_once "includes/db.php";
include_once "functions/main.php";


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $check_user_sql = "select * from users where email='$email'";

    $check_user_query = mysqli_query($conn, $check_user_sql);

    if (mysqli_num_rows($check_user_query) > 0) {
        $check_user = mysqli_fetch_assoc($check_user_query);

        if (password_verify($password, $check_user['password'])) {
            $_SESSION['email']=$email;
            redirect("dashboard.php");
        } else {
            $msg = "Please Try Again";
        }
    } else {
        $msg = "Please Try Again";
    }
}

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>

<body>

    <div class="jumbotron text-center bg-gr text-white jumbotron-fluid">
        <h1>Admin Panel</h1>
        <h2>Login Here</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <h3 class="text-danger"><?= $msg ?></h3>

                    <button name="login" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>