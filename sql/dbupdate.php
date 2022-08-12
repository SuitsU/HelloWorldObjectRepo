<#1>
<?php
/**
 * @var $ilDB
 */
?>
<?php
$fields = array(
	'id' => array(
		'type' => 'integer',
		'length' => 4,
		'notnull' => true
	),
	'is_online' => array(
		'type' => 'integer',
		'length' => 1,
		'notnull' => false
	),
	'option_one' => array(
		'type' => 'text',
		'length' => 10,
		'fixed' => false,
		'notnull' => false
	),
	'option_two' => array(
		'type' => 'text',
		'length' => 10,
		'fixed' => false,
		'notnull' => false
	)
);
if(!$ilDB->tableExists("xheworepo_data")) {
	$ilDB->createTable("xheworepo_data", $fields);
	$ilDB->addPrimaryKey("xheworepo_data", array("id"));
}
?>