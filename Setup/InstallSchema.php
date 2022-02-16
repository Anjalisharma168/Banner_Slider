<?php
namespace Dotsquare\Banner\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $table = $installer->getConnection()->newTable(

		$installer->getTable('dotsquaresbanner_group')
			)->addColumn(
				'slidergroup_id',
				\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
				null,
				array('identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true),
				'slidergroup_id'
			)->addColumn(
				'title',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				array('nullable' => false),
				'title'
			)->addColumn(
				'position',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				array('nullable' => false),
				'position'
			)->addColumn(
				'sort_order',
				\Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
				50,
				array('nullable' => false, 'default' => '0'),
				'sort_order'
			)->addColumn(
				'status',
				\Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
				50,
				array('nullable' => false),
				'status'
			)->addColumn(
				'start_animation',
				\Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
				50,
				array('nullable' => false),
				'start_animation'
			)->addColumn(
				'start_animation',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'start_animation'
			)->addColumn(
				'loop_slider',
				\Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
				50,
				array('nullable' => false),
				'loop_slider'
			)->addColumn(
				'pause_snavigation',
				\Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
				50,
				array('nullable' => false),
				'pause_snavigation'
			)->addColumn(
				'pause_shover',
				\Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
				50,
				array('nullable' => false),
				'pause_shover'
			)->addColumn(
				'animation_type',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'animation_type'
			)->addColumn(
				'animation_duration',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false, 'default' => '600'),
				'animation_duration'
			)->addColumn(
				'animation_direction',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'animation_direction'
			)->addColumn(
				'slide_duration',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false, 'default' => '7000'),
				'slide_duration'
			)->addColumn(
				'random_order',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'random_order'
			)->addColumn(
				'smooth_height',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false, 'default' => '1'),
				'smooth_height'
			)->addColumn(
				'max_width',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'max_width'
			)->addColumn(
				'slider_theme',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'slider_theme'
			)->addColumn(
				'slider_type',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'slider_type'
			)->addColumn(
				'content_background',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'content_background'
			)->addColumn(
				'content_opacity',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'content_opacity'
			)->addColumn(
				'thumbnail_size',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false, 'default' => '200'),
				'thumbnail_size'
			)->addColumn(
				'navigation_arrow',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'navigation_arrow'
			)->addColumn(
				'navigation_style',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'navigation_style'
			)->addColumn(
				'navigation_aposition',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'navigation_aposition'
			)->addColumn(
				'navigation_acolor',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'navigation_acolor'
			)->addColumn(
				'show_pagination',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'show_pagination'
			)->addColumn(
				'pagination_style',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'pagination_style'
			)->addColumn(
				'pagination_position',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'pagination_position'
			)->addColumn(
				'pagination_color',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'pagination_color'
			)->addColumn(
				'pagination_active',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'pagination_active'
			)->addColumn(
				'pagination_bar',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				50,
				array('nullable' => false),
				'pagination_bar'
			);
					
        $installer->getConnection()->createTable($table);

		$table = $installer->getConnection()
            ->newTable($installer->getTable('dotsquaresbanner_page'))
            ->addColumn(
                'page_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true,  'nullable' => false, 'primary' => true],
                'page_id'
            )
            ->addColumn(
                'slidergroup_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'slidergroup_id'
            )
            ->addColumn(
                'pages',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'pages'
            );
                       
        $installer->getConnection()->createTable($table);

		$table = $installer->getConnection()
            ->newTable($installer->getTable('dotsquaresbanner_category'))
            ->addColumn(
                'category_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'category_id'
            )
            ->addColumn(
                'slidergroup_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'slidergroup_id'
            )
            ->addColumn(
                'category_ids',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'category_ids'
            );
                   
        $installer->getConnection()->createTable($table);
		
		

		$table = $installer->getConnection()
            ->newTable($installer->getTable('dotsquaresbanner_product'))
            ->addColumn(
                'product_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'product_id'
            )
            ->addColumn(
                'slidergroup_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'slidergroup_id'
            )
            ->addColumn(
                'product_sku',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'product_sku'
            );
                   
        $installer->getConnection()->createTable($table);
		
		$table = $installer->getConnection()
            ->newTable($installer->getTable('dotsquaresbanner_store'))
            ->addColumn(
                'store_ids',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'store_ids'
            )
            ->addColumn(
                'slidergroup_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'slidergroup_id'
            )
            ->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'store_id'
            );
                   
        $installer->getConnection()->createTable($table);
		
		$table = $installer->getConnection()
            ->newTable($installer->getTable('dotsquaresbanner_slide'))
            ->addColumn(
                'slide_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'slide_id'
            )
			->addColumn(
				'group_names',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				array('nullable' => false),
				'group_names'
			)
			->addColumn(
				'titles',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				array('nullable' => false),
				'titles'
			)
			->addColumn(
				'img_video',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				array('nullable' => false),
				'img_video'
			)
            ->addColumn(
                'img_hosting',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'img_hosting'
            )
			->addColumn(
				'video_id',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				array('nullable' => false),
				'video_id'
			)
			->addColumn(
				'hosted_url',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				512,
				array('nullable' => false),
				'hosted_url'
			)
			->addColumn(
				'hosted_thumb',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				512,
				array('nullable' => false),
				'hosted_thumb'
			)
			->addColumn(
				'filename',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				array('nullable' => false),
				'filename'
			)
			->addColumn(
				'alt_text',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				array('nullable' => false),
				'alt_text'
			)
			->addColumn(
				'url',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				array('nullable' => false),
				'url'
			)
			->addColumn(
				'url_target',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				array('nullable' => false),
				'url_target'
			)
			->addColumn(
				'description',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				512,
				array('nullable' => false),
				'description'
			)
            ->addColumn(
                'date_enabled',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'date_enabled'
            )
			->addColumn(
                'from_date',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                null,
                [],
                'from_date'
            )
			 ->addColumn(
                'to_date',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                null,
                [],
                'to_date'
            )
			->addColumn(
                'sort_order',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '1'],
                'sort_order'
            )
			->addColumn(
                'statuss',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '1'],
                'statuss'
            );
                   
        $installer->getConnection()->createTable($table);
		$installer->endSetup();

    }
}
