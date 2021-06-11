<?php

require_once '../../libs/database.php';

class RequestServiceModel{
    //Attributes
    public $RequestID, $CustomerID, $ReqTime, $dtype, $brand, $symptom, $messages, $reqstat, $reason, $cost, $deliveryStatus;
    
    
    /*public static function checkRequestLatestID()
    {
        $query = "SELECT substr(RequestID,-4) as code FROM request order by RequestID DESC LIMIT 1";
        return DB::run($query);
    }*/
    
    //this model function is to add the new request to database
    function addRequest(){
        $sql = "insert into request(Request_Time, Device_Type, Device_Model, Defect_Type, Message, Request_Status, Reason, Estimate_Cost) values (:ReqTime, :dtype, :brand, :symptom, :messages, :reqstat, :reason, :cost)";

        $args = [':ReqTime'=>$this->ReqTime, ':dtype'=>$this->dtype, ':brand'=>$this->brand, ':symptom'=>$this->symptom, ':messages'=>$this->messages, ':reqstat'=>$this->reqstat, ':reason'=>$this->reason, ':cost'=>$this->cost];

        $stmt = DB::run($sql, $args);

        $count = $stmt->rowCount();
        return $count;
    }

//this model function is to update the requested repair service in database
    function editRequest(){
        $sql = "update request set Device_Model=:brand, Defect_Type=:symptom, Message=:messages where RequestID=:RequestID";

        $args = [':RequestID'=>$this->RequestID, ':brand'=>$this->brand, ':symptom'=>$this->symptom, ':messages'=>$this->messages];
        return DB::run($sql,$args);
    }

    //this model function is to display the requested repair service status list from database
    function viewmyRequest(){
        //$sql = "SELECT * FROM request JOIN delivery ON request.CustomerID=delivery.CustomerID WHERE CustomerID=:CustomerID";
        $sql = "SELECT * FROM customers JOIN delivery ON customers.CustomerID=delivery.CustomerID JOIN request ON request.RequestID=delivery.RequestID";
        $args = [':CustomerID'=>$this->CustomerID];
        return DB::run($sql, $args);
    }
        //$args = [':CustomerID'=>$this->CustomerID];
      

//this model function is to display the requested repair service status detail from database
     function viewRequest(){
        $sql = "select * from request where RequestID=:RequestID";
        $args = [':RequestID'=>$this->RequestID];
        return DB::run($sql,$args);
    }
//this model function is to delete the requested repair service from database
    function deletereq(){
        $sql = "delete from request where RequestID=:RequestID";
        $args = [':RequestID'=>$this->RequestID];
        return DB::run($sql,$args);
    }
}
?>
