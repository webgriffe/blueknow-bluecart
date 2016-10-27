<?php
/**
 * Checkout tracker block.
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
 * @author		<a href="mailto:josep.ventura@blueknow.com">Josep M Ventura</a>
 * @since		1.0.0
 *
 */
class Blueknow_Bluecart_Block_Checkout_Datalayer extends Blueknow_Bluecart_Block_Base {

	/**
	 * Checkout domain object.
	 * @var Blueknow_Bluecart_Model_Checkout
	 */
	protected $_checkout;

	public function _beforeToHtml() {
		parent::_beforeToHtml();
		$this->_checkout = Mage::getModel('blueknow_bluecart/Checkout');
	}

	/**
	 * Render block.
	 */
	public function _toHtml() {
        $orders = $this->_checkout->getOrders();
		//the block is rendered only if there are one or more orders
		if (!empty($orders)) {
			return parent::_toHtml();
		}
		return '';
	}

	/**
	 * Get current checkout considering both one page and multishipping checkout.
	 * @return Blueknow_Bluecart_Model_Checkout
	 */
	public function getCheckout() {
		return $this->_checkout;
	}
}