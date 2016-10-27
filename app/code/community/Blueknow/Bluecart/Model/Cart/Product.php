<?php
/**
 * Cart product object model.
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
class Blueknow_Bluecart_Model_Cart_Product extends Varien_Object {

	/**
	 * Ordered product identifier.
	 * @var string
	 */
	private $_id;

	private $_name;

	private $_url;

	private $_image;

	/**
	 * Ordered product price. It could be different from orginal product price due to discounts or something like this.
	 * @var number|string
	 */
	private $_price;

	private $_priceNoDiscount;

	private $_discount;
	/**
	 * Ordered product quantity.
	 * @var number
	 */
	private $_quantity;

	private $_partialPrice;

	private $_description;

	private $_type;

	/**
	 * Product sku
	 * @var string
	 */
	private $_sku;

	/**
	 * <p>Additional product options for configurable products</p>
	 *
	 * @var unknown $_options
	 */
	private $_options;

	/**
	 * Get ordered product identifier.
	 * @return string
	 */
	public function getId() {
		return $this->_id;
	}

	/**
	 * Set ordered product identifier.
	 * @param string $id
	 */
	public function setId($id) {
		$this->_id = $id;
	}

	public function getName() {
		return $this->_name;
	}

	public function setName($name) {
		$this->_name = $name;
	}

	public function getUrl() {
		return $this->_url;
	}

	public function setUrl($url) {
		$this->_url = $url;
	}

	public function getImage() {
		return $this->_image;
	}

	public function setImage($image) {
		$this->_image = $image;
	}

	/**
	 * Get ordered product price.
	 * @return number|string
	 */
	public function getPrice() {
		return $this->_price;
	}

	/**
	 * Set ordered product price. It should include taxes and currency conversion applied.
	 * Unitary price. No currency symbol.
	 * @param number|string $price
	 */
	public function setPrice($price) {
		$this->_price = $price;
	}

	public function getOriginalPrice() {
		return $this->_originalPrice;
	}

	public function setOriginalPrice($originalPrice) {
		$this->_originalPrice = $originalPrice;
	}

	public function getDiscount() {
		return $this->_discount;
	}

	public function setDiscount($discount) {
		$this->_discount = $discount;
	}

	public function getPartialPrice() {
		return $this->_partialPrice;
	}

	public function setPartialPrice($partialPrice) {
		$this->_partialPrice = $partialPrice;
	}

	/**
	 * Get ordered product quantity.
	 * @return number|string.
	 */
	public function getQuantity() {
		return $this->_quantity;
	}

	/**
	 * Set ordered product quantity.
	 * @param number|string $qty
	 */
	public function setQuantity($qty) {
		$this->_quantity = $qty;
	}

	public function getDescription() {
		return $this->_description;
	}

	public function setDescription($description) {
		$this->_description = $description;
	}

	public function getSku() {
	    return $this->_sku;
	}

	public function setSku($sku) {
	    $this->_sku = $sku;
	}

	public function getOptions() {
	   return $this->_options;
	}

	public function setOptions($options) {
	    $this->_options = $options;
	}

	public function getType() {
	    return $this->_type;
	}

	public function setType($type) {
	    $this->_type = $type;
	}
}