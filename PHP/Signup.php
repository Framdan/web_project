<?php 
include ('../config.php');
$email = $_POST['email'];
  $password = $_POST['password1'];
  $username = $_POST['username'];


  $sql = "SELECT * FROM users WHERE email= '$email'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  if($result) {
    if($row=mysqli_num_rows($result)>0){
        echo "<p>Email is already used by another user</p><a href='../pages/signup.html'>Go Back</a>";
    }else{
        $registerQuery = "INSERT INTO users(email, password,username) VALUES('$email','$password','$username')";
        if(mysqli_query($conn, $registerQuery)){
            echo "USER REGISTERED successfully";
            header("location:../pages/login.html");
        }
        else{
            echo "Something went wrong " . mysqli_error($conn) . "<a href='register.php'>Go Back</a>";
        }
    }
  } else{
      echo "Something went wrong, you can not register. Please try again later. <a href='register.php'>Go Back</a>";
  }

?>