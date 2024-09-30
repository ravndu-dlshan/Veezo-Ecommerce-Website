<?php
  session_start();
  require "database.php";

  if(isset($_POST["login_btn"])){
    $username = $_POST["txt_username"];
    $password = $_POST["txt_password"];

    //Designing SQL Query Format
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $con->query($sql);
    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
        $db_un = $row["Username"];
        $db_pw = $row["Password"];

        if($db_un == $username && $db_pw == $password){
            /*
              --------------------Sending data using the URL-------------------------
            echo "<script>alert('Login Successful');
            location.replace('Dashboard.php?id=".$row['Uid']."&fname=".$row['Fname']."');</script>";*/

            $_SESSION["user_id"] = $row["Uid"];
            $_SESSION["user_fname"] = $row["Fname"];

            echo "<script>alert('Login Successful');
            location.replace('http://localhost/veezo-website/index.html');</script>";
            
        }else{
            echo "<script>alert('Login Failed');</script>";
        }
      }
    }else{
      echo "<script>alert('User not exist')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <title>LOG IN</title>
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



    <div style="
                  height:80vh;
                  width: 60%;

                  display: flex;
                  margin:40px auto;

                  box-shadow: 1px 1cap 26px 0px rgba(0, 0, 0, 0.75); 
 
    ">
      <div style="    height: 100%;
                      width: 40%;
                      background-image:url('favicon.png');
                      background-position: center;
                      background-repeat: no-repeat;
                        ">
        <img src="" alt="">
      </div>
      <div class="rightLogin">
        <div class="contentLogin">
          <h1>LOG IN</h1>
          <img src="" alt="" id="img" />

          <form method="POST">
            <div class="name">
              <label for="name">
                Username:
                <br />
                <input type="text" name="txt_username" id="name" placeholder="Username" />
              </label>
            </div>
            <div class="passwordDiv">
              <label for="password">
                Password:
                <br />
                <input type="password" name="txt_password" id="password" placeholder="Password" />
              </label>
            </div>

            <div class="buttonsLogin">
              <input type="submit" value="Login" id="loginButton" name="login_btn"/>
              <input type="reset" value="Cancel" id="cancelButton" />
            </div>
          </form>
          Don't have an account? then
          <span id="SignupSpan"><a href="signup.php" id="signupButton">Sign up</a></span>
        </div>
      </div>
    </div>
  </body>
</html>
