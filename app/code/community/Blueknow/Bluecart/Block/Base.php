<?php
/**
 * Base block.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Blueknow BlueCart
 * extension to newer versions in the future. If you wish to customize it for
 * your needs please save your changes before upgrading.
 *
 * @category	Blueknow
 * @copyright	Copyright (c) 2015 Blueknow, S.L. (http://www.blueknow.com)
 * @license		GNU General Public License
 * @author		<a href="mailto:santi.ameller@blueknow.com">Santiago Ameller</a>
 * @author		<a href="mailto:josep.ventura@blueknow.com">Josep M Ventura</a>
 * @since		1.0.0
 *
 */
class Blueknow_Bluecart_Block_Base extends Mage_Core_Block_Template {

	/**
	 * User domain object.
	 * @var Blueknow_Bluecart_Model_Configuration
	 */
	protected $_configuration;

	public function _beforeToHtml() {
		parent::_beforeToHtml();
		$this->_configuration = Mage::getModel('blueknow_bluecart/Configuration');
	}

	/**
	 * Render block.
	 * @see Mage_Core_Block_Template::_toHtml()
	 */
	public function _toHtml() {
		//the block is rendered only if module is enabled
		if ($this->_configuration->isEnabled()) {
			return parent::_toHtml();
		}
		return '';
	}

	/**
	 * Get Blueknow service configuration.
	 * @return Blueknow_Bluecart_Model_Configuration
	 */
	public function getConfiguration() {
		return $this->_configuration;
	}
}