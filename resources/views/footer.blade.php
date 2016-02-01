<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<div class="row">
					<div class="col-md-8">
						<ul>
							<li><a href="{{ route('home') }}">À propos</a></li>
							<li><a href="{{ route('articles_listing') }}">Articles</a></li>
							<li><a href="{{ route('projects_listing') }}">Créations</a></li>
							<li><a href="{{ route('contact') }}">Contact</a></li>
						</ul>
					</div>
					<div class="col-md-4 text-right">
						<ul class="inline">
							<li class="m-l-20">© Antoine My</li>
							@if(!empty($url_cv))
							<li><a href="{{ $url_cv }}"><span class="fa fa-file-text m-l-5"></span></a></li>
							@endif
							<li><a href="{{ route('sitemap') }}"><span class="fa fa-sitemap"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>