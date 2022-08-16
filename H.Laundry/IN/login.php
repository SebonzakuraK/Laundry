<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="../public_html/Bootstrap.css">
    <link rel="stylesheet" href="../public_html/Icons.css">
    <link rel="stylesheet" href="../public_html/login.css"/>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"  rel="stylesheet"/>
             
             
<nav class="navbar navbar-expand-lg navbar-light fixed-top mask-custom shadow-0">
    <div class="container">
        <a class="navbar-brand" href="index.html"><span style="color: #5e9693;"> Hysson</span><span style="color: #fff;">Cleaners</span></a>
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
              <a class="nav-link" href="../public_html/index.html">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="../public_html/Contact.html">Contact</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="../public_html/Prices.html"> Prices</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="registration.php">Register</a>
          </li>
         
        </ul>
        <ul class="navbar-nav d-flex flex-row">
          
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="https://www.twitter.com/Hysson_Cleaners">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="http://www.instagram.com/Hysson_Cleaners">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
   
    
</head>
<body>
    
    <video autoplay plays-inline muted loop  class="phone">
        <source src="../Img/CB.mp4" type="video/mp4" >
         
                </video>
        <video autoplay plays-inline muted loop  class="lap">
         <source src="../Img/CB2.mp4" type="video/mp4"  >
                </video>
    
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
            echo "<html>
      <head>
      
 <link rel='stylesheet' href='../public_html/Bootstrap.css'>
    <link  rel='stylesheet' href='../public_html/hysson.css'>
       

</head>
      <body class='mailbody'>
      <div class='mailalert'>
      <h1 class='mailh1'> Incorrect Username/password.</h1>  <br><br>
<div class='mailbutton'>     
<a href='StandardLog.php'><input type='' name='button' value='RETRY' class='btn btn-primary btn-block mb-4' style='color:yellowgreen'></a>
</div>      
</div>
</body>
 </html>";
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
    
    <script src="../public_html/Hysson.js"></script>
    <script  type="text/javascript"  src="../public_html/MDB.js"></script>
</body>
</html>