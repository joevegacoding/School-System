<?php include_once('server.php'); 
if(empty($_SESSION['username'])) {
    header('location: Login.php');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student's portal</title>
    <link rel="stylesheet" href="CSS/STStyle.css">
  </head>
  <body>
      <div class="header">
      
      </div>
      <div class="content">
      <?php if(isset($_SESSION["success"])): ?>
              <div class="error success">
          <h3>
              <?php
                echo $_SESSION['success'];
              unset($_SESSION['success']);
             ?>
         </h3>
          </div>
          <?php endif ?>
          
          <?php if (isset($_SESSION["username"])): ?>
          <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
          <p><a href="StudentPortal.php?Logout='1'" style="color: red;"><strong>Logout</strong></a></p>
              <?php endif ?>
      </div>
      <h1>My Courses</h1>
      
      
     <?php if (isset($_SESSION['msg'])): ?>
        <div class="msg">
            <?php 
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
                
            ?>
            
      </div>
      <?php endif ?>
      <table>
        <thead>
          <tr>
            <th>Course</th>
            <th>Duration</th>
            
           
          </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($resultsStudent)) {  ?>
          <tr>
              
             
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['duration']; ?></td>
<!--            <td><?php echo $row['datestart']; ?></td>-->
            <td>
             
            </td>
          </tr>
              
             <?php } ?>
            
         
        </tbody>
      </table>
              
          <br><br>
          <br><br>

      <form method="post" action="server.php">
        

          <div class="input-group">
          <label>Course</label>
            <select name"course" class="input-group">
                <?php
                while($row = mysqli_fetch_assoc($resultsSet)) {
                  $courseid = $row['id'];
                  $title = $row['title'];
                    echo "<option value='$courseid'>$title</option>";
                   
                    
                }
                    
                    ?>

              </select>
          </div>
          <div class="input-group">
            <button type="submit" name="register" class="register">Register</button>
             
          </div>

      </form>
  </body>
</html>
