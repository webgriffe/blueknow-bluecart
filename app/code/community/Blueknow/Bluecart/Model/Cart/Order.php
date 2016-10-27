<?php
/**
 * Cart order object model.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Blueknow Bluecart
 * extension to newer versions in the future. If you wish to customize it for
 * your needs please save your changes before upgrading.
 *
 * @category	Blueknow
 * @package		Blueknow_Bluecart
 * @copyright	Copyright (c) 2015 Blueknow, S.L. (http://www.blueknow.com)
 * @license		GNU General Public License
 * @author		<a href="mailto:santi.ameller@blueknow.com">Santiago Ameller</a>
 * @since		1.0.0
 *
 */
class Blueknow_Bluecart_Model_Cart_Order extends Varien_Object {

	/**
	 * Order identifier. NOT USED
	 * @var string
	 */
	private $_id;

	/**
	 * Total amount including taxes and shipping.
	 * @var number|string
	 */
	private $_total;

	private $_subtotal;

	/**
	 * Taxes amount.
	 * @var number|string
	 */
	private $_tax;

	/**
	 * Shipping amount.
	 * @var number|string
	 */
	private $_shipping;

	/**
	 * Get order identifier.
	 * @return string
	 */
	public function getId() {
		return $this->_id;
	}

	/**
	 * Set order identifier.
	 * @param string $id
	 */
	public function setId($id) {
		$this->_id = $id;
	}

	/**
	 * Get total amount.
	 * @return number|string
	 */
	public function getTotal() {
		return $this->_total;
	}

	/**
	 * Set total amount.
	 * @param number|string $total
	 */
	public function setTotal($total) {
		$this->_total = $total;
	}

	/**
	 * Get total amount.
	 * @return number|string
	 */
	public function getSubtotal() {
	    return $this->_subtotal;
	}

	/**
	 * Set total amount.
	 * @param number|string $total
	 */
	public function setSubtotal($subtotal) {
	    $this->_subtotal = $subtotal;
	}

	/**
	 * Get taxes amount.
	 * @return number|string
	 */
	public function getTax() {
		return $this->_tax;
	}

	/**
	 * Set taxes amount.
	 * @param number|string $tax
	 */
	public function setTax($tax) {
		$this->_tax = $tax;
	}

	/**
	 * Get shipping amount.
	 * @return number|string
	 */
	public function getShipping() {
		return $this->_shipping;
	}

	/**
	 * Set shipping amount.
	 * @param number|string $shipping
	 */
	public function setShipping($shipping) {
		$this->_shipping = $shipping;
	}
}