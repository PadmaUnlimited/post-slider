<?php

class PadmaPostSliderBlockOptions extends PadmaBlockOptionsAPI {

	public $tabs = array();
	public $inputs = array();

	function __construct(){

		$this->tabs = array(
			'content-tab' 	=> 'Content'
		);


		$this->inputs = array(

			'content-tab' => array(
				'post-type' => array(
					'type' => 'select',
					'name' => 'post-type',
					'label' => 'Post type',
					'options' => 'get_post_types()',
					'callback' => 'reloadBlockOptions(block.id)',
					'default' => 'post',
					'tooltip' => '',
				),

				'content-to-show' => array(
					'type' => 'select',
					'name' => 'content-to-show',
					'label' => 'Content to show',
					'options' => array(
						'normal' => 'Normal',						
						'excerpts' => __('Show Excerpts','padma-post-slider'),
						'none' => __('Do not show content','padma-post-slider')
					),
					'default' => 'normal',
					'tooltip' => '',
				),

				'slider-style' => array(
					'type' => 'select',
					'name' => 'slider-style',
					'label' => 'Style',
					'default' => 'style1',
					'options' => array(
						'style1' => 'Style 1',
						'style2' => 'Style 2',
						'style3' => 'Style 3',
						'style4' => 'Style 4',
						'style5' => 'Style 5',
						'style6' => 'Style 6',
					)
				),

				'categories' => array(
					'type' => 'multi-select',
					'name' => 'categories',
					'label' => 'Categories',
					'tooltip' => '',
					'options' => 'get_categories()'
				),

				'order-by' => array(
					'type' => 'select',
					'name' => 'order-by',
					'label' => 'Order By',
					'tooltip' => '',
					'options' => array(
						'date' => 'Date',
						'title' => 'Title',
						'rand' => 'Random',
						'comment_count' => 'Comment Count',
						'ID' => 'ID',
						'author' => 'Author',
						'type' => 'Post Type',
						'menu_order' => 'Custom Order'
					)
				),
				
				'order' => array(
					'type' => 'select',
					'name' => 'order',
					'label' => 'Order',
					'tooltip' => '',
					'options' => array(
						'desc' => 'Descending',
						'asc' => 'Ascending',
					)
				),

				'auto_play' => array(
					'type' => 'select',
					'name' => 'auto_play',
					'label' => 'Auto play',
					'tooltip' => '',
					'options' => array(
						'true' => 'Yes',
						'false' => 'No',
					)
				),

				'show_items' => array(
					'type' => 'integer',
					'default' => 3,
					'name' => 'show_items',
					'label' => 'Show items',
					'tooltip' => '',				
				),

				'show_pagination' => array(
					'type' => 'select',		
					'name' => 'show_pagination',
					'label' => 'Show pagination',
					'tooltip' => '',
					'options' => array(
						'true' => 'Yes',
						'false' => 'No',
					)				
				),

				'read-more-label' => array(
					'type' => 'text',		
					'name' => 'read-more-label',
					'label' => 'Read more label',
					'tooltip' => '',
				),
			),

		);

	}

	function get_categories() {
		
		if( isset($this->block['settings']['post-type']) )
			return PadmaQuery::get_categories($this->block['settings']['post-type']);
		else
			return array();	
	}

	function get_tags() {		
		return PadmaQuery::get_tags();
	}

	function get_post_types() {		
		return PadmaQuery::get_post_types();
	}

	function get_authors() {		
		return PadmaQuery::get_authors();	
	}

	function get_taxonomies() {
		return PadmaQuery::get_taxonomies();
	}

	function get_post_status() {		
		return PadmaQuery::get_post_status();		
	}
}