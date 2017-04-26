<div class="container">
	<article <?php post_class('single-page') ?>>
		<h1 class="entry-title single-page__title"><?php the_title(); ?></h1>
		<?php if ( has_excerpt() ) :  ?>
		<div class="entry-summary single-page__summary">
			<?php the_excerpt(); ?>
		</div>
		<?php endif; ?>
		<div class="entry-content single-page__content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Páginas:', 'after' => '</div>' ) ); ?>
		</div>
	</article>
</div>