<?php
namespace Dotsquare\Banner\Model\ResourceModel;
class Slide extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('dotsquaresbanner_slide', 'slide_id');
	
	}
	
}
