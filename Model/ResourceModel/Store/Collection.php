<?php
namespace Dotsquare\Banner\Model\ResourceModel\Store;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Dotsquare\Banner\Model\Store', 'Dotsquare\Banner\Model\ResourceModel\Store');
	}
	
}
