<?php
use DevExpress\Logify\LogifyAlertClient;

require_once(__DIR__.'/../Logify/LoadHelper.php');
spl_autoload_register(array("DevExpress\LoadHelper", "LoadModule"));

class LogifyAlertTestClient extends LogifyAlertClient {
    public function configureCall(){
        $this->configure();
    }
    public function getReport($customData, $attachments){
        return $this->get_ReportCollector(new Exception(), $customData, $attachments);
    }
}
?>