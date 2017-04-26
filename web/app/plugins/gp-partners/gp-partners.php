<?php
/**
 * Plugin Name: IxDA Partners
 * Version: 0.1.0
 * Plugin URI: https://www.yukei.net
 * Description: Partners y sponsors IxDA Viña de Mar
 * Author: Felipe Lavín Z.
 * Author URI: https://www.yukei.net
 * Text Domain: gp_cpt_partner
 * Domain Path: /languages/
 * License: GPL v3
 */

 register_activation_hook( __FILE__, function(){
 	require_once __DIR__ .'/class-partner-post-type.php';
 	Partner_Post_Type::activate_plugin();
 });

 add_action('plugins_loaded', function(){
	require_once __DIR__ .'/class-partner-post-type.php';
	require_once __DIR__ .'/class-partner-post-query.php';
	require_once __DIR__ .'/class-partner-post-object.php';
});

add_action('init', array('Partner_Post_Type', 'register_post_type'));