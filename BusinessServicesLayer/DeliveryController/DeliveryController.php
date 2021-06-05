<?php 
require_once '\xampp\htdocs\dercs\BusinessServicesLayer\DeliveryModel\DeliveryModel.php';

class DeliveryController
{
	function viewalldelivery(){
        $delivery = new DeliveryModel();
        return $delivery->viewalldelivery();
    }

    function viewallrequest(){
        $delivery = new DeliveryModel();
        return $delivery->viewallrequest();
    }
}

?>