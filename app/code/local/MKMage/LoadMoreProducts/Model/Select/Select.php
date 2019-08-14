<?php
/**
 * @author 		MKMage
 * @copyright  	Copyright (c) 2016 MKMage
 */

class MKMage_LoadMoreProducts_Model_Select_Select extends Mage_Core_Model_Abstract{

	public function _construct()
	{
		parent::_construct();
		$this->_init('loadmoreproducts/select_select');
	}
	
	public function toOptionArray($default = false){
		$options = array(
			array('value' => 'button' , 'label' => Mage::helper('loadmoreproducts')->__('Button')),
			array('value' => 'scroll' , 'label' => Mage::helper('loadmoreproducts')->__('Scroll')),

		);
	
		return $options;
	}
	
}
?>