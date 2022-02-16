<?php
namespace Dotsquare\Banner\Model\ResourceModel\Slide;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Dotsquare\Banner\Model\Slide', 'Dotsquare\Banner\Model\ResourceModel\Slide');
	}
	
}
