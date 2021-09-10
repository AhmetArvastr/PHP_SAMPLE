<?php

session_start();

if( !empty($_SESSION['tip']) || !empty($_SESSION['ID'])){
	header("Location:/phpprojeler/VTodev/Anasayfa.php");
}

if(!empty($_POST['kullanicimail']) || !empty($_POST['kullanicisifre'])) {

	$message="";

    $db = new PDO('mysql:host=localhost;dbname=seyidahmetarvas_vt;charset=UTF8', 'root', '');
	
	function kullanicigetir() {
		global $db;
		$kullanicilar = $db->query("SELECT*FROM kullanicilar");
		return $kullanicilar->fetchAll(PDO::FETCH_ASSOC);
	}
	$kullanici=kullanicigetir();

	for($i=0; $i<count($kullanici); $i++){
		$b = $kullanici[$i];

	if($_POST['kullanicisifre']==$b['kullanicisifre'] && filter_var($_POST['kullanicimail'], FILTER_VALIDATE_EMAIL)==true && $_POST['kullanicimail']==$b['kullanicimail'] ){

		$_SESSION['tip'] = $b['kullanicitipi'];
		$_SESSION['ID'] = $b['IDkullanici'];
		header("Location:/phpprojeler/VTodev/Anasayfa.php");

		}else {
			$message="Kullanıcı veya şifre hatalı";
		}
	} 

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Platforma Giriş</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="VTodev/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="VTodev/assets/css/noscript.css" /></noscript>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">
		<a href="#">Ders Platformu</a>
	</div>

	<h1>Giriş yap</h1>

	<form method="POST">
		
		<input type="text" placeholder="Email giriniz.." name="kullanicimail">
		<input type="password" placeholder="Şifrenizi giriniz.." name="kullanicisifre">
		<?php if(!empty($message)): ?>
			<p><?= $message."<br><br>" ?></p>
		<?php endif; ?>
		<input type="submit" name="giriş">

	</form>
	<button onclick="window.location.href='register.php'">Kayıt Ol..</button>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>