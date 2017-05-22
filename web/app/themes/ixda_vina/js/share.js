jQuery(document).ready(function($){
	$('nav.single-post__share').on('click', 'a', function(event){
		event.preventDefault();
		window.open( event.currentTarget.href, 'ixda_share', 'height=300,width=500' );
	});
});