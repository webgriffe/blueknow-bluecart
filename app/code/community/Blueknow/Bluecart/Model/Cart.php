<?php
/**
 * Cart object model.
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
class Blueknow_Bluecart_Model_Cart extends Varien_Object {

	/**
	 * Products (identifiers) inside shopping cart.
	 * @var array
	 */
	private $_products = array();

	private $_order;

	/**
	 * Get products form current shopping cart.
	 * @return array
	 */
	public function getProducts() {
	    if (!$this->_products) { //empty cart is directly returned
            $this->_createProducts();
            return $this->_products;
	    }
	    return $this->_products;
	}

	/**
	 * Get current cart totals.
	 * @return totals class
	 */
	public function getOrder() {
	    if (!$this->_order) {
	        $quote = Mage::getSingleton('checkout/cart')->getQuote();
	        $this->createOrder($quote);
	        return $this->_order;
	    }
	    return $this->_order;
	}


	public function createOrder($quote) {
	    // Store
	    $store = Mage::app()->getStore();
        //create our own order
        $bOrder = Mage::getModel('blueknow_bluecart/Cart_Order');
        $totals = $quote->getTotals();
        //Assign ID and other properties
        $bOrder->setId($quote->getReservedOrderId()); // NOT USED
        $bOrder->setSubtotal($store->roundPrice($quote->getSubtotal()));
        $bOrder->setTotal($store->roundPrice($quote->getGrandTotal()));
        $bOrder->setTax($quote->getShippingAddress()->getData('tax_amount'));
        $bOrder->setShipping($store->roundPrice($quote->getShippingAddress()->getShippingAmount()));
        $this->_order = $bOrder;
	}

	protected function _createProducts() {
	    // Retrieve items
	    // getAllVisibleItems getAllItems getItemsCollection
	    $items = Mage::getSingleton('checkout/session')->getQuote()->getAllItems();
	    // Get current store
	    $store = Mage::app()->getStore();
	    //Iterate through order items
	    foreach ($items as $item) {
	        //Found parent (configurable products, bundle also?)
	        if ($item->getParentItemId()) {
	            continue;
	        }
	        $bProduct = Mage::getModel('blueknow_bluecart/Cart_Product');
	        $bProduct->setId($item->getProductId());
	        // Retrieve original product from catalog for extra properties
	        $product = Mage::getModel('catalog/product')->load($item->getProductId());
	        // Escape product name
	        $bProduct->setName(addslashes($item->getName()));
	        $bProduct->setSku($item->getProduct()->getSku());
	        $bProduct->setUrl($product->getProductUrl());
	        // Get resized image, same used in recommender
	        // Image is wrong using this, always the same one. Mage::helper('catalog/image')->init($product, 'image')
	        $bProduct->setImage($product->getImageUrl());
	        $bProduct->setType($product->getTypeId());
	        // Show or not prices
            $bProduct->setPrice($store->roundPrice($item->getPriceInclTax()));
	        $bProduct->setOriginalPrice($store->roundPrice($item->getOriginalPrice()));
            $bProduct->setQuantity($item->getQty());
	        $bProduct->setDescription(addslashes($product->getShortDescription()));
            // Exptra properties
	        if ($product->getTypeId() != "simple") {
	            // try to get configurable attributes which ones? this shows all but not selected ones
                $options = $this->retrieveConfigurableAttributes($item, $product, $bProduct);
                $bProduct->setOptions($options);
	        }
	        // Quantity x Price
	        $bProduct->setPartialPrice($bProduct->getQuantity() * $bProduct->getOriginalPrice());
	        array_push($this->_products, $bProduct);
	    }
	}

	private function retrieveConfigurableAttributes($cartItem, $catalogProduct, $bkProduct)
	{
        // Load the configured product options
        $options = $catalogProduct->getTypeInstance(true)->getOrderOptions($cartItem->getProduct());
        // Check for options
        if ($options && !empty($options['attributes_info'])) {
            $options = $options['attributes_info'];
            // Super attribute ids
            $attributes = $catalogProduct->getTypeInstance(true)->getUsedProductAttributeIds($catalogProduct);
            $index = 0;
            // Iterate options (color, size...)
            foreach ($options as $opt) {
                $attr = Mage::getModel('catalog/resource_eav_attribute')->load($attributes[$index]);
                if ($attr->usesSource()) {
                    $valueId = $attr->getSource()->getOptionId($opt['value']);
                }
                $opt['label_id'] = $attributes[$index];
                $opt['value_id'] = $valueId;
                $options[$index] = array_merge($options[$index],$opt);
                $index++;
            }
        }
        return $options;
	}
}