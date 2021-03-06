<?php

class PaymentModel{

    public $Cust_Name,$Cust_PhoneNo,$Cust_Address,$PaymentType,$Time,$Device_Type,$Device_Model,$Defect_Type,$Estimate_Cost,$Request_Time;
    //connection to database
    function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sepdb', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
//adding to database
    function addInformation(){
        $sql = "insert into payment(Cust_Name, Cust_PhoneNo, Cust_Address, PaymentType, Time) values(:Cust_Name, :Cust_PhoneNo, :Cust_Address, :PaymentType, :Time)";

        $args = [':Cust_Name'=>$this->Cust_Name,':Cust_PhoneNo'=>$this->Cust_PhoneNo,':Cust_Address'=>$this->Cust_Address,':PaymentType'=>$this->PaymentType, ':Time'=>$this->Time];
        $stmt = PaymentModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;

    }
//display from db request
    function viewAll(){
         $sql = "select Device_Type,Device_Model,Defect_Type,Estimate_Cost from request";
         return PaymentModel::connect()->query($sql);;

    }
    //display from db request
     function viewAtas(){
         $sql = "select Request_Time,Estimate_Cost from request";
         return PaymentModel::connect()->query($sql);;

    }
//display from db request
    function viewBwh(){
         $sql = "select Device_Type,Device_Model,Defect_Type,Reason,Request_Time,Estimate_Cost from request";
         return PaymentModel::connect()->query($sql);;

    }
}

?>
