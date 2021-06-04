<?php

class RepairServiceModel{

	function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=sepdb', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    function view(){
        $sql = "select * from request";
        return RepairServiceModel::connect()->query($sql);;
    }

 
}
?>



