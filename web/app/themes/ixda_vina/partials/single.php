<div class="container">
	<article <?php post_class('the-post single-post') ?>>
		<header class="single-post__header">
			<?php the_post_thumbnail('single-post__hero--lg', ['class' => 'single-post__image']) ?>
			<div class="single-post__header-text<?php echo has_post_thumbnail() ? ' single-post__header-text--has-image' : ''; ?>">
				<h1 class="entry-title single-post__title"><?php the_title(); ?></h1>
				<div class="row">
					<div class="col-sm-8 single-post__meta">
						<p><?php the_time('F Y') ?> | <?php echo get_the_category_list(', ') ?></p>
						<p>Autor: <?php the_author_link(); ?></p>
					</div>
					<div class="col-sm-4 single-post__share">
						<nav class="single-post__share">
							<button class="single-post__share-icon" id="single-post__share-linkedin" title="Compartir en LinkedIn">
								<span class="icon icon-linkedin" data-grunticon-embed></span>
							</button>
							<button class="single-post__share-icon" id="single-post__share-twitter" title="Compartir en Twitter">
								<span class="icon icon-twitter" data-grunticon-embed></span>
							</button>
							<button class="single-post__share-icon" id="single-post__share-facebook">
								<span class="icon icon-facebook" data-grunticon-embed></span>
							</button>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<?php if ( has_excerpt() ) :  ?>
		<div class="entry-summary single-post__summary">
			<?php the_excerpt(); ?>
		</div>
		<?php endif; ?>
		<div class="entry-content single-post__content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Páginas:', 'after' => '</div>' ) ); ?>
		</div>
	</article>
</div>