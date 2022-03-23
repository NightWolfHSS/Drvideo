<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset("img/fav.png") }}">
	<title>Управление домашней сайта</title>
	{{-- css --}}
	<link rel="stylesheet" href="{{ asset("css/admin/m.css") }}">
    <link rel="stylesheet" href="{{ asset("css/font-awesome.min.css") }}">
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
            {{-- show errors --}}
            @include('admin/staf-templates/errors')

            {{-- success/error --}}
            @if (session('status'))
                <div class="alert alert-success"> 	
                <div class="success"><h2>{{ session('status') }}</h2></div>
                </div>
            @endif

            <a name="top_"></a>
			<div class="name_adm"><h3>Управление Домашней страницей</h3></div>
			<div class="edd_x">


                <div class="load">
                    <img src="{{ asset("/img/adm/grid.svg") }}" alt=""><br>
                    подвал 100%
                </div>

                <div class="unic_wrapper_conf">

                    <div class="menu_admin_quiq">
                        <div class="hand_animate">
                          <label><h3>навигация</h3></label>
                          <img src="{{ asset("/img/adm/tap.png") }}" alt="logo">
                        </div> 
                        <ul>
                            <li><a href="#slider">слайдер</a></li><div class="linx">|</div>
                            <li><a href="#chips">фишки</a></li><div class="linx">|</div>
                            <li><a href="#tiles">плитки</a></li><div class="linx">|</div>
                            <li><a href="#partners">партнёры</a></li><div class="linx">|</div>
                            <li><a href="#foot">подвал</a></li><div class="linx">|</div>
                        </ul>
                    </div> {{-- end menu-admin-quiq --}}

                   <div class="fix_change">
                       <form class="form_sx" action="/add_slide" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="description_block">
                               <b>Наполнитель для слайдера</b>
                               <a name="slider"></a>
                            </div><br>
                            <div class="example-imagen">
                                <p>пример отображение слайдера</p>
                                <img src="{{ asset("/img/adm/exmpl-slider.png") }}" alt="тут должна быть картинка для слайдера">
                            </div>
                            <div class="send_x">
                                <label>Имя продукта</label>
                                <input id="name_itm" class="reload" type="text" name="name" maxlength="150" title="максимум 150 символов" value="имя продукта">
                            </div>
                            <div class="send_x">
                                <label>Короткое описание для продукта</label>
                                <input id="desk_itm" class="reload" type="text" name="deskroption" maxlength="150" title="максимум 150 символов" value="описание">
                            </div>
                            <div class="send_x">
                                <label>ссылка которая будет выводить на продукт</label>
                                <input id="href_itm" class="reload" type="text" name="href" maxlength="150" title="максимум 150 символов" value="#ссылка">
                            </div>
                            <div class="send_x">
                                <label>Картинка для слайдера - конечно желательно png для прозрачности</label>
                                <input type="file" name="image" accept="image/">
                            </div>
                            <div class="send_x send_itm">
                                <button type="submite">Создать товар для слайдера</button>
                            </div>
                       </form> <!-- end form -->

                        <!-- show/hide slider menu -->
                        <div class="option-menu-slider">
                            <div class="wp-option-slider">
                                <label>Меню управление слайдером (потом будут некоторые изминения)</label>
                                <ul>
                                    @foreach($slides as $sld)
                                        <li><a href="/delete_opt/{{$sld->id}}">{{ $sld->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- end show/hide slider menu -->
                       <div class="next_ opt-slider">
                           <br>
                           <a href="#slider">редакция слайдера</a>
                       </div>
                   </div> <!-- end slider_main_box -->

                   <div class="pls_curlcl"></div>

                   <div class="fix_change">
                        <form class="form_sx" action="/add_piece" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="description_block">
                               <b>Фишки компании - только 4 штуки | значки рекомендации (32x32)</b>
                               <a name="chips"></a>
                            </div><br>
                            <div class="example-imagen">
                                <p>пример где они расспологаются</p>
                                <img src="{{ asset("/img/adm/slsx.png") }}" alt="тут должна быть картинка для компании">
                            </div>
                            <div class="send_x">
                                <label>Лого</label>
                                <input type="file" name="icon" accept="image/">
                            </div>
                            <div class="send_x">
                                <label>пояснение-1</label>
                                <input id="name_itm" class="reload" type="text" name="name" maxlength="150" title="максимум 150 символов">
                            </div>
                            <div class="send_x">
                                <label>пояснение-2</label>
                                <input id="desk_itm" class="reload" type="text" name="desk" maxlength="150" title="максимум 150 символов">
                            </div>
                            <div class="send_x send_itm">
                                <button type="submite">Создать фишку</button>
                            </div>
                       </form> <!-- end form -->
                       <!-- show/hide opt_pieces menu -->
                       <div class="option-menu-opt-pieces">
                            <div class="wp-option-slider">
                                <label>Меню управление фишками</label>
                                <ul>
                                    @foreach($piece as $p)
                                        <li><a href="/delete_piece/{{$p->id}}">{{ $p->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- end show/hide opt_pieces menu -->
                       <div class="next_ opt_pieces">
                           <br>
                           <a href="#piece">редакция фишек</a>
                       </div>
                   </div>

                   <div class="pls_curlcl"></div>

                   <div class="fix_change">
                        <form class="form_sx" action="/add_partner" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="description_block">
                               <b>Партнеры их логотипы</b>
                               <a name="partners"></a>
                            </div><br>
                            <div class="example-imagen">
                                <p>пример лого партнёра - (макс 10)</p>
                                <img src="{{ asset("/img/adm/partners.png") }}" alt="тут должна быть картинка для партнеров">
                            </div>
                            <div class="send_x">
                                <label>Логотип партнёра</label>
                                <input type="file" name="logo_p" accept="image/">
                            </div>
                            <div class="send_x send_itm">
                                <button type="submite">Добавить партнера</button>
                            </div>

                            <div class="send_x">
                                <label>Ссылка на партнёра</label>
                                <input id="name_itm" class="reload" type="text" name="href_p" maxlength="150" title="максимум 150 символов" value="#ссылка на партнера">
                            </div>
                       </form> <!-- end form -->
                       <!-- show/hide  partners -->
                       <div class="option-menu-partners">
                            <div class="wp-option-slider">
                                <label>Меню управление партнёрами (картинки 150x150) можно меньше</label>
                                <ul>
                                    @foreach($partners as $p)
                                        <li><a href="/delete_partner/{{$p->id}}">{{ $p->href_p }} "партнёр"</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- end show/hide partners menu -->
                       <div class="next_ opt_partner">
                           <br>
                           <a href="#partners">редактировать партнера</a>
                       </div>
                   </div>

                   <div class="pls_curlcl"></div>

                   <div class="fix_change">
                        <form class="form_sx" action="/add_foo/1" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="description_block">
                               <b>Подвальчик</b>
                               <a name="foot"></a>
                            </div><br>
                            <div class="example-imagen">
                                <p>Добавление изминения подвала | если отправить без данных будет все очищено - таблица будет пустой</p>
                                <img src="{{ asset("/img/adm/ftr.png") }}" alt="тут должна быть картинка для партнеров">
                            </div>
                            <div class="send_x">
                                <label>колонка 1</label>
                                <input id="name_itm" class="reload" type="text" name="column_1" maxlength="150" title="максимум 150 символов">
                            </div>
                            <div class="send_x">
                                <label>описание к колонке 1</label>
                                <input id="name_itm" class="reload" type="text" name="desk_1" maxlength="150" title="максимум 150 символов">
                            </div>
                            <div class="send_x">
                                <label>колонка 2</label>
                                <input id="name_itm" class="reload" type="text" name="column_2" maxlength="150" title="максимум 150 символов">
                            </div>
                            <div class="send_x">
                                <label>описание к колонке 2</label>
                                <input id="name_itm" class="reload" type="text" name="desk_2" maxlength="150" title="максимум 150 символов">
                            </div>
                            <div class="send_x">
                                <label>колонка 3</label>
                                <input id="name_itm" class="reload" type="text" name="column_3" maxlength="150" title="максимум 150 символов">
                            </div>
                            <div class="send_x">
                                <label>колонка 4</label>
                                <input id="name_itm" class="reload" type="text" name="column_4" maxlength="150" title="максимум 150 символов">
                            </div>
                            <div class="send_x">
                                <label>описание к колонке 4</label>
                                <input id="name_itm" class="reload" type="text" name="desk_4" maxlength="150" title="максимум 150 символов">
                            </div>
                            <div class="send_x send_itm">
                                <button type="submite">Обновить данные подвала</button>
                            </div>
                       </form> <!-- end form -->
                   </div>

                    <div class="pls_curlcl"></div>

                   <!-- footer images -->
                   <div class="fix_change">
                        <form class="form_sx" action="/add_icon" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="description_block">
                               <b>картинки в подвале</b>
                               <a name="foot"></a>
                            </div><br>
                            <div class="example-imagen">
                                <p>добовление маленьких картинок</p>
                            </div>
                            <!-- add image footer -->
                            <div class="send_x">
                                <label>добавить картинку в подвал</label>
                                <input type="file" name="mini" accept="image/">
                            </div>
                            <div class="send_x send_itm">
                                <button type="submite">Добавить картинку</button>
                            </div>
                       </form> 
                       <!-- show/hide  mini -->
                       <div class="option-menu-mini">
                            <div class="wp-option-slider">
                                <label>Меню управление картинками</label>
                                <ul>
                                    @foreach($mini_img as $mini)
                                        <li><a href="/del_mini/{{$mini->id}}">{{ $mini->id }} "удалить картинку"</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- end show/hide partners mini -->
                        <div class="next_ opt_mini">
                           <br>
                           <a href="#mini">удалить картинку</a>
                       </div>
                       <!-- end form -->
                   </div>

                   <div class="pls_curlcl"></div>
                    <!-- footer soc_icons -->
                    <div class="fix_change">
                        <form class="form_sx" action="/add_icons" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="description_block">
                               <b>социальные сети в подвале</b>
                               <a name="foot"></a>
                            </div><br>
                            <div class="example-imagen">
                                <p>добавить соц исонку</p>
                            </div>
                            <!-- add soc_icon footer -->
                            <div class="mix">
                                <label>выбрать соц иконку</label>
                                <div class="sp_radio">
                                    <p><input name="icon" type="radio" value="fa fa-facebook"><i class="fa fa-facebook"> facebook</i></p>
                                    <p><input name="icon" type="radio" value="fa fa-twitter"><i class="fa fa-twitter"> twitter</i></p>
                                    <p><input name="icon" type="radio" value="fa fa-dribbble"><i class="fa fa-dribbble"> dribbble</i></p>
                                    <p><input name="icon" type="radio" value="fa fa-behance"><i class="fa fa-behance"> behance</i></p>
                                    <p><input name="icon" type="radio" value="fa fa-rss"><i class="fa fa-rss"> rss</i></p>
                                    <p><input name="icon" type="radio" value="fa fa-map-marker"><i class="fa fa-map-marker"> map-marker</i></p>
                                    <p><input name="icon" type="radio" value="fa fa-cog"><i class="fa fa-cog"> cog</i></p>
                                    <p><input name="icon" type="radio" value="fa fa-instagram"><i class="fa fa-instagram"> instagram</i></p>
                                    <p><input name="icon" type="radio" value="fa fa-youtube-play"><i class="fa fa-youtube-play"> youtube</i></p>
                                </div>
                            </div>
                            <div class="send_x">
                                <label>добавить ссылку к сети</label>
                                <input type="text" name="href">
                            </div>
                            <div class="send_x send_itm">
                                <button type="submite">Добавить соц сеть</button>
                            </div>
                       </form> 
                       <!-- show/hide  mini -->
                       <div class="option-menu-icon">
                            <div class="wp-option-slider">
                                <label>Меню управление картинками</label>
                                <ul>
                                    @foreach($soc as $i)
                                        <li><a href="/del_icon/{{$i->id}}"><i class="{{ $i->icon }}"></i>  -  "удалить соц сеть"</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- end show/hide partners mini -->
                        <div class="next_ opt_icon">
                           <br>
                           <a href="#mini">удалить соц сеть</a>
                       </div>
                       <!-- end form -->
                   </div>
                   <div class="mustUp"><a href="#top_">на вверх</a></div>
                </div> <!-- unic_wrapper_conf --> 
			</div> <!-- and edd_x -->
		</div> <!-- end content -->
        
	</div><!--  end wrapper -->

    
	@include('admin.admStaff.footer')
	{{-- footer ready --}}

</body>

</html>