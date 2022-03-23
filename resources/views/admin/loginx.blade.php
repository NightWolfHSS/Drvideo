<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
	<title>log In - Войти в систему</title>
</head>
<body>
<!-- style -->
<style>
	* {padding: 0; margin: 0;}
	body { background: #282d4f; }
	.power_container {
		background: #65589c;
		width: 380px;
		height: 380px;
		border: 2px solid #fcefed;
		border-radius: 8px;
		margin: 200px auto;
		box-shadow: 0 5px 20px rgba(0,0,0,0.8);
		padding: 10px;
		color: #fedf96;
		font-family: Arial;
	}
	.power_container h2 {
		border-bottom: 1px solid silver;
		margin-bottom: 10px;
	 	padding-bottom: 10px;
	}
	.x_line {width: 80%; margin: 10px 0;padding: 5px; font-size: 21px;border-bottom: 5px solid #3F3762;
		border-top: none; border-left: none; 
		border-right: 4px solid #3F3762;
		color: #65589C;
	}
	.play {
		background: #203e5f; 
		border: none; font-size: 18px;
		cursor: pointer;
		outline: none; margin-top: 10px;
		transition: 0.3s ease all;
		color: white;
		padding: 10px 15px;
		border-bottom: 2px solid #203e5f;
	}
	.play:hover {
		border-bottom: 2px solid white;
		background: #3d6cb9;
	}
	.txt {
		color: #e2ded3;
		font-size: 14px;
		margin-top: 75px;
		padding-left: 10px;
		padding-top: 13px;
		border-top: 1px solid silver;
	}
	.mox {
		background: red;
		color: white;
		font-size: 22px;
		text-align: center;
	} /*message of error*/
	.crl {border-radius: 50px; display: inline-block; width: 10px;
	 	height: 10px;
	 	float: right;
	 	margin: 10px 3px 3px 0px;
	 	padding-top: 7px;
	 }					
	 .or {background: #61bdf6;}
	 .ye {background: #df6a6a;}
	 .gr {background: #fcce9e;}

	form {margin: 0 10px;}
</style>
<!-- and style -->

{{-- show errors --}}
@include('admin/staf-templates/showError')

<div class="power_container">
	<div class="crl or"></div>
	<div class="crl ye"></div>
	<div class="crl gr"></div>
	<h2>войти в систему</h2>
	<form action="/sendx" method="post">
		@csrf 
		<label>имя</label>
		<br>
		<input class="x_line" type="text" name="name">
		<br>
		<label>пароль</label>
		<br>
		<input class="x_line" type="password" name="password">
		<br>
		<input class="play" type="submit" value="Войти">
	</form>
	<div class="txt"><p>show.megacampro.kz</p></div>
</div>

<script defer type="text/javascript" src="{{ asset("js/admin/login.js") }}"></script>
</body>
</html>