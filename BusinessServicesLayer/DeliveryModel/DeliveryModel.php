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

    function viewall(){
        $sql = "SELECT * FROM customers JOIN delivery ON customers.CustomerID=delivery.CustomerID JOIN request ON request.RequestID=delivery.RequestID";
        return DeliveryModel::connect()->query($sql);
    }

    function custviewall(){
        $sql = "SELECT * FROM customers JOIN delivery ON customers.CustomerID=delivery.CustomerID JOIN request ON request.RequestID=delivery.RequestID WHERE customers.CustomerID= delivery.CustomerID";
        $args = [':CustomerID'=>$this->CustomerID];
        $stmt = DeliveryModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;

    }

    function viewdel(){
        $sql = "SELECT * FROM request INNER JOIN customers ON request.CustomerID = customers.CustomerID WHERE request.Request_Status='done' OR request.Request_Status='cannot be repaired'";
        return DeliveryModel::connect()->query($sql);
    }

    function viewprocessing(){
          $sql =  "SELECT * FROM delivery INNER JOIN customers ON delivery.CustomerID = customers.CustomerID WHERE delivery.Delivery_Status LIKE '%on the way to pick up%' ";
        return DeliveryModel::connect()->query($sql);
        
    }

    function viewprocessingdel(){
          $sql =  "SELECT * FROM delivery INNER JOIN customers ON delivery.CustomerID = customers.CustomerID WHERE delivery.Delivery_Status='on the way to pick up' AND delivery.Delivery_Type='delivery' ";
        return DeliveryModel::connect()->query($sql);
        
    }

    function viewotwpickup(){
           $sql = "SELECT * FROM delivery INNER JOIN customers ON delivery.CustomerID = customers.CustomerID WHERE delivery.Delivery_Status LIKE '%Picked Up%' ";
        return DeliveryModel::connect()->query($sql);  
    }

    function viewotwpickupdel(){
           $sql = "SELECT * FROM delivery INNER JOIN customers ON delivery.CustomerID = customers.CustomerID WHERE delivery.Delivery_Status='picked up' AND delivery.Delivery_Type='delivery' ";
        return DeliveryModel::connect()->query($sql);
        
    }


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



    function pickedup()
    {
        $sql = "update delivery set Delivery_Status=:Delivery_Status WHERE DeliveryID=:DeliveryID";
        $args = [':Delivery_Status'=>$this->Delivery_Status, ':DeliveryID'=>$this->DeliveryID];
        $stmt = DeliveryModel::connect()->prepare($sql);
        $stmt->execute($args);  
    }

    function delivered()
    {
        $sql = "update delivery set Delivery_Status=:Delivery_Status WHERE DeliveryID=:DeliveryID";
        $args = [':Delivery_Status'=>$this->Delivery_Status, ':DeliveryID'=>$this->DeliveryID];
        $stmt = DeliveryModel::connect()->prepare($sql);
        $stmt->execute($args);  
    }

    

} 

?>