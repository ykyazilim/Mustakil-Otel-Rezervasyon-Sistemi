
<?php 
include 'panel/sistem/db.php'; 
include 'panel/sistem/fonk.php'; 
$odasayi = 1;
while($odasayi < $_GET['sayi']+1){ ?>

<center><h2><?= $_GET['sayi']==1?'Odanı Seç':$odasayi.'. Odanı Seç'; ?></h2></center>
<br>

	<div class="owl-<?= $odasayi; ?> owl-carousel owl-theme">
		<?php 
		$sayi = 1;
		$odalar=$db->prepare("select * from odalar order by id  ");
		$odalar->execute();
		while($odacek=$odalar->fetch(PDO::FETCH_ASSOC)) {?>
			<div class="item rounded" id="item-<?= $sayi; ?>" >
				<div class="row" >
					<div class="col-sm-6">
						<?php 		
						$id=$odacek['id'];
						$oda_resimleri=$db->prepare("select * from oda_resimleri where oda_id='$id' order by id DESC ");
						$oda_resimleri->execute();
						$odaresim=$oda_resimleri->fetch(PDO::FETCH_ASSOC);
						?>
						<img src="ykimg/oda/<?= $odaresim['resim']; ?>" alt="<?= $odaresim['oda_adi']; ?>" title="<?= $odaresim['oda_adi']; ?>">
					</div>
					<div class="col-sm-6">
						<center>	<h2><?= $odacek['oda_adi']; ?></h2></center>
						<h3><?= $odacek['oda_fiyat']; ?> TL/GECELİK</h3>
						<p><ul>
							<?php 
							foreach (explode('&&&', $odacek['oda_ozellik']) as $value) {
								if (!$value)continue;
								echo "<li>$value</li>";
							} ?>
						</ul></p>
						<input type="radio" id="radio-<?= $sayi++; ?>" onclick="odasec()" name="oda-<?= $odasayi; ?>" oda-adi="<?= $odacek['oda_adi']; ?>" oda-id="<?= $odacek['id']; ?>" oda-liste-id="<?= $odasayi-1; ?>" value="<?= $odacek['id']; ?>" class="form-control" style="width: 10%!important;display: inline;" >
						<label for="oda-<?= $odasayi; ?>" style="font-size: 30px;"><i class="fa fa-check"></i> Seç</label><br>
					</div>
				</div>
			</div>

		<?php } ?>
	</div>
	<hr>
<?php $odasayi++; } ?>





<?php 
$odasayi = 1;
while($odasayi < $_GET['sayi']+1){  ?>

<script>
	$('.owl-<?= $odasayi++; ?>').owlCarousel({
		loop:true,
		margin:10,
		dots: true,
		autoplay: true,
		autoplayHoverPause: true,
		items:1
		
	});
	
</script>
<?php } ?>