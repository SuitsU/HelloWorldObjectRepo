<?php

include_once("./Services/Repository/classes/class.ilRepositoryObjectPlugin.php");

/**
 */
class ilHelloWorldRepositoryObjectPlugin extends ilRepositoryObjectPlugin
{
	const ID = "heworepo";

	// must correspond to the plugin subdirectory
	function getPluginName()
	{
		return "HelloWorldRepositoryObject";
	}

	protected function uninstallCustom() {
		// TODO: Nothing to do here.
	}

	/**
	 * @inheritdoc
	 */
	public function allowCopy()
	{
		return true;
	}

}
?>