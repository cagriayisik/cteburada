<?php

$baslik = "Anasayfa";
require_once('include/header.php');

$soru_sayisi = $db->query("SELECT id FROM sorular")->num_rows;
$kategori_sayisi = $db->query("SELECT id FROM kategoriler")->num_rows;
$kullanici_sayisi = $db->query("SELECT id FROM uyeler")->num_rows;

?>

<div class="row">	

	<!-- Toplam Soru Sayısı -->
	<div class="col-xl-4 col-md-6 mb-4">
		<div class="card border-bottom-primary shadow h-100 py-2" style="background-image: url(assets/img/arkaplan.jpg)">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="h2 mb-0 font-weight-bold text-gray-900 counter">
							<?= $soru_sayisi ?>
						</div>
						<div class="font-weight-bold text-primary text-uppercase mb-1">Toplam Soru Sayısı</div>						
					</div>
					<div class="col-auto">
						<i class="fa fa-list fa-3x text-primary"></i>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Toplam Kategori Sayısı -->
	<div class="col-xl-4 col-md-6 mb-4">
		<div class="card border-bottom-info shadow h-100 py-2" style="background-image: url(assets/img/arkaplan.jpg)">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="h2 mb-0 font-weight-bold text-gray-900 counter">
							<?= $kategori_sayisi ?>
						</div>
						<div class="font-weight-bold text-info text-uppercase mb-1">Toplam Kategori Sayısı</div>						
					</div>
					<div class="col-auto">
						<i class="fa fa-sitemap fa-3x text-info"></i>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Toplam Kullanıcı Sayısı -->
	<div class="col-xl-4 col-md-6 mb-4">
		<div class="card border-bottom-dark shadow h-100 py-2" style="background-image: url(assets/img/arkaplan.jpg)">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="h2 mb-0 font-weight-bold text-gray-900 counter">
							<?= $kullanici_sayisi ?>
						</div>
						<div class="font-weight-bold text-dark text-uppercase mb-1">Toplam Kullanıcı Sayısı</div>						
					</div>
					<div class="col-auto">
						<i class="fas fa-user fa-3x text-dark"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
</div>



<div class="row justify-content-md-center mb-3 col-auto col-md-12 mb-5 mt-3">
	<div id="mansetHaber" class="carousel slide col-12 col-md-8" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#mansetHaber" data-slide-to="0" class="active"></li>
			<li data-target="#mansetHaber" data-slide-to="1"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<a href="https://cte.adalet.gov.tr/Home/SayfaDetay/gorevde-yukselme-unvan-degisikligi-sinav-duyurusu-ve-ilani24032023040917" target="_blank">
					<img class="d-block w-100" src="assets/img/ilan.jpeg" alt="Birinci slayt">
				</a>
			</div>
			<div class="carousel-item">
				<a href="https://semsinav.ankara.edu.tr" target="_blank">
				<img class="d-block w-100" src="assets/img/ilan1.png" alt="İkinci slayt">
			</div>			
		</div>
		<a class="carousel-control-prev" href="#mansetHaber" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Önceki</span>
		</a>
		<a class="carousel-control-next" href="#mansetHaber" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Sonraki</span>
		</a>
	</div>
</div>



<div class="row justify-content-md-center">
	<div class="col-auto col-xl-7 mt-1 mb-4">
		<div class="card border-bottom-danger shadow" style="background-image: url(assets/img/arkaplan.jpg)">
			<div class="card-body">
				<div class="row justify-content-md-center ">

					<div class="col-auto text-center">
						<lottie-player src="assets/img/kumsaati.json"  background="transparent"  speed=".5"  style="width: 100px; height: 100%;"  loop  autoplay></lottie-player>
					</div>

					<div class="col-auto ">
						<div class="h5 font-weight-bold text-danger text-center">SINAVA KALAN SÜRE 
							<span class="text-dark text-xs">22 Temmuz 2023</span>
						</div>

						<div class="text-gray-800 mt-2 ml-3">
							<div class="d-flex justify-content-center text-center text-white">

								<div class="ml-0">
									<div class="font-weight-bold bg-danger" style="font-size:2em; width: 90px; border-radius: 6px;" id="gun"></div>
									<div class="bg-dark py-1" style="width: 90px;">Gün</div>
								</div>

								<div class="ml-3">
									<div class="font-weight-bold bg-danger" style="font-size:2em; width: 90px; border-radius: 6px;" id="saat"></div>
									<div class="bg-dark py-1" style="width: 90px;">Saat</div>
								</div>

								<div class="ml-3">
									<div class="font-weight-bold bg-danger" style="font-size:2em; width: 90px; border-radius: 6px;" id="dakika"></div>
									<div class="bg-dark py-1" style="width: 90px;">Dakika</div>
								</div>

								<div class="ml-3">
									<div class="font-weight-bold bg-danger shadow-lg" style="font-size:2em; width: 90px; border-radius: 6px;" id="saniye"></div>
									<div class="bg-dark py-1" style="width: 90px;">Saniye</div>
								</div>

							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>




<!-- Kartlardaki sayıların animasyonu için -->
<script>
	$(document).ready(function() {

		$('.counter').each(function () {
			$(this).prop('Counter',0).animate({
				Counter: $(this).text()
			}, {
				duration: 2500,
				easing: 'swing',
				step: function (now) {
					$(this).text(Math.ceil(now));
				}
			});
		}); 

	});  
</script>
<!-- Kartlardaki sayıların animasyonu için -->



<!-- Geri Sayım Sayacı - Js -->
<script>
	function sayac() {
      // Tarih belirtin
		var targetDate = new Date("July 22, 2023 10:00:00");

      // Şimdiki tarihi alın
		var currentDate = new Date();

      // Hedef tarih ve şimdiki tarih arasındaki farkı hesaplayın (saniye cinsinden)
		var difference = targetDate - currentDate;

      // Her bir birim için farkı hesaplayın (gün, saat, dakika, saniye)
		var days = Math.floor(difference / (1000 * 60 * 60 * 24));
		var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((difference % (1000 * 60)) / 1000);

      // Sonuçları ekrana yazdırın
		document.getElementById("gun").innerHTML = days;
		document.getElementById("saat").innerHTML = hours;
		document.getElementById("dakika").innerHTML = minutes;
		document.getElementById("saniye").innerHTML = seconds;
	}

    // Geri sayımı başlatmak için her bir saniye çalıştırın
	setInterval(sayac, 1000);
</script>
<!-- Geri Sayım Sayacı - Js -->




<?php require_once('include/footer.php'); ?>