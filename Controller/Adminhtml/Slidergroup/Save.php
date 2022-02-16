<?php
namespace Dotsquare\Banner\Controller\Adminhtml\Slidergroup;
use Magento\Framework\App\Filesystem\DirectoryList;
class Save extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $data = $this->getRequest()->getPost()->toarray();
		$om = \Magento\Framework\App\ObjectManager::getInstance();
		$jsHelper = $om->get('Magento\Backend\Helper\Js');
	
		if ($data) {
			if(isset($data['links']['slider'])){
				$data['in_products'] = $jsHelper->decodeGridSerializedInput($data['links']['slider']);
			}
            $model = $this->_objectManager->create('Dotsquare\Banner\Model\Responsivebannerslider');
          	$id = $this->getRequest()->getParam('slidergroup_id');
	        if ($id) {
                $model->load($id);
			}
			
			$model->setData($data);
    
            try {
                $model->save();
				
				$store_model = $this->_objectManager->create('Dotsquare\Banner\Model\Store');
				if($id != "") {			
					$store_data = $store_model->getCollection()
									->addFieldToFilter('slidergroup_id',$id); 
					$store_data->walk('delete');  
				}
				
				if (in_array("0", $model->getData('store_id')))	{
					$allStores = $this->_objectManager->create('\Magento\Store\Model\StoreManagerInterface')->getStores();
					foreach ($allStores as $_eachStoreId => $val) 	{
						$_storeId = $this->_objectManager->create('\Magento\Store\Model\StoreManagerInterface')->getStore($_eachStoreId)->getId();
						$data_store['slidergroup_id'] = $model->getData('slidergroup_id');
						$data_store['store_id'] = $_storeId;
						$store_model->setData($data_store);
						$store_model->save();
					}
				}else{
					
					foreach($model->getData('store_id') as $store){
						$data_store['slidergroup_id'] = $model->getData('slidergroup_id');
						$data_store['store_id'] = $store;
						$store_model->setData($data_store);
						$store_model->save();
					} 
			
				}
				
				$page_model = $this->_objectManager->create('Dotsquare\Banner\Model\Pages');
				if($id != "") {			
					$page_data = $page_model->getCollection()
									->addFieldToFilter('slidergroup_id',$id); 
					$page_data->walk('delete');  
				}
				$cmspages = $model->getData('pages');
				if(isset($cmspages)) {
					foreach($model->getData('pages') as $pages)	{
						$data_page['slidergroup_id'] = $model->getData('slidergroup_id');
						$data_page['pages'] = $pages;
						$page_model->setData($data_page);
						
						$page_model->save();
					} 
				}

				$cate_model = $this->_objectManager->create('Dotsquare\Banner\Model\Categories');
				if($id != "") {			
					$cate_data = $cate_model->getCollection()
									->addFieldToFilter('slidergroup_id',$id); 
					$cate_data->walk('delete');  
				}
				$catedata = $model->getData('categories');
				if(isset($catedata))  {
					foreach($model->getData('categories') as $category_id)	{
						if($category_id != "") {
							$data_cate['slidergroup_id'] = $model->getData('slidergroup_id');
							$data_cate['category_ids'] = $category_id;
							$cate_model->setData($data_cate);
							$cate_model->save();
						}
					} 
				}	

				$in_products = $model->getData('in_products');
							
				if($in_products != "") 	{
					$product_model = $this->_objectManager->create('Dotsquare\Banner\Model\Product');
					if($id != "") {			
						$prd_data = $product_model->getCollection()->addFieldToFilter('slidergroup_id',$id); 
						$prd_data->walk('delete');  
					}
					
					foreach($model->getData('in_products') as $product)	{
						$data_prd['slidergroup_id'] = $model->getData('slidergroup_id');
						$data_prd['product_sku'] = $product;
						$product_model->setData($data_prd);
						$product_model->save();
					} 
				}				
				$om = \Magento\Framework\App\ObjectManager::getInstance();
				$reader = $om->get('Magento\Framework\Module\Dir\Reader');
				$moduleviewDir=$reader->getModuleDir('view', 'Magebees_Responsivebannerslider');
				$cssDir=$moduleviewDir.'/frontend/web/css/responsivebannerslider';
				if (!file_exists($cssDir)) {
					mkdir($cssDir, 0777, true);
				}
	
				$path = $cssDir.'/';
				$path .= "group-".$model->getData('slidergroup_id').".css";
				$css = $this->get_menu_css($model->getData('slidergroup_id'));
				file_put_contents($path,$css);
		
                $this->messageManager->addSuccess(__('Group was successfully saved'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getSlidergroupId(), '_current' => true));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (\Magento\Framework\Model\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the banner.'));
            }

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array('slidergroup_id' => $this->getRequest()->getParam('id')));
            return;
        }
        $this->_redirect('*/*/');
    }
		
	public function get_menu_css($group_id){
		$groupdata = $this->_objectManager->create('Dotsquare\Banner\Model\Responsivebannerslider')->load($group_id);
		$max_width = $groupdata->getMaxWidth();
		$content_background = $groupdata->getContentBackground();
		$content_opacity = $groupdata->getContentOpacity();
		$navigation_acolor = $groupdata->getNavigationAcolor();
		$pagination_color = $groupdata->getPaginationColor();
		$pagination_active_color = $groupdata->getPaginationActive();
		$pagination_bar = $groupdata->getPaginationBar();
		$thumbnail_size = $groupdata->getThumbnailSize();
		if ($max_width > 0) {
			$max_width = $groupdata->getMaxWidth().'px';
		} else {
			$max_width = "";
		}
		$css = '';
		$css .= '#bnrSlider-'.$group_id.' { }';
		$css .= '#bnrSlider-'.$group_id.' { max-width:'.$max_width.'; }';
		$css .= '#bnrSlider-'.$group_id.' .sliderdecs { background-color:#'.$content_background.'; opacity:0.'.$content_opacity.'; }';
		$css .= '#bnrSlider-'.$group_id.' .cws-arw a:before { color:#'.$navigation_acolor.'; }';
		$css .= '#bnrSlider-'.$group_id.' .cws-pager a { background-color:#'.$pagination_color.'; }';
		$css .= '#bnrSlider-'.$group_id.' .cws-pager a.cws-active { background-color:#'.$pagination_active_color.'; }';
		$css .= '#bnrSlider-'.$group_id.' .cws-pager.cir-bar { background-color:#'.$pagination_bar.'; }';
		$css .= '#bnrSlider-'.$group_id.' .cws-pager.squ-bar { background-color:#'.$pagination_bar.'; }';
		$css .= '@media (min-width:999px){#carousel-'.$group_id.' ul.slides li { width:'.$thumbnail_size.'px !important;}}';
		return $css;
	}
	protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dotsquare_Banner::Heading');
    }
}
