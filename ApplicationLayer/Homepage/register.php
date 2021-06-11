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
<title>SIGN UP</title>
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
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    
    <a href="#" class="w3-bar-item w3-button w3-theme-l1"><img src="../../Images/logo.jpg" width="25" height="25"> DERCS Computer Repair Shop</a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1" ></a>
    <a href="../../ApplicationLayer/Homepage/staffHomepage.php" class="w3-bar-item w3-button w3-theme-l1">Home</a>
    <a href="../../ApplicationLayer/Homepage/aboutUs.php" class="w3-bar-item w3-button w3-theme-l1">About Us</a>
    <a href="../../ApplicationLayer/Homepage/ourService.php" class="w3-bar-item w3-button w3-theme-l1" >Our Service</a>

    <a href="../../ApplicationLayer/Homepage/signin.php" class="w3-bar-item w3-button w3-theme-l1" align="left">Sign In</a>
    <a href="../../ApplicationLayer/Homepage/register.php" class="w3-bar-item w3-button w3-theme-l1" align="left">Sign Up</a>
   
    
  </div>
</div>

<!--Start write the code here-->

<div class="register">

  <table id="detail" height="60%" width="100%"  align="center">
  <br><br>
  <form action="" method="POST" id="register" class="input-register">
    
    <tr>
      <td align="center" colspan="4" height="5%">
        <h1> BECOME OUR MEMBER NOW </h1></td>
    <br><br>
    </tr>
 
    <tr>
      <td align="center" colspan="4" height="5%">
        <label for="username"><b>Full Name</b></label>
	<input type="text" class="input-reg" placeholder="Enter Full Name" name="username" id="username" required>
    <br><br>
    </tr>
    <tr>
        <td align="center" colspan="4" height="5%">
        <label for="userID"><b>Username</b></label>
        <input type="text" class="input-reg" placeholder="Create Username" name="userID" id="userID" required>
        <br><br>
    </tr>
    <tr>
        <td align="center" colspan="4" height="5%">
        <label for="userpass"><b>Password</b></label>
        <input type="password" class="input-reg" placeholder="Enter Password" name="userpass" id="userpass" required>
        <br><br>
    </tr>
    <tr>
        <td align="center" colspan="4" height="5%">
        <label for="address"><b>Address</b></label>
        <input type="text" class="input-reg" placeholder="Full Address" id="address" name="address" required>
        <br><br>
    </tr>

    <a href="manage-admin.php"><td align="center" colspan="4" height="5%">
        <button type="submit" class="reg-btn" name="submit" value="Add User"><b>REGISTER</b></button>
            </a>
        </form>
      </table>
    </div>
  
  <table id="scd_detail" height="15%" width="80%" border="1" align="center">
    <hr>
    <tr style="font-size: 18px">
      <td colspan="4" align="center"> We believe in providing the best service to you to solve all your troubles and provide convenience. </td>
    </tr>
  </table>





<!-- end -->

        <div class="footer">
      <p align="center"><br><br>DERCS Computer Repair Shop Sdn.Bhd &#169; All Rights Reserved</p></div>

      
    </div>
    
  </div>


<!-- END MAIN -->
</div>

<script>

</script>

</body>
</html>

<?php
 //Process the value from form to database

 if(isset($_POST['submit']))
 {
   $username = $_POST['username'];
   $userID = $_POST['userID'];
   $userpass = ($_POST['userpass']);
   $address = $_POST['address'];

   $sql = "INSERT INTO customers SET username = '$username', userID = '$userID', userpass = '$userpass', address = '$address'";

   $res = mysqli_query($conn, $sql) or die;

   if($res==TRUE)
   {
       $_SESSION['add'] = "Registered Successfully";
       header('location:'.SITEURL.'Homepage/signin.php');
   }
   else
   {
	   $_SESSION['add'] = "Failed To Register";
	   header('location:'.SITEURL.'Homepage/register.php');
   }
 }

?>