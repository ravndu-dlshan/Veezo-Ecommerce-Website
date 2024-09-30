<?php
  require "database.php";


  //Checking for the button Click
  if(isset($_POST["signup-btn"])){

    //Getting inputs from the form.
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $contact = $_POST["contactno"];

    //Defining a SQL Insert Query Format
    $sql = "INSERT INTO Users(Fname,Lname,Age,Gender,Email,ContactNo,Username,Password)VALUES('$fname','$lname',$age,'$gender','$email','$contact','$username','$password');";

    //Run this Query Format as an SQL Query
    $result = $con->query($sql);

    //Checking for the Confirmation of Insertion
    if($result===true){
      echo "<script>alert('Data Added');
      location.replace('login.php');</script>";
    }else{
      echo "<script>alert('Data Insertion Failed');</script>";
    }

  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="signup.css" />
    <title>Document</title>
  </head>
  <body>
    <!-- -------NAV------------------------ -->
    <nav>
      <ul style="

              display: flex;
              justify-content: space-between;
              font-size: 20px;
              padding: 20px;
              letter-spacing: 2px;
              border-radius: 10px;
              margin-bottom: 30px;    
      ">
        <div class="left">
          <li><a href="http://localhost/veezo-website/index.html"><img src="logo.png" alt=""></a></li>
        </div>
        <div class="right">
          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Sign up</a></li>
        </div>
      </ul>
    </nav>

    <!-- ------sign up form----------- -->


    <div class="containerSignup">
        <div class="title"><h1>SING UP</h1></div>
      <form action="" method="post">
      <div class="fullname">
        <div class="firstnameDiv">
          <label for="firstname">First Name: <br>
            <input type="text" name="fname" id="firstname" placeholder="firstname" />
          </label>
        </div>
        <div class="lastnameDiv">
          <label for="lastname"
            >Last Name:<br>
            <input type="text" name="lname" id="lastname" placeholder="lastname" />
          </label>
        </div>
      </div>
      <div class="collection">
        <div class="ageDiv">
            <label for="age"
              >Age:<br>
              <input type="number" name="age" id="age" placeholder="age" />
            </label>
          </div>
          <div class="genderDiv">
            <label for="gender">
              Gender:<br>
              <select name="gender" id="selectGender">
                <option value="Male" selected>Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </label>
          </div>
      </div>
        
        <div class="emailDiv">
          <label for="email"
            >Email:<br>
            <input type="email" name="email" id="email" />
          </label>
        </div>
        <div class="contactNoDiv">
          <label for="contactno"
            >Contact Number:<br>
            <input type="text" name="contactno" id="contactno" />
          </label>
        </div>
        <div class="usernameDiv">
          Username:
          <label for="username"><br>
            <input type="text" name="username" id="username" placeholder="username" />
          </label>
        </div>
        <div class="passwordDiv">
          <label for="password">
            Password:<br>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="password"
            />
          </label>
          <div class="submitSignupDiv">
            <input type="submit" value="Sign up" id="submitSignup" name="signup-btn"/>
          </div>
        </div>
        </form>
      </div>
    </div>
  </body>
</html>
