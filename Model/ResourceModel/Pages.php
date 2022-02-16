<?php
namespace Dotsquare\Banner\Model\ResourceModel;
class Pages extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('dotsquaresbanner_page', 'page_id');
	
	}
	
}
