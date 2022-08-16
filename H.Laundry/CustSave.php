<?php
echo "  
<!DOCTYPE html>
 <html>
 <head>
 <link rel='stylesheet' href='public_html/Bootstrap.css'>
        <link rel='stylesheet' href='public_html/Icons.css'>
         <link  href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'  rel='stylesheet'/>
       
<style>
body{
               height: auto;
                background-image:url(Img/oceanview.jpg);
                background-repeat:none;
                background-size:cover;
                text-align: center;
                
                  }   
       
   .bg-opacity{
                      height: auto;
                      background-color: rgba(255,254,150,0.95);
                      background-size: cover;
                  }
   </style>               
<head>
<body>
<div class='bg-opacity'>
<!--nav bar-->
   
    <fieldset>
        <nav class='navbar navbar-expand-lg navbar-light bg-light'>
  <div class='container-fluid'>
    <a class='navbar-brand' href='#'>The Hysson Cleaners</a>
    <button
      class='navbar-toggler'
      type='button'
      data-mdb-toggle='collapse'
      data-mdb-target='#navbarTogglerDemo02'
      aria-controls='navbarTogglerDemo02'
      aria-expanded='false'
      aria-label='Toggle navigation'
    >
      <i class='fas fa-bars'></i>
    </button>
    <div class='collapse navbar-collapse' id='navbarTogglerDemo02'>
      <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
        <li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='public_html/index.html'>Home</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='CustomerOrder.html'>Customer Order</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link disabled'
            >Disabled</a
          >
        </li>
      </ul>
        <form class='d-flex input-group w-auto' action='' method='POST'>
        <input
          type='search'
          class='form-control''
          name='Search'
          placeholder='Type query'
          aria-label='Search''
        />
        <input type='submit' value='Search' name='QuerySearch'
          class='btn btn-outline-primary'
          data-mdb-ripple-color='dark'  >
        
      </form>
    </div>
  </div>
</nav>
    </fieldset>
    
 <script  type='text/javascript'  src='public_html/MDB.js'></script>
</div>
</body>
</html>    
";

#Connection establishment
require ('CustomerCon.php');

#Shirts Section
$id_option = array("Options"=> array(
      "min_range"=>7, "max_range"=>9
  ));

