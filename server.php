<?php

  session_start();

  $dbservername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "schoolsystem";

  $name = "";
  $phone = "";
  $email = "";
  $username = "";
  $errors = array();


  $code = 0;
  $duration = "";
  $title = "";

  //Connect to SQLiteDatabase
    $db = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);


   //Log user from login page.
    if(isset($_POST['Login'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        if ($username == "magister" && $password == "signum" ) {
            header('location: TeacherPortal.php');
        }


        else if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
           // $password = md5($password);
            $query = "SELECT * FROM students WHERE username='$username' OR password='$password'";
            $result = mysqli_query($db, $query);

            if(mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in!";
               $row = mysqli_fetch_assoc($result);
                $_SESSION['StudentID'] = $row["id"];
                header('location: StudentPortal.php');
            }
            else {
                array_push($errors, "The username/password combination is incorrect");
                echo 'FAIL';
         //header('location: Login.php');

        }
}






    //if the registration button is clicked
    if (isset($_POST['register'])) {
        echo 'register';
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password_confirmation = mysqli_real_escape_string($db, $_POST['password-confirmation']);

        //Ensuring the form fields are filled properly
        if (empty($name)) {
            array_push($errors, "Name is required");
        }
        if (empty($phone)) {
            array_push($errors, "Phone number is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        if ($password != $password_confirmation ) {
            array_push($errors, "Confirmation password and password don't match");
        }

        //if there are no errors, save user to database

        if(count($errors) == 0){

            $pass = md5($password); //encrypting password before storing to database
            $query = "INSERT INTO students(name, phone, email, username, password) VALUES ('$name', '$phone', '$email', '$username', '$password')";

            mysqli_query($db, $query);
           $_SESSION['username'] = $username;
           $_SESSION['success'] = "Welcome !";
            header('location: StudentPortal.php');



        }
    }

        //if the delete button is clicked
     if (isset($_GET['del'])) {
      $code = $_GET['del'];
          mysqli_query($db, "DELETE FROM course WHERE code='$code' ");
        $_SESSION['msg'] = "Course deleted!";
        header('location: TeacherPortal.php');

     }
 }

    //if the button register is clicked (StudenPortal.php)
        if (isset($_POST['register'])) {
          $courseid =0;
          if(isset($_POST['course'])) 
          {
              $courseid = $_POST['course'];
            }
        $studentid = $_SESSION['StudentID'];
      

      $query = "INSERT INTO studentcourse( courseid, studentid ) VALUES($courseid, $studentid)";
      mysqli_query($db, $query);
      $_SESSION['msg'] = "Course added!";
      header('location: StudentrPortal.php');
    }



    //if the add button is clicked
    if (isset($_POST['add'])) {
        
      $code = $_POST['code'];
      $duration = $_POST['duration'];
      $title = $_POST['title'];

      $query = "INSERT INTO course(code, duration, title) VALUES('$code', '$duration', '$title')";
      mysqli_query($db, $query);
      $_SESSION['msg'] = "Course added!";
      header('location: TeacherPortal.php');
    }


    //Logout
if(isset($_GET['Logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: Login.php');
}
    
    //retrieve info from database and display it (TEACHER PORTAL)
    $results = mysqli_query($db, "SELECT * FROM course");

     //retrieve info from database and display it (STUDENT PORTAL)
    $resultsStudent = mysqli_query($db, "SELECT studentcourse.id, course.title, students.name, course.duration
                                         FROM ((studentcourse
                                         INNER JOIN course ON studentcourse.courseid = course.id)
                                         INNER JOIN students ON studentcourse.studentid = students.id);");
    
      $resultsSet = mysqli_query($db, "SELECT id, title FROM course");


 ?>
