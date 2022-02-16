<?php
namespace Dotsquare\Banner\Controller\Adminhtml\Slidergroup;
use Magento\Backend\App\Action;
class NewAction extends \Magento\Backend\App\Action
{
    public function execute()
    {
		$this->_forward('edit');
    }
	protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dotsquare_Banner::Heading');
    }
}
