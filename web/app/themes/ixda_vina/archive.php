<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package IxDA_Viña_del_Mar
 */

get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container">
			<div class="row">
				<div class="col-10">
					<header class="page-header archive__header">
						<?php
							the_archive_title( '<h1 class="page-title archive__title">', '</h1>' );
							the_archive_description( '<div class="archive__description">', '</div>' );
						?>
					</header><!-- .page-header -->
				</div>
			</div>
			<?php if ( have_posts() ) : ?>
			<div class="row archive-articles">
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-sm-3">
					<?php get_template_part('partials/archive-article'); ?>
				</div>
				<?php endwhile; ?>
			</div>
			<div class="row articles__more-container">
				<div class="col-12">
					<a id="articles__load-more" href="#" class="btn-default btn-ghost">Cargar más publicaciones</a>
				</div>
			</div>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_template_part('partials/subscribe'); ?>
<?php get_footer(); ?>