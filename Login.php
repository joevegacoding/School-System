<?php include_once('server.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css">
  </head>
  <body>
    <div class="header">
      <h2>Login</h2>
       </div>
      
      <form method="post" action="Login.php">
         
        <div class="input-group">
             <label>Username</label>
            <input type="text" name="username"  placeholder="Enter Username...">
        </div>
          
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password...">
        </div>
         
        <div class="input-group">
            <button type="submit" name="Login" class="btn">Log In</button>
        </div>
        <p>
            Not registered? <a href="register.php">Create Account</a>
          </p>
          
          </form>
        

  </body>
</html>
