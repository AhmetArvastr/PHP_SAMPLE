<?php

$message="";

if(!empty($_POST['kullaniciadi'])||!empty($_POST['kullanicisoyadi'])||!empty($_POST['kullanicimail'])||!empty($_POST['kullanicisifre'])){

if(!empty($_POST['kullaniciadi'])&&!empty($_POST['kullanicisoyadi'])&&!empty($_POST['kullanicimail'])&&!empty($_POST['kullanicisifre'])){

$db = new PDO('mysql:host=localhost;dbname=seyidahmetarvas_vt;charset=UTF8', 'root', '');

if( filter_var($_POST['kullanicimail'], FILTER_VALIDATE_EMAIL)==false){
	$message="Mail hatalı lütfen örneğin @mail.com şeklinde giriniz.";
}else{

	function anakategoriekle($value){
	global $db;
	$anakategorieklendi= $db->prepare("INSERT INTO anakategori (anakategoriadi,anakategoriresimadi,anakategoriaciklama)
	VALUES(:anakategoriadi,:anakategoriresimadi,:anakategoriaciklama)");
	return $anakategorieklendi->execute($value);
	}

	function kategoriekle($value){
		global $db;
		$kategorieklendi= $db->prepare("INSERT INTO kategoriler (kategoriadi,kategoriresimadi)
		VALUES(:kategoriadi,:kategoriresimadi)");
		return $kategorieklendi->execute($value);
		}
	function videoekle($value){
		global $db;
		$videoeklendi= $db->prepare("INSERT INTO videolar (videoaciklama,videosunan,videosuresi,videolinki)
		VALUES(:videoaciklama,:videosunan,:videosuresi,:videolinki)");
		return $videoeklendi->execute($value);
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
	<title>Ders Ekle</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">
		<a href="#">Ders Ekleme</a>
	</div>

	<form method="POST">
		<label for="Anakategori">Anakategori</label>
		<input type="text" placeholder="Anakategori Adı" name="anakategoriadi" id="anakategoriadi">
		<input type="FILE" name="ankategoriresimadi" id="ankategoriresimadi">
		<input type="text" placeholder="Anakategori Açıklama" name="anakategoriaciklama" id="anakategoriaciklama">
		<br>
		<label for="Anakategori">Kategori</label>
		<input type="text" placeholder="Kategori Adı" name="kategoriadi" id="kategoriadi">
		<input type="FILE" name="kategoriresimadi" id="kategoriresimadi">
		<br><br>
		<label for="Anakategori">Videolar</label>
		<input type="text" placeholder="Video Açıklaması" name="videoaciklama" id="videoaciklama">
		<input type="text" placeholder="Video Sunan" name="videosunan" id="videosunan">
		<input type="text" placeholder="Video Suresi" name="videosuresi" id="videosuresi">
		<input type="text" placeholder="Video Linki" name="videolinki" id="videolinki">
		<?php if(!empty($message)): ?>
			<p><?= $message."<br><br>" ?></p>
		<?php endif; ?>
		<input type="password" placeholder="Şifre Giriniz" name="kullanicisifre" id="kullanicisifre">
		<input type="submit">

	</form>
</body>
</html>