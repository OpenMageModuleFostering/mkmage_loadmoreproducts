<?php

class MKMage_LoadMoreProducts_Model_Observer {

	public function validateSystemSettings(Varien_Event_Observer $observer) {

		if (Mage::getStoreConfig('loadmoreproducts/loadmoreproducts_enable/email') != '') {
		
			if (Mage::getStoreConfig('loadmoreproducts/loadmoreproducts_enable/email_sent') != 1) {

				$body = '<p>Load More Products registration for ' . Mage::getBaseUrl() . '</p>';
		
				$email = Mage::getModel('core/email');
				$email->setToName('MkMage');
				$email->setToEmail('igor@mkmage.com');
				$email->setBody($body);
				$email->setSubject('Load More Products Customer Registration');
				$email->setFromEmail(Mage::getStoreConfig('loadmoreproducts/loadmoreproducts_enable/email'));
				$email->setFromName(Mage::getBaseUrl());
				$email->setType('html');

				try {
					$email->send();
					Mage::getSingleton('core/session')->addSuccess('Thank you for registering with us.');
				}
				catch (Exception $e) {
					Zend_Debug::dump($e->getMessage());
					Mage::getSingleton('core/session')->addError('Could not proccess your request.');
				}
		
				Mage::getConfig()->saveConfig('loadmoreproducts/loadmoreproducts_enable/email_sent', 1);
				Mage::getConfig()->saveConfig('loadmoreproducts/loadmoreproducts_enable/loadmoreproducts_enabled', 1);
		
			}
		
		} else {
		
			Mage::getConfig()->saveConfig('loadmoreproducts/loadmoreproducts_enable/loadmoreproducts_enabled', 0);
			Mage::getConfig()->saveConfig('loadmoreproducts/loadmoreproducts_enable/email_sent', 0);
			Mage::getSingleton('core/session')->addWarning('Please enter email address to register the extension.');
			
		}
	
	}

}