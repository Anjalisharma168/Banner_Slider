<?php
namespace Dotsquare\Banner\Controller\Adminhtml\Slide;
class Index extends \Magento\Backend\App\Action
{
    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }
        $this->_view->loadLayout();
        $this->_setActiveMenu('Dotsquare_Banner::slide');
        $this->_addBreadcrumb(__('Dotsquare Banner Slider'), __('Dotsquare Banner Slider'));
        $this->_addBreadcrumb(__('Manage Slide'), __('Manage Slide'));
        $this->_view->renderLayout();
    }
	protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dotsquare_Banner::Heading');
    }
}