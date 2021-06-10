<?php
 require_once $_SERVER["DOCUMENT_ROOT"].'/dercs/BusinessServicesLayer/RepairServiceController/RepairServiceController.php';

//view request details page

$RequestID = $_GET['RequestID'];
$CustomerID = $_GET['custID'];

$request = new RepairServiceController();
$data = $request->viewRequest($RequestID);
$data2 = $request->getName($CustomerID);

if(isset($_POST['done'])){
     
    $request->updateRequest();
}
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
    </head>
<title>DERCS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.p {
            color: dodgerblue;
            font-size:20px;}

            .back {
            position: absolute;
            right :550;
            top:120;
            font-size:20px;
        }

        sc{
          position:absolute;
          right:20;
        }
        
        
            .box{
                border: 1px solid black;
            }
            button.a{
              background-color: white;
              border-color: red;
            }

html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 43px;
  bottom: 0;
  height: inherit;
}
.footer {
   
   left: 0;
   bottom: 0;
   width: 100%;

   color: black;
   text-align: center;
}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1"><img src="../../images/logo.jpg" width="25" height="25"> DERCS Computer Repair Shop</a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1" ></a>
    <a href="../../ApplicationLayer/Homepage/staffHomepage.php" class="w3-bar-item w3-button w3-theme-l1">Home</a>
    <a href="../../ApplicationLayer/Homepage/aboutUs.php" class="w3-bar-item w3-button w3-theme-l1">About Us</a>
    <a href="../../ApplicationLayer/Homepage/ourService.php" class="w3-bar-item w3-button w3-theme-l1" >Our Service</a>

    <a href="#" class="w3-bar-item w3-button w3-theme-l1" align="left">Sign In</a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1" align="left">Sign Up</a>
    
   
    
  </div>
</div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item"><b>Menu</b></h4>
  <a class="w3-bar-item w3-button w3-hover-black" href="../../ApplicationLayer/RepairServiceModule/RequestList.php">All Customer Request</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Tracking</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">My Profile</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px"; width="100%">

  <div class="w3-row w3-padding-64">
    <div class="w3-full w3-container">

<!--Start write the code here-->
        <table align="center" width="60%">
          <?php
            foreach($data2 as $row){
          ?>
          <tr>
            <td align="center" colspan="1"><h2>Customer Information</h2></td>
          </tr>
          <tr>
            <td>Name: </td>
            <td align="left"><?=$row['Cust_Name']?></td>
            <td></td>
          </tr>
          <tr>
            <td>Phone Number: </td>
            <td><?=$row['Cust_Phone']?></td>
            <td></td>
          </tr>
          <tr>
            <td>Address: </td>
            <td><?=$row['Cust_Address']?></td>
            <td></td>
          </tr>
          <?php } ?>
        </table>
        <table align="center" width="90%" >
          <form method="POST" action="">
    
          <?php
            foreach($data as $row){
          ?>
          <tr><td colspan="4"><hr style="height:2px;border-width:0;color:gray;background-color:gray"></td></tr>
         <tr>
            <td align="left" colspan="2"><h2>Request Details</h2></td>
          </tr>
          <tr>
           <td  >Request ID: </td>
            <td><?=$row['RequestID']?></td>
            
          </tr>


          <tr>
           <td ><br>Customer ID: </td>
           <td><br><?=$row['CustomerID']?></td>
          </tr>

          <tr>
           <td ><br>Request Time: </td>
           <td><br><?=$row['Request_Time']?></td>
           
          </tr>

          <tr>
           <td ><br>Defect Type: </td>
           <td><br><?=$row['Defect_Type']?></td>
          </tr>

              
          <tr>
           <td ><br>Status: </td>
                <td><br><?=$row['Request_Status']?>
                  </td>  
            </tr>
            <tr>
            <td  ><br>Reason : </td>
            <td><p><br><?=$row['Reason']?></p></td>
            
          </tr>

          <tr>
            <td ><br>Estimate cost : </td>
           <td><br>RM<?=$row['Estimate_Cost']?></td>
          </tr>
             

          <tr>        
           
            <td align="center" rowspan="3"><br><br><button type="button" onclick="window.location.href='../../ApplicationLayer/Homepage/staffHomepage.php'">CLOSE</button>
              <button type="button" onclick="window.location.href='editRequest.php?RequestID=<?=$row['RequestID']?>&custID=<?=$row['CustomerID']?>'" style="font-weight: bold;background-color: #80bfff">EDIT</button>
</td>
            
            
          </tr>

          
             </form>
            <?php } ?>

        </table>





<!-- end -->
      
</div >

    
  </div>


<!-- END MAIN -->
</div>
<div class="footer">
      <br><p align="center">DERCS Computer Repair Shop Sdn.Bhd &#169; All Rights Reserved</p></div>
    </div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
