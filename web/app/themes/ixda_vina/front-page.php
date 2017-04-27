<?php get_header(); ?>
<?php get_template_part('partials/front-page__feature'); ?>
<div id="about" class="about">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h2 class="like-title about__about-title"><?php echo get_theme_mod('about_about_title', 'Somos IxDA Viña del Mar'); ?></h2>
				<div class="about__about-description">
					<?php echo wpautop( wptexturize( get_theme_mod('about_about_description') ) ); ?>
				</div>
				<?php if ( get_theme_mod('about_about_url') ) : ?>
				<a href="<?php echo esc_url( get_theme_mod('about_about_url') ); ?>" class="see-more btn btn-ghost btn-default">Leer más</a>
				<?php endif; ?>
			</div>
			<div class="col-sm-6">
				<h2 class="like-title about__team-title"><?php echo get_theme_mod('about_team_title', 'Equipo IxDA Viña del Mar'); ?></h2>
				<div class="about__team-description">
					<?php echo wpautop( wptexturize( get_theme_mod('about_team_description') ) ); ?>
				</div>
				<?php if ( get_theme_mod('about_team_url') ) : ?>
				<a href="<?php echo esc_url( get_theme_mod('about_team_url') ); ?>" class="see-more btn btn-ghost btn-default">Leer más</a>
				<?php endif; ?>
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
		<div id="articles__receiver" class="row">
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
<script type="text/template" id="list-article__template">
<div class="col-sm-6">
	<article class="list-entry <% if ( _embedded['wp:featuredmedia'] ) { %>list-entry--has-post-thumbnail<% } %>">
		<% if ( _embedded['wp:featuredmedia'] ) { %>
			<img src="<%= _embedded['wp:featuredmedia'][0].media_details.sizes['post-thumbnail'].source_url %>" class="list-entry__image wp-post-image" alt="" width="200" height="135">
		<% } %>
		<h2 class="entry-title list-entry__title">
			<a href="<%= link %>"><%= title.rendered %></a>
		</h2>
		<div class="list-entry__meta entry__meta">
			<span class="list-entry__published entry-published">
				<%= date %>
			</span>
			<span class="list-entry__category entry__category">
			</span>
			<% if ( _embedded.author ) { %>
			<p class="list-entry__author entry__author">
				<span>Autor:</span>
				<%= _embedded.author[0].name %>
			</p>
			<% } %>
		</div>
		<div class="entry-summary list-entry__summary">
			<%= excerpt.rendered %>
		</div>
	</article>
</div>
</script>
</section>
<?php endif; ?>
<?php get_template_part('partials/subscribe'); ?>
<?php if ( $events = ixda_has_events() ) : ?>
<section id="events">
	<header class="events__section-title section-title">
		<h2>Agenda</h2>
	</header>
	<div class="container">
		<div class="row">
			<?php foreach ( $events as $event ) : ?>
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
<?php if ( $partners = ixda_has_partners() ) : ?>
<section id="partners">
	<header class="partners__section-header">
		<h2 class="section-title">Partners</h2>
	</header>
	<div class="container">
		<div class="row">
		<?php foreach ( $partners as $partner ) : ?>
			<div class="col-6 col-md-3">
				<div class="partner">
					<?php the_post_thumbnail('partner-logo') ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>
<?php get_footer() ?>