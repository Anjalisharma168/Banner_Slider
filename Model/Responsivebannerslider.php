<?php
namespace Dotsquare\Banner\Model;
class Responsivebannerslider extends \Magento\Framework\Model\AbstractModel
{
	const NOROUTE_PAGE_ID = 'no-route';
	const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 2;
	protected function _construct()
	{
		$this->_init('Dotsquare\Banner\Model\ResourceModel\Responsivebannerslider');
	}
	public function getPosition()
    {
        return [
            ['value' => 'content_top', 'label' => __('Content Top')],
            ['value' => 'content_bottom', 'label' => __('Content Bottom')],
           
        ];
    }
	public function getAnimationType()
    {
        return [
            ['value' => 'slide', 'label' => __('Slide')],
            ['value' => 'fade', 'label' => __('Fade')],
           
        ];
    }
	public function getAnimationDirection()
    {
        return [
            ['value' => 'horizontal', 'label' => __('Horizontal')],
            ['value' => 'vertical', 'label' => __('Vertical')],
           
        ];
    }
	public function getTheme()
    {
        return [
            ['value' => 'default', 'label' => __('Default')],
            ['value' => 'blank', 'label' => __('Blank')],
            ['value' => 'drop_shadow', 'label' => __('Drop Shadow')],
            ['value' => 'embose', 'label' => __('Embose')],
           
        ];
    }
	public function getType()
    {
        return [
            ['value' => 'basic', 'label' => __('Basic slider')],
            ['value' => 'carousel', 'label' => __('Carousel')],
            ['value' => 'bas-caro', 'label' => __('Basic slider with carousel navigation')],
        ];
    }
	public function getNavigation()
    {
        return [
            ['value' => 'hover', 'label' => __('On hover')],
            ['value' => 'always', 'label' => __('Always')],
            ['value' => 'never', 'label' => __('Never')],
        ];
    }
	public function getNavigationstyle()
    {
        return [
            ['value' => 'angle', 'label' => __('Angle')],
            ['value' => 'angle_small', 'label' => __('Angle Small')],
            ['value' => 'angle_circle', 'label' => __('Angle Circle')],
            ['value' => 'angle_square', 'label' => __('Angle Square')],
            ['value' => 'arrow', 'label' => __('Arrow')],
            ['value' => 'arrow_circle', 'label' => __('Arrow Circle')],
            ['value' => 'caret', 'label' => __('Caret')],
            ['value' => 'chevron', 'label' => __('Chevron')],
            ['value' => 'chevron_smooth', 'label' => __('Chevron Smooth')],
            ['value' => 'chevron_circle', 'label' => __('Chevron Circle')],
            ['value' => 'chevron_square', 'label' => __('Chevron Square')],
        ];
    }
	public function getNavigationarrow()
    {
        return [
            ['value' => 'inside', 'label' => __('Inside slider on both sides')],
            ['value' => 'outside', 'label' => __('Outside the slider on both sides')],
            ['value' => 'inside_left', 'label' => __('Inside slider grouped left')],
            ['value' => 'inside_right', 'label' => __('Inside slider grouped right')],
        ];
    }
	public function getPaginationstyle()
    {
        return [
            ['value' => 'circular', 'label' => __('Circular')],
            ['value' => 'squared', 'label' => __('Square')],
            ['value' => 'circular_bar', 'label' => __('Circular with bar')],
            ['value' => 'square_bar', 'label' => __('Square with bar')],
        ];
    }
	public function getPaginationposition()
    {
        return [
            ['value' => 'below', 'label' => __('Below the slider')],
            ['value' => 'above', 'label' => __('Above the slider')],
            ['value' => 'inside_top', 'label' => __('Inside top slider')],
            ['value' => 'inside_bottom', 'label' => __('Inside bottom slider')],
            ['value' => 'inside_bottom_left', 'label' => __('Inside bottom left')],
            ['value' => 'inside_bottom_right', 'label' => __('Inside bottom right')],
        ];
    }
	public function getAvailableStatuses()
    {
        return array(self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled'));
    }
}
