<?php

use GutenPress\Post_Type;

class Partner_Post_Type extends Post_Type{
	public function get_post_type(){
		return 'partner';
	}
	public function get_post_type_args(){
		return array(
			'label' => 'Partners y Sponsors',
			'labels' => array(
				'name' => 'Partners',
				'singular_name' => 'Partner',
				'menu_name' => 'Partner'
			),
			'public' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_icon' => 'dashicons-thumbs-up',
			'map_meta_cap' => true,
			'capability_type' => [ 'partner', 'partners' ],
			'supports' => [ 'title', 'thumbnail', 'editor', 'page-attributes' ],
			'rewrite' => [
				'slug'       => 'partner',
				'with_front' => false,
				'feeds'      => true,
				'pages'      => true
			]
		);
	}
}