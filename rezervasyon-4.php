<?php include 'header.php'; ?>

<style> .title-bg {background: url('images/title-bg.jpg'); width: 100%; height: 200px; } .title-bg h1{font-family: 'roboto'; /*font-weight: bold;*/ font-size: 50px } .step-wizard{font-family: Raleway; list-style: none; padding: 0; font-size: 0; color: #555; } .step-wizard li{display: inline-block; font-size: initial; position: relative; line-height: 1; background-color: #efefef; padding: .5em 2em; border: 1px solid rgba(0,0,0, 0.25); } .step-wizard li+li{border-left: none; } .step-wizard li.is-selected{background: #E9AD28; font-weight: bold; color: #fff; } .step-wizard li::after{content: ""; width: 1.41421356em; height: 1.41421356em; border: inherit; position: absolute; transform: rotate(45deg); left: 100%; top: .25em; margin-left: -.7em;; border-left: none; border-bottom: none; z-index: 2; background: inherit; } .rezervasyon-sidebar{padding-top:10px } .rezervasyon-title{font-size:16px; color:#333333; font-family:'Montserrat'; text-transform:uppercase; padding:12px 20px; font-weight:bold; text-align:center; border-bottom:1px solid #e4e4e4; } .rezervasyon-sidebar ul{list-style-type: none; } </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<style>
	.owl-theme .owl-dots,.owl-theme .owl-nav{text-align:center;-webkit-tap-highlight-color:transparent}.owl-theme .owl-nav{margin-top:10px}.owl-theme .owl-nav [class*=owl-]{color:#FFF;font-size:14px;margin:5px;padding:4px 7px;background:#D6D6D6;display:inline-block;cursor:pointer;border-radius:3px}.owl-theme .owl-nav [class*=owl-]:hover{background:#E9AD28;color:#FFF;text-decoration:none}.owl-theme .owl-nav .disabled{opacity:.5;cursor:default}.owl-theme .owl-nav.disabled+.owl-dots{margin-top:10px}.owl-theme .owl-dots .owl-dot{display:inline-block;zoom:1}.owl-theme .owl-dots .owl-dot span{width:10px;height:10px;margin:5px 7px;background:#D6D6D6;display:block;-webkit-backface-visibility:visible;transition:opacity .2s ease;border-radius:30px}.owl-theme .owl-dots .owl-dot.active span,.owl-theme .owl-dots .owl-dot:hover span{background:#E9AD28}.odalar h1:hover,.odalar h3:hover{
		color: #E9AD28;
	}
</style>

<div class="title-bg">
	<h1 class="text-white  d-flex  justify-content-center pt-5"> Rezervasyon Yap</h1>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12 pt-3  d-flex  justify-content-center">
			<ol class="step-wizard">
				<li>1.Kişileri Seçiniz</li>
				<li >2. Tarih Seçiniz</li>
				<li >3. Oda Seçiniz</li>
				<li class="is-selected">4. Ödeme Bilgileri & Onay</li>
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
						<center><h6>Konaklayacak Kişiler</h6></center>
						<ul id="odalar">
						</ul>
						<hr>
						<center><h6>Konaklama Tarihleri</h6></center>
						<p class="tarihler ml-4">
							
						</p>
					</div>
				</div>                        
			</div>
		</div>
		<div class="col-md-6 col-lg-5 ">

			<div class="odalar" id="oda-listele">
				<h1>Kişi Bilgileri & Onay</h1>

				<div class="row pt-4">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Adınız</label>
							<input class="form-control"  required="" name="ad">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Soyadınız</label>
							<input class="form-control"  required="" name="soyad">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>E-Posta</label>
							<input class="form-control"  required="" name="eposta">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Telefon</label>
							<input class="form-control"  required="" name="telefon">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Adresiniz</label>
							<input class="form-control"  required="" name="adres">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Bize İletmek İstediğiniz Bir Notunuz Var mı?</label>
							<textarea class="form-control"  required="" name="mesaj" rows="7">
							</textarea>
						</div>
					</div>
				</div>
			</div> <br>
			<a href="rezervasyon-4" id="ileri" type="submit" class="btn btn-outline-warning " style="margin-left: 90%">İleri</a>
			<br> <br>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="rezervasyon-sidebar">
				<div class="reservation-room-selected bg-gray">
					<h2 class="rezervasyon-title bg-color1">Ödeme Bilgileri</h2>
					<div class="bg-dark p-2 text-white" style="margin-top: -15px">

						<ul>
							<li>
								<label for="odeme-eft">
									<input type="radio" id="odeme-eft" name="odeme-tur" checked value="eft">
									EFT / HAVALE İLE ÖDEME
								</label>
							</li>
							<li>
								<label for="odeme-kart">
									<input type="radio" id="odeme-kart" name="odeme-tur" value="kart" disabled="">
									ONLİNE ÖDEME
								</label>
							</li>
						</ul>

					</div>
				</div>                        
			</div>
		</div>
	</div>
</div>



<div class="container bilgi">
	<div class="row">
		<br><br><br><br><br>
	</div>
</div>

<script
src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script>   

	function kontrol() {
		var odalar = JSON.parse(localStorage.getItem("odalar"));
		var tarihler = JSON.parse(localStorage.getItem("tarihler"));
		if (!odalar) {
			alert("Oda Seçimi Yapılmamış. Yönlendiriliyorsunuz");
			window.location = "rezervasyon";
		}
		else if(!tarihler){
			alert("Tarih Seçimi Yapılmamış. Yönlendiriliyorsunuz");
			window.location = "rezervasyon-2";
		}
	}

	kontrol();
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


	var tarihler = JSON.parse(localStorage.getItem("tarihler"));

	$.each(tarihler, function(index, value) {

		$('.tarihler').html('<b>Giriş Tarihi:</b> '+value['giris_tarihi']+' <br> <b>Çıkış Tarihi:</b> '+value['cikis_tarihi']+'');

	});



	$("#ileri").click(function(event) {
		event.preventDefault();

		$(".bilgi").html('a');

		var ad = $("input[name=ad]").val();
		var soyad = $("input[name=soyad]").val();
		var telefon = $("input[name=telefon]").val();
		var eposta = $("input[name=eposta]").val();
		var adres = $("input[name=adres]").val();
		var mesaj = $("textarea[name=mesaj]").val();
		var odeme = $("input[name=odeme-tur]").val();

		if (!ad  || !soyad || !telefon || !eposta || !adres || !odeme) {
			alert("Tüm Alanları Doldurduğunuzdan Emin Olunuz...");
			exit();
		}
		var bilgiler = {ad,soyad,telefon,eposta,adres,mesaj,odeme};
		var odalar = JSON.parse(localStorage.getItem("odalar"));
		var tarihler = JSON.parse(localStorage.getItem("tarihler"));


		$.ajax({
			type: "POST",
			url: "/islem.php",
			data: JSON.stringify ({odalar,tarihler,bilgiler}),
			contentType: "application/json; charset=utf-8",
			success: function(data){

				// $(".bilgi").html(data);
				localStorage.clear();
				
				window.location = data;
			},
			error: function(errMsg) {
				alert(errMsg);
			}
		});

	});


</script>
</body>
</html>