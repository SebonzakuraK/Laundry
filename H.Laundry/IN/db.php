<?php
    $servername='<enter your host name>';
    $username='<enter your username>';
    $password='';
    $dbname = "<enter database name>";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
       
?>
