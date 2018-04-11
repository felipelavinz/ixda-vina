<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IxDA_Viña_del_Mar
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<span id="logo-ixda--footer">
							<?php include __DIR__ .'/img/src/logo-ixda.svg' ?>
						</span>
					</div>
					<div class="col-sm-6">
						Email: <a href="mailto:vinadelmar@ixda.org">vinadelmar@ixda.org</a><br>
						#ixdaviña
					</div>
					<div class="col-sm-4">
						<nav class="social-menu">
							<ul>
								<li>
									<span class="icon icon-facebook" data-grunticon-embed></span>
									<a href="https://www.facebook.com/ixdavina/">ixdavina</a>
								</li>
								<!-- <li><a href=""></a></li> -->
								<li>
									<span class="icon icon-twitter" data-grunticon-embed></span>
									<a href="https://twitter.com/ixda_vina">@ixda_vina</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
