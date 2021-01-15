<?php include 'header.php'; ?>

<style> .title-bg {background: url('images/title-bg.jpg'); width: 100%; height: 200px; } .title-bg h1{font-family: 'roboto'; /*font-weight: bold;*/ font-size: 50px } .step-wizard{font-family: Raleway; list-style: none; padding: 0; font-size: 0; color: #555; } .step-wizard li{display: inline-block; font-size: initial; position: relative; line-height: 1; background-color: #efefef; padding: .5em 2em; border: 1px solid rgba(0,0,0, 0.25); } .step-wizard li+li{border-left: none; } .step-wizard li.is-selected{background: #E9AD28; font-weight: bold; color: #fff; } .step-wizard li::after{content: ""; width: 1.41421356em; height: 1.41421356em; border: inherit; position: absolute; transform: rotate(45deg); left: 100%; top: .25em; margin-left: -.7em;; border-left: none; border-bottom: none; z-index: 2; background: inherit; } .rezervasyon-sidebar{padding-top:10px } .rezervasyon-title{font-size:16px; color:#333333; font-family:'Montserrat'; text-transform:uppercase; padding:12px 20px; font-weight:bold; text-align:center; border-bottom:1px solid #e4e4e4; } .rezervasyon-sidebar ul{list-style-type: none; } </style>

<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<div class="title-bg">
	<h1 class="text-white  d-flex  justify-content-center pt-5"> Rezervasyon Yap</h1>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12 pt-3  d-flex  justify-content-center">
			<ol class="step-wizard">
				<li>1.Kişileri Seçiniz</li>
				<li class="is-selected">2. Tarih Seçiniz</li>
				<li>3. Oda Seçiniz</li>
				<li>4. Ödeme Bilgileri & Onay</li>
			</ol>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-4 col-lg-3">
			<div class="rezervasyon-sidebar">
				<div class="reservation-room-selected bg-gray">
					<h2 class="rezervasyon-title bg-color1">Rezervasyon Bilgileri</h2>
					<div class=" bg-dark p-2 text-white" style="margin-top: -15px">
						<h6>Konaklayacak Kişiler</h6>
						<ul id="odalar">
						</ul>
					</div>
				</div>                        
			</div>
		</div>
		<div class="col-md-8 col-lg-9 bg-dark">
			<h4 class="text-white d-flex  justify-content-center pt-4 "> LÜTFEN KONAKLAMA TARİHLERİNİ SEÇİNİZ</h4>

			<div class="d-flex justify-content-center pt-3 "> 
				<div class="col-sm-4">
					<label for="Giriş Tarihi"  class="text-white">Giriş Tarihi</label>
					<div class="input-group">
						<div class="input-group-prepend mt-2">
							<div class="input-group-text bg-white" ><i class="fa fa-calendar"></i></div>
						</div>
						<input type="text" class="form-control giris mt-2" value="<?= date('d.m.Y'); ?>" placeholder="Giriş Tarihi">
					</div>
				</div>
				<div class="col-sm-4">
					<label for="Giriş Tarihi"  class="text-white">Çıkış Tarihi</label>
					<div class="input-group">
						<div class="input-group-prepend mt-2">
							<div class="input-group-text bg-white" ><i class="fa fa-calendar"></i></div>
						</div>
						<input type="text" class="form-control cikis mt-2" value="<?= date('d.m.Y'); ?>" placeholder="Çıkış Tarihi">
					</div>
				</div>

			</div>
			<br>
			<a href="rezervasyon-3" id="ileri" class="btn btn-outline-warning " style="margin-left: 90%">İleri</a>
			<br><br>
		</div>
	</div>
</div>



<div class="container">
	<div class="row">
		<br><br><br><br><br>
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/locales/bootstrap-datepicker.tr.min.js" charset="UTF-8"></script>

<script>  
	function kontrol() {
		var odalar = JSON.parse(localStorage.getItem("odalar"));
		if (!odalar) {
			alert("Oda Seçimi Yapılmamış. Yönlendiriliyorsunuz");
			window.location = "rezervasyon";
		} }
		kontrol();

		$('input.giris').datepicker({
			clearBtn: true,
			language: "tr"
		});
		$('input.cikis').datepicker({
			clearBtn: true,
			language: "tr"
		});
		$("#ileri").click(function(e) {
			var giris = $("input.giris").val();
			var cikis = $("input.cikis").val();
			if (giris>cikis) {
				alert("Hata! Giriş Tarihiniz Çıkış Tarihinizden Büyük Olamaz!");
				e.preventDefault();
				exit("die");
			}
			var tarih=[{
				"giris_tarihi" : giris,
				"cikis_tarihi" : cikis
			}];
			localStorage.setItem("tarihler", JSON.stringify(tarih));
		});


		var odalar = JSON.parse(localStorage.getItem("odalar"));


		$.each(odalar, function(index, value) {
			if (value['cocuk']==1) {
				      $("#odalar").append("<li>" + ++index + ". Oda <ul><li>"+value['yetiskin']+" Yetişkin </li> <li>"+value['cocuk']+" Çocuk["+value['cocukyas1']+" yaş] </li></ul><li>");

			}
			else if(value['cocuk']==2)
			{
				     $("#odalar").append("<li>" + ++index + ". Oda <ul><li>"+value['yetiskin']+" Yetişkin </li> <li>"+value['cocuk']+" Çocuk["+value['cocukyas1']+"yaş - "+value['cocukyas2']+"yaş] </li></ul><li>");
			}
			      
			else{
				$("#odalar").append("<li>" + ++index + ". Oda <ul><li>"+value['yetiskin']+" Yetişkin </li></ul><li>");
			}

		    });


	</script>
</body>
</html>