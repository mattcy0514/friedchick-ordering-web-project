<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content=">雞吃好吃雞，夜市裡香氣撲鼻的鹽酥雞，向來是人氣小吃排行榜中的常客。透過美食達人的美味魔法解析， 透過食材挑選、調味料配方與製作過程的提點">
	<meta name="keywords" content="炸雞,消夜,鹽酥雞,雞吃好吃雞,薯條,炸物,美食,好吃,小吃,速食,雞排,快速,服務">
	<meta name="author" content="Matt & Steven">
	<meta name="google-site-verification" content="g3ZUwpjhUUlSSCyne4eyD1c58TnsUHcj65wLVTmSVig" />
	<title>雞吃好吃雞</title>
	<link rel="stylesheet" href="..\css\style.css">
	<link rel="icon" href="/material/home.ico" type="image/x-icon" />
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/b613f357e8.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php
		ob_start();
		$login = $_COOKIE["login"];
		$carting = $_COOKIE["carting"];
		$logout = $_COOKIE["logout"];
		$code = $_GET["code"];
		
		if ($login == "true") {
			if ($code == 1) {
				setcookie("login", null, -1);
				echo "<script>alert('歡迎登入')</script>";
			}
		}

		if ($carting == "true") {
			if ($code == 1) {
				setcookie("carting", null, -1);
				echo "<script>alert('成功加入購物車')</script>";
			}
			else if ($code == 2) {
				setcookie("carting", null, -1);
				echo "<script>alert('購物車已有此商品')</script>";
			}
		}

		if ($logout == "true") {
			if ($code == 1) {
				setcookie("logout", null, -1);
				echo "<script>alert('成功登出')</script>";
			}
			else if ($code == 2) {
				setcookie("carting", null, -1);
				echo "<script>alert('無法登出')</script>";
			}
		}

	?>

	<a href="#" class="scrolltop scroll-top" id="scroll-top">
		<i class='bx bxs-chevron-up scrolltop_icon' ></i>
	</a>
	<header class="l-header scroll-header" id="header">
		<nav class="nav bd-container">
			<a href="#" class="nav_logo">雞吃好吃雞</a>
			<div class="nav_menu" id="nav-menu">
				<ul class="nav_list">
					<li class="nav_item"><a href="#home" class="nav_link active-link">首頁</a></li>
					<li class="nav_item"><a href="#about" class="nav_link">關於</a></li>
					<li class="nav_item"><a href="#services" class="nav_link">服務</a></li>
					<li class="nav_item"><a href="#menu" class="nav_link">菜單</a></li>
					<li class="nav_item"><a href="#contact" class="nav_link">聯絡</a></li>
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
					<li><a href="\cart.php"><i class='bx bx-shopping-bag' id="shopping-button"></i></a></li>
				</ul>
			</div>
			<div class="nav_toggle" id="nav-toggle">
				<i class='bx bx-menu'></i>
			</div>
		</nav>
	</header>
	<main class="l-main">
		<section class="home" id="home">
			<div class="home_container bd-container bd-grid">
				<div class="home_data">
					<h1 class="home_title">雞吃好吃雞</h1>
					<h2 class="home_subtitle">最好吃的雞就是 <br>我們</h2>
					<a href="#menu" class="button">瀏覽菜單</a>
				</div>
				<img src="..\material\home.png" alt="" class="home_img">
			</div>
		</section>
		<section class="about section bd-container" id="about">
			<div class="about_container bd-grid">
				<div class="about_data">
					<span class="section-subtitle about_initial">關於我們</span>
					<h2 class="section-title about_initial">我們提供最好吃的 <br> 鹽酥雞 </h2>
					<p class="about_description" id="">夜市裡香氣撲鼻的鹽酥雞，向來是人氣小吃排行榜中的常客。透過美食達人的美味魔法解析， 透過食材挑選、調味料配方與製作過程的提點...</p>
					<a href="#" class="button" id="story">創業故事</a>
				</div>
				<img src="..\material\about.jpg" alt="" class="about_img">
			</div>
		</section>
		<section class="services seciton bd-container" id="services">
			<span class="section-subtitle">提供</span>
			<h2 class="section-title">我們的服務</h2>
			<div class="services_container bd-grid">
				<div class="services_content">
					<i class="fas fa-truck" id="services_img"></i>
					<h3 class="services_title">美味的食物</h3>
					<p class="services_description">香脆可口鹹甜適中甘脆爽口</p>
				</div>
				<div class="services_content">
					<i class="fas fa-truck" id="services_img"></i>
					<h3 class="services_title">盡善的服務</h3>
					<p class="services_description">堅持盡善的服務品質</p>
				</div>
				<div class="services_content">
					<i class="fas fa-truck" id="services_img"></i>
					<h3 class="services_title">誠摯的微笑</h3>
					<p class="services_description">一個誠摯的微笑，一次味蕾的碰撞</p>
				</div>
			</div>
		</section>
		<section class="menu section bd-container" id="menu">
			<span class="section-subtitle">菜單</span>
			<h2 class="section-title">精選菜單</h2>
			<div class="menu_container bd-grid">
				<?php
					session_start();
					$id = $_SESSION["id"];
					if (!isset($id)) {
						$id = "'null'";
					}
					else {
						$id = "'$id'";
					}
					$conn = mysqli_connect("localhost", "root", "1234", "eatingchicken");

					if (!$conn) {
						echo "<script>alert('Bad Connection')</script>";
						header("location: https://eatingchicken.site/web.php");
					}
					else {
						// THIS IS DAMN IMPORTANT, OTHERWISE YOU'LL GET ERROR
						mysqli_query($conn, "SET NAMES utf8mb4");
						$sql = "SELECT * FROM food";
				
						$result = mysqli_query($conn, $sql);
				
						while ($row = mysqli_fetch_array($result)) {
							echo '<div class="menu_content">
							<img src="'.$row["food_img"].'" alt="" class="menu_img">
							<h3 class="menu_name">'.$row["food_name"].'</h3>
							<span class="menu_detail">'.$row["food_desc"].'</span>		
							<span class="menu_preci">'.$row["food_price"].'</span>
							<a href="javascript: add('.$id.', '.$row["food_id"].')" class="button menu_button"><i class="bx bx-cart-alt"></i></a>
							</div>';
						}
					}
				?>
				<!-- <div class="menu_content">
					<img src="..\material\鹽酥雞.jpg" alt="" class="menu_img">
					<h3 class="menu_name">鹽酥雞</h3>
					<span class="menu_detail">人氣炸物</span>		
					<span class="menu_preci">$50</span>
					<a href="#" class="button menu_button"><i class='bx bx-cart-alt'></i></a>
				</div>
				<div class="menu_content">
					<img src="..\material\薯條.jpg" alt="" class="menu_img">
					<h3 class="menu_name">薯條</h3>
					<span class="menu_detail">人氣炸物</span>		
					<span class="menu_preci">$35</span>
					<a href="#" class="button menu_button"><i class='bx bx-cart-alt'></i></a>
				</div>
				<div class="menu_content">
					<img src="..\material\甜不辣.jpg" alt="" class="menu_img">
					<h3 class="menu_name">甜不辣</h3>
					<span class="menu_detail">人氣炸物</span>		
					<span class="menu_preci">$30</span>
					<a href="#" class="button menu_button"><i class='bx bx-cart-alt'></i></a>
				</div>
				<div class="menu_content">
					<img src="..\material\薯餅.jpg" alt="" class="menu_img">
					<h3 class="menu_name">薯餅</h3>
					<span class="menu_detail">消夜必備</span>		
					<span class="menu_preci">$20</span>
					<a href="#" class="button menu_button"><i class='bx bx-cart-alt'></i></a>
				</div>
				<div class="menu_content">
					<img src="..\material\貢丸.jpg" alt="" class="menu_img">
					<h3 class="menu_name">貢丸</h3>
					<span class="menu_detail">消夜必備</span>		
					<span class="menu_preci">$20</span>
					<a href="#" class="button menu_button"><i class='bx bx-cart-alt'></i></a>
				</div>
				<div class="menu_content">
					<img src="..\material\about.jpg" alt="" class="menu_img">
					<h3 class="menu_name">花枝丸</h3>
					<span class="menu_detail">消夜必備</span>		
					<span class="menu_preci">$30</span>
					<a href="#" class="button menu_button"><i class='bx bx-cart-alt'></i></a>
				</div>
				<div class="menu_content">
					<img src="..\material\花椰菜.jpg" alt="" class="menu_img">
					<h3 class="menu_name">花椰菜</h3>
					<span class="menu_detail">解油膩</span>		
					<span class="menu_preci">$30</span>
					<a href="#" class="button menu_button"><i class='bx bx-cart-alt'></i></a>
				</div>
				<div class="menu_content">
					<img src="..\material\玉米.jpg" alt="" class="menu_img">
					<h3 class="menu_name">玉米</h3>
					<span class="menu_detail">解油膩</span>		
					<span class="menu_preci">$20</span>
					<a href="#" class="button menu_button"><i class='bx bx-cart-alt'></i></a>
				</div>
				<div class="menu_content">
					<img src="..\material\杏鮑菇.jpg" alt="" class="menu_img">
					<h3 class="menu_name">杏鮑菇</h3>
					<span class="menu_detail">解油膩</span>		
					<span class="menu_preci">$20</span>
					<a href="#" class="button menu_button"><i class='bx bx-cart-alt'></i></a>
				</div> -->
			</div>
		</section>
		<section class="checkout">
			<div class="checkout-btn">  
				<a href="\cart.php" class="button" id="checkout">結帳去</a>
			</div>
		</section>
		<section class="app section bd-container">
			<div class="app_container bd-grid">
				<div class="app_data">
					<span class="section-subtitle app_initial">消費心得</span>
					<h2 class="section-title">張家兄弟都說讚</h2>
					<p class="app_description app_initial">還不快點來吃啊</p>
					<div class="app_stores">
						<a href="#"><img src="..\material\about.jpg" alt="" class="app_store"></a>
						<a href="#"><img src="..\material\about.jpg" alt="" class="app_store"></a>
					</div>
				</div>
				<img src="..\material\testimonial.jpg" alt="" class="app_img">
			</div>
		</section>
		<section class="contact section bd-container" id="contact">
			<div class="contact_container bd-grid">
				<div class="contact_data">
					<span class="section-subtitle contact_initial">和我們聊聊</span>
					<h2 class="section-title contact_initial">聯絡我們<h2>
					<p class="contact_description contact_initial">我們提供美味的炸物給您們</p>
				</div>
				<div class="contact_button">
					<a href="#" class="button">現在聯絡</a>
				</div>
			</div>
		</section>
	</main>
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
						<span class="footer_description">美味鹽酥雞</span>
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
<script>
	function add(customer_id, food_id) {
		if (customer_id == 'null') {
			alert("請先登入");
			window.location = "https://eatingchicken.site/login.php";
		}
		else{
			var qty = prompt("請輸入你要買的個數");
			if (qty != null && qty != "") {
				if (isNaN(qty) || qty < 1) {
						alert('請輸入正整數');
					}
				else{
					window.location = "https://eatingchicken.site/addcart.php?food_id=" + food_id + "&qty=" + qty;
				}
			}
		}
		
	}
</script>
</html>