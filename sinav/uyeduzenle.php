<?php

$baslik = "Üye Bilgileri Düzenle";
require_once('include/header.php');

//Güncelle butonuna basıldığında;
if (isset($_POST['guncelle'])) {

	$uye_id		= $_POST['uyeIDx'];
	$sifre		= $_POST['sifrex'];
	$adsoyad 	= $_POST['ad_soyadx'];
	$unvan 		= $_POST['unvanx'];
	$kurum 		= $_POST['kurumx'];

	if (isset($sifre)) {
		$yeniSifre=md5($sifre);
		$uyeduzenleme=$db->query("UPDATE uyeler SET sifre = '$yeniSifre', ad_soyad = '$adsoyad', unvan = '$unvan', kurumu = '$kurum' WHERE id = $uye_id");	
	}
	else {
		$uyeduzenleme=$db->query("UPDATE uyeler SET ad_soyad = '$adsoyad', unvan = '$unvan', kurumu = '$kurum' WHERE id = $uye_id");
		
	}
	

	if ($uyeduzenleme) {

		$_SESSION["sifre"]=$yeniSifre; //şifre değiştiğinde session değiştiriyor.	


		echo "<script>
		Swal.fire({
			position: 'center',
			icon: 'success',
			title: 'Bilgileriniz Başarıyla Güncellendi.',
			showConfirmButton: false,
			timer: 2000});
			</script>";
		}
		header("Refresh: 2.1; url=profil.php");
		exit;
	}


	// Veritabanından gelen verileri forma yazdıralım.
	if (isset($_POST['uyeID'])) {

		$gelen_id= $_POST['uyeID'];

		$uyeCek 	= $db->query("SELECT * FROM uyeler WHERE id=$gelen_id");
		$uye 		= $uyeCek->fetch_assoc();

		echo '
		<div class="col-5">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-play" aria-hidden="true"></i> Üye Düzenle</h4>
				</div>

				<div class="card-body">
					<form action="uyeduzenle.php" method="post">
						<input type="text" hidden name="uyeIDx" value="'.$gelen_id.'">
						<div class="form-group">
							<h6 class="m-0 font-weight-bold text-info">Kullanıcı Adı</h6>
							<input type="text" class="form-control" name="kullanici" value="'.$uye["kullanici"].'" disabled />
						</div>

						<div class="form-group">
							<h6 class="m-0 font-weight-bold text-info">Şifre</h6>
							<input type="text" class="form-control" name="sifrex" value="" placeholder="Boş bırakırsanız şifreniz değiştirilmez..." />
						</div>

						<div class="form-group">
							<h6 class="m-0 font-weight-bold text-info">Adı Soyadı</h6>
							<input type="text" class="form-control" required="required" name="ad_soyadx" value="'.$uye["ad_soyad"].'" />
						</div>

						<div class="form-group">
							<h6 class="m-0 font-weight-bold text-info">Ünvan</h6>
							<input type="text" class="form-control" required="required" name="unvanx" value="'.$uye["unvan"].'" />
						</div>

						<div class="form-group">
							<h6 class="m-0 font-weight-bold text-info">Kurumu</h6>
							<input type="text" class="form-control" required="required" name="kurumx" value="'.$uye["kurumu"].'" />
						</div>

						<div class="form-group" align="center">
							<button type="submit" name="guncelle" class="btn btn-success btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-arrow-right"></i>
								</span>
								<span class="text">GÜNCELLE</span>
							</button>
						</div>

					</form>
				</div>
			</div>
		</div>';
	}


	require_once('include/footer.php'); ?>