<?php

require_once '../../libs/database.php';

class RequestServiceModel{
    //Attributes
    public $reqID, $cID, $ReqTime, $dtype, $brand, $symptom, $messages, $reqstat, $reason, $cost, $deliveryStatus;
    
    
    /*public static function checkRequestLatestID()
    {
        $query = "SELECT substr(RequestID,-4) as code FROM request order by RequestID DESC LIMIT 1";
        return DB::run($query);
    }*/
    
    
    function addRequest(){
        $sql = "insert into request(Request_Time, Device_Type, Device_Model, Defect_Type, Message, Request_Status, Reason, Estimate_Cost, Delivery_Status ) values (:ReqTime, :dtype, :brand, :symptom, :messages, :reqstat, :reason, :cost, :deliveryStatus)";

        $args = [':ReqTime'=>$this->ReqTime, ':dtype'=>$this->dtype, ':brand'=>$this->brand, ':symptom'=>$this->symptom, ':messages'=>$this->messages, ':reqstat'=>$this->reqstat, ':reason'=>$this->reason, ':deliveryStatus'=>$this->deliveryStatus, ':cost'=>$this->cost];

        $stmt = DB::run($sql, $args);

        $count = $stmt->rowCount();
        return $count;
    }

    function editRequest(){
        $sql = "update request set Device_Type=:dtype, Device_Model=:brand, Defect_Type=:symptom, Message=:messages where RequestID=:reqID";

        $args = [':reqID' =>$this->reqID,':dtype'=>$this->dtype, ':brand'=>$this->brand, ':symptom'=>$this->symptom, ':messages'=>$this->messages];
        return DB::run($sql,$args);
    }

    function viewmyRequest(){
        $sql = "select * from request";
        //$args = [':cID'=>$this->cID];
        return DB::run($sql);
    }

     function viewRequest(){
        $sql = "select * from request where RequestID=:reqID";
        $args = [':reqID'=>$this->reqID];
        return DB::run($sql,$args);
    }

    function deletereq(){
        $sql = "delete from request where RequestID=:reqID";
        $args = [':reqID'=>$this->reqID];
        return DB::run($sql,$args);
    }
}
?>