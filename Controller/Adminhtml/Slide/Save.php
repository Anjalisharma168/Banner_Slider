<?php
namespace Dotsquare\Banner\Controller\Adminhtml\Slide;
use Magento\Framework\App\Filesystem\DirectoryList;

class Save extends \Magento\Backend\App\Action
{
	public function execute()
    {
		$helper = $this->_objectManager->create('Dotsquare\Banner\Helper\Data');
        $data = $this->getRequest()->getPost()->toarray();
		
        if ($data) {
			$files =  $this->getRequest()->getFiles();
            $model = $this->_objectManager->create('Dotsquare\Banner\Model\Slide');
            if(isset($files['filename']['name']) && $files['filename']['name'] != '') {
			
				try {
								
					$uploader = $this->_objectManager->create('Magento\MediaStorage\Model\File\Uploader', array('fileId' => 'filename'));
					$uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
					$uploader->setAllowRenameFiles(true);
					$uploader->setFilesDispersion(true);
					$mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')->getDirectoryRead(DirectoryList::MEDIA);
					$config = $this->_objectManager->get('Dotsquare\Banner\Model\Slide');
					$result = $uploader->save($mediaDirectory->getAbsolutePath('responsivebannerslider'));
					unset($result['tmp_name']);
					unset($result['path']);
					$data['filename'] = $result['file'];
					$helper->resizeImg($data['filename']);
					
				}catch (\Exception $e) {
					$this->messageManager->addException($e, __('Please Select Valid Image File'));
					$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('slide_id'), '_current' => true));
					return;
				} 
			}
			else{
				if (isset($data['filename']['delete']) && $data['filename']['delete'] == 1){
					$data['filename'] = '';
				}else {
					unset($data['filename']);
				}		
				
			}
			$id = $this->getRequest()->getParam('slide_id');
		    if ($id) {
                $model->load($id);
			}
		
			$model->setData($data);

            try {
				
				$group_label ='';
				for($i=0;$i<count($data['group_names']);$i++) {
					if($i < count($data['group_names'])-1){
						$group_label .= $data['group_names'][$i].",";
					}else{
						$group_label .= $data['group_names'][$i];
					}
				}
				
				if($data['date_enabled'] == 1) {
					$validateResult = $model->validateData($data);
					if ($validateResult == false) {
						$this->messageManager->addError(__('To Date must be greater than From Date.'));
						$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('slide_id'), '_current' => true));
						return;
					} 	
				}
				
				$model->setData("group_names",$group_label);
			    $model->save();
	
                $this->messageManager->addSuccess(__('Slide was successfully saved'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getSlideId(), '_current' => true));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (\Magento\Framework\Model\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the slide.'));
            }

            $this->_getSession()->setFormData($data);
			$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('slide_id')));
            return;
        }
        $this->_redirect('*/*/');
    }
	protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dotsquare_Banner::Heading');
    }
}
