<?php

class RepairServiceModel{

    function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sepdb', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    function view(){
        $sql = "select * from request";
        return RepairServiceModel::connect()->query($sql);;
    }

    function deleteRequest(){
        $sql = "delete from request where RequestID=:RequestID";
        $args = [':RequestID'=>$this->RequestID];
        $stmt = RepairServiceModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function viewRequest(){
        $sql = "select * from request where RequestID=:RequestID";
        $args = [':RequestID'=>$this->RequestID];
        $stmt = RepairServiceModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function getCustName(){
        $sql = "select * from customers where CustomerID=:CustomerID";
        $args = [':CustomerID'=>$this->CustomerID];
        $stmt = RepairServiceModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function updateStatus()
    {
        $sql = "update request set Request_Status=:Request_Status, StaffID=:StaffID, Reason=:Reason where RequestID=:RequestID";
        $args = [':RequestID'=>$this->RequestID,':Request_Status'=>$this->Request_Status,':StaffID'=>$this->StaffID,':Reason'=>$this->Reason];
        $stmt = RepairServiceModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function updateRequestStatus()
    {
        $sql = "update request set Request_Status=:Request_Status, Estimate_Cost=:Estimate_Cost, Reason=:Reason where RequestID=:RequestID";
        $args = [':RequestID'=>$this->RequestID,':Request_Status'=>$this->Request_Status,':Estimate_Cost'=>$this->Estimate_Cost,':Reason'=>$this->Reason];
        $stmt = RepairServiceModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
    

 
}
?>



