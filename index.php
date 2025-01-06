  <?php 
  require_once 'includes/header.php';
  require_once 'includes/footer.php';
  ?>
   <div class="login-container" id="login">
    <div class="box">
        <div class="container">
            <div class="top">
                <span >Dont have an account <a href="signup.php" onclick="sign up()">Sign Up</a></span></span>
                <header>Login</header>
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
