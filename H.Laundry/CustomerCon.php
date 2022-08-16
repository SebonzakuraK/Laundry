<?php

$Username = "root";
$Password="";
$hostname="localhost";
$dbname = "customerlaundry.";

$dbconnect = mysqli_connect($hostname, $Username, $Password);

if($dbconnect->connect_error){
    die("Connection failed: ". $dbconnect->connect_error);

}
$conn = mysqli_select_db($dbconnect,"$dbname");
$q=mysqli_connect($hostname, $Username, $Password,"$dbname");
if(!$conn)
{
    echo "Selection Error!";
   
}

 



?>
