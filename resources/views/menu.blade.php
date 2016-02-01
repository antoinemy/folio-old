<nav class="navbar navbar-fixed-top">
	<div class="container">
		<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<h3 class="masthead-brand float-left"><span class="lucide">Antoine</span> My</h3>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav masthead-nav">
					<li class="{{ active(['/']) }}"><a href="{{ route('home') }}">À propos</a></li>
					<li class="{{ active(['articles', 'articles/*']) }}"><a href="{{ route('articles_listing') }}">Articles</a></li>
					<li class="{{ active(['projects', 'projects/*']) }}"><a href="{{ route('projects_listing') }}">Projets</a></li>
					<li class="{{ active(['contact']) }}"><a href="{{ route('contact') }}">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>