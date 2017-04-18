<?php get_header() ?>
<div id="feature" class="feature">
	<div class="container">
		<span class="feature__title">Un espacio para ampliar el conocimiento de la experiencia de usuario</span>
	</div>
</div>
<div id="about" class="about">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h2 class="like-title">Somos IxDA Viña del Mar</h2>
				<p>Somos representantes de Viña del Mar dentro de IxDA Chile y Latinoamerica. Conformamos este grupo en el año 2015 con la finalidad de dar a conocer la disciplina de la UX en Chile y profundizar en los conocimientos y metdologías de esta área del diseño.</p>
				<a href="#" class="see-more btn btn-ghost btn-default">Leer más</a>
			</div>
			<div class="col-sm-6">
				<h2 class="like-title">Equipo IxDA Viña del Mar</h2>
				<p>Somos representantes de Viña del Mar dentro de IxDA Chile y Latinoamerica. Conformamos este grupo en el año 2015 con la finalidad de dar a conocer la disciplina de la UX en Chile y profundizar en los conocimientos y metdologías de esta área del diseño.</p>
				<a href="#" class="see-more btn btn-ghost btn-default">Leer más</a>
			</div>
		</div>
	</div>
</div>
<div id="feature-secondary" class="feature-secondary">
	<div class="container">
		<div class="row">
			<div class="col-sm-11">
				<span class="feature-secondary__title">
					“48% OF USERS SAY THAT IF A WEBSITE DOESN´T WORK WELL ON MOBILE, THEY INTERPRET IT AS THE BUSINESS SIMPLY NOT CARING”
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<span class="feature-secondary__description">
					7 UX DESIGN TRENDS: THAT WILL RULE THE ROOST IN 2016
				</span>
			</div>
		</div>
	</div>
</div>
<?php if ( have_posts() ) : ?>
<section id="articles">
	<header class="articles__section-title section-title">
		<h2>Últimas Publicaciones</h2>
	</header>
	<div class="container">
		<div class="row">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="col-sm-6">
				<?php get_template_part('partials/list-article') ?>
			</div>
		<?php endwhile; ?>
		</div>
		<div class="row articles__more-container">
			<div class="col-12">
				<a id="articles__load-more" href="#" class="btn-default btn-ghost">Leer más</a>
			</div>
		</div>
	</div>
	<!-- cargar más -->
</section>
<?php endif; ?>
<?php get_template_part('partials/subscribe'); ?>
<?php if ( ixda_has_events() ) : ?>
<section id="events">
	<header class="events__section-title section-title">
		<h2>Agenda</h2>
	</header>
	<div class="container">
		<div class="row">
			<?php foreach ( ixda_has_events() as $event ) : ?>
				<div class="col-sm-4">
					<article class="vevent event">
						<header class="event__header">
							<time class="event__dtstart">
								<span class="event__dtstart-month"><?php echo $event->get_dtstart('M') ?></span>
								<span class="event__dtstart-day"><?php echo $event->get_dtstart('j') ?></span>
							</time>
							<h3 class="event__title">
								<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
							</h3>
						</header>
						<div class="event__summary">
							<?php the_excerpt() ?>
						</div>
					</article>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>
<?php get_template_part('partials/front-page__job-board'); ?>
<?php if ( ixda_has_partners() ) : ?>
<section id="partners">
	<header class="partners__section-header">
		<h2 class="section-title">Partners</h2>
	</header>
	<div class="container">
		<div class="row">
		<?php for ( $i = 0; $i < 4; $i++ ) : ?>
			<div class="col-md-3">
				{Logo goes here}
			</div>
		<?php endfor; ?>
		</div>
	</div>
</section>
<?php endif; ?>
<?php get_footer() ?>