<?php
namespace DevExpress\Logify\Collectors;
use DevExpress\Logify\Core\iCollector;

require_once(__DIR__.'/../Core/Interfaces.php');
require_once(__DIR__.'/Variables.php');

class GlobalVariablesCollector implements iCollector {
	private $collectors = array();
    private $permissions;

	function __construct($permissions) {
        $this->permissions = $permissions;
        $this->PlugCollector('get', $_GET);
		$this->PlugCollector('post', $_POST);
		$this->PlugCollector('cookie', $_COOKIE);
		$this->PlugCollector('files', $_FILES);
		$this->PlugCollector('enviroment', $_ENV);
		$this->PlugCollector('request', $_REQUEST);
		$this->PlugCollector('server', $_SERVER);
	}
    private function PlugCollector($name, $variables){
        if($this->permissions[$name]){
            $this->collectors[] = new VariablesCollector($name, $variables);
        }
    }
	#region iCollector Members

	function DataName()	{
		return 'globals';
	}

	function CollectData()	{
		$result = array();
		foreach($this->collectors as $collector) {
			if($collector->HaveData()) {
				$result[$collector->DataName()] = $collector->CollectData();
			}
		}
		return $result;
	}

	#endregion
}
?>