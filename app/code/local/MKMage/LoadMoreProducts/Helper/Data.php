<?php
class MKMage_LoadMoreProducts_Helper_Data extends Mage_Core_Helper_Abstract
{

	public function getIsActive() {
		
		$loadMoreXmlEnabled = Mage::helper('core')->isModuleEnabled('MKMage_LoadMoreProducts') ? true : false;
		$loadMoreOutputEnabled = Mage::helper('core')->isModuleOutputEnabled("MKMage_LoadMoreProducts") ? true : false;
		$loadMoreModuleEnabled = Mage::getStoreConfig('loadmoreproducts/loadmoreproducts_enable/loadmoreproducts_enabled',Mage::app()->getStore()) ? true : false;
		
		return ( $loadMoreXmlEnabled && $loadMoreOutputEnabled && $loadMoreModuleEnabled ) ? true : false;
	
	}
	
}