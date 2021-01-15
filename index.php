<?php include 'header.php'; ?>

	<div class="hero">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 ">
					<div class="hero-text d-flex justify-content-center">
						<div class="row">
							<div class="col-sm-12  ">
								<h3 class="color1   d-flex  justify-content-center"> Ramada Uşak - Hoşgeldiniz</h3>
							</div>
							<div class="col-sm-12">
								<h1 class="mt-3 text-white  d-flex  justify-content-center" > Experience the greatest <br> for you holidays.</h1>
							</div>
						</div>

					</div>




					<div class="card p-4 mt-5">
						<div class="row rezervasyon-form">


							<div class="col-sm-3">
								<h1 style="margin-top: 10%">Rezervasyon</h1>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="exampleInputEmail1">Giriş Tarihi</label>
									<div class="input-group">
										<div class="input-group-prepend mt-2">
											<div class="input-group-text bg-transparent" ><i class="fa fa-calendar"></i></div>
										</div>
										<input type="date" class="form-control form-control-lg mt-2" id="inlineFormInputGroup" placeholder="Username">
									</div>

								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="exampleInputEmail1">Çıkış Tarihi</label>
									<div class="input-group">
										<div class="input-group-prepend mt-2">
											<div class="input-group-text bg-transparent" ><i class="fa fa-calendar"></i></div>
										</div>
										<input type="date" class="form-control form-control-lg mt-2" id="inlineFormInputGroup" placeholder="Username">
									</div>

								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="exampleInputEmail1">Kişi Sayısı</label>
									<div class="input-group">
										<div class="input-group-prepend mt-2">
											<div class="input-group-text bg-transparent" ><i class="fa fa-users"></i></div>
										</div>
										<select type="text" class="form-control form-control-lg mt-2" id="inlineFormInputGroup" placeholder="Username">
											<option value="">1 Yetişkin</option>
											<option value="">2 Yetişkin</option>
											<option value="">1 Yetişkin, 1 Çocuk</option>
											<option value="">2 Çocuk</option>
										</select>
									</div>

								</div>
							</div>

							<button onclick="location='rezervasyon'" class="btn btn-success btn-block" style="background-color: #E9AD28;border:none">Oda Ara</button>

						</div>

					</div>
				</div>




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
		Date.prototype.toDateInputValue = (function() {
			var local = new Date(this);
			local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
			return local.toJSON().slice(0,10);
		});

		$('input[type=date]').val(new Date().toDateInputValue());


	</script>
</body>
</html>