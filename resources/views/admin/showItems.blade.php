<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset("img/fav.png") }}">
	<title>Главная / Админка</title>
	{{-- css --}}
	<link rel="stylesheet" href="{{ asset("css/admin/m.css") }}">
	{{-- javascript --}}
	<script type="text/javascript" src="{{ asset("js/admin/jquery-3.5.1.min.js") }}"></script>
	<script defer type="text/javascript" src="{{ asset("js/admin/m.js") }}"></script>
</head>
<body>

	@include('admin.admStaff.header')
	{{-- header ready --}}

	<div class="wrapper">
		
		{{-- menu --}}
			@include('admin.staf-templates.menu')
		{{-- and menu --}}

		<div class="content box">

			<div class="name_adm"><h3>Управление Товарами</h3></div>
			{{-- show errors --}}
			@include('admin/staf-templates/errors')

			{{-- success/error --}}
			@if (session('status'))
			    <div class="alert alert-success"> 	
			       <div class="success"><h2>{{ session('status') }}</h2></div>
			    </div>
			@endif
			
			<div class="line_staf">

				@if(!$products->isEmpty() )
					@foreach($products as $elem)

					<div class="line_context">
						<div class="line_contx_img">Перейти</div> 
						<div class="context_box_cnt">Описание / название статьи </div>
					</div> {{-- end line_context --}}
					
					<div class="wp_staf_context">

						<div class="imgx_box">
							<div class="click_line">
								<a href="/product/{{ $elem->id }}">
								@if ($elem->img ?? null)
									<img src="{{ asset('storage/' . $elem->img) }}" alt="не прогрузилась">
								@else
									<img class="img-fluid" src="{{ asset('/img/mg1.jpg') }}" alt="">
								@endif
								</a>
							</div> {{-- end click_line --}}
						</div> {{-- end imgx_class --}}

						<div class="post_context">
							<h2>{{ $elem->name }}</h2><br>
							<p> {{ $elem->desc_short }}</p>
						</div> {{-- post_context --}}


						<div class="enter_to_del">
							<p><a href="/destroy/{{ $elem->id }}">Удалить<br>этот пост</a></p>
						</div>
						<div class="enter_to_update">
							<p><a href="/update/{{ $elem->id }}">Редактировать<br>этот пост</a></p>
						</div>

					</div> {{-- end wp_staf_context --}}

					<div class="dec_line_contx">
						<div class="square"></div>
						<div class="square"></div>
						<div class="square"></div>
					</div> {{-- end dec_line_contx --}}
					
					@endforeach
				@else 
					<h2 style="color: orange;">Товаров нет!</h2>
				@endif

				{{ $products->links('custom') }} {{-- pagination here --}}

			</div> {{-- and line_staf --}}  
			
		</div> {{-- end content --}}

	</div>{{-- end wrapper --}}

	@include('admin.admStaff.footer')
	{{-- footer ready --}}

</body>

</html>