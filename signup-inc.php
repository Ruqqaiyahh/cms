<?php
 
 if (isset($_POST['submit'])) {
    //Add db connection
    require 'database.php';
    
    $fullname = $_POST['fname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pwdrepeat = $_POST['pwdrepeat'];

    if (empty($fullname) || empty($username) || empty($pwdrepeat) || empty($password) || empty($pwdrepeat)) {
       header("location: ../signup.php?error=emptyfields&fullname=" .$fullname. "username=" .$username. "&email=" .$email);
       exit();
    }
    elseif ($password !== $pwdrepeat) {
      header("Location: ../signup.php?error=passwordsdonotmatch&username=" .$username);
      exit();
    }
    else {
      $sql = "SELECT username FROM users WHERE username = ?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlerror" );
     exit();
      } else {
        mysqli_stmt_bind_param($stmt, "sss", $fullname, $username, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowcount = mysqli_stmt_num_rows($stmt);

        if ($rowcount > 0) {
          header("Location: ../signup.php?error=usernametaken" );
          exit();
        } else {
          $sql = "INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
               header("Location: ../signup.php?error=sqlerror" );
               exit();
        } else {
          $hashedPass = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "ssss", $fullname, $username, $email, $hashedPass);
          mysqli_stmt_execute($stmt);
          header("Location: ../signup.php?success=registered" );
          exit();
          
        }

      }
    }

 }

}


