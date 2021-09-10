<?php
		try{
  $db = new PDO('mysql:host=localhost;dbname=seyidahmetarvas_vt;charset=UTF8', 'root', '');
  function videogetir() {
	  global $db;
	  $videolar = $db->query("SELECT*FROM videolar where IDanakategori=".$_GET['ID']);
	  return $videolar->fetchAll(PDO::FETCH_ASSOC);
  }
}
catch(exception $e){ print_r($e); }
?>
<?php $videolaragit=videogetir();?>
<div class="col-4 col-12-mobile" id="sidebar">
	<section>
	<header>
			<h2>Dersler</h2>
		</header>
	<?php try {
        	for($i=0; $i<count($videolaragit); $i++){
			$videobilgi = $videolaragit[$i];
?>
		<header>
			<h3><a href="#"><?=$videobilgi['videosunan']?></a></h3>
		</header>
			<div class="row gtr-50">
			<div class="col-8">
				<h4><?=$videobilgi['videoaciklama']?></h4>
			        <p>
                    <?=$videobilgi['videosuresi']?>
			        </p>
					<a href="izleme.php?IDvideo=<?=$videobilgi['IDvideolar']?>&ID=<?=$videobilgi['IDanakategori']?>" class="button">İzle</a>
					<hr>	
				</div>
			 </div>
			<?php
 }
}catch (Exception $e){print_r($e);}?>
	</section>
</div>