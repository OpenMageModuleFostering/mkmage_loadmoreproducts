<?php					
class MKMage_LoadMoreProducts_IndexController extends Mage_Core_Controller_Front_Action {        

	public function indexAction() {

		$attrs = Mage::app()->getRequest()->getPost();
		$page = $attrs['page'];
		$product_current_category = $attrs['category'];
		$item_per_load = $attrs['item_per_load'];
				
		$products = Mage::getModel('catalog/category')->load($product_current_category)
		 ->getProductCollection()
		 ->addAttributeToSelect('*') // add all attributes - optional
		 ->addAttributeToFilter('status', 1) // enabled
		 ->addFieldToFilter('visibility', 4) //visibility in catalog,search
		 ->setPageSize($item_per_load)
		 ->setOrder('ordered_qty', 'desc')
		 ->setCurPage($page); //sets the order by price

		$size = $products->getSize();
		
		if ($item_per_load * $page >= $size) {
			$endCollection = true;
		} else {
			$endCollection = false;
		}

		$block = $this->getLayout()->createBlock('core/template')->setTemplate('mkmage/loadmore/loadmore.phtml');
		$block->setData('loadCollection', $products);
		$block->setData('endCollection', $endCollection);
		
		echo $block->toHtml();
		
	}

}

