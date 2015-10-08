<?php

if (!defined('_PS_VERSION_'))
	exit;

// object module ($this) available
function upgrade_module_1_4_11($object)
{
	$upgrade_version = '1.4.11';

	$object->upgrade_detail[$upgrade_version] = array();

	// Updating variables name for environment and mode
	if ((bool)Configuration::get('PAYFORT_START_DEMO'))
		Configuration::updateValue('PAYFORT_START_SANDBOX', 1);
	else
		Configuration::updateValue('PAYFORT_START_SANDBOX', 0);

	Configuration::updateValue('PAYFORT_START_TEST_MODE', 0);
	Configuration::deleteByName('PAYFORT_START_DEMO');

	Configuration::updateValue('PAYFORT_START', $upgrade_version);
	return true;
}
