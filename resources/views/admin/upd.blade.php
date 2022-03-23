<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset("img/fav.png") }}">
	<title>Редактировать товар</title>
	<!-- css -->
	<link rel="stylesheet" href="{{ asset("css/admin/m.css") }}">
	<!-- javascript -->
	<script type="text/javascript" src="{{ asset("js/admin/jquery-3.5.1.min.js") }}"></script>
	<script type="text/javascript" src="{{ asset("js/admin/editor/ckeditor.js") }}"></script>
	<script defer type="text/javascript" src="{{ asset("js/admin/m.js") }}"></script>
	<script defer type="text/javascript" src="{{ asset("js/admin/km4editor.js") }}"></script>
</head>
<body>

	{{-- header ready --}}
	@include('admin.admStaff.header')
	<div class="urlx" mops="man"></div> {{-- attribute for url --}}

	<div class="wrapper">
		{{-- menu --}}
		@include('admin.staf-templates.menu')
		{{-- and menu --}}

		<div class="content box">
			<div class="name_adm" val="nik"><h3>Редактировать товар - <span style="color: #ff7d02; font-size: 18px; font-weight:lighter; font-style: italic;">{{ $item->name }}</span> </h3></div>
			{{-- show errors --}}
			@include('admin/staf-templates/errors')

			{{-- success/error --}}
			@if (session('status'))
			    <div class="alert alert-success"> 	
			       <div class="success"><h2>{{ session('status') }}</h2></div>
			    </div>
			@endif

			<div class="edd_x">

				<form action="/current_up/{{ $item->id }}" method="post" enctype="multipart/form-data">
					@method('PUT')
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					
					<div class="send_x">
						<label>Название товара (от 3 символов) обязательное поле</label>
						<input id="name" class="reload" type="text" name="name" maxlength="150" title="максимум 150 символов" value="{{ $item->name }}">
					</div>

					<div class="send_x">
						<label>Описание товара (seo поле для title header)</label>
						<input type="text" class="reload" name="seo_desk" maxlength="150" title="максимум 150 символов" value="{{ $item->seo_desk }}">
					</div>				

					<div class="send_x">
						<label>Брэнд (от 3 символов) обязательное поле</label>
						<input type="text" class="reload" name="brand" maxlength="150" title="максимум 150 символов" value="{{ $item->brand }}">
					</div>
				
					<div class="send_x">
						<label><span style="color:#CCA300;">Выберите категорию</span></label>
						<select name="selecter">
						@foreach($args as $arg)
							<option value="{{ $arg->name }}">{{ $arg->name }}</option>
						@endforeach
						</select>
					</div>
					<!-- метка для главной показной картинки -->
					<div class="send_x">
						<label>картинка превью товара</label>
						<input type="file" name="img" accept="image/">
					</div>

					<div class="wp_images">
						<div class="send_x">
							<label>загружаем картинку</label>
							<input type="file" name="images[]" multiple="multiple" accept="image/">
							<div class="add_x">добавить загрузку картинки</div>
						</div>
					</div> {{-- end wp_images --}}

					<div class="send_x">
						<label>Цена товара (писать точку после тысячных 1.000 - 100.000) обязательное поле</label>
						<input type="text" class="reload" name="price" title="цена товара" value="{{ $item->price }}">
					</div>

					{{-- end images --}}
					<div class="send_x">
						<label>Старая цена / в место (писать точку после тысячных 1.000 - 100.000) обязательное поле</label>
						<input type="text" class="reload"  name="oldPrice" title="цена товара" value="{{ $item->oldPrice }}">
					</div>

					<div class="send_x">
						<label>Колличество товара / (обязательное поле)</label>
						<input type="text" class="reload" name="count" value="0" title="Колличество товара" value="{{ $item->count }}" >
					</div>

					<div class="send_x">
						<label>Короткое описание товара / по умолчанию - описание отсутствует - </label>
						<input class="reload desc_short" name="desc_short" maxlength="500" title="Короткое описание" value="{{ $item->desc_short }}">
					</div>

					<div class="send_x">
						<label>Полное описание товара / обязательное поле (от 50 символов)</label>
						<textarea id="mytextarea" class="reload" name="desk_large" title="полное описание товара">
							{{ $item->desk_large }}
						</textarea>
					</div>

					<div class="captures">
						<h2>Раздел для характеристик</h2> 
					</div>
						<!-- texa -->
					<div class="send_x">
						<label>какие характеристики есть у данного товара (возможности)  - <span style="color:#04785F">пока нет возможности сохранить данные в этом поле!</span></label>
						<textarea id="more" name="more" title="описание характеристик и возможности товара">	
							<p>пока нет описаний характеристик</p> 
						</textarea>
					</div>

					<div class="wp_center_tools">
						<div class="send_push mix">
							<button type="submite">Создать товар</button>
						</div>

						<div class="clear_data">
							<p>Сброс полей</p>
						</div>
					</div>

				</form>	

			</div> <!-- and edd_x -->

		</div> <!-- end content -->

	</div><!--  end wrapper -->

	{{-- footer ready --}}
	@include('admin.admStaff.footer')

</body>

</html>