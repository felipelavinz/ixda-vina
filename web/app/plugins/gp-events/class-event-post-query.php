<?php

class Event_Post_Query extends GutenPress\Post_Query{
	public function get_post_type(){
		return 'event';
	}
	public function get_decorator(){
		return 'Event_Post_Object';
	}
	public static function filter_query( $q ) {
		if ( $q->get('post_type') != 'event' )
			return;
		$q->set('meta_query', [
			[
				'key'     => 'dtend',
				'value'   => date_i18n('Y-m-d'),
				'compare' => '>=',
				'type'    => 'DATE'
			]
		]);
		$q->set('orderby', 'meta_value_num');
		$q->set('order', 'ASC');
		$q->set('meta_key', 'dtstart');
	}
}