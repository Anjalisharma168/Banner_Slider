<?php
namespace Dotsquare\Banner\Model\ResourceModel;
class Store extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('dotsquaresbanner_store', 'store_ids');
	
	}
	
}
