<?php

include_once("./Services/Repository/classes/class.ilObjectPlugin.php");
require_once("./Services/Tracking/interfaces/interface.ilLPStatusPlugin.php");
require_once("./Customizing/global/plugins/Services/Repository/RepositoryObject/HelloWorldRepositoryObject/classes/class.ilObjHelloWorldRepositoryObjectGUI.php");


class ilObjHelloWorldRepositoryObject extends ilObjectPlugin implements ilLPStatusPluginInterface
{

	/**
	 * Constructor
	 *
	 * @access        public
	 * @param int $a_ref_id
	 */
	function __construct($a_ref_id = 0)
	{
		parent::__construct($a_ref_id);
	}

	/**
	 * Get type.
	 */
	final function initType()
	{
		$this->setType(ilHelloWorldRepositoryObjectPlugin::ID);
	}

	/**
	 * Create object
	 */
	function doCreate()
	{
		/**
		 * @var $ilDB ilDBInterface
		 */
		global $ilDB;

		$ilDB->manipulate("INSERT INTO rep_robj_xhew_data ".
			"(id, is_online, option_one, option_two) VALUES (".
			$ilDB->quote($this->getId(), "integer").",".
			$ilDB->quote(0, "integer").",".
			$ilDB->quote("default 1", "text").",".
			$ilDB->quote("default 2", "text").
			")");
	}

	/**
	 * Read data from db
	 */
	function doRead()
	{
		/**
		 * @var $ilDB ilDBInterface
		 */
		global $ilDB;

		$set = $ilDB->query("SELECT * FROM rep_robj_xhew_data ".
			" WHERE id = ".$ilDB->quote($this->getId(), "integer")
		);

		/*
		 * Automatic assignment of vars!
		 *
		 */

		$records = $ilDB->fetchAssoc($set);
		$silent = array('is_', 'has_'); // ...

		foreach ($records as $key => $value) {
			$key = str_replace($silent,'',$key);
            $key = str_replace('_',' ',$key);
			$uc_key = str_replace(' ','',ucwords($key));

			if(method_exists($this, "set{$uc_key}")){
				$functionName = "set{$uc_key}";
				$this->$functionName($value);
			}
		}

	}

	/**
	 * Update data
	 */
	function doUpdate()
	{
		/**
		 * @var $ilDB ilDBInterface
		 */
		global $ilDB;

		$ilDB->manipulate($up = "UPDATE rep_robj_xhew_data SET ".
			" is_online = ".$ilDB->quote($this->isOnline(), "integer").",".
			" `name` = ".$ilDB->quote($this->getName(), "text")."".
			" WHERE id = ".$ilDB->quote($this->getId(), "integer")
		);
	}

	/**
	 * Delete data from db
	 */
	function doDelete()
	{
		/**
		 * @var $ilDB ilDBInterface
		 */
		global $ilDB;

		$ilDB->manipulate("DELETE FROM rep_robj_xhew_data WHERE ".
			" id = ".$ilDB->quote($this->getId(), "integer")
		);
	}

	/**
	 * Do Cloning
	 */
	function doCloneObject($new_obj, $a_target_id, $a_copy_id = null)
	{
		$new_obj->update();
	}

	/**
	 * Set online
	 *
	 * @param        boolean                online
	 */
	function setOnline($a_val)
	{
		$this->online = $a_val;
	}

	/**
	 * Set online
	 *
	 * @param        String                name
	 */
	function setName($a_val)
	{
		$this->name = $a_val;
	}

	/**
	 * Get online
	 *
	 * @return        boolean                online
	 */
	function isOnline()
	{
		return $this->online;
	}

	/**
	 * Get name
	 *
	 * @return        String                name
	 */
	function getName()
	{
		return $this->name;
	}

	/**
	 * Get all user ids with LP status completed
	 *
	 * @return array
	 */
	public function getLPCompleted() {
		return array();
	}

	/**
	 * Get all user ids with LP status not attempted
	 *
	 * @return array
	 */
	public function getLPNotAttempted() {
		return array();
	}

	/**
	 * Get all user ids with LP status failed
	 *
	 * @return array
	 */
	public function getLPFailed() {
		return array(6);
	}

	/**
	 * Get all user ids with LP status in progress
	 *
	 * @return array
	 */
	public function getLPInProgress() {
		return array();
	}

	/**
	 * Get current status for given user
	 *
	 * @param int $a_user_id
	 * @return int
	 */
	public function getLPStatusForUser($a_user_id) {
		global $ilUser;
		if($ilUser->getId() == $a_user_id)
			return $_SESSION[ilObjHelloWorldRepositoryObjectGUI::LP_SESSION_ID];
		else
			return ilLPStatus::LP_STATUS_NOT_ATTEMPTED_NUM;
	}
}
?>
