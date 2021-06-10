<?php

require_once '../../BusinessServicesLayer/RequestServiceModel/RequestServiceModel.php';

class RequestServiceController{

    //this function is to add new request repair service
    function addRequest(){
        $request = new RequestServiceModel();
        //$request->reqID = $this->generateRequestID();
        //$request->cID = $_SESSION['cID'];
        $request->ReqTime = date("Y-m-d h:i:sa");
        $request->dtype = $_POST['dtype']; 
        $request->brand = $_POST['brand'];       
        $request->symptom = $_POST['symptom'];
        $request->messages = $_POST['messages'];
        $request->reqstat = 'Apply';
        $request->reason = 'Pending';
        $request->cost = 0;
        $request->deliveryStatus = 'Apply';
    

        //$request->target_dir = "../RequestService/";

        if($request->addRequest() > 0){
            $message = "Request Success!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../RequestService/myRequest.php?CustomerID=".$_POST['CustomerID']."';
        </script>";
        }
    }
    
    //this function is to view the requested repair service status detail
    function viewCustRequest($RequestID){
        $request = new RequestServiceModel();
        $request->RequestID= $RequestID;
        return $request->viewRequest();
    }

    //this function is to view the requested repair service list
    function viewmyCustRequest($CustomerID){
        $request = new RequestServiceModel();
        $request->CustomerID = $CustomerID;
        return $request->viewmyRequest();
    }


    //this function is to edit the requested repair service
    function editCustRequest($RequestID){
        $request = new RequestServiceModel();
        $request->RequestID = $RequestID;
        //$request->cID= $_POST['cID'];
        $request->dtype = $_POST['dtype']; 
        $request->brand = $_POST['brand'];       
        $request->symptom = $_POST['symptom'];
        $request->messages = $_POST['messages'];

        
         if($request->editRequest()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
    window.location = '../RequestService/myRequest.php?CustomerID=".$_POST['CustomerID']."';
    </script>";
        }
    }
    

    //this function is to delete the requested repair service
    function deleteCustreq(){
        $request = new RequestServiceModel();
        $request->RequestID = $_POST['RequestID'];
        if($request->deletereq()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../RequestService/myRequest.php?CustomerID=".$_POST['CustomerID']."';</script>";
        }
    }
}
?>
