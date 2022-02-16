<?php
namespace Dotsquare\Banner\Controller\Adminhtml\Slide;
class MassStatus extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
		$bannerIds = $this->getRequest()->getParam('slide');
		$status = $this->getRequest()->getParam('statuss');
	 
		if (!is_array($bannerIds) || empty($bannerIds)) {
            $this->messageManager->addError(__('Please select Slide(s).'));
        } else {
            try {
                foreach ($bannerIds as $bannerId) {
                    $banner = $this->_objectManager->get('Dotsquare\Banner\Model\Slide')->load($bannerId);
					$banner->setData('statuss',$status)->save();
				}
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) were successfully updated.', count($bannerIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
		 $this->_redirect('*/*/');
    }
	protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dotsquare_Banner::Heading');
    }
}
