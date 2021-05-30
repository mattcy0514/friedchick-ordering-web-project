<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content=">雞吃好吃雞，夜市裡香氣撲鼻的鹽酥雞，向來是人氣小吃排行榜中的常客。透過美食達人的美味魔法解析， 透過食材挑選、調味料配方與製作過程的提點">
		<meta name="keywords" content="炸雞,消夜,鹽酥雞,雞吃好吃雞,薯條,炸物,美食,好吃,小吃,速食,雞排,快速,服務">
		<meta name="author" content="Matt & Steven">
		<title>雞吃好吃雞</title>
		<link rel="stylesheet" href="\css\cart.css">
		<link rel="icon" href="/material/home.ico" type="image/x-icon" />
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
		<script src="https://kit.fontawesome.com/b613f357e8.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php
			ob_start();
			session_start();
			if (!isset($_SESSION["id"])) {
					echo '<script>
					alert("請先登入");
					window.location = "https://eatingchicken.site/login.php";
					</script>';
				
			}

			$deleting = $_COOKIE["deleting"];
			$checkout = $_COOKIE["checkout"];
			$modifying = $_COOKIE["modifying"];
			$code = $_GET["code"];

			if ($deleting == "true") {
				if ($code == 1) {
					setcookie("deleting", null, -1);
					echo "<script>alert('成功刪除')</script>";
				}
				else if ($code == 2) {
					setcookie("deleting", null, -1);
					echo "<script>alert('刪除失敗')</script>";
				}
			}
			else if ($modifying == "true") {
				if ($code == 1) {
					setcookie("modifying", null, -1);
					echo "<script>alert('成功修改')</script>";
				}
				else if ($code == 2) {
					setcookie("modifying", null, -1);
					echo "<script>alert('修改失敗')</script>";
				}
			}
			else if ($checkout == "true") {
				if ($code == 1) {
					setcookie("checkout", null, -1);
					echo "<script>alert('成功送出')</script>";
				}
				else if ($code == 2) {
					setcookie("checkout", null, -1);
					echo "<script>alert('送出失敗')</script>";
				}
				else if ($code == 3) {
					setcookie("checkout", null, -1);
					echo "<script>alert('購物車內並無商品，無法送出')</script>";
				}
			}
			// header("location: https://eatingchicken.site/login.php");
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
					<table>
						<tr>
							<th>商品</th>
							<th>數量</th>
							<th>各商品小計(NTD)</th>
							<th></th>
							<th></th>
						</tr>
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
								$sql = "SELECT food.food_id, food.food_img, food.food_name, food.food_price, cart.qty FROM cart
								INNER JOIN food ON cart.food_id = food.food_id 
								WHERE customer_id = $id";
						
								$result = mysqli_query($conn, $sql);
							
								$food_id = 0;
								$food_img = "";
								$food_name = "";
								$food_price = 0;
								$qty = 0;
								$sum = 0;
							
								while ($row = mysqli_fetch_array($result)) {
									$food_id = $row["food_id"];
									$food_img = $row["food_img"];
									$food_name = $row["food_name"];
									$food_price = $row["food_price"];
									$qty = $row["qty"];
									$sum += $food_price * $qty;
										echo '<tr>
									<td>'.$food_name.'</td>
									<td>'.$qty.'</td>
									<td>'.$qty * $food_price.'</td>
									<td><div>
									<a href="javascript: modify('.$id.', '.$row["food_id"].')" class="button" id="modify-button">修改</a></div>
									</td>
									<td><div>
									<a href="/remove.php?food_id='.$food_id.'" class="button" id="remove-button">移除</a></div>
									</td>
								</tr>';
								}
								echo '</table>
								<div class="total-price">
								<table id="total-table">
									<tr id="total">
										<td>總計</td>
										<td>'.$sum.'</td>
									</tr>
								</table>
								</div>
								<div class="submit">
								<a href=".\checkout.php" class="button" id="submit">送出</a>
								</div>';
							}
								

								
								
							// }
							

						?>
						<!-- <tr>
							<td>
								<div class="cart-info" id="cart-info">
									<img src="..\material\鹽酥雞.jpg" alt="">
									<div>
										<p>鹽酥雞</p>
										<small>50</small><br>
										<a href="" class="button" id="remove-button">移除</a>
									</div>
								</div>
							</td>
							<td><input type="number" value="1"></td>
							<td>50</td>
						</tr>
						<tr>
							<td>
								<div class="cart-info" id="cart-info">
									<img src="..\material\薯條.jpg" alt="">
									<div>
										<p>薯條</p>
										<small>35</small><br>
										<a href="" class="button" id="remove-button">移除</a>
									</div>
								</div>
							</td>
							<td><input type="number" value="1"></td>
							<td>35</td>
						</tr>
						<tr>
							<td>
								<div class="cart-info" id="cart-info">
									<img src="..\material\甜不辣.jpg" alt="">
									<div>
										<p>甜不辣</p>
										<small>30</small><br>
										<a href="" class="button" id="remove-button">移除</a>
									</div>
								</div>
							</td>
							<td><input type="number" value="1"></td>
							<td>30</td>
						</tr> -->
					
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
		function modify(customer_id, food_id) {
			if (customer_id == 'null') {
				alert("請先登入");
				window.location = "https://eatingchicken.site/login.php";
			}
			else{
				var qty = prompt("請輸入你要修改的個數");
				if (qty != null && qty != "") {
					if (isNaN(qty) || qty < 1) {
						alert('請輸入正整數');
					}
					else{
						window.location = "https://eatingchicken.site/modify.php?food_id=" + food_id + "&qty=" + qty;
					}
				}
			}
		}
	</script>
</html>