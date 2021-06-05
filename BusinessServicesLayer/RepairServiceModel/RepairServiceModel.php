<?php

class RepairServiceModel{

    function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sepdb', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    function view(){
        $sql = "select * from request where Request_Status like '%In Progress%' OR Request_Status like '%Approved%' OR Request_Status like '%Pending%'  OR Request_Status like '%Cannot Be Repaired%' OR Request_Status like '%Done%'";
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
        $sql = "update request set Request_Status=:Request_Status, StaffID=:StaffID, Reason=:Reason, Delivery_Status=:Delivery_Status where RequestID=:RequestID";
        $args = [':RequestID'=>$this->RequestID,':Request_Status'=>$this->Request_Status,':StaffID'=>$this->StaffID,':Reason'=>$this->Reason,':Delivery_Status'=>$this->Delivery_Status];
        $stmt = RepairServiceModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function updateRequestStatus()
    {
        $sql = "update request set Request_Status=:Request_Status, Estimate_Cost=:Estimate_Cost, Reason=:Reason, Delivery_Status=:Delivery_Status where RequestID=:RequestID";
        $args = [':RequestID'=>$this->RequestID,':Request_Status'=>$this->Request_Status,':Estimate_Cost'=>$this->Estimate_Cost,':Reason'=>$this->Reason,':Delivery_Status'=>$this->Delivery_Status];
        $stmt = RepairServiceModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
    
    function viewToApproveTask(){
        $sql = "select * from request where Request_Status like '%Apply%'";
        return RepairServiceModel::connect()->query($sql);;
    }

    function viewInProgressTask(){
        $sql = "select * from request where Request_Status like '%In Progress%' OR Request_Status like '%Approved%'";
        return RepairServiceModel::connect()->query($sql);;
    }

    function viewPendingTask(){
        $sql = "select * from request where Request_Status like '%Pending%'";
        return RepairServiceModel::connect()->query($sql);;
    }
    function viewCannotRepairTask(){
        $sql = "select * from request where Request_Status like '%Cannot Be Repaired%'";
        return RepairServiceModel::connect()->query($sql);;
    }
    function viewDoneTask(){
        $sql = "select * from request where Request_Status like '%Done%'";
        return RepairServiceModel::connect()->query($sql);;
    }

 
}
?>



