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
/* image position */
* {
  box-sizing: border-box;
}

.column {
  float: center;
  width: 43.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

/* end image position */
p {text-align: center;}


</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    
    <a href="#" class="w3-bar-item w3-button w3-theme-l1"><img src="../../images/logo.jpg" width="25" height="25"> DERCS Computer Repair Shop</a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1" ></a>
    <a href="/GitHub/dercs/ApplicationLayer/Homepage/custHomePage.php" class="w3-bar-item w3-button w3-theme-l1">Home</a>
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
      <h1 class="w3-text-teal">Choose you method online payment</h1>
      <br><br><br>

<!--Start write the code here-->

 
<!-- Set up a container element for the button -->
    <div align="center" id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <script>


        
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.01'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>
    
  <!-- Cart Content End -->





<!-- end -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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