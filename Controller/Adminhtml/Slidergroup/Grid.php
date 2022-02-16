<?php
namespace Dotsquare\Banner\Controller\Adminhtml\Slidergroup;
class Grid extends \Magento\Backend\App\Action
{
	public function execute()
	{
		$this->getResponse()->setBody($this->_view->getLayout()->createBlock('Dotsquare\Banner\Block\Adminhtml\Slidergroup\Grid')->toHtml());
	}
	protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dotsquare_Banner::Heading');
    }
}
