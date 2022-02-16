<?php
namespace Dotsquare\Banner\Model\ResourceModel\Categories;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Dotsquare\Banner\Model\Categories', 'Dotsquare\Banner\Model\ResourceModel\Categories');
	}
	
}
