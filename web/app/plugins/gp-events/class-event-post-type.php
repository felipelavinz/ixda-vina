<?php

class Event_Post_Type extends GutenPress\Post_Type{
	public function get_post_type(){
		return 'event';
	}
	public function get_post_type_args(){
		return array(
			'label' => 'Eventos',
			'labels' => array(
				'name' => 'Eventos',
				'singular_name' => 'Evento',
				'menu_name' => 'Agenda'
			),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_icon' => 'dashicons-calendar-alt',
			'map_meta_cap' => true,
			'capability_type' => array( 'event', 'events' ),
			'supports' => [ 'title', 'thumbnail', 'editor' ],
			'rewrite' => array(
				'slug'       => 'eventos',
				'with_front' => false,
				'feeds'      => true,
				'pages'      => true
			)
		);
	}
}