<?php

class Partner_Post_Query extends GutenPress\Post_Query{
	public function get_post_type(){
		return 'partner';
	}
	public function get_decorator(){
		return 'Partner_Post_Object';
	}
}