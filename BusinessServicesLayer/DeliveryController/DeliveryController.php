<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dercs/BusinessServicesLayer/DeliveryModel/DeliveryModel.php';
class DeliveryController{
    
   
    function view(){
        $del = new DeliveryModel();
        return $del->view();
    }

    function viewdel(){
        $del = new DeliveryModel();
        return $del->viewdel();
    }

    function viewprocessing(){
        $del = new DeliveryModel();
        return $del->viewprocessing();
    }  

    function viewotwpickup(){
        $del = new DeliveryModel();
        return $del->viewotwpickup();
    }

    function adddelivery()
    {
        $del = new DeliveryModel();
        $del->CustomerID = $_POST['CustomerID'];
        $del->RiderID = $_POST['RiderID'];
        $del->RequestID = $_POST['RequestID'];
        $del->Delivery_Type = $_POST['Delivery_Type'];
        $del->Delivery_Status = $_POST['Delivery_Status'];
        $del->Delivery_Time = $_POST['Delivery_Time'];
        $del->Request_Status = $_POST['Request_Status'];
        return $del->adddelivery(); 
    }

    function acceptdelivery()
    {
        $del = new DeliveryModel();
        $del->RequestID = $_POST['RequestID'];
        $del->Delivery_Status = $_POST['Delivery_Status'];
        $del->Delivery_Type = $_POST['Delivery_Type'];
        $del->Request_Status = $_POST['Request_Status'];
        return $del->acceptdelivery(); 
    }

    function pickedup()
    {
        $del = new DeliveryModel();
        $del->DeliveryID = $_POST['DeliveryID'];
        $del->Delivery_Status = $_POST['Delivery_Status'];
        return $del->pickedup(); 
    }

    function delivered()
    {
        $del = new DeliveryModel();
        $del->DeliveryID = $_POST['DeliveryID'];
        $del->Delivery_Status = $_POST['Delivery_Status'];
        return $del->delivered(); 
    }

    
}
?>