<?php

class Event_Post_Object extends GutenPress\Post_Object{
	public function get_dtstart( $format ) {
		$date = DateTime::createFromFormat('Ymd', $this->post->dtstart );
		if ( $date instanceof DateTime ) {
			return $date->format( $format );
		}
		return '';
	}
}