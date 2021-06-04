<?php

 require_once '../../BusinessServicesLayer/PaymentModel/PaymentModel.php';

 class PaymentController{

   
    function addinfo(){
        $Information = new PaymentModel();
        $Information->Cust_Name = $_POST['Cust_Name'];
        $Information->Cust_PhoneNo = $_POST['Cust_PhoneNo'];
        $Information->Cust_Address = $_POST['Cust_Address'];
        $Information->PaymentType = $_POST['PaymentType'];
        $Information->Time = $_POST['Time'];
        if($Information->addInformation()){
            $message = "Success Insert!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../../ApplicationLayer/managePayment/PaymentInformation.php';</script>";
        }
    }
}

?>