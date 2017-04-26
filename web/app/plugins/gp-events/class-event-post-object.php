<?php

class Event_Post_Object extends GutenPress\Post_Object{
	public function get_dtstart( $format ) {
		$date = DateTime::createFromFormat('Y-m-d', $this->post->dtstart );
		if ( ! $date ) {
			return '';
		}
		return $date->format( $format );
	}
}