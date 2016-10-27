<?php
/**
 * Blueknow Bluecart configuration object model.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Blueknow Bluecart
 * extension to newer versions in the future. If you wish to customize it for
 * your needs please save your changes before upgrading.
 *
 * @category	Blueknow
 * @package		Blueknow_Bluecart
 * @copyright	Copyright (c) 2016 Blueknow, S.L. (http://www.blueknow.com)
 * @license		GNU General Public License
 * @author		<a href="mailto:santi.ameller@blueknow.com">Santiago Ameller</a>
 * @author		<a href="mailto:josep.ventura@blueknow.com">Josep M Ventura</a>
 * @since		1.0.0
 *
 */
class Blueknow_Bluecart_Model_Configuration extends Varien_Object {

	/*Configuration XML paths*/
	const XML_PATH_BLUEKNOW_ENABLED = 'blueknow_bluecart/bluecart/enabled';
	const XML_PATH_BLUEKNOW_BK_NUMBER = 'blueknow_bluecart/bluecart/bk_number';

	/**
	 * Blueknow Bluecart extension descriptor/identifier.
	 * @var string
	 */
	private $_descriptor; // TODO maybe not usefull

	/**
	 * Service-is-enabled flag.
	 * @var bool
	 */
	private $_enabled;
	
	/**
	 * Extension version
	 * @var string
	 */
	private $_version;

	/**
	 * Get service-is-enabled flag from configuration.
	 * @return bool
	 */
	public function isEnabled() {
		if (empty($this->_enabled)) {
			$bkNumber = $this->getBKNumber();
			$this->_enabled = Mage::getStoreConfigFlag(self::XML_PATH_BLUEKNOW_ENABLED) && !empty($bkNumber);
		}
		return $this->_enabled;
	}

	/**
	 * Get BK number from configuration.
	 * @return string
	 */
	public function getBKNumber() {
		if (empty($this->_bkNumber)) {
			$this->_bkNumber =  Mage::getStoreConfig(self::XML_PATH_BLUEKNOW_BK_NUMBER);
		}
		return $this->_bkNumber;
	}
	
	/**
	 * Retrive the module version
	 * @return String
	 */
	public function getModuleVersion() {
		return (string) Mage::getConfig()->getModuleConfig('Blueknow_Bluecart')->version;
	}
}