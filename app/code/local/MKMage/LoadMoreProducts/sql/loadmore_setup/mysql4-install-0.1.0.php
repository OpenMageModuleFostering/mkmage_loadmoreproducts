<?php 

$installer = $this;

$installer->startSetup();

$attributeInstaller = new Mage_Eav_Model_Entity_Setup('core_setup');
$attributeInstaller->removeAttribute('catalog_product','mkmage_loadmore_check');
$attributeInstaller->addAttribute('catalog_product', "mkmage_loadmore_check", array(
	'group'      	=> 'MKMage Loadmore',
    'label'      	=> 'Disable loading on additional products',
    'sort_order'	=> 50,
    'type'			=> 'int',
    'source' 		=> 'eav/entity_attribute_source_boolean',
    'input'			=> 'boolean',
    'global'		=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' 		=> true,
    'required' 		=> false,
    'user_defined' 	=> true,
));


$installer->endSetup(); 