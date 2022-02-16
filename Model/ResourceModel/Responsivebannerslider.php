<?php
namespace Dotsquare\Banner\Model\ResourceModel;
class Responsivebannerslider extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('dotsquaresbanner_group', 'slidergroup_id');
	
	}
	
}
