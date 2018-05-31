<?php
/***************************************************************
*  Copyright notice
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


/**
 * Plugin 'Redirect' for the 'ods_redirects' extension.
 *
 * @author    Robert Heel <typo3@bobosch.de>
 * @package    TYPO3
 * @subpackage    tx_odsredirects
 */
class tx_odsredirects_pi1 extends \TYPO3\CMS\Frontend\Plugin\AbstractPlugin {
	var $prefixId      = 'tx_odsredirects_pi1';        // Same as class name
	var $scriptRelPath = 'pi1/class.tx_odsredirects_pi1.php';    // Path to this script relative to the extension dir.
	var $extKey        = 'ods_redirects';    // The extension key.
	
	/**
	* The main method of the PlugIn
	*
	* @param    string        $content: The PlugIn content
	* @param    array        $conf: The PlugIn configuration
	* @return    The content that is displayed on the website
	*/
	function main($content, $conf) {
		$this->conf = $conf;
/*		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();*/
		$this->pi_USER_INT_obj = 1;    // Configuring so caching is not expected. This value means that no cHash params are ever set. We do this, because it's a USER_INT object!

		if($this->cObj->data['pages']){
			$destination=$this->getLink($this->cObj->data['pages'],$GLOBALS['TSFE']->sys_language_uid);

			// Redirect
	// 		if ($redirect['has_moved']) {
				header('HTTP/1.1 301 Moved Permanently');
	// 		}
			header('Location: ' . \TYPO3\CMS\Core\Utility\GeneralUtility::locationHeaderUrl($destination));
			header('X-Note: Redirect by ods_redirects');
			header('Connection: close');
			exit();
		}
	}

	function getLink($id,$L=false){
		return $this->cObj->getTypoLink_URL($id, $L ? array('L'=>$L) : array());
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ods_redirects/pi1/class.tx_odsredirects_pi1.php'])    {
    include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ods_redirects/pi1/class.tx_odsredirects_pi1.php']);
}
?>