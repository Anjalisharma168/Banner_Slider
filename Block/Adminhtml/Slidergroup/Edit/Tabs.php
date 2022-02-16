<?php
namespace Dotsquare\Banner\Block\Adminhtml\Slidergroup\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
	    parent::_construct();
        $this->setId('main_section');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Responsive Banner Slider'));
    }
	
	
	 protected function _prepareLayout()
        {
			
			$this->addTab('main_section',
				[
					'label' => __('General Information'),
					'title' => __('General Information'),
					'content' => $this->getLayout()->createBlock(
                    'Dotsquare\Banner\Block\Adminhtml\Slidergroup\Edit\Tab\Main')->toHtml(),
					'active' => false
				]
			);
			$this->addTab('page_section',
				[
					'label' => __('Display on Pages'),
					'title' => __('Display on Pages'),
					'content' => $this->getLayout()->createBlock(
                    'Dotsquare\Banner\Block\Adminhtml\Slidergroup\Edit\Tab\Pages')->toHtml(),
					'active' => false
				]
			);
			$this->addTab('categories_section',
				[
					'label' => __('Display on Categories'),
					'title' => __('Display on Categories'),
					'content' => $this->getLayout()->createBlock(
                    'Dotsquare\Banner\Block\Adminhtml\Slidergroup\Edit\Tab\Categories')->toHtml(),
					'active' => false
				]
			);
			
			
           
            return parent::_prepareLayout();
        }
		
		

 

      

    
}