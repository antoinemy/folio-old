<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Dashboard</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="{{ asset('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/theme/default.css') }}" rel="stylesheet" id="theme" />
	<link href="{{ asset('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/morris/morris.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('assets/plugins/DataTables/css/data-table.css') }}" rel="stylesheet" />
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in m-t-0"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed">		
		
		@include('admin.includes.menu')
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Administration</li>
				<li>Catégories</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Gestion des catégories</h1>
			
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
	                        <div class="btn-group pull-right">
                                <a href="{{ route('category_new') }}" class="btn btn-success btn-xs">Nouvelle catégorie</a>
                            </div>
                            <h4 class="panel-title">Toutes les catégories</h4>
                        </div>
                        <div class="panel-body">
							<div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom de la catégorie</th>
                                            <th>Couleur</th>
                                            <th class="width-50"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
	                                    @foreach($categories as $c)
	                                        <tr>
	                                            <td>{{ $c->id }}</td>
	                                            <td>{{ $c->term }}</td>
	                                            <td><span class="label" style="background:{{ $c->color }};">{{ $c->color }}</span></td>
	                                            <td>
		                                            <form method="POST" action="{{ route('category_delete', $c->id) }}">
			                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
			                                            <div class="btn-group text-center">
				                                            <a href="{{ route('category_edit', $c->id) }}" class="btn btn-white btn-xs"><span class="fa fa-edit"></span></a>
			                                            	<button id="form_{{ $c->id }}" onclick="del({{ $c->id }})" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></button>
		                                            	</div>
		                                            </form>
		                                        </td>
	                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
	</div>

	<script src="{{ asset('assets/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--[if lt IE 9]>
		<script src="{{ asset('assets/crossbrowserjs/html5shiv.js') }}"></script>
		<script src="{{ asset('assets/crossbrowserjs/respond.min.js') }}"></script>
		<script src="{{ asset('assets/crossbrowserjs/excanvas.min.js') }}"></script>
	<![endif]-->
	<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
	<script src="{{ asset('assets/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morris/morris.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
	<script src="{{ asset('assets/js/dashboard-v2.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/DataTables/js/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('assets/js/table-manage-default.demo.js') }}"></script>
	<script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
	<script src="{{ asset('assets/js/apps.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			App.init();			
			TableManageDefault.init();
		});
		
		function del(id) {
			if(confirm("Supprimer cette catégorie?")) {
				$('#form_'+id).submit();
			}
		}
	</script>
</body>
</html>
