<?php

include_once "includes/db.php";
include_once "functions/main.php";

if(!isset($_SESSION['email'])){
    alert("Please Login");
    redirect("logout.php");
}

$login_user_email=$_SESSION['email'];
$login_user_info_sql="select * from users where email='$login_user_email'";

$login_user_info_query=mysqli_query($conn,$login_user_info_sql);

$login_user_info=mysqli_fetch_assoc($login_user_info_query);
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>Dashboard</title>
</head>

<body>