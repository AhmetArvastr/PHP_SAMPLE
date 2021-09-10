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
  function videogetir2() {
	  global $db;
	  $videolar = $db->query("SELECT*FROM videolar where IDvideolar=".$_GET['IDvideo']);
	  return $videolar->fetchAll(PDO::FETCH_ASSOC);
  }
}
catch(exception $e){ print_r($e); }
?>
<?php $videolaragit=videogetir2();?>
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
        	for($i=0; $i<count($videolaragit); $i++){
			$videobilgi = $videolaragit[$i];
        ?>   
									<iframe width="420" height="315"
                                        src="<?=$videobilgi['videolinki']?>">
                                        </iframe>
                                        <header>
                                        <h2><?=$videobilgi['videosunan']?></h2>
                                        </header>
                                        <p>
                                        <?=$videobilgi['videoaciklama']?>
                                        <br>
                                        Süresi : <?=$videobilgi['videosuresi']?>
                                        </p>
                                    <?php
                                     }
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