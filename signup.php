<?php 
  require_once 'includes/header.php';
  require_once 'includes/footer.php';
  ?>
  <div class="one-one" >
  <div class="register-container" id="register">
    <div class="box">
        <div class="container">
            <div class="top">
                <span>Have an account? <a href="index.php" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>
            <form action="includes/signup-inc.php" method="post" >
           
                <div class="input-field">
                    <input type="text" class="input" 
                    name="fname" placeholder="Fullname">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-field">
                    <input type="text" class="input" name="username" placeholder="Username">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-field">
                <input type="text" class="input" 
                name="email" placeholder="Email">
                <i class="bx bx-envelope"></i>
            </div>
          
                <div class="two-forms">
            <div class="input-field">
                <input type="password" name="password"  class="input" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>

                <div class="input-field">
                <input type="password" class="input" name="pwdrepeat" placeholder="Repeat Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            </div>
            </div>
            <div class="input-field">
                <input type="submit" class="submit" value="Sign Up">
            </div>
            <div class="bottom">
                <div class="left">
                    <input type="checkbox"  id="check">
                    <label for="check"> Remember Me</label>
                </div>
                
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>


