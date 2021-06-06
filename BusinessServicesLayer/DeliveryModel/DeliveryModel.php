<?php

class DeliveryModel{

    function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sepdb', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    function view(){
        $sql = "select * FROM request INNER JOIN customers ON request.CustomerID = customers.CustomerID WHERE request.Request_Status LIKE '%approved%' ";
        return DeliveryModel::connect()->query($sql);
    }

    function viewprocessing(){
        $sql = "select * FROM request INNER JOIN customers ON request.CustomerID = customers.CustomerID WHERE request.Request_Status LIKE '%processing%' ";
        return DeliveryModel::connect()->query($sql);
    }

    function updatereqstatus()
    {
        $sql = "update request set Request_Status=:Request_Status WHERE RequestID=:RequestID";
        $args = [':Request_Status'=>$this->Request_Status, ':RequestID'=>$this->RequestID];
        $stmt = DeliveryModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;

    }

    function adddelivery()
    {
        $sql = "insert into delivery(CustomerID, RiderID, RequestID, Request_Status,  Delivery_Type, Delivery_Status, Delivery_Time) values (:CustomerID, :RiderID, :RequestID, :Request_Status, :Delivery_Type, :Delivery_Status, :Delivery_Time)";
        $args = [':CustomerID'=>$this->CustomerID, ':RiderID'=>$this->RiderID, ':RequestID'=>$this->RequestID, ':Request_Status'=>$this->Request_Status,':Delivery_Type'=>$this->Delivery_Type, ':Delivery_Status'=>$this->Delivery_Status, ':Delivery_Time'=>$this->Delivery_Time];
        $stmt = DeliveryModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;  
        $sql = "update delivery set Delivery_Status=:Delivery_Status WHERE DeliveryID=:DeliveryID";
        $args = [':Delivery_Status'=>$this->Delivery_Status, ':DeliveryID'=>$this->DeliveryID];
        $stmt = DeliveryModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    

} 

?>