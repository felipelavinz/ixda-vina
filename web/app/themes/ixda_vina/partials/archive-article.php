<article <?php post_class( has_post_thumbnail() ? 'archive-entry archive-entry--has-post-thumbnail' : 'archive-entry' ) ?>>
	<?php the_post_thumbnail('post-thumbnail', ['class' => 'archive-entry__image']); ?>
	<h2 class="entry-title archive-entry__title">
		<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
	</h2>
	<div class="archive-entry__meta entry__meta">
		<span class="archive-entry__published entry-published">
			<?php the_time('d \d\e F Y') ?>
		</span>
		<span class="archive-entry__category entry__category">
			<?php echo get_the_category_list(', ') ?>
		</span>
		<p class="archive-entry__author entry__author">
			<span>Autor:</span>
			<?php the_author(); ?>
		</p>
	</div>
</article>