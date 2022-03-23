<header class="clearfix">

		{{-- popup logout --}}

		<div class="p_wp top">
			<div class="p_logout">
				<div class="at-on">
					<p>Хотите выйти из системы?</p>
				</div>
				<div class="but_red"><a href="/logout">Да</a></div>
				<div class="but_blue"><a href="#">Нет</a></div>
			</div>
		</div>

		{{-- and popup --}}

		<div class="push">
			<img src="{{ asset("img/adm/list_x.png") }}" alt="">
		</div>

		<div class="menu_x">

			<div class="logo_panel box hks">
				<img src="{{ asset("img/adm/moon.png") }}" alt="moon">
				<h2>NTR</h2>
			</div> <!-- end logo_panel -->

			<div class="search box hks">
				<form action="">
					<input type="text" name="anyname" placeholder="Искать сдесь..">
					<button class="s_but" type="submite"></button>
				</form>
			</div> <!-- end search -->

			<div class="spn box hks" >

				<div class="notice box hks line_s">
					<a href="https://shoptd.kz/add"><img src="{{ asset("img/adm/plus-sign.png") }}" alt="usersx" title="Добавить товар"></a>	
				</div> <!-- end notice -->

				<div class="notice box hks line_s">
					<a href="https://shoptd.kz/admin"><img src="{{ asset("img/adm/bullet-list.png") }}" alt="usersx" title="управление сайтом"></a>	
				</div> <!-- end notice -->

				<div class="notice box hks line_s">
					<a href="https://shoptd.kz/items"><img src="{{ asset("img/adm/userx.png") }}" alt="usersx" title="управление товарами"></a>	
				</div> <!-- end notice -->
				
				<div class="notice box hks line_s">
					<a href="https://shoptd.kz/"><img src="{{ asset("img/adm/hsx.png") }}" alt="hsx" title="вернуться к домашней странице"></a>
				</div> <!-- end notice -->

				<div class="notice box hks line_s">
					<img src="{{ asset("img/adm/bell.png") }}" alt="bell">
					<!-- if notice	 -->
					<div class="crl">999+</div>
				</div> <!-- end notice -->

				<div class="i_user box hks">	
					<div class="logo_user">
						<!-- warning ! use another db for ADMIN users -->
						<img src="{{ asset("img/adm/user.png") }}" alt="user">
						<p>Администратор</p>
						<div class="menu">
							<ul>
								<li class="lx"><p>Выход</p></li>
								<li><p>Настройки</p></li>
							</ul>
						</div> <!-- end menu -->
					</div> <!-- end logo_user -->
				</div>
				

			</div> <!-- end spn -->
		</div><!--  end menu_x -->
	
	</header>