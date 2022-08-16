<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="../public_html/Bootstrap.css">
    <link rel="stylesheet" href="../public_html/Icons.css">
             <link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"  rel="stylesheet"/>

             <style>
                  .text{
                word-spacing: 10px;
                text-align:left;
                font-style: oblique;
                font-family: cursive;
            }
            
                 .FContainer{
                     background-color: rgba(25, 185, 234,.80); 
                     width: 80%;
                     position: absolute;
                      left: 10%;
                         height :auto;
                         padding: 5% 5%;
                         margin-top:80px;
                          border:1px inset blue;
                           border-radius:10px;
                 }
                 @media (min-width:786px) {
                     .FContainer{
                           
                          width:50%;
                         padding:5% 5%;
                         
                         height:auto;
                         border:1px inset blue;
                         position:fixed;
                         right:25%;
                         left:25%;
                         border-radius:10px;
                         margin-top:100px;

                     }
                 }
             </style>
             
             
                     <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light navbar-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="../public_html/index.html">The Hysson Cleaners</a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Link -->
        <li class="nav-item"><a class="nav-link" href="../public_html/index.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="../public_html/Contact.html">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="../public_html/Prices.html">Prices</a></li>
        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
              
              
            Account
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="login.php">Login</a></li>
                        
          </ul>
        </li>
      </ul>

      <!-- Icons -->
      <ul class="navbar-nav d-flex flex-row me-1">
        <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="http://www.instagram.com/Hysson_Cleaners">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="https://www.twitter.com/Hysson_Cleaners"><i class="fab fa-twitter"></i></a>
        </li>
      </ul>
      
    </div>
  </div>
  <!-- Container wrapper -->
</nav>
           


</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
	$mobile = stripslashes($_REQUEST['Phone']);
	$mobile = mysqli_real_escape_string($conn, $_POST['Phone']);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (Name, Phone, Email, Password, create_datetime)
                     VALUES ('$username', '".$mobile."', '$email','" . md5($password) . "','$create_datetime')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="FContainer">
    <form class="text" action="" method="post">
        <h1 class="">Registration</h1>
         <div class="form-outline mb-4" style="color:#898f10">
        <input type="text" class="form-control" name="username" placeholder="Username" required />
         </div>
         <div class="form-outline mb-4" style="color:#898f10">
             <input type="text" name="Phone" class="form-control" placeholder="Phone" minlength="10" maxlength="10" required>
         </div>
         <div class="form-outline mb-4" style="color:#898f10">
             <input type="text" class="form-control" name="email" placeholder="Email Adress" required>
         </div>
         <div class="form-outline mb-4" style="color:#898f10">
             <input type="password" class="form-control" name="password" placeholder="Password" minlength="8"required>
         </div>
        <input type="submit" name="submit" value="Register" class="btn btn-primary btn-block mb-4">
        <a href="login.php"><input type="" name="button" value="Login" class="btn btn-primary btn-block mb-4"></a>
    </form>
    </div>
<?php
    }
?>
    
    <script  type="text/javascript"  src="../public_html/MDB.js"></script>
</body>
</html>