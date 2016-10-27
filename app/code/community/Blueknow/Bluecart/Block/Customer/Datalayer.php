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
 * @package		Blueknow_Bluecart
 * @copyright	Copyright (c) 2016 Blueknow, S.L. (http://www.blueknow.com)
 * @license		GNU General Public License
 * @author		<a href="mailto:santi.ameller@blueknow.com">Santiago Ameller</a>
 * @author		<a href="mailto:josep.ventura@blueknow.com">Josep M Ventura</a>
 * @since		1.0.0
 *
 */
class Blueknow_Bluecart_Block_Customer_Datalayer extends Blueknow_Bluecart_Block_Base {

	/**
	 * User domain object. Applied to all pages
	 * @var Blueknow_Bluecart_Model_User
	 */
	protected $_user;

	public function _beforeToHtml() {
		parent::_beforeToHtml();
		$this->_user = Mage::getModel('blueknow_bluecart/User');
	}

	/**
	 * Render block.
	 * @see Mage_Core_Block_Template::_toHtml()
	 */
	public function _toHtml() {
		return parent::_toHtml();
	}

	/**
	 * Get Blueknow service configuration.
	 * @return Blueknow_Bluecart_Model_Configuration
	 */
	public function getUser() {
	    return $this->_user;
	}
}