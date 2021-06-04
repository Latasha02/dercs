<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dercs/BusinessServicesLayer/RepairServiceModel/RepairServiceModel.php';
class RepairServiceController{
    
   
    function view(){
        $request = new RepairServiceModel();
        return $request->view();
    }
    
    
}
?>
