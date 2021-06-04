<?php

class PaymentModel{

    public $Cust_Name,$Cust_PhoneNo,$Cust_Address,$PaymentType,$Time;
    
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
}

?>