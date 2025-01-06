<?php 

  require_once 'includes/footer.php';
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
       
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
       
    </nav>
    <div class="form-box">
        
<div class="login-container" id="login">
    <div class="box">
        <div class="container">
            <div class="top-header">
              
                <header>Admin</header>
            </div>
            <div class="input-field">
                <input type="text" class="input" placeholder="Username" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-field">
                <input type="password" class="input" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-field">
                <input type="submit" class="submit" value="Login">
            </div>
            <div class="bottom">
                <div class="left">
                    <input type="checkbox"  id="check">
                    <label for="check"> Remember Me</label>
                </div>
                <div class="right">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </div>
    </div>
