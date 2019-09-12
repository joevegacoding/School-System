<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register New Account</title>
    <link rel="stylesheet" href="CSS/style.css">
  </head>
  <body>
    <div class="header">
      <h2>Create New Account</h2>
       </div>
      
      <form method="post" action="register.php">
<!-- display validation errors-->
          <?php include('errors.php'); ?>
          <div class="input-group">
             <label>Name</label>
            <input type="text" name="name"  value="<?php echo $name; ?>" placeholder="Enter Your Name...">
        </div>
          <div class="input-group">
             <label>Phone Number</label>
            <input type="text" name="phone"  value="<?php echo $phone; ?>" placeholder="Enter your phone number...">
        </div>
          <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" placeholder="Enter Your Email...">
        </div>
        <div class="input-group">
             <label>Username</label>
            <input type="text" name="username"  value="<?php echo $username; ?>" placeholder="Enter Username...">
        </div>
          
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password...">
        </div>
          <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password-confirmation" placeholder="Confirm Password...">
        </div>
        <div class="input-group">
            <button type="submit" name="register" class="btn">Create Account</button>
        </div>
        <p>
            Already have an account? <a href="Login.php">Sign In</a>
          </p>
          
          </form>
        

  </body>
</html>
