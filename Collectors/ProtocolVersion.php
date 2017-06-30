<?php
require_once(__DIR__.'/../Interfaces.php');

class ProtocolVersionCollector implements iCollector {

	#region iCollector Members

	function DataName()	{
		return 'logifyProtocolVersion';
	}

	function CollectData() {
		return '17.1';
	}

	#endregion
}
?>