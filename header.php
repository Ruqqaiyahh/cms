<?php 
  require_once 'database.php';
  require_once 'signup-inc.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Complaint System</title>
</head>
<body>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>SMEG .</p>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="index.php" class="link active">Home</a></li>
                <li><a href= "admin.login.php" class="link">Admin</a></li>
                <li><a href="blog.php" class="link">Blog</a></li>
            </ul>
            </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn"
             onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" a href="signup()"  >Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
       
    </nav>
    <div class="form-box">
        