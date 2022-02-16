<?php
namespace Dotsquare\Banner\Block;
use Magento\Store\Model\ScopeInterface;
class View extends \Magento\Framework\View\Element\Template
{
    protected $configValues = array();
    protected $responsivebannerslider;
    protected $slide;
    protected $coreRegistry;
	protected $_cmsPage;

	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
		\Dotsquare\Banner\Model\Responsivebannerslider $responsivebannerslider,
		\Dotsquare\Banner\Model\Slide $slide,
		\Magento\Framework\App\Request\Http $request,
		\Magento\Framework\Registry $coreRegistry,
		\Magento\Cms\Block\Page $cmsPage
	  
    ) {
        parent::__construct($context);
        $this->responsivebannerslider = $responsivebannerslider;
        $this->slide = $slide;
		$this->_request = $request;
		$this->_coreRegistry = $coreRegistry;
		$this->_cmsPage = $cmsPage;
	
		//Set Configuration values
		$this->setEnabled($this->_scopeConfig->getValue('responsivebannerslider/setting/enabled',ScopeInterface::SCOPE_STORE));
		$this->setCmsPage($this->_scopeConfig->getValue('responsivebannerslider/setting/cms_page',ScopeInterface::SCOPE_STORE));
		$this->setCategoryPage($this->_scopeConfig->getValue('responsivebannerslider/setting/category_page',ScopeInterface::SCOPE_STORE));
		$this->setProductPage($this->_scopeConfig->getValue('responsivebannerslider/setting/product_page',ScopeInterface::SCOPE_STORE));
		$this->setLazyLoad($this->_scopeConfig->getValue('responsivebannerslider/setting/lazy_load_jquery',ScopeInterface::SCOPE_STORE));
	}
	
	public function getGroupscollection() { 
	  	$groups = $this->responsivebannerslider->getCollection();
		$groups ->addFieldToFilter('main_table.slidergroup_id',$this->getCode());
		$groups->addFieldToFilter('status',1);
		$groups ->setOrder('sort_order','ASC');
		$cms_page = $this->getCmsPage();
		$category_page = $this->getCategoryPage();
		$product_page = $this->getProductPage();
		
		if ($this->_request->getFullActionName() == 'catalog_category_view') {
			if($category_page == 0) {	
				return false;
			}	
		}elseif ($this->_request->getFullActionName() == 'catalog_product_view') {
			if($product_page == 0 ) {
				return false;
			}	
		}elseif ($this->_request->getFullActionName() == 'cms_index_index') {
			if($cms_page == 0) {	
				return false;
			}			
		}
		
		$store_id = $this->_storeManager->getStore()->getId();
		if (!$this->_storeManager->isSingleStoreMode()) {
			$groups->storeFilter($store_id);
		} 
				
		return $groups;
	}
		
	public function getSlides($slidegroupId) {	
		$slide_collection = $this->slide->getCollection()
			->addFieldToFilter('group_names', array(array('finset' => $slidegroupId)))
			->addFieldToFilter('statuss', '1')
			->setOrder('sort_order','ASC');
		return $slide_collection;
	}
	
	public function getLazylaod() {	
		return $this->getLazyLoad();
	}
	
	public function getBannerImage($imageName) {
	    $mediaDirectory = $this->_storeManager->getStore()->getBaseUrl(
                \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
            );
		return $mediaDirectory.'responsivebannerslider/images'.$imageName;
    }
}