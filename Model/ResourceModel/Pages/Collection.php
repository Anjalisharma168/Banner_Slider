<?php
namespace Dotsquare\Banner\Model\ResourceModel\Pages;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Dotsquare\Banner\Model\Pages', 'Dotsquare\Banner\Model\ResourceModel\Pages');
	}
	
}
