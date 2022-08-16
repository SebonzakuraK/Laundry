

  <!DOCTYPE html>
 <html>
 <head>
 <link rel='stylesheet' href='public_html/Bootstrap.css'>
        <link rel='stylesheet' href='public_html/Icons.css'>
        <link  href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'  rel='stylesheet'/>
        <style>
            body{
               height: 100vh;
                background-image:url(Img/anime.jpg);
                text-align: center;
                  }   
                  .bg-opacity{
                      height: 100vh;
                      background-color: rgba(255,254,150,0.55);
                      background-size: cover; 
                      
                  }
            .identity{
      width:auto;
    font-family: cursive;
    font-weight: bold;
    color: #fff;
    background-color: #495057;
    word-spacing: 50px;
    margin-top: 0px;
  text-align: center;
  text-transform: capitalize;
  font-size: 20px;
            }
           
            
        </style>
 </head>

 <body >
     <div class='bg-opacity'>
         
     <?php
     require('CustomerCon.php');
     if(isset($_POST['QuerySearch'])){
         $SearchId=$_POST['Search'];
         
         
     $display=mysqli_query($dbconnect,"SELECT * FROM `shirts_blouses` WHERE Nat_ID='$SearchId' UNION SELECT * FROM `trousers_shorts` WHERE NAT_ID='$SearchId' 
             UNION SELECT * FROM `jackets_hoodies` WHERE NAT_ID='$SearchId' UNION SELECT * FROM `curtains_carpets` WHERE NAT_ID='$SearchId' UNION SELECT * FROM `official_suits` WHERE NAT_ID='$SearchId'
                     UNION SELECT * FROM `childwear` WHERE NAT_ID='$SearchId'
              ");
     }
     if($row = mysqli_fetch_array($display)){
     echo "
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
<!--end of navbar-->    

<div class='table-responsive'>
       <fieldset class='identity'>
ID: $row[Nat_ID]
    <br>
Name: $row[Name]
</fieldset>
  <table class='table'>
    <thead>
      <tr>
       <th scope='col'>Clothe Type</th>
        <th scope='col'>Quantity</th>
        <th scope='col'>Material</th>
        <th scope='col'>Description</th>
        <th scope='col'>DropDate</th>
        <th scope='col'>Pick up Date</th>
        <th scope='col'>Cost</th>
        <th scope='col'></th>
      </tr>
    </thead>";
     }
            while ($row = mysqli_fetch_array($display)) {
                echo "
    <tbody>
      <tr>
        <td>$row[CLOTHES]</td>
        <td>$row[Quantity]</td>
        <td>$row[Material]</td>
        <td>$row[Description]</td>
        <td>$row[DropDate]</td>
        <td>$row[PickDate]</td>
        <td>$row[Cost]</td>
        <td></td>
      </tr>
      
    </tbody>
  
";
                     }
                     echo "</table>

</div>";
           
     ?>
     
     </div>
   <script  type="text/javascript"  src="public_html/MDB.js"></script>

</body>
</html>
