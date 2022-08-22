<#1>
<?php
/**
 * @var $ilDB ilDBInterface
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
if(!$ilDB->tableExists("rep_robj_xhew_data")) {
	$ilDB->createTable("rep_robj_xhew_data", $fields);
	$ilDB->addPrimaryKey("rep_robj_xhew_data", array("id"));
}
?>
<#2>
<?php
if($ilDB->tableExists("rep_robj_xhew_data")) {
    $ilDB->addTableColumn("rep_robj_xhew_data", 'name', array(
        'type' => 'text',
        'length' => 100,
        'notnull' => false
    ));
}
?>
<#3>
<?php
if($ilDB->tableExists("rep_robj_xhew_data")) {
    $ilDB->addTableColumn("rep_robj_xhew_data", 'name', array(
        'type' => 'text',
        'length' => 100,
        'notnull' => false
    ));
}
?>
