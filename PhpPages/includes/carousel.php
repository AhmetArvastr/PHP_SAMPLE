<?php
		try{
  $db = new PDO('mysql:host=localhost;dbname=seyidahmetarvas_vt;charset=UTF8', 'root', '');
  function anakategorigetir() {
	  global $db;
	  $kategoriler = $db->query("SELECT*FROM anakategori");
	  return $kategoriler->fetchAll(PDO::FETCH_ASSOC);
  }
}
catch(exception $e){ print_r($e); }
?>
<?php $a=anakategorigetir();?>

<?php try {
        	for($i=0; $i<count($a); $i++){
			$b = $a[$i];
        ?>

<div class="reel">
        <img src="img/<?= $b['ankategoriresimadi']?>" alt="" />
        <header>
            <h3><a href="Egitimler.php?ID=<?=$b['IDanakategori']?>&anakategori=<?=$b['anakategoriadi']?>"><?= $b['anakategoriadi']?></a></h3>
        </header>
    <p><?= $b['anakategoriaciklama']?></p>
</div>

<?php
                   }
                  }catch (Exception $e){print_r($e);}
			?>