<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dercs/BusinessServicesLayer/DeliveryModel/DeliveryModel.php';
class DeliveryController{
    
   
    function view(){
        $request = new DeliveryModel();
        return $request->view();
    }

    function adddelivery()
    {
        $delivery = new DeliveryModel();
        $delivery->CustomerID = $_POST['CustomerID'];
        $delivery->RiderID = $_POST['RiderID'];
        $delivery->RequestID = $_POST['RequestID'];
        $delivery->Request_Status = $_POST['Request_Status'];
        $delivery->Delivery_Type = $_POST['Delivery_Type'];
        $delivery->Delivery_Status = $_POST['Delivery_Status'];
        $delivery->Delivery_Time = $_POST['Delivery_Time'];
        $delivery->adddelivery();
        echo "<script>alert('Added Successfully')</script>";

    }
}
?>