<?php

class MKMage_LoadMoreProducts_Block_Info
    extends Mage_Adminhtml_Block_Abstract
    implements Varien_Data_Form_Element_Renderer_Interface
{

    public function render(Varien_Data_Form_Element_Abstract $element)
    {
    	$version  = '';
        $html = <<<HTML
<div style="border:1px solid #ccc;  margin:5px 0; padding:30px;">
	<p>
		This extension requires "product_additional_data" block to be used on Product Page. 
	</p>
</div>
HTML;
        return $html;
    }
}