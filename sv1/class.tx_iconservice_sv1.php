<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Xavier Perseguers <typo3@perseguers.ch>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(PATH_t3lib . 'class.t3lib_svbase.php');

/**
 * Service "File type Icon" for the "icon_service" extension.
 *
 * @category    Service
 * @package     TYPO3
 * @subpackage  tx_iconservice
 * @author      Xavier Perseguers <typo3@perseguers.ch>
 * @license     http://www.gnu.org/copyleft/gpl.html
 * @version     SVN: $Id$
 */
class tx_iconservice_sv1 extends t3lib_svbase {

	public $prefixId = 'tx_iconservice_sv1';
	public $scriptRelPath = 'sv1/class.tx_iconservice_sv1.php';
	public $extKey = 'icon_service';

	protected $settings = array();

	/**
	 * Initializes settings for this service.
	 */
	protected function initSettings() {
		if (TYPO3_MODE === 'FE') {
			$this->settings = $GLOBALS['TSFE']->tmpl->setup['service.'][$this->prefixId . '.'];
		} else {
			// $TYPO3_CONF_VARS['SVCONF']['icon']['setup']['skin'] = 'crystal';
			// $TYPO3_CONF_VARS['SVCONF']['icon']['setup']['flavour'] = '16x16';
			$this->settings = $GLOBALS['TYPO3_CONF_VARS']['SVCONF']['icon']['setup'];
		}

		$extRelPath = substr(t3lib_extMgm::extPath($this->extKey), strlen(PATH_site));
		$this->settings['iconPath'] = $extRelPath . 'Resources/Public/' . $this->settings['skin'] . '/' . $this->settings['flavour'] . '/';
	}

	/**
	 * Returns an icon according to the mimetype of the given filename.
	 *
	 * @param	string		$filename
	 * @return	string		Path to the icon file (relative to website's root)
	 */
	public function getIcon($filename = '') {
		$this->initSettings();

		$ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
		if (is_file($this->settings['iconPath'] . $ext . '.png')) {
			return $this->settings['iconPath'] . $ext . '.png';
		}
	}
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/icon_service/sv1/class.tx_iconservice_sv1.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/icon_service/sv1/class.tx_iconservice_sv1.php']);
}

?>