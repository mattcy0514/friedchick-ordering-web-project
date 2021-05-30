<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content=">雞吃好吃雞，夜市裡香氣撲鼻的鹽酥雞，向來是人氣小吃排行榜中的常客。透過美食達人的美味魔法解析， 透過食材挑選、調味料配方與製作過程的提點">
	<meta name="keywords" content="炸雞,消夜,鹽酥雞,雞吃好吃雞,薯條,炸物,美食,好吃,小吃,速食,雞排,快速,服務">
	<meta name="author" content="Matt & Steven">
	<title>雞吃好吃雞</title>
	<link rel="stylesheet" href="..\css\login.css">
	<link rel="icon" href="/material/home.ico" type="image/x-icon" />
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/b613f357e8.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php
		// This is a way using cookie to prevent from executing following code
		ob_start();
		$registering = $_COOKIE["registering"];
		$login = $_COOKIE["login"];

		$code = $_GET["code"];
		if ($registering == "true") {
			if ($code == 1) {
				setcookie("registering", null, -1);
				echo "<script>alert('成功註冊')</script>";
			}
			else if ($code == 2) {
				setcookie("registering", null, -1);
				echo "<script>alert('請重新嘗試')</script>";
			}
		}

		if ($login == "true") {
			if ($code == 2) {
				setcookie("login", null, -1);
				echo "<script>alert('請重新嘗試')</script>";
			}
		}
		
	?>
	<a href="#" class="scrolltop scroll-top" id="scroll-top">
		<i class='bx bxs-chevron-up scrolltop_icon' ></i>
	</a>
	<header class="l-header scroll-header" id="header">
		<nav class="nav bd-container">
			<a href=".\web.php" class="nav_logo">雞吃好吃雞</a>
			<div class="nav_menu" id="nav-menu">
				<ul class="nav_list">
					<li class="nav_item"><a href=".\web.php" class="nav_link active-link">首頁</a></li>
					<li class="nav_item"><a href=".\web.php#about" class="nav_link">關於</a></li>
					<li class="nav_item"><a href=".\web.php#services" class="nav_link">服務</a></li>
					<li class="nav_item"><a href=".\web.php#menu" class="nav_link">菜單</a></li>
					<li class="nav_item"><a href=".\web.php#contact" class="nav_link">聯絡</a></li>
					<li><i class='bx bx-moon change-theme' id="theme-button" ></i></li>
					<?php
						session_start();
						$customer_id = $_SESSION["id"];
						if (!isset($customer_id)) {
							echo '<li><a href="\login.php"><i class="bx bxs-user-plus" id="user-button"></i></a></li>';
						}
						else {
							echo '<li><a href="\logout.php"><i class="bx bxs-user-x" id="user-button"></i></a></li>';
						}
					?>
					<li><a href=".\cart.php"><i class='bx bx-shopping-bag' id="shopping-button"></i></a></li>
				</ul>
			</div>
			<div class="nav_toggle" id="nav-toggle">
				<i class='bx bx-menu'></i>
			</div>
		</nav>
	</header>
	<main class="l-main">
		<section class="home" id="home">
			<div class="cart-page bd-container bd-grid">
				<div class="form-box">
					<div class="button-box">
						<a class="beside-switch">已是會員</a>
							<label class="switch">
								<input type="checkbox" onClick="if(this.checked){register();} else{login();}">
								<span class="slider"></span>
							</label>
						<a class="beside-switch">來去註冊</a>
						<!-- <button type="button" class="toggle-btn button" id="login-btn" onclick="login()">已是會員</button>
						<button type="button" class="toggle-btn button" id="register-btn" onclick="register()">來去註冊</button> -->
					</div>
					<div class="social-icons">
						<img src="..\material\facebook.png" alt="">
						<img src="..\material\twitter.png" alt="">
						<img src="..\material\instagram.png" alt="">
					</div>
					<form id="login" action="logincheck.php" method="POST" class="input-group">
						<input type="text" name="id" class="input-field" placeholder="使用者帳號" required>
						<input type="password" name="pwd" class="input-field" placeholder="使用者密碼 " required>
						<button type="submit" class="submit-btn">登入</button>
					</form>
					<form id="register" action="register.php" method="POST" class="input-group">
						<input type="text" name="id" class="input-field" placeholder="使用帳號" required>
						<input type="password" name="pwd" class="input-field" placeholder="使用者密碼" required>
						<input type="email" name="email" class="input-field" placeholder="電子郵件地址" required>
						<input type="text" name="phone" class="input-field" placeholder="手機號碼" required>
						<button type="submit" class="submit-btn" id="registerbox">註冊</button>
					</form>
				</div>
				<script>
				var x = document.getElementById("login");
				var y = document.getElementById("register");
				var z = document.getElementById("btn");
				function register(){
					x.style.left = "-400px";
					y.style.left = "50px";
					z.style.left = "110px";
				}
				function login(){
					x.style.left = "50px";
					y.style.left = "450px";
					z.style.left = "0px";
				}
				</script>
			</div>
		</section>
	<footer class="footer section bd-container">
		<div class="footer_container bd-grid">
			<div class="footer_content">
				<ul>
					<li>
						<a href="#" class="footer_logo">雞吃好吃雞</a>
					</li>
				</ul>
				<ul>
					<li>
						<a href="#" class="footer_social"><i class='bx bxl-facebook'></i></a>
						<a href="#" class="footer_social"><i class='bx bxl-instagram'></i></a>
						<a href="#" class="footer_social"><i class='bx bxl-twitter'></i></a>
					</li>
				</ul>
			</div>
			<div class="footer_content">
				<h3 class="footer_title">服務</h3>
				<ul>
					<li><a href="#" class="footer_link">外送</a></li>
					<li><a href="#" class="footer_link">定價</a></li>
					<li><a href="#" class="footer_link">美食</a></li>
					<li><a href="#" class="footer_link">預購</a></li>
				</ul>
			</div>
			<div class="footer_content">
				<h3 class="footer_title">資訊</h3>
				<ul>
					<li><a href="#" class="footer_link">每周活動</a></li>
					<li><a href="#" class="footer_link">聯絡我們</a></li>
					<li><a href="#" class="footer_link">隱私條款</a></li>
					<li><a href="#" class="footer_link">服務項目</a></li>
				</ul>
			</div>
			<div class="footer_content">
				<h3 class="footer_title">地址</h3>
				<ul>
					<li>台北市大安區基隆路</li>
					<li>eatingchicken.site</li>
				</ul>
			</div>
		</div>
		<p class="footer_copy">&#169; Copyright © 2021 eatingchicken
				<br>NTUST Web Development Final Project with nonprofit
				<br>Author: Matt & Steven</p>
	</footer>
	<script src="https://unpkg.com/scrollreveal"></script>
	<script src="../js/main.js"></script>
</body>
</html>