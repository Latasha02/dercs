<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dercs/BusinessServicesLayer/RepairServiceModel/RepairServiceModel.php';
class RepairServiceController{
    
   
    function view(){
        $request = new RepairServiceModel();
        return $request->view();
    }

    function delete(){
        $data = new RepairServiceModel();
        $data->RequestID = $_POST['RequestID'];
        if($data->deleteRequest()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/RepairServiceModule/RequestList.php';</script>";
        }
    }

    function viewRequest($RequestID){
        $request = new RepairServiceModel();
        $request->RequestID = $RequestID;
        return $request->viewRequest();
    }

    function getName($CustomerID){
        $request = new RepairServiceModel();
        $request->CustomerID = $CustomerID;
        return $request->getCustName();
    }

    function editStatus(){
        $request = new RepairServiceModel();
        $request->RequestID = $_POST['RequestID'];
        $request->Request_Status = $_POST['Request_Status'];
        $request->Delivery_Status = $_POST['Delivery_Status'];
        $request->Reason = $_POST['Reason'];
        $request->StaffID = $_POST['StaffID'];
        if($request->updateStatus()){
        echo "<script type='text/javascript'>;
        window.location = '../../ApplicationLayer/RepairServiceModule/RequestList.php';</script>";
        }
    }

    function updateRequest(){
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


    
    
}
?>
