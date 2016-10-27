<?php
/**
 * Shopping cart bluecart block.
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
class Blueknow_Bluecart_Block_Cart_Datalayer extends Blueknow_Bluecart_Block_Base {

	/**
	 * Cart domain object.
	 * @var Blueknow_Bluecart_Model_Cart
	 */
	protected $_cart;

	public function _beforeToHtml() {
		parent::_beforeToHtml();
		$this->_cart = Mage::getModel('blueknow_bluecart/Cart');
	}

	/**
	 * Render block.
	 * @see Blueknow_Bluecart_Block_Base::_toHtml()
	 */
	public function _toHtml() {
	    $products = $this->_cart->getProducts();
		//the block is rendered only if there are one or more products
		if (!empty($products)) {
			return parent::_toHtml();
		}
		return '';
	}

	/**
	 * Get current shopping cart.
	 */
	public function getCart() {
		return $this->_cart;
	}
}