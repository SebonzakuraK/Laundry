    
<?php
    require('db.php');
   session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE Name='$username'
                     AND Password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
       if ($row = mysqli_fetch_array($result)) {
$_SESSION['username'] = $row['Name'];
$_SESSION['user_mobile'] = $row['Phone'];
$_SESSION['user_email'] = $row['Email'];
	
            // Redirect to user dashboard page
          header("Location: dashboard.php");


        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="formContainer">
    <form class="text" method="post" name="login">
        <div class="Center">
        <h1 class="login-title" style="color:#908F10">Login</h1><BR>
        <div class="form-outline mb-4" style="color:#898f10">
        <input type="text" class="form-control" name="username" placeholder="Username" autofocus="true"/>
      </div>
        <div class="form-outline mb-4" style="color:#898f10">
        <input type="password" class="form-control" name="password" placeholder="Password"/>
        </div>
        
         <input type="submit" name="submit" value="Login" class="btn btn-primary btn-block mb-4" style="color:red">
         <a href="registration.php"><input type="" name="button" value="Register" class="btn btn-primary btn-block mb-4" style="color:yellowgreen"></a>
         
        </div>
    </form>
        </div>
<?php
    }
?>
