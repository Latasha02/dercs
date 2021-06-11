<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dercs/BusinessServicesLayer/DeliveryModel/DeliveryModel.php';
class DeliveryController{
    
   //rider view all approved request to pick up
    function view(){
        $del = new DeliveryModel();
        return $del->view();
    }
//view all delivery has been made
    function viewall(){
        $del = new DeliveryModel();
        return $del->viewall();
    }
//custview all delivery sttaus
    function custviewall($CustomerID){
        $del = new DeliveryModel();
        $del->CustomerID = $_POST['CustomerID'];
        return $del->custviewall();
    }
//rider can request which has been reapired or cannot be repaired
    function viewdel(){
        $del = new DeliveryModel();
        return $del->viewdel();
    }
//rider view delivery which status is on the way to pick up when delivery type is pick up
    function viewprocessing(){
        $del = new DeliveryModel();
        return $del->viewprocessing();
    }  
//rider view delivery which status is on the way to pick up when delivery type is delivery
    function viewprocessingdel(){
        $del = new DeliveryModel();
        return $del->viewprocessingdel();
    } 
//rider view delivery which status is pickedup when delivery type is pick up
    function viewotwpickup(){
        $del = new DeliveryModel();
        return $del->viewotwpickup();
    }
//rider view delivery which status is pickedup when delivery type is delivery
    function viewotwpickupdel(){
        $del = new DeliveryModel();
        return $del->viewotwpickupdel();
    }
//insert into delivery table for new request tracking and update request status and reason accordingly
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
        $del->Reason = $_POST['Reason'];
        return $del->adddelivery(); 
    }
//rider update status item has been picked up
    function pickedup()
    {
        $del = new DeliveryModel();
        $del->DeliveryID = $_POST['DeliveryID'];
        $del->Delivery_Status = $_POST['Delivery_Status'];
        return $del->pickedup(); 
    }
//rider update status item has been delivered
    function delivered()
    {
        $del = new DeliveryModel();
        $del->DeliveryID = $_POST['DeliveryID'];
        $del->Delivery_Status = $_POST['Delivery_Status'];
        return $del->delivered(); 
    }

    
}
?>