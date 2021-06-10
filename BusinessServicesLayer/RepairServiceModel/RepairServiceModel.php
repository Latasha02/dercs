<?php

class RepairServiceModel{

    function connect()// to connect with db
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sepdb', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    function viewAll(){ //to view all request list
        $sql = "select * from request where Request_Status like '%In Progress%' OR Request_Status like '%Approved%' OR Request_Status like '%Pending%'  OR Request_Status like '%Cannot Be Repaired%' OR Request_Status like '%Done%' OR Request_Status like '%Processing%' ";
        return RepairServiceModel::connect()->query($sql);;
    }

    function deleteRequest(){ //delete request 
        $sql = "delete from request where RequestID=:RequestID";
        $args = [':RequestID'=>$this->RequestID];
        $stmt = RepairServiceModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function viewRequest(){// view all details of request
        $sql = "select * from request where RequestID=:RequestID";
        $args = [':RequestID'=>$this->RequestID];
        $stmt = RepairServiceModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function getCustName(){// get customer details
        $sql = "select * from customers where CustomerID=:CustomerID";
        $args = [':CustomerID'=>$this->CustomerID];
        $stmt = RepairServiceModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function updateStatus()//update status after staff approve the request
    {
        $sql = "update request set Request_Status=:Request_Status, StaffID=:StaffID, Reason=:Reason where RequestID=:RequestID";
        $args = [':RequestID'=>$this->RequestID,':Request_Status'=>$this->Request_Status,':StaffID'=>$this->StaffID,':Reason'=>$this->Reason];
        $stmt = RepairServiceModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function updateRequestStatus()//update status, reason and cost when staff update status
    {
        $sql = "update request set Request_Status=:Request_Status, Estimate_Cost=:Estimate_Cost, Reason=:Reason where RequestID=:RequestID";
        $args = [':RequestID'=>$this->RequestID,':Request_Status'=>$this->Request_Status,':Estimate_Cost'=>$this->Estimate_Cost,':Reason'=>$this->Reason];
        $stmt = RepairServiceModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
    
    function viewToApproveTask(){//get all to  approve task
        $sql = "select * from request where Request_Status like '%Apply%'";
        return RepairServiceModel::connect()->query($sql);;
    }

    function viewInProgressTask(){// retrieve in progress and approve task
        $sql = "select * from request where Request_Status like '%In Progress%' OR Request_Status like '%Approved%' OR Request_Status like '%Processing%' ";
        return RepairServiceModel::connect()->query($sql);;
    }

    function viewPendingTask(){ //retrieve pending list
        $sql = "select * from request where Request_Status like '%Pending%'";
        return RepairServiceModel::connect()->query($sql);;
    }
    function viewCannotRepairTask(){//get cannot repair list
        $sql = "select * from request where Request_Status like '%Cannot Be Repaired%'";
        return RepairServiceModel::connect()->query($sql);;
    }
    function viewDoneTask(){// to  get list of request with status id done.
        $sql = "select * from request where Request_Status like '%Done%'";
        return RepairServiceModel::connect()->query($sql);;
    }

 
}
?>



