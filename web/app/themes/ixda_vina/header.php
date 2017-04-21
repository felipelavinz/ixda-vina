<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IxDA_Viña_del_Mar
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'ixda_vina' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<img class="logo-ixda--mobile visible-xs" src="<?php echo get_stylesheet_directory_uri() ?>/img/dist/logo-ixda.svg" alt="IxDA Viña del Mar" />
			<?php
				wp_nav_menu([
					'theme_location'  => 'auxiliary',
					'menu_id'         => 'aux-menu',
					'container'       => 'nav',
					'container_class' => 'aux-menu',
					'fallback_cb'     => null,
					'depth'           => 1
				]);
			?>
				<nav id="site-navigation" class="site-navigation main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="sr-only"><?php esc_html_e( 'Menú Principal', 'ixda_vina' ); ?></span>
						<span class="icon icon-menu" data-grunticon-embed></span>
						<span class="icon icon-close" data-grunticon-embed></span>
					</button>
					<?php
						wp_nav_menu( [
							'theme_location' => 'main',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'main-menu',
							'fallback_cb'    => null,
							'depth'          => 1,
						]);
					?>
				</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<div id="main-wrap" class="site-main-wrap">
