<?php
ob_start();
session_start();
require_once('include/database.php');


if (isset($_POST['aciklama'])) {
	
	$aciklama = strip_tags($_POST['aciklama']);
	$userID = strip_tags($_POST['userID']);
	$soruID = strip_tags($_POST['soruID']);
	

	$tarih = time();
	$bildirimiKaydet=$db->query("INSERT INTO bildirimler (uye_id, soru_id, bildirim, tarih) VALUES ($userID, $soruID, '$aciklama', $tarih)");
	
	if ($bildirimiKaydet) {
		echo "<script>
		Swal.fire({
			position: 'top-end',
			icon: 'success',
			title: 'Geri bildiriminiz için </br>teşekkür ederiz.',
			showConfirmButton: false,
			timer: 2000});
			</script>";
		}
		else {
			echo "<script>
			Swal.fire({
				position: 'top-end',
				icon: 'warning',
				title: 'Geri bildiriminiz alınamadı.',
				showConfirmButton: false,
				timer: 2000});
				</script>";

			}
		}
	?>