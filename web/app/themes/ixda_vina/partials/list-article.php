<article <?php post_class( has_post_thumbnail() ? 'list-entry--has-post-thumbnail list-entry' : 'list-entry' ) ?>>
	<?php the_post_thumbnail('post-thumbnail', ['class' => is_archive() ? 'archive-entry__image' : 'list-entry__image']); ?>
	<h2 class="entry-title list-entry__title">
		<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
	</h2>
	<div class="list-entry__meta entry__meta">
		<span class="list-entry__published entry-published">
			<?php the_time('d \d\e F Y') ?>
		</span>
		<span class="list-entry__category entry__category">
			<?php echo get_the_category_list(', ') ?>
		</span>
		<p class="list-entry__author entry__author">
			<span>Autor:</span>
			<?php the_author(); ?>
		</p>
	</div>
	<?php if ( ! is_archive() ) : ?>
	<div class="entry-summary list-entry__summary">
		<?php the_excerpt() ?>
	</div>
	<?php endif; ?>
</article>