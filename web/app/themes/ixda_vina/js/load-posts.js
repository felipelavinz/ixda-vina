;(function( d ){
	var page      = 2;
	var btn       = document.getElementById('articles__load-more');
	var tpl_el    = document.getElementById('list-article__template');
	var template  = _.template( tpl_el.textContent );
	var receiver  = document.getElementById('articles__receiver');
	btn.onclick  = function( event ) {
		event.preventDefault();
		var ajax = new XMLHttpRequest;
		ajax.open('GET', 'http://www.ixdavina.lo/wp-json/wp/v2/posts/?per_page=2&page='+ page +'&_embed=true', true);
		ajax.onload = function(){
			if ( this.status >= 200 && this.status < 400 ) {
				var data      = JSON.parse( ajax.response );
				var new_posts = '';
				_.forEach( data, function( post ){
					new_posts += template( post );
				} );
				receiver.querySelector('div.col-sm-6:last-child').insertAdjacentHTML('afterend', new_posts);
				++page;
			}
		};
		ajax.send();
	};
})( document );
