<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset("img/fav.png") }}">
	<title>управление категориями</title>
	<!-- css -->
	<link rel="stylesheet" href="{{ asset("css/admin/m.css") }}">
	<!-- javascript -->
	<script type="text/javascript" src="{{ asset("js/admin/jquery-3.5.1.min.js") }}"></script>
	<script defer type="text/javascript" src="{{ asset("js/admin/m.js") }}"></script>
</head>
<body>

	{{-- header ready --}}
	@include('admin.admStaff.header')

	<div class="wrapper">
		
		{{-- menu --}}
		@include('admin.staf-templates.menu')
		{{-- and menu --}}

		<div class="content box">
			<div class="name_adm"><h3>Управление категориями</h3></div>
			
			{{-- show errors --}}
		    	@include('admin/staf-templates/errors')
			{{-- success/error --}}

			@if (session('status'))
			    <div class="alert alert-success"> 	
			       <div class="success"><h2>{{ session('status') }}</h2></div>
			    </div>
			@endif

			<div class="edd_x wp_more_style">	
				
				<div class="x_ra">
					<p>В одну Категорию - можно добавить хоть сколько подкатегорий!</p>	
					<p>Уровень вложенности 2 </p>
					<b>выборка подкатегорий во вкладке создания товара!</b>
				</div>

				<div class="form_main">
					<b>Добавить главную категорию</b>
					<form action="/add_arx" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<div class="big_add_catigoryes">
							<div class="main_name_arg">
								<input type="text" name="name" placeholder="имя категории">
							</div>	
							<!-- add it -->
							<div class="select_images">
								<span><b>Загрузка изображение категории</b></span>
								<!-- name? -->
								<label for="file-upload" class="custom-file-upload">
									<p>Загрузить изображение</p>
								</label>
								<input id="file-upload" name="img" type="file" accept="image/">
							</div>
							<div class="send_data">
								<input type="submit" value="создать категорию">
							</div>
						</div><!-- big_add_catigoryes -->
					</form>
				</div><!-- end form_main -->

				<div>

				
				<div class="form_main">
					<label">что бы сделать текст жирным можно писать внутри тегов &lt;b&gt; вот так &lt/b&gt;</label><br><br>
					<b>Имя подкатегории</b>
					<form action="/add_proargs" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<div class="big_add_catigoryes">
							<div class="main_name_arg">
								<input type="text" name="name" placeholder="имя подкатегории">
							</div>	
							<!-- add it -->		
							<div class="select_line">
								<span><b>Выбрать подкатегорию для добавления:</b></span>
								<select name="parent_id">
									@foreach($args as $asrx)
									<option value="{{ $asrx->id }}">{!! $asrx->name !!}</option>
									<optgroup label="Все подкатегории: {!! $asrx->name !!}">
										@foreach($asrx->childsArgs as $childs)
											@include('admin.child', ['child' => $childs])
										@endforeach
									</optgroup>
									@endforeach
								</select>
							</div>
							<div class="send_data mixed_data">
								<input type="submit" value="добавить подкатегорию">
							</div>
						</div><!-- big_add_catigoryes -->
					</form>
				</div><!-- end form_main -->

				<div class="wrapper_list_cats">
					<div class="bm_cat">
						<h4>Удаление категорий и подкатегорий</h4>
					</div>
					<div class="stuff_args_box">
						@foreach($args as $arg)
							<li><b>Категория: <a href="/del_arg/{{$arg->id}}">{!! $arg->name !!}</a></b></li>
							<ul>
								@foreach($arg->childsArgs as $chld)
									<li><a href="/del_arg/{{$chld->id}}"> <span style="color:black;" >Подкатегория:</span> {!! $chld->name !!}</a></li>
								@endforeach
							</ul>
						@endforeach
					</div>
				</div>	

			</div> <!-- and edd_x -->

		</div> <!-- end content -->
	</div><!--  end wrapper -->

	{{-- footer ready --}}
	@include('admin.admStaff.footer')

</body>

</html>