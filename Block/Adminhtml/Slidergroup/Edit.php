<?php
namespace Dotsquare\Banner\Block\Adminhtml\Slidergroup;
class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    protected function _construct()
    {
		$this->_objectId = 'id';
        $this->_blockGroup = 'Dotsquare_Banner';
        $this->_controller = 'adminhtml_slidergroup';

        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save'));
        $this->buttonList->update('delete', 'label', __('Delete'));

        $this->buttonList->add(
            'saveandcontinue',
            array(
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => array(
                    'mage-init' => array('button' => array('event' => 'saveAndContinueEdit', 'target' => '#edit_form'))
                )
            ),
            -100
        );

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('block_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'banner_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'banner_content');
                }
            }
			function notEmpty(){
				var e = document.getElementById('page_navigation_style');
				var strUser = e.options[e.selectedIndex].value;
				document.getElementById('navigation_style_name').className = '';	
				document.getElementById('navigation_style_name').addClassName('cws '+strUser);				
			}
		";
    }
   
}
