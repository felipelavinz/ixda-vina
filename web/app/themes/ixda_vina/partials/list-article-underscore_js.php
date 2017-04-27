<script type="text/template" id="list-article__template">
<div class="col-sm-6">
	<article class="list-entry <% if ( post._embedded['wp:featuredmedia'] ) { %>list-entry--has-post-thumbnail<% } %>">
		<% if ( post._embedded['wp:featuredmedia'] ) { %>
			<img src="<%= post._embedded['wp:featuredmedia'][0].media_details.sizes['post-thumbnail'].source_url %>" class="list-entry__image wp-post-image" alt="" width="200" height="135">
		<% } %>
		<h2 class="entry-title list-entry__title">
			<a href="<%= post.link %>"><%= post.title.rendered %></a>
		</h2>
		<div class="list-entry__meta entry__meta">
			<span class="list-entry__published entry-published">
				<%= helpers.the_time( post.date ) %>
			</span>
			<% if ( post.categories.length > 0 ) { %>
			<span class="list-entry__category entry__category">
				<%= helpers.the_categories( post._embedded['wp:term'] ) %>
			</span>
			<% } %>
			<% if ( post._embedded.author ) { %>
			<p class="list-entry__author entry__author">
				<span>Autor:</span>
				<%= post._embedded.author[0].name %>
			</p>
			<% } %>
		</div>
		<div class="entry-summary list-entry__summary">
			<%= post.excerpt.rendered %>
		</div>
	</article>
</div>
</script>