<?php 


  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['Email']);
  $message = htmlspecialchars($_POST['Message']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "youremail@gmail.com"; //enter the email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nEmail: $email\n\nMessage:\n$message\n\nRegards,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo 
          
          
          "<html>
      <head>
      
 <link rel='stylesheet' href='../public_html/Bootstrap.css'>
    <link  rel='stylesheet' href='../public_html/hysson.css'>
       

</head>
      <body class='mailbody'>
      <div class='mailalert'>
      <h1 class='mailh1'> Your message has been sent!</h1>  <br><br>
<div class='mailbutton'>     
<a href='../public_html/Contact.html'><input type='' name='button' value='GO BACK' class='btn btn-primary btn-block mb-4' style='color:yellowgreen'></a>
</div>      
</div>
</body>
 </html>";
      
         
         
      }else{
          
          
         echo "<html>
      <head>
      
 <link rel='stylesheet' href='../public_html/Bootstrap.css'>
    <link  rel='stylesheet' href='../public_html/hysson.css'>
       

</head>
      <body class='mailbody'>
      <div class='mailalert'>
      <h1 class='mailh1'> Sorry, failed to send your message!</h1>  <br><br>
<div class='mailbutton'>     
<a href='../public_html/Contact.html'><input type='' name='button' value='GO BACK' class='btn btn-primary btn-block mb-4' style='color:yellowgreen'></a>
</div>      
</div>
</body>
 </html>";
      
         
         
      }
    }else{
        
        
      echo "<html>
      <head>
      
 <link rel='stylesheet' href='../public_html/Bootstrap.css'>
    <link  rel='stylesheet' href='../public_html/hysson.css'>
       

</head>
      <body class='mailbody'>
      <div class='mailalert'>
      <h1 class='mailh1'>  Enter a valid email address!!</h1>  <br><br>
<div class='mailbutton'>     
<a href='../public_html/Contact.html'><input type='' name='button' value='GO BACK' class='btn btn-primary btn-block mb-4' style='color:yellowgreen'></a>
</div>      
</div>
</body>
 </html>";
    
      
    }
  }else{
      
      
    echo 
      "
      <html>
      <head>
      
 <link rel='stylesheet' href='../public_html/Bootstrap.css'>
    <link  rel='stylesheet' href='../public_html/hysson.css'>
       

</head>
      <body class='mailbody'>
      <div class='mailalert'>
      <h1 class='mailh1'>  Email and message field is required!</h1>  <br><br>
<div class='mailbutton'>     
<a href='../public_html/Contact.html'><input type='' name='button' value='GO BACK' class='btn btn-primary btn-block mb-4' style='color:yellowgreen'></a>
</div>      
</div>
</body>
 </html>
      ";
  
    
    
  }

?>