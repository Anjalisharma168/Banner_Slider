<?php
namespace Dotsquare\Banner\Model\ResourceModel;
class Categories extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('dotsquaresbanner_category', 'category_id');
	
	}
	
}
