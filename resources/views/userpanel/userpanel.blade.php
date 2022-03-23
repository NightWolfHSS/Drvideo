<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex, nofollow">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UserPanel</title>
	<link rel="shortcut icon" href="{{ asset("img/fav.png") }}">
    <link rel="stylesheet" href="{{ asset("css/user.css") }}">
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script defer type="text/javascript" src="{{ asset("js/userpanel.js") }}"></script>
		{{--load parse-cart.js script --}}
		<script defer type="text/javascript" src="{{ asset("js/parse-cart.js") }}"></script>
	<script src="https://use.fontawesome.com/78e68e44ea.js"></script>
</head>
<body>	
	<!-- не индексировать! -->
	<div class="grnt"></div>  <!-- top line gradient -->
	<header>
		<div class="wpbox">

			<div class="box-name scroll-to">
				<p>shop.<span>megacampro.kz</span></p>
			</div> <!-- end box-name -->
			<h2>личный кабинет пользователя</h2>
			<p>управление - товары - покупки</p>
		</div> <!-- end wpbox -->

		<div class="box-xs"> <!-- back to return -->
			<div class="imsx"> <!-- image fone-->				
				<div class="down-padding"> <!-- possition skin -->
					<div class="skin">
						<a href="/">Вернуться в магазин</a>
					</div> <!-- end skin -->
				</div> <!-- end down-padding -->
			</div> <!-- end imsx -->
		</div> <!-- box-xs  -->
		
	</header> 
	<!-- and header -->
	<div class="wrapper-box">

	@if ($errors->any()) 
			<div class="user_success">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
	@endif
	{{-- status output --}}
	@if (session('status'))
		<div class="user_success"> 	
			<div class="success"><h2>{{ session('status') }}</h2></div>
		</div>
	@endif

		<div class="sps">
			<p>Настройки профиля</p>
            <div class="send-logout"><a href="/logout">Выйти</a></div>
		</div> <!-- space-line -->	

		<div class="box-config-profile">

			<div class="box-user-image box_flex_section">
				<div class="image-user">
					<img src="{{ asset('storage/'. $user->image_user) }}" alt="foto">
					<p>Картинка не установлена !</p>
				</div> <!-- end image-user -->
			</div> 
			<div class="primary-btn" style="display: none;"></div>
			<div class="box-settings box_flex_section">
				<p>Приветствуем вас !</p><br>
				<h4>{{ $user->name }}<br>{{ $user->patronymic }}</h4>
				<br>
				<div class="box-push" >
					<form action="upd" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />	

						<div class="update-user">
							<p><label>Имя</label></p>
							<input name="name" type="text" value="{{ $user->name }}"><br>
							<p><label>Фамилия</label></p>
							<input name="patronymic" type="text" value="{{ $user->patronymic }}">
							<br>
							<p>выбрать изображения</p>
							<br>
							<input type="file" name="image"> 
						</div>

						<div class="send-message">
							<br>
							<button type="submite">Загрузить</button>
						</div>
						<br>
						<p class="note-2">заметка может помочь!</p>
					</form>
				</div> <!-- end box-push -->

			</div> <!-- end box-settings -->

			<div class="note-push">

				<div class="down-mx">

					<div class="down-nt">
						<span><p class="p-note">Заметка</p></span>
					</div> <!-- end down-nt -->

					<div class="wp-note">
								
						<div class="box_bos_note">
							<div class="box_bos_image">
								<img src="{{ asset("img/width.png") }}">
							</div>
							<p>разрешение картинки не больше 1920px</p>
							<p>и желательно не меньше 800px</p>
						</div>	 	

						<div class="box_bos_note">
							<div class="box_bos_image">
								<img src="{{ asset("img/weight.png") }}">
							</div>
							<p>размер картинки не более 2мb - <span>
							 файлы (jpg, jpeg, jfif, png, svg)
							</span>
							</p><br>
						</div>	 

						<div class="box_bos_note">
							<div class="box_bos_image">
								<img src="{{ asset("img/stop.png") }}">
							</div>
							<p>Имена, ники должны быть написаны, правильно без ошибок,
							некорректные имена, непристойные имена, ругательства будут удалены!
							</p>
						</div>	 

					</div> <!-- end wp-note -->

				</div> <!-- end down-mx -->
				
			</div><!-- end note-push -->
		</div> <!-- end box-config-profile -->
		
		<div class="cart-user">
			<div class="cr-move">
				<p id="cart">Корзина</p>
			</div> <!-- line decoration -->
			<div class="wp_pay">

				<div class="staf_box_wp staf_style_1">
				
					<div class="staf_box_fone">
						
						<div class="list_staf">
							
						</div> <!-- end list_staf -->

					</div> <!-- end staf_box_fone -->

					<div class="cart_staf_line">
						<p>Оплата</p>
						<div class="cart_summ">
							<p>И того к оплате- <span class="total">0</span> тг</p>
						</div>
						<div class="card-pay">
							виджет уплаты будет в этом квадрате
						</div>
						<div class="politics">
							<p>отправляя данные вы соглашаетесь с <br><a href="#">правилами политики</a> сайта и обработку персональных данных</p>
						</div> 
						<!-- you can does frame politics text -->
					
					</div> <!-- end cart_staf_line -->

				</div> <!-- end staf_style_1 -->

				<div class="line_logo_carts">

					<div class="logo_carts">
						<div class="box_logo">
							<img src="{{ asset("img/Mastercard.png") }}" alt="">
						</div>
						<div class="box_logo">
							<img src="{{ asset("img/Visa.png") }}" alt="">
						</div>
						<div class="box_logo">
							<img src="{{ asset("img/Mastercard.png") }}" alt="">
						</div>
						<div class="box_logo">
							<img src="{{ asset("img/Visa.png") }}" alt="">
						</div>
					</div> <!-- end logo_carts -->

				</div> <!-- end line_logo_carts -->
				
				<div class="staf_box_wp staf_style_2">

					<div class="text_box_cnt">
						<p>Личный кабинет пользователя - управление товарами 
							покупки, добавление, удаление
						</p>
					</div>
					<div class="text_box_cnt">
							<p>Не показывайте пароль никому <br> запиши не кому не говори</p>
							<p>Если кто то просит сказать свой пароль, этого делать не нужно!</p>
					</div>
					<div class="text_box_cnt">
						<p>Никто не узнает о ваших данных </p>
						<p>Потому что они защищены</p>
						<p>в надежном месте</p>
					</div>
					<div class="text_box_cnt">
						<p>удобство и красивый дизайн </p>
						<p>прост в использовании</p>
					</div>	
					
				</div> <!-- end staf_style_2 -->

			</div> <!-- end wp_pay -->

		</div> <!-- end cart-user -->

	</div> <!-- end wrappe -->
	<footer>
		<div class="user_box">
			<p>{{ $user->name }}</p><h3>{{ $user->patronymic }}</h3>
		</div>
		<div class="up scroll-to">вверх</div>
	</footer>
{{-- footer --}}
</body>
</html>