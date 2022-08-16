<?php
require('db.php');
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    
    <link rel="stylesheet" href="../public_html/Bootstrap.css">
    <link  rel="stylesheet" href="../public_html/Icon.css">
           <link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"  rel="stylesheet"/>
    
           <style>
               body{
                   height: 100vh
               } 
               
               em{ 
                font-size: 25px;
  color: #000;
  font-weight: 600;
  text-align: center;
  margin: 0;
  margin-top: -80px;
  font-family: poppins;
  color: #fff; 
  text-transform: capitalize;
  
               }
.Details{
     width:fit-content ;
     height: auto;
    font-family: cursive;
    font-weight: bold;
    color: #fff;
    background-color: #495057;
    word-spacing: 10px;
    padding: 5%5%;
  margin-top: 20px;

}
.Details:hover{
  background: #16A086;  
}
ul li{
    list-style: none;
    padding-top: 10px;
}
:hover .btn-area a {
  background: #262626;
}
h6{
                   background: #16A086;
                 padding-left: 20px;
               }
:hover h6 {
                       background: #262626;
               }
               
               .intro{
                   text-align-last: center;
                   text-indent: 10px;
                   padding: 40px 20px;
                   color: #0000FF;
               }
 .single-price {
  text-align: center;
  background: #262626;
  transition: .7s;
  margin-top: 20px;
}
.single-price h3 {
  font-size: 25px;
  color: #000;
  font-weight: 600;
  text-align: center;
  margin: 0;
  margin-top: -80px;
  font-family: poppins;
  color: #fff;
}
.single-price h4 {
  font-size: 48px;
  font-weight: 500;
  color: #fff;
}
.single-price h4 span.sup {
  vertical-align: text-top;
  font-size: 25px;
}
.deal-top {
  position: relative;
  background: #16A086;
  font-size: 16px;
  text-transform: uppercase;
  padding: 136px 24px 0;
}
.deal-top::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -50px;
  width: 0;
  height: 0;
  border-top: 50px solid #16A086;
  border-left: 175px solid transparent;
  border-right: 183px solid transparent;
}
.deal-bottom {
  padding: 56px 16px 0;
}
.deal-bottom ul {
  margin: 0;
  padding: 0;
}
.deal-bottom  ul li {
  font-size: 16px;
  color: #fff;
  font-weight: 300;
  margin-top: 16px;
  border-top: 1px solid #E4E4E4;
  padding-top: 16px;
  list-style: none;
}
.btn-area a {
  display: inline-block;
  font-size: 18px;
  color: #fff;
  background: #16A086;
  padding: 8px 64px;
  margin-top: 32px;
  border-radius: 4px; 
  margin-bottom: 40px;
  text-transform: uppercase;
  font-weight: bold;
  text-decoration: none;
}


.single-price:hover {
  background: #16A086;
}
.single-price:hover .deal-top {
  background: #262626;
}
.single-price:hover .deal-top:after {
  border-top: 50px solid #262626;
}
.single-price:hover .btn-area a {
  background: #262626;
}

            video{
                         position :absolute;
                        right:-20px;
                        bottom:-20px;
                        z-index:-1;
            }
           </style>
           
           <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light navbar-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="index.html">The Hysson Cleaners</a>

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
            <li><a class="dropdown-item" href="../IN/login.php">Login</a></li>
             <li><a class="dropdown-item" href="../IN/registration.php">Register</a></li>
            
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
      <!-- Search -->
      <form class="w-auto">
        <input
          type="search"
          class="form-control"
          placeholder="Type query"
          aria-label="Search"
        />
      </form>
    </div>
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
        
</head>
<body>
                    <video autoplay plays-inline muted loop  class="video">
        <source src="../Img/AL.mp4" type="video/mp4">
                </video>

   
    <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">  
    <div class="Details">
        <h6>Welcome to Hysson Cleaners  Services  <em><?php echo $_SESSION['username']; ?>!</em></h6>
        <ul>
                       
            <li>Phone :- <?php echo $_SESSION['user_mobile']?></li>
            <li>Email :- <?php echo $_SESSION['user_email']?></li>
        </ul>

      
        <div class="btn-area" >
              <p><a href="logout.php">Logout</a></p>       
            </div>
      
    </div>
        <div class="intro">
              <p>Hello,<?php echo $_SESSION['username']; ?>, we promise to service you to your satisfactions </p>
        <p>Shine and Standout togeter with Hysson Ceaners</p>
        </div>
           </div>
  
      <div class="col-md-4 col-sm-6 col-xs-4">
        <div class="single-price">
          <div class="deal-top">
            <h3>Basic</h3>
            <h4> 2900 <span class="sup">Ksh: </span> </h4> 
          </div>
          <div class="deal-bottom">
            <ul class="deal-item">
              <li>Cotton/Silk 600/=</li>
              <li>Velvet/Twill 550/=</li>
              <li>Viscose 550/=</li>
              <li>Spandex 600/= </li>
              <li>linen/Toile 600/= </li>
              <li></li>
            </ul>
           
          </div>
        </div>
      </div>
     </div>
     
          
          
    <script src="../public_html/Hysson.js"></script>
             <script  type="text/javascript"  src="../public_html/MDB.js"></script>
</body>
</html>