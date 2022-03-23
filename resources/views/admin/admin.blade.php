<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset("img/fav.png") }}">
	<title>Домашная - Админка</title>
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

			<div class="name_adm"><h3>Главная</h3></div>

				<div class="edd_x">
				
				<div class="edd_fone_x">

					<div class="box_silent_content edit_itmx_one">

						<div class="name_box">
							<h3>Управление всеми товарами</h3>
						</div>{{-- end name_box --}}

						<div class="solo_img">
							<p>управлять товарами стало удобнее</p>
						</div> {{-- end solo_img --}}

					</div>{{-- end box_silent_content edit_itmx  --}}

					<div class="box_silent_content edit_itmx_two">

						<div class="name_box">
							<h3>Добавить товар</h3>
						</div>{{-- end name_box --}}

						<div class="solo_img1">
							<p>сдесь можно добавить новый товар</p>
						</div> {{-- end solo_img --}}

					</div>{{-- end box_silent_content edit_itmx  --}}
					
				</div> {{-- end edd_fone_x --}}


				<div class="edd_fone_x">
					<div class="box_silent_content edit_itmx_three">

						<div class="name_box">
							<h3>Управление категориями</h3>
						</div>{{-- end name_box --}}

						<div class="solo_img2">
							<p>сдесь можно будет управлять категориями</p>
						</div> {{-- end solo_img --}}

						</div>{{-- end box_silent_content edit_itmx  --}}
					</div>

					<div class="edd_fone_x">
						<div class="box_silent_content edit_itmx_five">
							<div class="name_box">
								<h3>Управление главной</h3>
							</div>{{-- end name_box --}}

							<div class="solo_img3">
								<p>редактировать главную станицу</p>
							</div>
						</div>{{-- end box_silent_content edit_itmx  --}}

						<div class="box_silent_content edit_itmx_five">
							<div class="name_box">
								<h3>Слайдер каких товаров</h3>
							</div>{{-- end name_box --}}

							<div class="solo_img4">
								<p>управление слайдером товаров</p>
							</div>
						</div>{{-- end box_silent_content edit_itmx  --}}

						<div class="box_silent_content edit_itmx_five">
							<div class="name_box">
								<h3>Эксклюзив</h3>
							</div>{{-- end name_box --}}

							<div class="solo_img5">
								<p>управление специальными возможностями</p>
							</div>
						</div>{{-- end box_silent_content edit_itmx  --}}

						<div class="box_silent_content edit_itmx_five">
							<div class="name_box">
								<h3>Товары недели</h3>
							</div>{{-- end name_box --}}

							<div class="solo_img6">
								<p>управление популярными товарами</p>
							</div>
						</div>{{-- end box_silent_content edit_itmx  --}}
					</div>

			</div> <!-- and edd_x -->

		</div> <!-- end content -->

	</div><!--  end wrapper -->

	@include('admin.admStaff.footer')
	{{-- footer ready --}}

</body>

</html>