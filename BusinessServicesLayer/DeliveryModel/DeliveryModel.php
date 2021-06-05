<?php
require_once '/xampp/htdocs/dercs/libs/database.php';

class DeliveryModel
{
    public $RequestID, $Device_Model, $Device_Type, $CustomerID, $Cust_Name, $Cust_Address, $DeliveryID, $RiderID, $Delivery_Status, $Delivery_Time, $Delivery_Remarks;

    function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=dercs', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    function viewalldelivery(){
        $sql = "select * from delivery ORDER BY Delivery_Time DESC LIMIT 1";
        return DB::run($sql);
    }

    function viewallrequest(){
        $sql = "select * from  request";
        return DB::run($sql);
    }


} 

?>