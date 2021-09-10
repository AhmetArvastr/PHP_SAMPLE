<?php
session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Öğrenci Ders Otomasyonu</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="homepage is-preload">
	<?php
		try{
  $db = new PDO('mysql:host=localhost;dbname=seyidahmetarvas_vt;charset=UTF8', 'root', '');
  function kategorigetir() {
	  global $db;
	  $kategoriler = $db->query("SELECT*FROM kategoriler where IDanakategori=".$_GET['ID']);
	  return $kategoriler->fetchAll(PDO::FETCH_ASSOC);
  }
}
catch(exception $e){ print_r($e); }
?>
<?php $a=kategorigetir();?>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Inner -->
					<?php include 'includes/inner.php'; ?>

					<!-- Nav -->
					<?php include 'includes/nav.php'; ?>

			<!-- Main -->
				<div class="wrapper style1">

					<div class="container">
						<div class="row gtr-200">
							<div class="col-8 col-12-mobile" id="content">
								<article id="main">
									<?php try {
        							for($i=0; $i<count($a); $i++){
            							$b = $a[$i];
            						?>   
									<header>
										<h2><a href="#"><?= $b['kategoriadi']?></a></h2>
										
									</header>
									<a href="#" class="image featured"><img src="img/<?= $b['kategoriresimadi']?>" alt="" /></a>
									<?php }
    								}catch (Exception $e){print_r($e);}?>
								</article>
							</div>
							<!-- videolar -->
							<?php include 'includes/videolar.php'; ?>
							
						</div>
						<hr />
					</div>
					</div>
				</div>

		</div>

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