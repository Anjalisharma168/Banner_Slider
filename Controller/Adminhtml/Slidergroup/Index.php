<?php
namespace Dotsquare\Banner\Controller\Adminhtml\Slidergroup;
class Index extends \Magento\Backend\App\Action
{
    public function execute()
    {
		if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }
        $this->_view->loadLayout();
        $this->_setActiveMenu('Dotsquare_Banner::grid');
        $this->_addBreadcrumb(__('Dotsquare Banner Slider'), __('Dotsquare Banner Slider'));
        $this->_addBreadcrumb(__('Manage Group'), __('Manage Group'));
        $this->_view->renderLayout();
    }
	protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dotsquare_Banner::Heading');
    }
}