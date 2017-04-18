<?php if ( ixda_has_jobs() ) : ?>
<section id="job-board">
	<header class="job-board__section-title section-title">
		<h2>Bolsa de trabajo</h2>
	</header>
	<div class="container">
		<div class="row">
		<?php foreach ( ixda_has_jobs() as $job ) :  ?>
			<div class="col-sm-6 col-lg-3">
				<article class="job-board-entry">
					<!-- <time class="board-entry__published">Publicado el <?php echo date_i18n( 'j \d\e F', $job->get_date('U') ) ?></time>					 -->
					<time class="board-entry__published">Publicado hace <?php echo human_time_diff( $job->get_date('U') ); ?></time>
					<h3 class="board-entry__title">
						<a href="<?php echo esc_url( $job->get_link() ); ?>">
							<?php echo $job->get_title() ?> en <?php echo $job->get_author()->get_email() ?>
						</a>
					</h3>
					<div class="board__summary">
					</div>
					<?php echo wpautop( wp_trim_words( $job->get_description(), 25 ) ) ?>
				</article>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>