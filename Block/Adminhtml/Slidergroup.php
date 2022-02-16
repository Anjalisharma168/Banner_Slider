<?php
namespace Dotsquare\Banner\Block\Adminhtml;
class Slidergroup extends \Magento\Backend\Block\Widget\Grid\Container
{
	protected function _construct() {
		$this->_controller = 'adminhtml_slidergroup';
        $this->_blockGroup = 'Dotsquare_Banner';
        $this->_headerText = __('Responsivebannerslider');
        $this->_addButtonLabel = __('Add New Group');
		parent::_construct();
      
    }
}
