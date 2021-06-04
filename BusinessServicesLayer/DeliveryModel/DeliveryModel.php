<?php
require_once '/xampp/htdocs/dercs/libs/database.php';

class DeliveryModel
{
    public $RequestID, $CustomerID, $Cust_Name, $Cust_Address, $DeliveryID, $RiderID, $Delivery_Status, $Delivery_Date, $Delivery_Time, $Delivery_Remarks;

    function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=dercs', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    function viewalldelivery(){
        $sql = "select * from delivery";
        return DB::run($sql);
    }

} 

?>