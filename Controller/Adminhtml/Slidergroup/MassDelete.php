<?php
namespace Dotsquare\Banner\Controller\Adminhtml\Slidergroup;
class MassDelete extends \Magento\Backend\App\Action
{
    public function execute()
    {
		$bannerIds = $this->getRequest()->getParam('slidergroup');
		
		if (!is_array($bannerIds) || empty($bannerIds)) {
            $this->messageManager->addError(__('Please select group(s).'));
        } else {
            try {
                foreach ($bannerIds as $bannerId) {
					$slide_collection = $this->_objectManager->create('Dotsquare\Banner\Model\Slide')->getCollection();
					$slide_collection->addFieldToFilter('group_names', array(array('finset' => $bannerId)));
					$banner = $this->_objectManager->get('Dotsquare\Banner\Model\Responsivebannerslider')->load($bannerId);	
					
					$slidercount = count($slide_collection->getData());
					
					if($slidercount <= 0){
									
						$banner->delete();
						
						$store_model = $this->_objectManager->create('Dotsquare\Banner\Model\Store');
						$store_data = $store_model->getCollection()->addFieldToFilter('slidergroup_id',$bannerId); 
						$store_data->walk('delete');  
					
						$page_model = $this->_objectManager->create('Dotsquare\Banner\Model\Pages');
						$page_data = $page_model->getCollection()->addFieldToFilter('slidergroup_id',$bannerId); 
						$page_data->walk('delete');  
					
						$cate_model = $this->_objectManager->create('Dotsquare\Banner\Model\Categories');
						$cate_data = $cate_model->getCollection()->addFieldToFilter('slidergroup_id',$bannerId); 
						$cate_data->walk('delete');  
				
						$product_model = $this->_objectManager->create('Dotsquare\Banner\Model\Product');
						$prd_data = $product_model->getCollection()->addFieldToFilter('slidergroup_id',$bannerId); 
						$prd_data->walk('delete');  
						
						$groupname = $banner->getData('title');
						$this->messageManager->addSuccess(
							__(''.$groupname.' Group was successfully deleted')
						);
					}else{
						$groupname = $banner->getData('title');
						$this->messageManager->addError(
							__("Please Remove Assigned slider form the selected ".$groupname." group before delete ".$groupname." group.")
						);
					}	
				}	
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
