<!-- begin #sidebar -->
<div id="sidebar" class="sidebar p-t-0">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<div class="image">
					<a href="javascript:;"><img src="{{ asset('assets/img/user-13.jpg') }}" alt="" /></a>
				</div>
				<div class="info">
					<a href="{{ route('user_edit', Auth::user()->id) }}">{{ Auth::user()->lastname.' '.Auth::user()->firstname }}</a>
					<small><a href="{{ route('logout') }}"><span class="fa fa-sign-out"></span> Déconnexion</a></small>
				</div>
			</li>
		</ul>
		<ul class="nav">
			<li class="nav-header">Navigation</li>
			<li class="{{ active('admin/dashboard*') }}"><a href="{{ route('dashboard') }}"><i class="fa fa-laptop"></i> Tableau de bord</a></li>
			<li class="{{ active('admin/about*') }}"><a href="{{ route('about') }}"><i class="fa fa-home"></i> À propos</a></li>
			<li class="{{ active('admin/articles*') }}"><a href="{{ route('articles') }}"><i class="fa fa-edit"></i> Articles</a></li>
			<li class="{{ active('admin/projects*') }}"><a href="{{ route('projects') }}"><i class="fa fa-photo"></i> Projets</a></li>
			<li class="{{ active('admin/categories*') }}"><a href="{{ route('categories') }}"><i class="fa fa-group"></i> Catégories</a></li>
			<li class="{{ active('admin/contact*') }}"><a href="{{ route('contact_admin') }}"><i class="fa fa-files-o"></i> Contact</a></li>
			<li class="{{ active('admin/sitemap*') }}"><a href="{{ route('sitemap_admin') }}"><i class="fa fa-sitemap"></i> Plan du site</a></li>
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->