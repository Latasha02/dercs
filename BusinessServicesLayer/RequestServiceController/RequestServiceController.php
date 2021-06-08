<?php

require_once '../../BusinessServicesLayer/RequestServiceModel/RequestServiceModel.php';

class RequestServiceController{

    
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
        window.location = '../RequestService/myRequest.php';</script>";
        }
    }
    
    function viewRequest($reqID){
        $request = new RequestServiceModel();
        $request->reqID= $reqID;
        return $request->viewRequest();
    }

    function viewmyRequest(){
        $request = new RequestServiceModel();
        //$request->cID= $cID;
        return $request->viewmyRequest();
    }

    function editRequest(){
        $request = new RequestServiceModel();
        //$request->reqID = $_POST['reqID'];
         $request->dtype = $_POST['dtype']; 
        $request->brand = $_POST['brand'];       
        $request->symptom = $_POST['symptom'];
        $request->messages = $_POST['messages'];

        
         if($request->editRequest()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
    window.location = '../RequestService/myRequest.php?reqID=".$_POST['reqID']."';
    </script>";
        }
    }
    

    function deletereq(){
        $request = new RequestServiceModel();
        $request->reqID = $_POST['reqID'];
        if($request->deletereq()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../RequestService/myRequest.php';</script>";
        }
    }
}
?>
