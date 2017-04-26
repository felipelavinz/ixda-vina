<?php

use GutenPress\Metabox;
use GutenPress\Forms\Element;

class Event_Metabox extends Metabox{
	public function get_fields(){
		global $post;
		
		// return compact( 'description', 'related', 'distributor', 'currency', 'price', 'taxes' );
	}
	public function sanitize_data( $data ){
		foreach ( $data as $key => &$val ) {
			$val = sanitize_text_field( $val );
		}
		return $data;
	}
}
new Event_Metabox('event_meta', 'Información del Evento', 'event');