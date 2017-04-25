<?php
	$header_img = wp_get_attachment_url( get_theme_mod('main_feature_img') );
?>
<div id="feature" class="feature"<?php echo $header_img ? " style='background-image: url($header_img)'" : " style='background-color: #576269';"; ?>>
	<div class="container">
	<?php if ( get_theme_mod('main_feature_text') ) : ?>
		<span class="feature__title"><?php echo get_theme_mod('main_feature_text') ?></span>
	<?php endif; ?>
	</div>
</div>