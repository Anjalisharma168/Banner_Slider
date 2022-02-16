<?php
namespace Dotsquare\Banner\Controller\Adminhtml\Slide;
class Grid extends \Magento\Backend\App\Action
{
	public function execute()
	{
		$this->getResponse()->setBody($this->_view->getLayout()->createBlock('Dotsquare\Banner\Block\Adminhtml\Slide\Grid')->toHtml());
	}
	 protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dotsquare_Banner::Heading');
    }
}
