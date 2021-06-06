<?php

class PaymentModel{

    public $Cust_Name,$Cust_PhoneNo,$Cust_Address,$PaymentType,$Time,$Device_Type,$Device_Model,$Defect_Type,$Estimate_Cost,$Request_Time;
    
    function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sepdb', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    function addInformation(){
        $sql = "insert into payment(Cust_Name, Cust_PhoneNo, Cust_Address, PaymentType, Time) values(:Cust_Name, :Cust_PhoneNo, :Cust_Address, :PaymentType, :Time)";

        $args = [':Cust_Name'=>$this->Cust_Name,':Cust_PhoneNo'=>$this->Cust_PhoneNo,':Cust_Address'=>$this->Cust_Address,':PaymentType'=>$this->PaymentType, ':Time'=>$this->Time];
        $stmt = PaymentModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;

    }

    function viewAll(){
         $sql = "select Device_Type,Device_Model,Defect_Type,Estimate_Cost from request";
         return PaymentModel::connect()->query($sql);;

    }
     function viewAtas(){
         $sql = "select Request_Time,Estimate_Cost from request";
         return PaymentModel::connect()->query($sql);;

    }

    function viewBwh(){
         $sql = "select Device_Type,Device_Model,Defect_Type,Reason,Request_Time,Estimate_Cost from request";
         return PaymentModel::connect()->query($sql);;

    }
}

?>
