;(function( d ){
	var page      = 2;
	var btn       = document.getElementById('articles__load-more');
	var tpl_el    = document.getElementById('list-article__template');
	var template  = _.template( tpl_el.textContent );
	var receiver  = document.getElementById('articles__receiver');
	var helpers   = {
		the_time: function( time_str ) {
			var the_date  = new Date( time_str );
			var the_day   = the_date.getDate() < 10 ? '0'+ the_date.getDate() : the_date.getDate();
			var the_month = ixda_loader.months[ the_date.getMonth() ];
			var the_year  = the_date.getFullYear();
			return the_day + ' de ' + the_month + ' ' + the_year;
		},
		the_categories : function( post_terms ) {
			var categories = _.filter( post_terms, function( taxonomy_terms ){
				if ( taxonomy_terms[0] && taxonomy_terms[0].taxonomy == 'category' ) {
					return true;
				}
			});
			var categories_list = [];
			categories[0].forEach(function( cat ) {
				categories_list.push('<a href="'+ cat.link +'" rel="category tag">'+ cat.name +'</a>');
			});
			return categories_list.join(', ');
		}
	};
	btn.onclick  = function( event ) {
		btn.className += ' articles__load-more--loading';
		event.preventDefault();
		var ajax = new XMLHttpRequest;
		ajax.open('GET', ixda_loader.wp_json +'?per_page=2&page='+ page +'&_embed=true', true);
		ajax.onload = function(){
			if ( this.status >= 200 && this.status < 400 ) {
				var data        = JSON.parse( ajax.response );
				var new_posts   = '';
				var total_pages = parseInt( ajax.getResponseHeader('X-WP-TotalPages'), 10 );
				_.forEach( data, function( post ){
					new_posts += template({ post: post, helpers: helpers });
				} );
				receiver.querySelector('div.col-sm-6:last-child').insertAdjacentHTML('afterend', new_posts);
				++page;
				if ( total_pages == page ) {
					btn.className += ' hidden-xl-down';
				}
			} else {
				// error: el cliente se conecta al servidor pero recibe respuesta de error
				// @todo mostrar mensaje de error
			}
			btn.className = btn.className.replace(' articles__load-more--loading', '');
		};
		ajax.onerror = function(){
			// @todo error al conectar al servidor
			btn.className = btn.className.replace('articles__load-more--loading', '');
		};
		ajax.send();
	};
})( document );
