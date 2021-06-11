<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dercs/BusinessServicesLayer/RepairServiceModel/RepairServiceModel.php';
class RepairServiceController{
    
   // controller
    function viewAllRequest(){//to display all request list except request that habe not accept
        $request = new RepairServiceModel();
        return $request->viewAll();
    }

    function delete(){// to delete request from database
        $data = new RepairServiceModel();
        $data->RequestID = $_POST['RequestID'];
        if($data->deleteRequest()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/RepairServiceModule/RequestList.php';</script>";
        }
    }

    function viewRequest($RequestID){//display request details 
        $request = new RepairServiceModel();
        $request->RequestID = $RequestID;
        return $request->viewRequest();
    }

    function getName($CustomerID){//get customer details
        $request = new RepairServiceModel();
        $request->CustomerID = $CustomerID;
        return $request->getCustName();
    }

    function editStatus(){//edit status when staff approve request
        $request = new RepairServiceModel();
        $request->RequestID = $_POST['RequestID'];
        $request->Request_Status = $_POST['Request_Status'];
        
        $request->Reason = $_POST['Reason'];
        $request->StaffID = $_POST['StaffID'];
        if($request->updateStatus()){
        echo "<script type='text/javascript'>;
        window.location = '../../ApplicationLayer/RepairServiceModule/RequestList.php';</script>";
        }
    }

    function updateRequest(){//update status when staff update status, cost and , reason in view request details page
        $request = new RepairServiceModel();
        $request->RequestID = $_POST['RequestID'];
        $request->Request_Status = $_POST['Request_Status'];
        
        $request->Reason = $_POST['Reason'];
        $request->Estimate_Cost = $_POST['Estimate_Cost'];
       
        
        if($request->updateRequestStatus()){
           $message = "Success Updated!";
        echo "<script type='text/javascript'>alert('$message');
       
        window.location = '../../ApplicationLayer/RepairServiceModule/RequestList.php';</script>";
        }
    }

    function getToApproveTask(){//to display to approve request list
        $item = new RepairServiceModel();
        return $item->viewToApproveTask();
    }

    function getInProgressTask(){//to display in progress request list
        $item = new RepairServiceModel();
        return $item->viewInProgressTask();
    }

    function getPendingTask(){//to display pending request list
        $item = new RepairServiceModel();
        return $item->viewPendingTask();
    }

    function getCannotRepairTask(){//to display cannot repair request list
        $item = new RepairServiceModel();
        return $item->viewCannotRepairTask();
    }

    function getDoneTask(){ //to display to complete request list
        $item = new RepairServiceModel();
        return $item->viewDoneTask();
    }




    
    
}
?>
