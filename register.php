<?php

$message="";

if(!empty($_POST['kullaniciadi'])||!empty($_POST['kullanicisoyadi'])||!empty($_POST['kullanicimail'])||!empty($_POST['kullanicisifre'])){

if(!empty($_POST['kullaniciadi'])&&!empty($_POST['kullanicisoyadi'])&&!empty($_POST['kullanicimail'])&&!empty($_POST['kullanicisifre'])){

$db = new PDO('mysql:host=localhost;dbname=seyidahmetarvas_vt;charset=UTF8', 'root', '');

if( filter_var($_POST['kullanicimail'], FILTER_VALIDATE_EMAIL)==false){
	$message="Mail hatalı lütfen örneğin @mail.com şeklinde giriniz.";
}else{

function kullanıcıEkle($value){
	global $db;
	$kullaniciEkle= $db->prepare("INSERT INTO kullanicilar (kullaniciadi,kullanicisoyadi,kullanicimail,kullanicisifre)
	VALUES(:kullaniciadi,:kullanicisoyadi,:kullanicimail,:kullanicisifre)");
	return $kullaniciEkle->execute($value);
	}

	if($_POST){
		if(kullanıcıEkle($_POST)){
			echo "<script>alert('kayıt başarılı')</script>";
		}else{
			echo "<script>alert('problem oluştu')</script>";
			}
		}
	}

}else{ echo "Lütfen Tüm alanları doldurunuz.";}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Kayıt Ol</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="VTodev/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="VTodev/assets/css/noscript.css" /></noscript>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">
		<a href="#">Platform Kaydı</a>
	</div>

	<h1>Kayıt Ol..</h1>

	<form method="POST">
		
		<input type="text" placeholder="Adınızı Giriniz" name="kullaniciadi" id="kullaniciadi">
		<input type="text" placeholder="Soyadınızı Giriniz" name="kullanicisoyadi" id="kullanicisoyadi">
		<input type="text" placeholder="Email Giriniz" name="kullanicimail" id="kullanicimail">
		<?php if(!empty($message)): ?>
			<p><?= $message."<br><br>" ?></p>
		<?php endif; ?>
		<input type="password" placeholder="Şifre Giriniz" name="kullanicisifre" id="kullanicisifre">
		<input type="submit">

	</form>
	<button onclick="window.location.href='login.php'">Giriş Yap</button>
</body>
</html>