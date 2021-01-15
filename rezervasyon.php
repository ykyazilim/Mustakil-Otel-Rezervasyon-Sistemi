<?php include 'header.php'; ?>

<style> .title-bg {background: url('images/title-bg.jpg'); width: 100%; height: 200px; } .title-bg h1{font-family: 'roboto'; /*font-weight: bold;*/ font-size: 50px } .step-wizard{font-family: Raleway; list-style: none; padding: 0; font-size: 0; color: #555; } .step-wizard li{display: inline-block; font-size: initial; position: relative; line-height: 1; background-color: #efefef; padding: .5em 2em; border: 1px solid rgba(0,0,0, 0.25); } .step-wizard li+li{border-left: none; } .step-wizard li.is-selected{background: #E9AD28; font-weight: bold; color: #fff; } .step-wizard li::after{content: ""; width: 1.41421356em; height: 1.41421356em; border: inherit; position: absolute; transform: rotate(45deg); left: 100%; top: .25em; margin-left: -.7em;; border-left: none; border-bottom: none; z-index: 2; background: inherit; } 



.rezervasyon-sidebar{
	padding-top:10px
}
.rezervasyon-title{
	font-size:16px;
	color:#333333;
	font-family:'Montserrat';
	text-transform:uppercase;
	padding:12px 20px;
	font-weight:bold;
	text-align:center;
	border-bottom:1px solid #e4e4e4;

} 
.select-css{
	background-color: transparent;
	color: white;

}

.select-css option{
	padding: 10px;

}
</style>

<div class="title-bg">
	<h1 class="text-white  d-flex  justify-content-center pt-5"> Rezervasyon Yap</h1>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12 pt-3  d-flex  justify-content-center">
			<ol class="step-wizard">
				<li  class="is-selected">1.Kişileri Seçiniz</li>
				<li>2. Tarih Seçiniz</li>
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
						<h6>Lütfen Oda Sayısı ve Konaklayacak Kişileri Seçiniz</h6>
					</div>
				</div>                        
			</div>
		</div>
		<div class="col-md-8 col-lg-9 bg-dark">
			<h4 class="text-white d-flex  justify-content-center pt-4 "> LÜTFEN ODA SAYISI VE KONAKLAYACAK KİŞİLERİ SEÇİNİZ</h4>
			<form action="" onchange="localstorage()">
				<div class="d-flex justify-content-center pt-5 oda-1">
					<div class="col-sm-3">
						<button type="button" class="btn btn-outline-success" onclick="odaEkle()" oda="2"><i class="fa fa-plus"></i> Oda Ekle</button>
					</div>
					<div class="col-sm-3">
						<select type="text" class="form-control select-css" onchange="yetiskinControl(1)">
							<option value="0">Yetişkin Seçiniz</option>
							<option value="1">1 Yetişkin</option>
							<option value="2">2 Yetişkin</option>
						</select>
					</div>
					<div class="col-sm-3">
						<select type="text" class="form-control select-css" onchange="cocukControl(1)">
							<option value="0">Çocuk Sayısı Seçiniz</option>
							<option value="1">1 Çocuk</option>
							<option value="2">2 Çocuk</option>
							<option value="-1" class="d-none">Oda Kapasitesi Doldu</option>
						</select>
						<select type="text" class="form-control select-css mt-2 d-none" >
							<option value="0">1. Çocuk Yaşı</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
						</select>
						<select type="text" class="form-control select-css mt-2 d-none">
							<option value="0">2. Çocuk Yaşı</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
						</select>
					</div>
				</div>








				
			</form>
			<br>
			<a href="rezervasyon-2" class="btn btn-outline-warning " style="margin-left: 90%">İleri</a>
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

<script>
	function localstorage() {
		var odasayi = $("form .justify-content-center").length;
		var odalar = [];
		i=0;
		while(i<odasayi){
			var oda = $("form .justify-content-center").eq(i);
			degerler = {
				"yetiskin" : oda.find('select').eq(0).val(),
				"cocuk" : oda.find('select').eq(1).val(),
				"cocukyas1" : oda.find('select').eq(2).val(),
				"cocukyas2" : oda.find('select').eq(3).val(),
				"oda_id" : '1',
				"oda_adi" : 'STANDART ODA - TEK'
			};
			if (oda.find('select').eq(0).val()!=0 || oda.find('select').eq(1).val()!=0) 
			{
				odalar.push(degerler); 
			}
			i++;
		}
		localStorage.setItem("odalar", JSON.stringify(odalar));
	}



	function odaEkle() {
		var deger = $(".oda-1 button").eq(0).attr('oda');
		var odasayi = $("form .justify-content-center").length;

		var sonoda = $("form .justify-content-center").eq(odasayi-1);

		if (sonoda.find('select').eq(0).val()==0 && sonoda.find('select').eq(1).val()==0) {
			alert('Son oluşturduğunuz oda boş');

		}
		else{

			$("form").append('<hr> <div class="d-flex  justify-content-center pt-2 oda-'+deger+'" > <div class="col-sm-3"> <button type="button" class="btn btn-outline-danger" disabled=""><i class="fa fa-plus"></i> '+deger+'. Oda</button> </div> <div class="col-sm-3"> <select type="text" class="form-control select-css" onchange="yetiskinControl('+deger+')"> <option value="0">Yetişkin Seçiniz</option> <option value="1">1 Yetişkin</option> <option value="2">2 Yetişkin</option> </select> </div> <div class="col-sm-3"> <select type="text" class="form-control select-css" onchange="cocukControl('+deger+')"> <option value="0">Çocuk Sayısı Seçiniz</option> <option value="1">1 Çocuk</option> <option value="2">2 Çocuk</option> <option value="-1" class="d-none">Oda Kapasitesi Doldu</option> </select> <select type="text" class="form-control select-css mt-2 d-none" > <option value="0">1. Çocuk Yaşı</option> <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option> <option>6</option> <option>7</option> <option>8</option> <option>9</option> <option>10</option> <option>11</option> </select> <select type="text" class="form-control select-css mt-2 d-none"> <option value="0">2. Çocuk Yaşı</option> <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option> <option>6</option> <option>7</option> <option>8</option> <option>9</option> <option>10</option> <option>11</option> </select> </div> </div>');

			$(".oda-1 button").eq(0).attr('oda', parseInt(deger)+1);
		}



	}




	function yetiskinControl(sinif) {
		var yetiskin = $(".oda-"+sinif+" select").eq(0);

		var cocuk = $(".oda-"+sinif+" select").eq(1);
		cocuk.find('option').eq(0).html('Çocuk Yok').val(0);
		if (yetiskin.val()==2) {
			cocuk.find('option').eq(0).addClass('d-none');
			cocuk.find('option').eq(1).addClass('d-none');
			cocuk.find('option').eq(2).addClass('d-none');
			cocuk.find('option').eq(3).removeClass('d-none').prop('selected', 'true');
		}
		else if (yetiskin.val()==1) {
			cocuk.find('option').eq(0).removeClass('d-none');
			cocuk.find('option').eq(1).removeClass('d-none').prop('selected', 'true');
			cocuk.find('option').eq(2).addClass('d-none');
			cocuk.find('option').eq(3).addClass('d-none');
		}
		else{
			cocuk.find('option').eq(0).removeClass('d-none').prop('selected', 'true');
			cocuk.find('option').eq(1).removeClass('d-none');
			cocuk.find('option').eq(2).removeClass('d-none');
			cocuk.find('option').eq(3).addClass('d-none');	
		}
		cocukControl(sinif);

	}


	function cocukControl(sinif) {
		var yetiskin = $(".oda-"+sinif+" select").eq(0);
		var cocuk = $(".oda-"+sinif+" select").eq(1);	
		var cocukyas1 = $(".oda-"+sinif+" select").eq(2);
		var cocukyas2 = $(".oda-"+sinif+" select").eq(3);
		if (cocuk.val()==1) {
			cocukyas1.removeClass('d-none');
			cocukyas2.addClass('d-none');
		}
		else if(cocuk.val()==2){
			cocukyas1.removeClass('d-none');
			cocukyas2.removeClass('d-none');
		}
		else{
			cocukyas1.addClass('d-none');
			cocukyas2.addClass('d-none');
		}

	}



</script>
</body>
</html>