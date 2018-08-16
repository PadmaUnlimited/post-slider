<?php

class PadmaPostSliderBlockOptions extends PadmaBlockOptionsAPI {

	public $tabs = array(
		'content-tab' 	=> 'Content'
	);


	public $inputs = array(

		'content-tab' => array(
			'post-type' => array(
				'type' => 'select',
				'name' => 'post-type',
				'label' => 'Which Product',
				'options' => array(
					'none' 		=> 'Choose your product',
					'woo' 		=> 'WooCommerce',
					'cf7' 		=> 'Contact Form 7',
					'gravity' 	=> 'Gravity Forms',
					'price' 	=> 'Price Tables'
				),
				'default' => 'post',
				'tooltip' => '',		
				'options' => 'get_post_types()',
				'callback' => ''
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
		),

	);

	function get_categories() {
		
		$category_options 			= array();		
		$categories_select_query 	= get_categories();
		
		foreach ($categories_select_query as $category)
			$category_options[$category->term_id] = $category->name;

		return $category_options;	
	}

	function get_tags() {
		
		$tag_options = array();
		$tags_select_query = get_terms('post_tag');
		foreach ($tags_select_query as $tag)
			$tag_options[$tag->term_id] = $tag->name;
		$tag_options = (count($tag_options) == 0) ? array('text'	 => 'No tags available') : $tag_options;
		return $tag_options;
	}

	function get_post_types() {
		
		$post_type_options 	= array();
		$post_types 		= get_post_types(false, 'objects'); 
			
		foreach($post_types as $post_type_id => $post_type){
			
			//Make sure the post type is not an excluded post type.
			if(in_array($post_type_id, array('revision', 'nav_menu_item'))) 
				continue;
			
			$post_type_options[$post_type_id] = $post_type->labels->name;
		
		}
		
		return $post_type_options;
	}

	function get_authors() {
		
		$author_options = array();
		
		$authors = get_users(array(
			'orderby' => 'post_count',
			'order' => 'desc',
			'who' => 'authors'
		));
		
		foreach ( $authors as $author )
			$author_options[$author->ID] = $author->display_name;
			
		return $author_options;	
	}

	function get_taxonomies() {

		$taxonomy_options = array('&ndash; Default: Category &ndash;');

		$taxonomy_select_query=get_taxonomies(false, 'objects', 'or');

		
		foreach ($taxonomy_select_query as $taxonomy)
			$taxonomy_options[$taxonomy->name] = $taxonomy->label;
		
		
		return $taxonomy_options;
	}

	function get_post_status() {
		
		return get_post_stati();
		
	}
}