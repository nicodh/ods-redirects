<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

// Global redirects
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tx_odsredirects_redirects');

// Plugin redirects
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='header,header_position,header_link,header_layout,date,spaceBefore,spaceAfter,section_frame,layout,select_key,recursive';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(array(
	'LLL:EXT:ods_redirects/locallang_db.xml:tt_content.list_type_pi1',
	$_EXTKEY . '_pi1',
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'ext_icon.gif'
),'list_type');
?>