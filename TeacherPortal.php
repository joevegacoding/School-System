<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Teacher's portal</title>
    <link rel="stylesheet" href="CSS/STStyle.css">
  </head>
  <body>
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
            <th>Course Code</th>
            <th>Title</th>
            <th>Duration(in hours)</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results)) {  ?>
    
          <tr>
            <td><?php echo $row['code']; ?></td>
            <td><?php echo $row['duration']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td>
              <a class="del_btn" href="server.php?del=<?php echo $row['code']; ?>">Delete</a>
            </td>
          </tr>
              
             <?php } ?>
            
            
          
        </tbody>
      </table>

      <form method="post" action="server.php">
        <div class="input-group">
          <label>Course Code</label>
          <input type="text" name="code" value="">
          </div>

          <div class="input-group">
          <label>Duration(in hours)</label>
          <input type="text" name="duration" value="">
          </div>

          <div class="input-group">
          <label>Title</label>
          <input type="text" name="title" value="">
          </div>
          <div class="input-group">
            <button type="submit" name="add" class="btn">Add</button>
          </div>

      </form>
  </body>
</html>
