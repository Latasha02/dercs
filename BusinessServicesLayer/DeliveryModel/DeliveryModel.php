<?php

class DeliveryModel{

//connecting databse
    function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sepdb', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

//rider view all approved request to pick up
    function view(){
        $sql = "select * FROM request INNER JOIN customers ON request.CustomerID = customers.CustomerID WHERE request.Request_Status LIKE '%approved%' ";
        return DeliveryModel::connect()->query($sql);
    }
//view all delivery has been made
    function viewall(){
        $sql = "SELECT * FROM customers JOIN delivery ON customers.CustomerID=delivery.CustomerID JOIN request ON request.RequestID=delivery.RequestID";
        return DeliveryModel::connect()->query($sql);
    }
//custview all delivery sttaus
    function custviewall(){
        $sql = "SELECT * FROM customers JOIN delivery ON customers.CustomerID=delivery.CustomerID JOIN request ON request.RequestID=delivery.RequestID WHERE customers.CustomerID= delivery.CustomerID";
        $args = [':CustomerID'=>$this->CustomerID];
        $stmt = DeliveryModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;

    }
//rider can request which has been reapired or cannot be repaired
    function viewdel(){
        $sql = "SELECT * FROM request INNER JOIN customers ON request.CustomerID = customers.CustomerID WHERE request.Request_Status='done' OR request.Request_Status='cannot be repaired'";
        return DeliveryModel::connect()->query($sql);
    }
//rider view delivery which status is on the way to pick up when delivery type is pick up
    function viewprocessing(){
          $sql =  "SELECT * FROM delivery INNER JOIN customers ON delivery.CustomerID = customers.CustomerID WHERE delivery.Delivery_Status LIKE '%on the way to pick up%' ";
        return DeliveryModel::connect()->query($sql);
        
    }
//rider view delivery which status is on the way to pick up when delivery type is delivery
    function viewprocessingdel(){
          $sql =  "SELECT * FROM delivery INNER JOIN customers ON delivery.CustomerID = customers.CustomerID WHERE delivery.Delivery_Status='on the way to pick up' AND delivery.Delivery_Type='delivery' ";
        return DeliveryModel::connect()->query($sql);
        
    }
//rider view delivery which status is pickedup when delivery type is pick up
    function viewotwpickup(){
           $sql = "SELECT * FROM delivery INNER JOIN customers ON delivery.CustomerID = customers.CustomerID WHERE delivery.Delivery_Status LIKE '%Picked Up%' ";
        return DeliveryModel::connect()->query($sql);  
    }
//rider view delivery which status is pickedup when delivery type is delivery
    function viewotwpickupdel(){
           $sql = "SELECT * FROM delivery INNER JOIN customers ON delivery.CustomerID = customers.CustomerID WHERE delivery.Delivery_Status='picked up' AND delivery.Delivery_Type='delivery' ";
        return DeliveryModel::connect()->query($sql);
        
    }

//insert into delivery table for new request tracking and update request status and reason accordingly
    function adddelivery()
    {
        $sql = "insert into delivery(CustomerID, RiderID, RequestID, Delivery_Type, Delivery_Status, Delivery_Time) values (:CustomerID, :RiderID, :RequestID, :Delivery_Type, :Delivery_Status, :Delivery_Time)";
        $args = [':CustomerID'=>$this->CustomerID, ':RiderID'=>$this->RiderID, ':RequestID'=>$this->RequestID, ':Delivery_Type'=>$this->Delivery_Type, ':Delivery_Status'=>$this->Delivery_Status, ':Delivery_Time'=>$this->Delivery_Time];
        $stmt = DeliveryModel::connect()->prepare($sql);
        $stmt->execute($args);

        $sql1 = "update request set Request_Status=:Request_Status, Reason=:Reason WHERE RequestID=:RequestID";
        $args1 = [':Request_Status'=>$this->Request_Status,':Reason'=>$this->Reason, ':RequestID'=>$this->RequestID];
        $stmt1 = DeliveryModel::connect()->prepare($sql1);
        $stmt1->execute($args1);
    }


//rider update status item has been picked up
    function pickedup()
    {
        $sql = "update delivery set Delivery_Status=:Delivery_Status WHERE DeliveryID=:DeliveryID";
        $args = [':Delivery_Status'=>$this->Delivery_Status, ':DeliveryID'=>$this->DeliveryID];
        $stmt = DeliveryModel::connect()->prepare($sql);
        $stmt->execute($args);  
    }
//rider update status item has been delivered
    function delivered()
    {
        $sql = "update delivery set Delivery_Status=:Delivery_Status WHERE DeliveryID=:DeliveryID";
        $args = [':Delivery_Status'=>$this->Delivery_Status, ':DeliveryID'=>$this->DeliveryID];
        $stmt = DeliveryModel::connect()->prepare($sql);
        $stmt->execute($args);  
    }

    

} 

?>