<?php
/**
 * User model object
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
 */
class Blueknow_Bluecart_Model_User extends Varien_Object {

	// Store a copy of current session customer and language/currency ISO codes
	private $_customer;
	private $_language;
	private $_currency;

	function _construct() {
		// Check if any customer is logged in or not
		if (Mage::getSingleton('customer/session')->isLoggedIn()) {
			// Load the customer's data
			$this->_customer = $customer = Mage::getSingleton('customer/session')->getCustomer();
		}
	}

	public function getEmail() {
		if (!empty($this->_customer)) {
			return $this->_customer->getEmail();
		}
	}

	public function isLogged() {
    	return Mage::getSingleton('customer/session')->isLoggedIn();
	}

	public function isCartEmpty() {
	    return Mage::helper('checkout/cart')->getItemsCount() == 0;
	}

	public function getFirstName() {
		if (!empty($this->_customer)) {
			return $this->_customer->getFirstname();
		}
		return null;
	}

	public function getLastName() {
		if (!empty($this->_customer)) {
			return $this->_customer->getLastname();
		}
		return null;
	}

    public function  getPhone() {
		$address = $this->_customer->getPrimaryBillingAddress();
		if ($address) {
		    return $address->getTelephone();
		}
		return null;
	}

	public function  getMobile() {
		// TODO not possible?
	}

	public function getLanguage() {
		if (empty($this->_language)) {
			$isoCode = Mage::app()->getLocale()->getLocale();
			$parts = explode('_', $isoCode);
			$language = $parts[0];
			$this->_language = strtoupper($language);
		}
		return $this->_language;
	}

	public function getCurrency() {
		if (empty($this->_currency)) {
			$this->_currency = Mage::app()->getStore()->getCurrentCurrencyCode();
		}
		return $this->_currency;
	}
}