<?php
/**
 * Plugin Name: Events (for GutenPress)
 * Version: 0.1.0
 * Plugin URI: https://www.yukei.net
 * Description: Events management (for GutenPress)
 * Author: Felipe Lavín Z.
 * Author URI: https://www.yukei.net
 * Text Domain: gp_cpt_event
 * Domain Path: /languages/
 * License: GPL v3
 */

 register_activation_hook( __FILE__, function(){
 	require_once __DIR__ .'/class-event-post-type.php';
 	Event_Post_Type::activate_plugin();
 });

 add_action('plugins_loaded', function(){
	require_once __DIR__ .'/class-event-post-type.php';
	require_once __DIR__ .'/class-event-post-query.php';
	require_once __DIR__ .'/class-event-post-object.php';
});

add_action('init', array('Event_Post_Type', 'register_post_type'));
add_action('pre_get_posts', array('Event_Post_Query', 'filter_query'));