<?php
namespace Dotsquare\Banner\Helper;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\DriverInterface;
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $_storeManager;
	protected $date;
	protected $_filesystem;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
		\Magento\Framework\Stdlib\DateTime\DateTime $date,
		\Magento\Framework\Image\AdapterFactory $imageFactory,
		Filesystem $filesystem
       
    ) {
		$this->_storeManager = $storeManager;
		$this->_filesystem = $filesystem;
		$this->_imageFactory = $imageFactory;
		$this->date = $date;
    
        parent::__construct($context);
    	
	}

	public function getLazylaod(){
		return $this->scopeConfig->getValue('responsivebannerslider/setting/lazy_load_jquery',ScopeInterface::SCOPE_STORE);
	}
	
	public function enabledModule(){
		return $this->scopeConfig->getValue('responsivebannerslider/setting/enabled',ScopeInterface::SCOPE_STORE);
	}
	
	public function getCurrentDate(){
		return $this->date->gmtDate();
	}
	
	public function getBannerImage($imageName) {
	
        $mediaDirectory = $this->_storeManager->getStore()->getBaseUrl(
                \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
            );
		return $mediaDirectory.'responsivebannerslider'.$imageName;
    }
	
	public function getThumbnailsImage($imageName) {
	
        $mediaDirectory = $this->_storeManager->getStore()->getBaseUrl(
                \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
            );
		return $mediaDirectory.'responsivebannerslider/thumbnails'.$imageName;
    }
	
	public function resizeImg($fileName) {
		$dir = "thumbnails";
		$width = $this->scopeConfig->getValue('responsivebannerslider/setting/thumbnail_width',ScopeInterface::SCOPE_STORE);;
		if(trim($width) == "" || trim($width) < 0){
			$width = "200";
		}
				
		$mediaDir = $this->_filesystem->getDirectoryWrite(DirectoryList::MEDIA);
		$bannerDir = '/responsivebannerslider';
		$mediaDir->create($bannerDir);
        $mediaDir->changePermissions($bannerDir, DriverInterface::WRITEABLE_DIRECTORY_MODE);
        $bannerDir = $mediaDir->getAbsolutePath($bannerDir);
	 	$absPath = $bannerDir.$fileName;
		$imageResized = $bannerDir."/".$dir.$fileName;
		
		if ($width != '') {
			
			if (file_exists($imageResized)) {
				unlink($imageResized);
			} 
			
			$imageResize = $this->_imageFactory->create();
			$imageResize->open($absPath);
			$imageResize->constrainOnly(TRUE);
			$imageResize->keepTransparency(TRUE);
			$imageResize->keepFrame(FALSE);
			$imageResize->keepAspectRatio(true);
			$imageResize->resize($width);
			$dest = $imageResized ;
			$imageResize->save($dest);
		}
		$path = $bannerDir."/".$dir;
		if( chmod($path, 0777) ) {
				chmod($path, 0755);
		}
		
		$paths = $bannerDir;
		if( chmod($paths, 0777) ) {
				chmod($paths, 0755);
		}
		
		return true;

	}
	
	public function getCurrentUrl(){
		return $this->_urlBuilder->getCurrentUrl();
	}
	
}
