<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

t3lib_extMgm::addService($_EXTKEY, 'icon', 'tx_iconservice_sv1',
	array(
		'title' => 'File type Icon',
		'description' => 'Provides an icon according to a file type',

		'subtype' => 'filetype',

		'available' => TRUE,
		'priority' => 50,
		'quality' => 50,

		'os' => '',
		'exec' => '',

		'classFile' => t3lib_extMgm::extPath($_EXTKEY) . 'sv1/class.tx_iconservice_sv1.php',
		'className' => 'tx_iconservice_sv1',
	)
);
?>