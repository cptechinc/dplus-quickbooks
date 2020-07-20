<?php
// BUILD AND INSTATIATE CLASSES
$page->fullURL = new Purl\Url($page->httpUrl);
$page->fullURL->path = '';

if (!empty($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
	$page->fullURL->join($_SERVER['REQUEST_URI']);
}

if (empty(wire('dplusdata')) || empty(wire('dpluso'))) {
	$modules->get('DplusDatabase')->log_error('At least One database is not connected');
}

$db_modules = array(
	'dplusdata' => array(
		'module'   => 'DplusDatabase',
		'default'  => true
	),
	'dpluso' => array(
		'module'   => 'DplusDatabaseDpluso',
		'default'  => false
	)
);

foreach ($db_modules as $key => $connection) {
	$module = $modules->get($connection['module']);
	$module->connect_propel();

	try {
		$propel_name = $module->get_connection_name_db();
		$$propel_name = $module->get_propel_write_connection();
		$$propel_name->useDebug(true);
	} catch (Exception $e) {
		$module->log_error($e->getMessage());
	}
}