if(isset($_POST['ScB']) &&  !empty($_POST['id'])){
    
    #id input and sanitization
  $SNat= stripslashes($_POST['id']); 
  
  
  if(filter_var($SNat, FILTER_VALIDATE_INT,$id_option)){
      $SNat = mysqli_real_escape_string($dbconnect, $SNat);
      
  }
  else{
      die("<br><p><h2>Invalid ID Number</h2></p>"
              . "<br><br><a href='CustomerOrder.html'><h3 style='color:green'>RETRY</h3></a>");
  }
  
  #name input and sanitization
  $SName= stripslashes($_POST['username']);  
  
  if (preg_match("/^[a-zA-Z ]*$/",$SName)) {
       $SName = mysqli_real_escape_string($dbconnect, $SName);
      
  }else{
      
  die("<br><p ><h2>Name: only letters and whitespace allowed</h2></p>" . "<br><br><a href='CustomerOrder.html'><h3 style='color:green'>RETRY</h3></a>") ;
}
 
 
  $SQuantity= stripslashes($_POST['ShirtQuantity']);
  $SQuantity = mysqli_real_escape_string($dbconnect, $SQuantity);
  
  
  $SMaterial=stripslashes($_POST['ShirtBmaterial']);
 $SMaterial = mysqli_real_escape_string($dbconnect, $SMaterial);
 
  $SDescription=stripslashes($_POST['ShirtColor']);
 $SDescription = mysqli_real_escape_string($dbconnect, $SDescription);
 
  $SDrop=($_POST['datetime']);
 $SDrop = mysqli_real_escape_string($dbconnect, $SDrop);
 
  $SPick="";
 $SPick = mysqli_real_escape_string($dbconnect, $SPick);
 
  $SCost=$SQuantity*300;
  
 $Scheck= ($_POST['Bhide']);
 
  $query    = "INSERT into `shirts_blouses` (Nat_ID, Name, Quantity, Material, Description, DropDate, PickDate,Cost,CLOTHES)
                     VALUES ('$SNat', '$SName', '$SQuantity','$SMaterial','$SDescription','$SDrop','$SPick','$SCost','$Scheck')";
        $result   = mysqli_query($dbconnect, $query);
        if ($result) {
            
            $display = mysqli_query($dbconnect,"SELECT * FROM `shirts_blouses` WHERE Nat_ID='$SNat' ");
            
            while ($row = mysqli_fetch_array($display)) {
                echo "<br><br>";
                #starting point
                
                echo "

<div class='table-responsive'>
  <table class='table'>
    <thead>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Nation ID</th>
        <th scope='col'>Name</th>
        <th scope='col'>Quantity</th>
        <th scope='col'>Material</th>
        <th scope='col'>Description</th>
        <th scope='col'>DropDate</th>
        <th scope='col'>Pick up Date</th>
        <th scope='col'>Cost</th>
        <th scope='col'></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope='row'>1</th>
        <td>$row[Nat_ID]</td>
        <td>$row[Name]</td>
        <td>$row[Quantity]</td>
        <td>$row[Material]</td>
        <td>$row[Description]</td>
        <td>$row[DropDate]</td>
        <td>$row[PickDate]</td>
        <td>$row[Cost]</td>
        <td></td>
      </tr>
      
    </tbody>
  </table>
</div>

   " ;
               
                #end of table
              
                echo "<h6>Shirts/Blouses</h6>";
            }
            
                  
                  
                  
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  
                  </div>";
        }
    }
    
  #Trousers Section
    
    if(isset($_POST['TcB']) && !empty($_POST['id'])) {
    
        
  $TNat= stripslashes($_POST['id']);  
  
  
  if(filter_var($TNat, FILTER_VALIDATE_INT,$id_option)){
      $TNat = mysqli_real_escape_string($dbconnect, $TNat);
      
  }
  else{
      die("<br><p><h2>Invalid ID Number</h2></p>" . "<br><br><a href='CustomerOrder.html'><h3 style='color:green'>RETRY</h3></a>");
  }
  
  $TName= stripslashes($_POST['username']);  
  
  if (preg_match("/^[a-zA-Z ]*$/",$TName)) {
       $TName = mysqli_real_escape_string($dbconnect, $TName);
      
  }else{
      
  die("<br><p ><h2>Name: only letters and whitespace allowed</h2></p>" . "<br><br><a href='CustomerOrder.html'><h3 style='color:green'>RETRY</h3></a>") ;
}  
  
  $TQuantity= stripslashes($_POST['TrousersQuantity']);
   $TQuantity = mysqli_real_escape_string($dbconnect, $TQuantity);
   
  $TMaterial=stripslashes($_POST['TrousersMaterial']);
   $TMaterial = mysqli_real_escape_string($dbconnect, $TMaterial);
  
   $TDescription=stripslashes($_POST['TrousersColor']);
   $TDescription = mysqli_real_escape_string($dbconnect, $TDescription);
   
   $TDrop=($_POST['datetime']);
  $TDrop = mysqli_real_escape_string($dbconnect, $TDrop);
   
  $TPick="1+2";
   $TPick = mysqli_real_escape_string($dbconnect, $TPick);
  
   $TCost=$TQuantity*350;
    
  
    $Tcheck=$_POST['Thide'];
    
    $query    = "INSERT into `trousers_shorts` (Nat_ID, Name, Quantity, Material, Description, DropDate, PickDate,Cost,CLOTHES)
                     VALUES ('$TNat', '$TName', '$TQuantity','$TMaterial','$TDescription','$TDrop','$TPick','$TCost','$Tcheck')";
        $result   = mysqli_query($dbconnect, $query);
        if ($result) {
         #table start          

            $display = mysqli_query($dbconnect,"SELECT * FROM `trousers_shorts` WHERE Nat_ID='$TNat' ");
            
            while ($row = mysqli_fetch_array($display)) {
                echo "<br><br>";
           echo "

<div class='table-responsive'>
  <table class='table'>
    <thead>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Nation ID</th>
        <th scope='col'>Name</th>
        <th scope='col'>Quantity</th>
        <th scope='col'>Material</th>
        <th scope='col'>Description</th>
        <th scope='col'>DropDate</th>
        <th scope='col'>Pick up Date</th>
        <th scope='col'>Cost</th>
        <th scope='col'></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope='row'>1</th>
        <td>$row[Nat_ID]</td>
        <td>$row[Name]</td>
        <td>$row[Quantity]</td>
        <td>$row[Material]</td>
        <td>$row[Description]</td>
        <td>$row[DropDate]</td>
        <td>$row[PickDate]</td>
        <td>$row[Cost]</td>
        <td></td>
      </tr>
      
    </tbody>
  </table>
</div>

   " ;
       
            }   
          #table end
          echo "<h6>Trousers/Shorts";
            
            } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  
                  </div>";
        }
    }

