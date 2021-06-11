<?php

 require_once '../../BusinessServicesLayer/PaymentController/PaymentController.php';

 $Information = new PaymentController();
    if(isset($_POST['addinfo'])){
        $Information->addinfo();
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
 .footer {
   
   left: 0;
   bottom: 0;
   width: 100%;

   color: black;
   text-align: center;
}
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
/* box css fill in information */
@import "bourbon";

body {
  background: #eee !important;  
}

.wrapper {  
  margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 780px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
  .checkbox {
    margin-bottom: 30px;
  }

  .checkbox {
    font-weight: normal;
  }

  .form-control {
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    @include box-sizing(border-box);

    &:focus {
      z-index: 2;
    }
  }

  input[type="text"] {
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
  }

  input[type="password"] {
    margin-bottom: 20px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
}


</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    
    <a href="#" class="w3-bar-item w3-button w3-theme-l1"><img src="../../images/logo.jpg" width="25" height="25"> DERCS Computer Repair Shop</a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1" ></a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1">Home</a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1">About Us</a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1" >Our Service</a>

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
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Customer Request</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Tracking</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">My Profile</a>
   <a class="w3-bar-item w3-button w3-hover-black" href="Invoice.php">Invoice</a>
  
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
       <h1 class="w3-text-teal">Fill in your information</h1>

<!--Start write the code here-->

<!--boxes fill in information-->
<form action=""  method="POST">
<div class="wrapper">
    <form class="form-signin">       
      <input type="text" class="form-control" name="Cust_Name" placeholder="Full name" required="" autofocus="" />
      <input type="text" class="form-control" name="Cust_PhoneNo" placeholder="phone number" required=""/>      
      
      <input type="text" class="form-control" name="Cust_Address" placeholder="Address" required="" autofocus="" />
      <br>
        <p>Please select your payment type:</p>

        <input type="radio" id="PayOnline" name="PaymentType" value="PayOnline">
        <label for="PayOnline">Online</label><br>

        <input type="radio" id="PayOnDelivery" name="PaymentType" value="PayOnDelivery">
        <label for="PayOnDelivery">Delivery</label>

        <br><br><br>
        <!-- button utk prevous page-->  
        <button class="w3-button w3-green" type="submit" name="addinfo">Submit</button>
  <!-- button utk prevous page-->    
      <button class="w3-button w3-red" type="submit">Back</button>  

    </form>
  </div>
  </form>
  <p style="color: red; text-align: right;">**Note</p>
  <p style="color: red;text-align: right;">**PLEASE CLICK ON SUBMIT BUTTON FIRST BEFORE CLICK ONE OF THE BUTTON BELOW**</p>
  <!-- button utk online -->
   <p align="right">   
   <input class="w3-button w3-green" type="button" name="Online Payment" align="center" onclick="location.href='Paypal.php'" value="Online Payment">
    
      
<!-- button utk delivery -->
 
      <a href="#home"><button class="w3-button w3-red" type="submit"  onclick="myFunction()">Delivery Payment</button></a>
      </p>  

<!-- alert messages for delivery --> 
  
 <script>
function myFunction() {
  alert("Your item will be deliver soon!");
}
</script>
<!-- alert messages for online Payment --> 

<script>
function myOnlineP() {
  let myOnlineP = confirm("Are you sure to proceed with the payment online?");
        if (myOnlineP) {
          alert("you will be redirect to the payment");
        } else {
          alert("canceled");
        }
}
</script>

<!-- end -->

        <div class="footer">
      <p>DERCS Computer Repair Shop Sdn.Bhd &#169; All Rights Reserved</p></div>

      
    </div>
    
  </div>


<!-- END MAIN -->
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