#Jakets_Update
    if(isset($_POST['JcB']) && !empty($_POST['id'])){
    
  $JNat= stripslashes($_POST['id']);  
    if(filter_var($JNat, FILTER_VALIDATE_INT,$id_option)){
         $JNat = mysqli_real_escape_string($dbconnect, $JNat);
      
  }
  else{
      die("<br><p><h2>Invalid ID Number</h2></p>" . "<br><br><a href='CustomerOrder.html'><h3 style='color:green'>RETRY</h3></a>");
  }
  
   
  $JName= stripslashes($_POST['username']);     
  if (preg_match("/^[a-zA-Z ]*$/",$JName)) {
       $JName = mysqli_real_escape_string($dbconnect, $JName);
      
  }else{
      
  die("<br><p ><h2>Name: only letters and whitespace allowed</h2></p>" . "<br><br><a href='CustomerOrder.html'><h3 style='color:green'>RETRY</h3></a>") ;
}
 
  
  $JQuantity= stripslashes($_POST['HoodieQuantity']);
   $JQuantity = mysqli_real_escape_string($dbconnect, $JQuantity);
  
  $JMaterial=stripslashes($_POST['HoodieMaterial']);
   $JMaterial = mysqli_real_escape_string($dbconnect, $JMaterial);
 
   $JDescription=stripslashes($_POST['HoodieColor']);
   $JDescription = mysqli_real_escape_string($dbconnect, $JDescription);
   
   $JDrop=($_POST['datetime']);
   $JDrop = mysqli_real_escape_string($dbconnect, $JDrop);
   
   $JPick="";
   $JPick = mysqli_real_escape_string($dbconnect, $JPick);
   
   $JCost=$JQuantity*250;
     
     
     $Jcheck=$_POST['Jhide'];
     
  $query    = "INSERT into `jackets_hoodies` (Nat_ID, Name, Quantity, Material, Description, DropDate, PickDate,Cost,CLOTHES)
                     VALUES ('$JNat', '$JName', '$JQuantity','$JMaterial','$JDescription','$JDrop','$JPick','$JCost','$Jcheck')";
        $result   = mysqli_query($dbconnect, $query);
        if ($result) {
            
            #jackets table info
            $display = mysqli_query($dbconnect,"SELECT * FROM `jackets_hoodies` WHERE Nat_ID='$JNat' ");
            
            while ($row = mysqli_fetch_array($display)) {
                echo "<br><br>";
           echo "

<div class='table-responsive'>
  <table class='table'>
    <thead>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Nation ID</th>
        <th scope='col'>Name</th>
        <th scope='col'>Quantity</th>
        <th scope='col'>Material</th>
        <th scope='col'>Description</th>
        <th scope='col'>DropDate</th>
        <th scope='col'>Pick up Date</th>
        <th scope='col'>Cost</th>
        <th scope='col'></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope='row'>1</th>
        <td>$row[Nat_ID]</td>
        <td>$row[Name]</td>
        <td>$row[Quantity]</td>
        <td>$row[Material]</td>
        <td>$row[Description]</td>
        <td>$row[DropDate]</td>
        <td>$row[PickDate]</td>
        <td>$row[Cost]</td>
        <td></td>
      </tr>
      
    </tbody>
  </table>
</div>

   " ;
       
            }

            #end of table 
            echo "<h6>Jackets/Hoodies</h6>";
            } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  
                  </div>";
        }
    }
    
    #Curtains Update
       if(isset($_POST['CCcB']) && !empty($_POST['id'])){
    
  $CNat= stripslashes($_POST['id']);  
     if(filter_var($CNat, FILTER_VALIDATE_INT,$id_option)){
         $CNat = mysqli_real_escape_string($dbconnect, $CNat);
      
  }
  else{
      die("<br><p><h2>Invalid ID Number</h2></p>" . "<br><br><a href='CustomerOrder.html'><h3 style='color:green'>RETRY</h3></a>");
  }
   
   
  $CName= stripslashes($_POST['username']);    
  
    if (preg_match("/^[a-zA-Z ]*$/",$CName)) {
       $CName = mysqli_real_escape_string($dbconnect, $CName);
      
  }else{
      
  die("<br><p ><h2>Name: only letters and whitespace allowed</h2></p>" . "<br><br><a href='CustomerOrder.html'><h3 style='color:green'>RETRY</h3></a>") ;
}
 
  $CQuantity= stripslashes($_POST['CCQuantity']);
   $CQuantity = mysqli_real_escape_string($dbconnect, $CQuantity);
  
   $CMaterial=stripslashes($_POST['CCMaterial']);
   $CMaterial = mysqli_real_escape_string($dbconnect, $CMaterial);
   
   $CDescription=stripslashes($_POST['CC_Color']);
   $CDescription = mysqli_real_escape_string($dbconnect, $CDescription);
   
   $CDrop=($_POST['datetime']);
    $CDrop = mysqli_real_escape_string($dbconnect, $CDrop);
  
    $CPick="";
   $CPick = mysqli_real_escape_string($dbconnect, $CPick);
   
   $CCost=$CQuantity*150;
    
  
    $Ccheck=$_POST['Chide'];
    
    $query    = "INSERT into `curtains_carpets` (Nat_ID, Name, Quantity, Material, Description, DropDate, PickDate,Cost,CLOTHES)
                     VALUES ('$CNat', '$CName', '$CQuantity','$CMaterial','$CDescription','$CDrop','$CPick','$CCost','$Ccheck')";
        $result   = mysqli_query($dbconnect, $query);
        if ($result) {
 
            #start curtains table 
           $display = mysqli_query($dbconnect,"SELECT * FROM `curtains_carpets` WHERE Nat_ID='$CNat' ");
            
            while ($row = mysqli_fetch_array($display)) {
                echo "<br><br>";
           echo "
  
<div class='table-responsive'>
  <table class='table'>
    <thead>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Nation ID</th>
        <th scope='col'>Name</th>
        <th scope='col'>Quantity</th>
        <th scope='col'>Material</th>
        <th scope='col'>Description</th>
        <th scope='col'>DropDate</th>
        <th scope='col'>Pick up Date</th>
        <th scope='col'>Cost</th>
        <th scope='col'></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope='row'>1</th>
        <td>$row[Nat_ID]</td>
        <td>$row[Name]</td>
        <td>$row[Quantity]</td>
        <td>$row[Material]</td>
        <td>$row[Description]</td>
        <td>$row[DropDate]</td>
        <td>$row[PickDate]</td>
        <td>$row[Cost]</td>
        <td></td>
      </tr>
      
    </tbody>
  </table>
</div>

" ;
       
            }
            #end
            echo "<h6>Curtains/Carpets</h6>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  
                  </div>";
        }
    }
    
    #Suits Update
    
       if(isset($_POST['SOcB']) && !empty($_POST['id'])){
    
  $SONat= stripslashes($_POST['id']); 
  if(filter_var($SONat, FILTER_VALIDATE_INT,$id_option)){
         $SONat = mysqli_real_escape_string($dbconnect, $SONat);
      
  }
  else{
      die("<br><p><h2>Invalid ID Number</h2></p>" . "<br><br><a href='CustomerOrder.html'><h3 style='color:green'>RETRY</h3></a>");
  }
 
   
  $SOName= stripslashes($_POST['username']);  
    if (preg_match("/^[a-zA-Z ]*$/",$SOName)) {
       $SOName = mysqli_real_escape_string($dbconnect, $SOName);
      
  }else{
      
  die("<br><p ><h2>Name: only letters and whitespace allowed</h2></p>" . "<br><br><a href='CustomerOrder.html'><h3 style='color:green'>RETRY</h3></a>") ;
}
 
   $SOQuantity= stripslashes($_POST['SuitQuantity']);
   $SOQuantity = mysqli_real_escape_string($dbconnect, $SOQuantity);
   
   $SOMaterial=stripslashes($_POST['SuitMaterial']);
   $SOMaterial = mysqli_real_escape_string($dbconnect, $SOMaterial);
   
   $SODescription=stripslashes($_POST['SuitColor']);
    $SODescription = mysqli_real_escape_string($dbconnect, $SODescription);
   
  $SODrop=($_POST['datetime']);
   $SODrop = mysqli_real_escape_string($dbconnect, $SODrop);
  
  $SOPick="";
   $SOPick = mysqli_real_escape_string($dbconnect, $SOPick);
  
   $SOCost=$SOQuantity*500;
    
  
    $Socheck=$_POST['Shide'];
    
    $query    = "INSERT into `official_suits` (Nat_ID, Name, Quantity, Material, Description, DropDate, PickDate,Cost,CLOTHES)
                     VALUES ('$SONat', '$SOName', '$SOQuantity','$SOMaterial','$SODescription','$SODrop','$SOPick','$SOCost','$Socheck')";
        $result   = mysqli_query($dbconnect, $query);
        if ($result) {

            #start of official table 
            
            $display = mysqli_query($dbconnect,"SELECT * FROM `official_suits` WHERE Nat_ID='$SONat' ");
            
            while ($row = mysqli_fetch_array($display)) {
                echo "<br><br>";
           echo "

<div class='table-responsive'>
  <table class='table'>
    <thead>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Nation ID</th>
        <th scope='col'>Name</th>
        <th scope='col'>Quantity</th>
        <th scope='col'>Material</th>
        <th scope='col'>Description</th>
        <th scope='col'>DropDate</th>
        <th scope='col'>Pick up Date</th>
        <th scope='col'>Cost</th>
        <th scope='col'></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope='row'>1</th>
        <td>$row[Nat_ID]</td>
        <td>$row[Name]</td>
        <td>$row[Quantity]</td>
        <td>$row[Material]</td>
        <td>$row[Description]</td>
        <td>$row[DropDate]</td>
        <td>$row[PickDate]</td>
        <td>$row[Cost]</td>
        <td></td>
      </tr>
      
    </tbody>
  </table>
</div>

  " ;
       
            }#end
            
            echo "<h6>Suits/Official Wear</h6>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  
                  </div>";
        }
    }
    
 #Child Wear Update
    
       if(isset($_POST['WcB']) && !empty($_POST['id'])){
    
  $WNat= stripslashes($_POST['id']);  
  if(filter_var($WNat, FILTER_VALIDATE_INT,$id_option)){
         $WNat = mysqli_real_escape_string($dbconnect, $WNat);
      
  }
  else{
      die("<br><p><h2>Invalid ID Number</h2></p>". "<br><br><a href='CustomerOrder.html'><h3 style='color:green'>RETRY</h3></a>");
  }
   
  $WName= stripslashes($_POST['username']); 
  
    if (preg_match("/^[a-zA-Z ]*$/",$WName)) {
       $WName = mysqli_real_escape_string($dbconnect, $WName);
      
  }else{
      
  die("<br><p ><h2>Name: only letters and whitespace allowed</h2></p>" . "<br><br><a href='CustomerOrder.html'><h3 style='color:green'>RETRY</h3></a>") ;
}
 
  $WQuantity= stripslashes($_POST['ChildQuantity']);
   $WQuantity = mysqli_real_escape_string($dbconnect, $WQuantity);
   
  $WMaterial=stripslashes($_POST['ChildMaterial']);
   $WMaterial = mysqli_real_escape_string($dbconnect, $WMaterial);
  
   $WDescription=stripslashes($_POST['ChildColor']);
   $WDescription = mysqli_real_escape_string($dbconnect, $WDescription);
   
   $WDrop=($_POST['datetime']);
    $WDrop = mysqli_real_escape_string($dbconnect, $WDrop);
    
  $WPick="";
   $WPick = mysqli_real_escape_string($dbconnect, $WPick);
   
  $WCost=$WQuantity*200;
     
  
    $Wcheck=$_POST['Whide'];
    $query    = "INSERT into `childwear` (Nat_ID, Name, Quantity, Material, Description, DropDate, PickDate,Cost,CLOTHES)
                     VALUES ('$WNat', '$WName', '$WQuantity','$WMaterial','$WDescription','$WDrop','$WPick','$WCost','$Wcheck')";
        $result   = mysqli_query($dbconnect, $query);
        if ($result) {
            
            #child wear table info
            $display = mysqli_query($dbconnect,"SELECT * FROM `childwear` WHERE Nat_ID='$WNat' ");
            
            while ($row = mysqli_fetch_array($display)) {
                echo "<br><br>";
           echo "
 
<div class='table-responsive'>
  <table class='table'>
    <thead>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Nation ID</th>
        <th scope='col'>Name</th>
        <th scope='col'>Quantity</th>
        <th scope='col'>Material</th>
        <th scope='col'>Description</th>
        <th scope='col'>DropDate</th>
        <th scope='col'>Pick up Date</th>
        <th scope='col'>Cost</th>
        <th scope='col'></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope='row'>1</th>
        <td>$row[Nat_ID]</td>
        <td>$row[Name]</td>
        <td>$row[Quantity]</td>
        <td>$row[Material]</td>
        <td>$row[Description]</td>
        <td>$row[DropDate]</td>
        <td>$row[PickDate]</td>
        <td>$row[Cost]</td>
        <td></td>
      </tr>
      
    </tbody>
  </table>
</div>

 " ;
       
            }
            #end of table info
            echo "<h6>Child Wear</h6>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  
                  </div>";
        }
    }
?>
