<?php

$baslik = "Admin Paneli";
require_once('include/header.php');


// Yetkisiz girişleri engellemek için
$adminMi = $db->query("SELECT id FROM uyeler WHERE kullanici = '{$_SESSION['kullanici']}' AND sifre = '{$_SESSION['sifre']}' AND admin = 1");
if ($adminMi->num_rows == 0) {
  header("Location:index.php");
  exit;
}




////////// ÜYE EKLEME VE DÜZENLEME ALANI BAŞLANGICI //////////
if (isset($_GET["uyeEkle"])) {

  if (strlen($_POST["kullanici"]) > 3 && strlen($_POST["unvan"]) > 3) {

       // ÜYE DÜZENLEME ALANI //
    if (isset($_GET["duzenle"])) {

      $uye_id   = $_GET["duzenle"];
      $kullanici= $_POST["kullanici"];
      $sifre    = $_POST["sifre"];
      $adsoyad  = $_POST["ad_soyad"];
      $unvan    = $_POST["unvan"];
      $kurum    = $_POST["kurum1"];

      if (isset($sifre)) {
        $yeniSifre=md5($sifre);
        $uyeduzenleme=$db->query("UPDATE uyeler SET kullanici = '$kullanici', sifre = '$yeniSifre', ad_soyad = '$adsoyad', unvan = '$unvan', kurumu = '$kurum' WHERE id = $uye_id ");
      }
      else {
        $uyeduzenleme=$db->query("UPDATE uyeler SET kullanici = '$kullanici',  ad_soyad = '$adsoyad', unvan = '$unvan', kurumu = '$kurum' WHERE id = $uye_id ");
      }
      
      if (!$uyeduzenleme) {
        echo "<script>
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'DİKKAT: Üye Güncellenemedi.',
          showConfirmButton: false,
          timer: 2000});
          </script>";
        }
        else {
          echo "<script>
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Üye Başarıyla Güncellendi.',
            showConfirmButton: false,
            timer: 2000});
            </script>";
          }
        }
        // ÜYE DÜZENLEME ALANI //

        // ÜYE EKLEME ALANI //
        else {
          $uyeekleme=$db->query("INSERT INTO uyeler (kullanici, sifre, ad_soyad, unvan, admin) VALUES ('{$_POST["kullanici"]}', '{$_POST["sifre"]}', '{$_POST["ad_soyad"]}', '{$_POST["unvan"]}', {$_POST["admin"]})");

          if (!$uyeekleme) {
            echo "<script>
            Swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'DİKKAT: Üye Eklenemedi.',
              showConfirmButton: false,
              timer: 2000});
              </script>";
            }
            else {
              echo "<script>
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Üye Başarıyla Eklendi.',
                showConfirmButton: false,
                timer: 2000});
                </script>";                                  
              }
            }
          //ÜYE EKLEME ALANI
          }
          header("Refresh: 2; url=admin.php");
          exit; 
        }
////////// ÜYE EKLEME VE DÜZENLEME ALANI BİTİŞİ //////////


 ////////// KATEGORİ EKLEME VE DÜZENLEME ALANI BAŞLANGICI //////////
        if (isset($_GET["kategoriEkle"])) {

          if (strlen($_POST["kategori"]) >= 3) {

        // KATEGORİ DÜZENLEME ALANI //
            if (isset($_GET["duzenle"])) {
              $kategoriID = $_GET["duzenle"];
              $kategoriduzenleme=$db->query("UPDATE kategoriler SET isim = '{$_POST['kategori']}' WHERE id = $kategoriID");

              if (!$kategoriduzenleme) {
                echo "<script>
                Swal.fire({
                  position: 'top-end',
                  icon: 'error',
                  title: 'DİKKAT: Kategori Güncellenemedi.',
                  showConfirmButton: false,
                  timer: 2000});
                  </script>";
                }
                else {
                  echo "<script>
                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Kategori Başarıyla Güncellendi.',
                    showConfirmButton: false,
                    timer: 2000});
                    </script>";
                  }
                }
        // KATEGORİ DÜZENLEME ALANI //


        // KATEGORİ EKLEME ALANI //
                else {
                  $kategoriekleme=$db->query("INSERT INTO kategoriler (isim) VALUES ('{$_POST['kategori']}')");

                  if (!$kategoriekleme) {
                    echo "<script>
                    Swal.fire({
                      position: 'top-end',
                      icon: 'error',
                      title: 'DİKKAT: Kategori Eklenemedi.',
                      showConfirmButton: false,
                      timer: 2000});
                      </script>";
                    }

                    else {
                      echo "<script>
                      Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Kategori Başarıyla Eklendi.',
                        showConfirmButton: false,
                        timer: 2000});
                        </script>";                                  
                      }
                    }
        // KATEGORİ EKLEME ALANI //
                  }
                  header("Refresh: 2; url=admin.php");
                  exit;
                }
////////// KATEGORİ EKLEME VE DÜZENLEME ALANI BİTİŞİ //////////




////////// SORU EKLEME VE DÜZENLEME ALANI BAŞLANGICI //////////
                if (isset($_GET["soruEkle"])) {

                  $soruID = $_GET["duzenle"];
                  $soru = htmlspecialchars($_POST['soru'], ENT_QUOTES, 'UTF-8');  
                  $kategori = (int) $_POST['kategori']; 
                  $a = htmlspecialchars($_POST['a'], ENT_QUOTES, 'UTF-8'); 
                  $b = htmlspecialchars($_POST['b'], ENT_QUOTES, 'UTF-8');
                  $c = htmlspecialchars($_POST['c'], ENT_QUOTES, 'UTF-8');
                  $d = htmlspecialchars($_POST['d'], ENT_QUOTES, 'UTF-8');
                  $dogru_cevap = $_POST['dogru_cevap'];
                  $aciklama = htmlspecialchars($_POST['aciklama'], ENT_QUOTES, 'UTF-8');


                  if ($_POST["kategori"] == 0) {
                    header("Location:admin.php");
                    exit;
                  }

    // SORU DÜZENLEME ALANI //
                  if (isset($_GET["duzenle"])) {    

    // Veritabanına sorguyu hazırla ve verileri güvenli bir şekilde yerleştir
                    $stmt = $db->prepare("UPDATE sorular SET soru=?, kategori=?, a=?, b=?, c=?, d=?, dogru_cevap=?, aciklama=? WHERE id=?");
                    $stmt->bind_param("sissssssi", $soru, $kategori, $a, $b, $c, $d, $dogru_cevap, $aciklama, $soruID);
                    $result = $stmt->execute();

    // Sorgu başarısızsa hata mesajı göster
                    if (!$result) {
                      echo "<script>
                      Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'DİKKAT: Soru Güncellenemedi.',
                        showConfirmButton: false,
                        timer: 2000});
                        </script>";
                      } else {
                        echo "<script>
                        Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: 'Soru Başarıyla Güncellendi.',
                          showConfirmButton: false,
                          timer: 1800});
                          </script>";
                        }

                        header("Refresh: 2.2; url=admin.php");
                        exit;
                      }
    // SORU DÜZENLEME ALANI //


    // SORU EKLEME ALANI //
                      else {
        // Veritabanına sorguyu hazırla ve verileri güvenli bir şekilde yerleştir
                        $stmt = $db->prepare("INSERT INTO sorular (soru, kategori, a, b, c, d, dogru_cevap, aciklama, soruyu_yazan, durum) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");
                        $stmt->bind_param("sisssssss", $soru, $kategori, $a, $b, $c, $d, $dogru_cevap, $aciklama, $_SESSION['kullanici']);
                        $result = $stmt->execute();


      // Sorgu başarısızsa hata mesajı göster
                        if (!$result) {
                          echo "<script>
                          Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'DİKKAT: Soru Eklenemedi.',
                            showConfirmButton: false,
                            timer: 2000});
                            </script>";
                          } else {
                            echo "<script>
                            Swal.fire({
                              position: 'center',
                              icon: 'success',
                              title: 'Soru Başarıyla Eklendi. (ONAYLI)',
                              showConfirmButton: false,
                              timer: 1800});
                              </script>";
                            }

                            header("Refresh: 2.2; url=admin.php");
                            exit;

                          }
    // SORU EKLEME ALANI //
                        }
////////// SORU EKLEME VE DÜZENLEME ALANI BİTİŞİ //////////






////////// SİLME ALANI BAŞLANGICI //////////
                        if (isset($_GET["sil"])) {
                          $icerikID = $_GET["id"];

                          if ($_GET["sil"] == "soru") {
                            $db->query("DELETE FROM sorular WHERE id = $icerikID");
                            echo "<script>
                            Swal.fire({
                              position: 'center',
                              icon: 'warning',
                              title: 'Soru Başarıyla Silindi. ',
                              showConfirmButton: false,
                              timer: 2000});
                              </script>";
                            }


                            else if ($_GET["sil"] == "kategori") {
                              $db->query("DELETE FROM kategoriler WHERE id = $icerikID");
                              echo "<script>
                              Swal.fire({
                                position: 'center',
                                icon: 'warning',
                                title: 'Kategori Başarıyla Silindi.',
                                showConfirmButton: false,
                                timer: 2000});
                                </script>";
                              }


                              else if ($_GET["sil"] == "uye") {
                                $db->query("DELETE FROM uyeler WHERE id = $icerikID");
                                echo "<script>
                                Swal.fire({
                                  position: 'center',
                                  icon: 'warning',
                                  title: 'Üye Başarıyla Silindi.',
                                  showConfirmButton: false,
                                  timer: 2000});
                                  </script>";
                                }


                                else if ($_GET["sil"] == "bildirim") {
                                  $db->query("DELETE FROM bildirimler WHERE id = $icerikID");
                                  echo "<script>
                                  Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: 'Geri Bildirim Başarıyla Silindi.',
                                    showConfirmButton: false,
                                    timer: 2000});
                                    </script>";
                                  }


                                  header("Refresh: 2; url=admin.php");
                                  exit;
                                }
////////// SİLME ALANI BİTİŞİ //////////



////////// SORU AKTİFLEME ALANI BAŞLANGICI //////////
                                if (isset($_POST["aktifleSoru"])) {

                                  $icerikID = $_POST["aktifleSoru"];

                                  $aktifyap = $db->query("UPDATE sorular SET durum=1 WHERE id = $icerikID");

                                  if($aktifyap){ 
                                    echo "<script>
                                    Swal.fire({
                                      position: 'center',
                                      icon: 'success',
                                      title: 'Soru Başarıyla Onaylandı.',
                                      showConfirmButton: false,
                                      timer: 1453});
                                      </script>";
                                    }
                                    header("Refresh: 1.69; url=admin.php");
                                    exit;
                                  }
////////// SORU AKTİFLEME ALANI BİTİŞİ //////////


////////// ÜYE AKTİFLEME ALANI BAŞLANGICI //////////
                                  if (isset($_POST["aktifyap_id"])) {

                                    $icerikID = $_POST["aktifyap_id"];

                                    $aktifyap = $db->query("UPDATE uyeler SET durumu=1 WHERE id = $icerikID");

                                    if($aktifyap){ 
                                      echo "<script>
                                      Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Üye Başarıyla Onaylandı.',
                                        showConfirmButton: false,
                                        timer: 1453});
                                        </script>";
                                      }
                                      header("Refresh: 1.69; url=admin.php");
                                      exit;
                                    }
////////// ÜYE AKTİFLEME ALANI BİTİŞİ //////////


////////// ÜYE PASİFLEME ALANI BAŞLANGICI //////////
                                    if (isset($_POST["pasifyap_id"])) {
                                      $icerikID = $_POST["pasifyap_id"];
                                      $pasifyap = $db->query("UPDATE uyeler SET durumu=0 WHERE id = $icerikID");

                                      if($pasifyap){ 
                                        echo "<script>
                                        Swal.fire({
                                          position: 'center',
                                          icon: 'success',
                                          title: 'Üye Başarıyla Pasife Alındı.',
                                          showConfirmButton: false,
                                          timer: 1453});
                                          </script>";
                                        }
                                        header("Refresh: 1.69; url=admin.php");
                                        exit;
                                      }
////////// ÜYE PASİFLEME ALANI BİTİŞİ //////////




////////// ÜYE YETKİ VERME ALANI BAŞLANGICI //////////
                                      if (isset($_POST["yetkiVer"])) {
                                        $icerikID = $_POST["yetkiVer"];
                                        $yetkiVerx = $db->query("UPDATE uyeler SET admin=1 WHERE id = $icerikID");
                                        
                                        if ($yetkiVerx) {
                                          echo "<script>
                                          Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: 'Yönetici Yapıldı.',
                                            showConfirmButton: false,
                                            timer: 1453});
                                            </script>";
                                          }    
                                          header("Refresh: 1.69; url=admin.php");
                                          exit;
                                        }
////////// ÜYE YETKİ VERME ALANI BİTİŞİ //////////


////////// ÜYE YETKİ ALMA ALANI BAŞLANGICI //////////
                                        if (isset($_POST["yetkiAl"])) {

                                          $icerikID = $_POST["yetkiAl"];

                                          $yetkiAlx = $db->query("UPDATE uyeler SET admin=0 WHERE id = $icerikID");

                                          if ($yetkiAlx) {
                                            echo "<script>
                                            Swal.fire({
                                              position: 'center',
                                              icon: 'success',
                                              title: 'Normal Üye Yapıldı.',
                                              showConfirmButton: false,
                                              timer: 1453});
                                              </script>";
                                            }    
                                            header("Refresh: 1.69; url=admin.php");
                                            exit;
                                          }
////////// ÜYE YETKİ ALMA ALANI BİTİŞİ //////////



////////// BİLDİRİM GÖRÜLDÜ ALANI BAŞLANGICI //////////
                                          if (isset($_POST["bildirim_aktifle"])) {

                                            $icerikID = $_POST["bildirim_aktifle"];

                                            $aktifle = $db->query("UPDATE bildirimler SET durum=1 WHERE id = $icerikID");

                                            if($aktifle){ 
                                              echo "<script>
                                              Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: 'Geri Bildirim Tamamlandı.',
                                                showConfirmButton: false,
                                                timer: 1453});
                                                </script>";
                                              }
                                              header("Refresh: 1.69; url=admin.php");
                                              exit;
                                            }
////////// BİLDİRİM GÖRÜLDÜ ALANI BİTİŞİ //////////




                                            if (isset($_GET["duzenle"])) {

                                              if (!isset($_GET["id"])) {
                                                header("Refresh: 2; url=admin.php");
                                                exit;
                                              }

                                              $icerikID = $_GET["id"];

                                              if ($_GET["duzenle"] == "soru") {

                                                $soruCek = $db->query("SELECT * FROM sorular WHERE id = $icerikID");
                                                $soru = $soruCek->fetch_assoc();

                                                $kategoriAdi = $db->query("SELECT isim FROM kategoriler WHERE id = {$soru["kategori"]}")->fetch_row()[0];
                                                ?>

                                                <style> /*Text Editörünün yüksekliğini ayarlamak için*/
                                                .ck-editor__editable_inline { min-height: 90px; }
                                              </style>

                                              <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                  <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-edit"></i> Soru Düzenle</h4>

                                                </div>
                                                <div class="card-body">
                                                  <form action="admin.php?soruEkle&duzenle=<?= $soru["id"] ?>" method="post">

                                                    <div class="row">

                                                      <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                          <label for="last-name-column"
                                                          class="font-weight-bold text-dark">Kategori :</label>
                                                          <div class="form-group">
                                                            <input type="hidden" name="kategori" value="<?= $soru["kategori"] ?>">
                                                            <input type="text" class="form-control" disabled value="<?= $kategoriAdi ?>">
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="col-md-12 col-12">
                                                        <label for="first-name-column"
                                                        class="font-weight-bold text-dark">Soru Cümlesi :</label>
                                                        <div class="form-group">
                                                          <textarea class="form-control" name="soru" id="soru1" required="required"
                                                          rows="4"
                                                          placeholder="Soruyu giriniz..."><?php echo $soru['soru']; ?></textarea>
                                                          <script>
                                                            ClassicEditor
                                                            .create( document.querySelector( '#soru1' ) )
                                                            .catch( error => {
                                                              console.error( error );
                                                            } );
                                                          </script>
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6 col-12">
                                                        <label for="first-name-column"
                                                        class="font-weight-bold text-dark">Seçenek - 1-A) :</label>
                                                        <div class="form-group">
                                                          <input type="text" class="form-control" name="a" value="<?php echo $soru['a']; ?>" />                                    
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6 col-12">
                                                        <label for="first-name-column"
                                                        class="font-weight-bold text-dark">Seçenek - 2-B) :</label>
                                                        <div class="form-group">
                                                          <input type="text" class="form-control" name="b" value="<?php echo $soru['b']; ?>" />
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6 col-12">
                                                        <label for="first-name-column"
                                                        class="font-weight-bold text-dark">Seçenek - 3-C) :</label>
                                                        <div class="form-group">
                                                          <input type="text" class="form-control" name="c" value="<?php echo $soru['c']; ?>" />
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6 col-12">
                                                        <label for="first-name-column"
                                                        class="font-weight-bold text-dark">Seçenek - 4-D) :</label>
                                                        <div class="form-group">
                                                          <input type="text" class="form-control" name="d" value="<?php echo $soru['d']; ?>" />
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                          <label for="last-name-column"
                                                          class="font-weight-bold text-danger">Doğru Seçenek :</label>
                                                          <div class="form-group">
                                                            <select name="dogru_cevap" class="form-control">
                                                              <option value="a" <?=($soru["dogru_cevap"]=="a" ? "selected" : "") ?>>A</option>
                                                              <option value="b" <?=($soru["dogru_cevap"]=="b" ? "selected" : "") ?>>B</option>
                                                              <option value="c" <?=($soru["dogru_cevap"]=="c" ? "selected" : "") ?>>C</option>
                                                              <option value="d" <?=($soru["dogru_cevap"]=="d" ? "selected" : "") ?>>D</option>
                                                            </select>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="col-md-9 col-12">
                                                        <label for="first-name-column"
                                                        class="font-weight-bold text-danger">Cevap Açıklaması :</label>
                                                        <div class="form-group">
                                                          <textarea type="text" rows="4" class="form-control" name="aciklama" id="aciklama1"
                                                          placeholder="Açıklama"><?php echo $soru['aciklama']; ?></textarea>
                                                          <script>
                                                            ClassicEditor
                                                            .create( document.querySelector( '#aciklama1' ) )
                                                            .catch( error => {
                                                              console.error( error );
                                                            } );
                                                          </script>
                                                        </div>
                                                      </div>

                                                      <div class="col-12">
                                                        <button type="submit" name="ekle"
                                                        class="btn btn-success  btn-block"><i class="fas fa-save"></i> 
                                                      G Ü N C E L L E </button>
                                                    </div>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>

                                          <?php } else if ($_GET["duzenle"] == "kategori") {

                                            $kategoriCek = $db->query("SELECT * FROM kategoriler WHERE id = $icerikID");
                                            $kategori = $kategoriCek->fetch_assoc();

                                            ?>

                                            <div class="card shadow mb-4">
                                              <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Kategori Düzenle</h6>
                                              </div>
                                              <div class="card-body">
                                                <form action="admin.php?kategoriEkle&duzenle=<?= $kategori["id"] ?>" method="post">
                                                  <div class="form-group">
                                                    <h6 class="m-0 font-weight-bold text-info">Kategori Adı</h6>
                                                    <input type="text" class="form-control" name="kategori" value="<?php echo $kategori['isim']; ?>" />
                                                  </div>
                                                  <button type="submit" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                      <i class="fas fa-arrow-right"></i>
                                                    </span>
                                                    <span class="text">GÜNCELLE</span>
                                                  </button>
                                                </form>
                                              </div>
                                            </div>

                                            <?php
                                          } else if ($_GET["duzenle"] == "uye") {

                                            $uyeCek = $db->query("SELECT * FROM uyeler WHERE id = $icerikID");
                                            $uye = $uyeCek->fetch_assoc();

                                            ?>

                                            <div class="card shadow mb-4">
                                              <div class="card-header py-3">
                                                <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-play" aria-hidden="true"></i> Üye Düzenle</h4>
                                              </div>
                                              <div class="card-body">
                                                <form action="admin.php?uyeEkle&duzenle=<?= $uye["id"] ?>" method="post">
                                                  <div class="form-group col-5">
                                                    <h6 class="m-0 font-weight-bold text-info">Kullanıcı Adı</h6>
                                                    <input type="text" class="form-control" name="kullanici" value="<?= $uye['kullanici'] ?>" />
                                                  </div>
                                                  <div class="form-group col-5">
                                                    <h6 class="m-0 font-weight-bold text-info">Şifre</h6>
                                                    <input type="text" class="form-control" name="sifre" value="" placeholder="Boş bırakılırsa şifre değiştirilmez." />
                                                  </div>
                                                  <div class="form-group col-5">
                                                    <h6 class="m-0 font-weight-bold text-info">Adı Soyadı</h6>
                                                    <input type="text" class="form-control" name="ad_soyad" value="<?= $uye['ad_soyad'] ?>" />
                                                  </div>
                                                  <div class="form-group col-5">
                                                    <h6 class="m-0 font-weight-bold text-info">Ünvan</h6>
                                                    <input type="text" class="form-control" name="unvan" value="<?= $uye['unvan'] ?>" />
                                                  </div>
                                                  <div class="form-group col-5">
                                                    <h6 class="m-0 font-weight-bold text-info">Kurumu</h6>
                                                    <input type="text" class="form-control" name="kurum1" value="<?= $uye['kurumu'] ?>" />
                                                  </div>                
                                                  <div class="form-group col-5" align="center">
                                                    <button type="submit" class="btn btn-success btn-icon-split">
                                                      <span class="icon text-white-50">
                                                        <i class="fas fa-arrow-right"></i>
                                                      </span>
                                                      <span class="text">GÜNCELLE</span>
                                                    </button>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>

                                            <?php
                                          }

                                          exit;
                                        }
                                        ?>


                                        <?php 
    $bekleyenSoru = $db->query("SELECT * FROM sorular where durum=0"); // Sorular butonuna onay bekleyen soru sayısını verir.
    $bekleyenUye = $db->query("SELECT * FROM uyeler where durumu=0"); // Üyeler butonuna onay bekleyen üye sayısını verir.
    $bekleyenBildiri = $db->query("SELECT * FROM bildirimler where durum=0"); // Geribildirim butonuna bekleyen geribildirim sayısını verir.
    ?>

    <!-- Button Alanı -->
    <div align="center">

      <button class="btn btn-danger mr-4 mb-3 toggle-button" data-div="div1">
        <table>
          <tr>
            <td rowspan="2"><i class="fa fa-tags fa-2x mr-3" aria-hidden="true"></i></td>
            <td class="font-weight-bold" style="font-size: 1.69rem;">Sorular</td>
          </tr>
          <tr>
            <td class="text-light font-weight-bold">Onaylanmamış: <span class="badge badge-dark" style="font-size:1rem;"><?=$bekleyenSoru->num_rows?></span></td>
          </tr>
        </table>            
      </button>


      <button class="btn btn-secondary mr-4 mb-3 toggle-button" data-div="div2">
        <table>
          <tr>
            <td rowspan="2"><i class="fa fa-users fa-2x mr-3" aria-hidden="true"></i></td>
            <td class="font-weight-bold" style="font-size: 1.69rem;">Üyeler</td>
          </tr>
          <tr>
            <td class="text-light font-weight-bold">Onaylanmamış: <span class="badge  badge-dark" style="font-size:1rem;"><?=$bekleyenUye->num_rows?></span></td>
          </tr>
        </table>            
      </button>


      <button class="btn btn-primary mr-4 mb-3 toggle-button" data-div="div3">
        <table>
          <tr>
            <td rowspan="2"><i class="fa fa-comment-dots fa-2x mr-3" aria-hidden="true"></i></td>
            <td class="font-weight-bold" style="font-size: 1.69rem;">Geri Bildirimler</td>
          </tr>
          <tr>
            <td class="text-light font-weight-bold">Onaylanmamış: <span class="badge  badge-dark" style="font-size:1rem;"><?=$bekleyenBildiri->num_rows?></span></td>
          </tr>
        </table>            
      </button>


      <button class="btn btn-dark mr-4 mb-3 toggle-button" data-div="div4">
        <table>
          <tr>
            <td rowspan="2"><i class="fa fa-sitemap fa-2x mr-3" aria-hidden="true"></i></td>
            <td class="font-weight-bold" style="font-size: 1.69rem;">Kategoriler</td>
          </tr>
          <tr>
            <td class="text-light font-weight-bold">Kategori Sayısı: <span class="badge  badge-light" style="font-size:1rem;">37</span></td>
          </tr>
        </table>            
      </button>

    </div>
    <hr>
    <!-- Button Alanı -->
    

    <!-- Admin Panel Box-Buton - Css -->
    <style type="text/css">
      .box {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        display: none; /* tüm div'ler gizlenmiş olarak başlasın */
      }
    </style>
    <!-- Admin Panel Box-Buton - Css -->


    <div class="box" id="div1">
      <!-- ////////// AKTİF SORULAR ALANI BAŞLANGICI ////////// -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
          <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-tags" aria-hidden="true"></i> Sorular</h4>

          <button data-toggle="modal" data-target="#success" class="btn btn-success mb-1  waves-effect waves-light" tabindex="0">
            <span><i class="fas fa-plus fa-sm text-white-50"></i> YENİ SORU EKLE</span>
          </button>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kategori</th>
                  <th>Soru ID</th>
                  <th>Soruyu Yazan</th>                                
                  <th style="text-align: center;">İşlem</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $soruCek = $db->query("SELECT * FROM sorular WHERE durum=1 Order By id DESC");

                $i=0;
                while ($soru = $soruCek->fetch_assoc()) {                            
                  $i++;

                  $kategoriAdi = $db->query("SELECT isim FROM kategoriler WHERE id = {$soru["kategori"]}")->fetch_row()[0];
                  echo '<tr>
                  <td align="center" style="font-weight: bold; vertical-align: middle;">' . $i.' </td>
                  <td style="vertical-align: middle;">' . $kategoriAdi . '</td>
                  <td style="vertical-align: middle;">' . $soru['id'] . '</td>
                  <td style="vertical-align: middle;">' . $soru['soruyu_yazan'] . '</td>
                  <td style="vertical-align: middle;">
                  <div class="d-flex justify-content-center">

                  

                  <a data-toggle="modal" data-target="#soruModal-'.$soru['id'].'" class="btn btn-primary m-1" title="Görmek için tıklayınız..." tabindex="0" role="button"><i class="fas fa-eye"></i> Göster</a>

                  <a class="btn btn-info m-1" title="Düzenlemek için tıklayınız..." href="admin.php?duzenle=soru&id=' . $soru["id"] . '"
                  role="button"><i class="fas fa-edit"></i> Düzenle</a>

                  <a class="btn btn-danger m-1" title="Silmek için tıklayınız..." onclick="if(confirm(\'Bu soruyu silmek istediğinizden emin misiniz?\')) window.parent.location=\'admin.php?sil=soru&id='.$soru["id"].'\';" role="button">
                  <i class="fa fa-trash"></i> Sil
                  </a>

                  </div>
                  </td>

                  </tr>';
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- ////////// AKTİF SORULAR ALANI BİTİŞİ ////////// -->



      <!-- ////////// ONAY BEKLEYEN SORULAR ALANI BAŞLANGICI ////////// -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
          <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-tags" aria-hidden="true"></i> Onay Bekleyen Sorular</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kategori</th>
                  <th>Soru ID</th>
                  <th>Soruyu Yazan</th>                                
                  <th style="text-align: center;">İşlem</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $soruCek = $db->query("SELECT * FROM sorular WHERE durum=0 Order By id DESC");

                if ($soruCek->num_rows == 0) { 
                  echo "
                  <td colspan=10 class='alert alert-light text-center font-italic'> Onay Bekleyen Soru Yok...</td>
                  ";}

                  $i=0;
                  while ($soru = $soruCek->fetch_assoc()) {                            
                    $i++;

                    $kategoriAdi = $db->query("SELECT isim FROM kategoriler WHERE id = {$soru["kategori"]}")->fetch_row()[0];
                    echo '<tr>
                    <td align="center" style="font-weight: bold; vertical-align: middle;">' . $i.' </td>                                    
                    <td style="vertical-align: middle;">' . $kategoriAdi . '</td>
                    <td style="vertical-align: middle;">' . $soru['id'] . '</td>
                    <td style="vertical-align: middle;">' . $soru['soruyu_yazan'] . '</td>

                    <td style="vertical-align: middle;">
                    <div class="d-flex justify-content-center">                                    

                    <a data-toggle="modal" data-target="#soruModal-'.$soru['id'].'" class="btn btn-primary m-1" title="Görmek için tıklayınız..." tabindex="0" role="button"><i class="fas fa-eye"></i></a>

                    <form action="admin.php" method="POST">
                    <input type="text" name="aktifleSoru" value='.$soru['id'].' hidden>
                    <button class="btn btn-success m-1" title="Onaylamak için tıklayınız..."><i class="fa fa-check"></i></button>
                    </form>

                    <a class="btn btn-info m-1" title="Düzenlemek için tıklayınız..." href="admin.php?duzenle=soru&id=' . $soru["id"] . '"
                    role="button"><i class="fas fa-edit"></i></a>

                    <a class="btn btn-danger m-1" title="Silmek için tıklayınız..." onclick="if(confirm(\'Bu soruyu silmek istediğinizden emin misiniz?\')) window.parent.location=\'admin.php?sil=soru&id='.$soru["id"].'\';"
                    role="button">
                    <i class="fa fa-trash"></i>
                    </a>
                    </div>
                    </td>

                    </tr>';
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- ////////// ONAY BEKLEYEN SORULAR ALANI BİTİŞİ ////////// -->        
      </div>




      <div class="box" id="div2">

        <!-- ////////// PASİF ÜYELER ALANI BAŞLANGICI ////////// -->
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex justify-content-between">

            <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-users" aria-hidden="true"></i> Onay Bekleyen Üyeler</h4>

          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="text-align: center;">No</th>
                    <th>Kullanıcı</th>
                    <th>Adı Soyadı</th>
                    <th>Ünvan</th>
                    <th>Kurumu</th>
                    <th style="width:180px; text-align: center;">Kayıt Zamanı</th>                  
                    <th style="width:120px; text-align: center;">İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $uyeCek = $db->query("SELECT * FROM uyeler where durumu=0");

                  if ($uyeCek->num_rows == 0) { 
                    echo "
                    <td colspan=7 class='alert alert-light text-center font-italic'> Onay Bekleyen Üye Yok...</td>
                    ";}

                    $i=0;
                    while ($uye = $uyeCek->fetch_assoc()) {
                      $i++;                        

                      echo '<tr>
                      <td align="center" style="vertical-align: middle; font-weight: bold;">' . $i . '</td>

                      <td style="vertical-align: middle; font-weight: bold;">' . $uye["kullanici"] . '</td>

                      <td style="vertical-align: middle;">' . $uye["ad_soyad"] . '</td>

                      <td style="vertical-align: middle;">' . $uye["unvan"] . '</td>

                      <td style="vertical-align: middle;">' . $uye["kurumu"] . '</td>

                      <td style="vertical-align: middle;" align="center">' . date("d.m.Y - h:i", $uye["kayit_zamani"]) . '</td>                       

                      <td style="vertical-align: middle;">
                      <div class="d-flex justify-content-center">

                      <form action="admin.php" method="POST">
                      <input type="text" name="aktifyap_id" value='.$uye["id"].' hidden>
                      <button class="btn btn-success btn m-1" title="Onaylamak için tıklayınız..."><i class="fa fa-check"></i></button>
                      </form>

                      <a class="btn btn-danger btn m-1" title="Silmek için tıklayınız..." onclick="if(confirm(\'Bu kullanıcıyı silmek istediğinizden emin misiniz?\')) window.parent.location=\'admin.php?sil=uye&id=' . $uye["id"] . '\';"
                      role="button"> <i class="fa fa-trash"></i>
                      </a>

                      </div>
                      </td>

                      </tr>';
                    }                    

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- ////////// PASİF ÜYELER ALANI BİTİŞİ ////////// -->



          <!-- ////////// AKTİF ÜYELER ALANI BAŞLANGICI ////////// -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">

              <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-users" aria-hidden="true"></i> Aktif Üyeler</h4>

              <button data-toggle="modal" data-target="#uye" class="btn btn-success mb-1  waves-effect waves-light"
              tabindex="0">
              <span><i class="fas fa-plus fa-sm text-white-50"></i> YENİ ÜYE EKLE</span>
            </button>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="text-align: center;">No</th>
                    <th>Kullanıcı</th>
                    <th>Adı Soyadı</th>
                    <th>Ünvan</th>
                    <th>Kurumu</th>
                    <th>Çözülen Soru Sayısı</th>
                    <th style="text-align: center;">Kayıt Zamanı</th>
                    <th style="text-align: center;">Yetkisi</th>
                    <th style="width:180px; text-align: center;">İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  <?php                    

                  $uyeCek = $db->query("SELECT * FROM uyeler WHERE durumu=1 ORDER BY id DESC");
                  $i=0;
                  while ($uye = $uyeCek->fetch_assoc()) {
                    $i++;
                    $soruSayisi = $db->query("SELECT id FROM isaretlemeler WHERE uye_id = {$uye['id']}")->num_rows;

                    


                    if($uye["admin"]==1) { 
                      $adminMi = '<form action="admin.php" method="POST">
                      <input type="text" name="yetkiAl" value='.$uye["id"].' hidden>
                      <button class="btn btn-primary m-1" title="Normal üye yapmak için tıklayınız...">
                      <i class="fa fa-users"></i> Yönetici</button>
                      </form>';
                    }
                    else {
                      $adminMi = '<form action="admin.php" method="POST">
                      <input type="text" name="yetkiVer" value='.$uye["id"].' hidden>
                      <button class="btn btn-light m-1" title="Yönetici yapmak için tıklayınız...">
                      <i class="fa fa-user" aria-hidden="true"></i> Normal Üye</button>
                      </form>';
                    }

                    echo '<tr>
                    <td align="center" style="vertical-align: middle; font-weight: bold;">' . $i . '</td>

                    <td style="vertical-align: middle; font-weight: bold;">' . $uye["kullanici"] . '</td>

                    <td style="vertical-align: middle;">' . $uye["ad_soyad"] . '</td>

                    <td style="vertical-align: middle;">' . $uye["unvan"] . '</td>

                    <td style="vertical-align: middle;">' . $uye["kurumu"] . '</td>

                    <td style="vertical-align: middle;">' . $soruSayisi . '</td>

                    <td style="vertical-align: middle;" align="center">' . date("d.m.Y - h:i", $uye["kayit_zamani"]) . '</td>

                    <td class="d-flex justify-content-center" style="vertical-align: middle;">'.$adminMi.'</td>

                    <td style="vertical-align: middle;">
                    <div class="d-flex justify-content-center">

                    <form action="admin.php" method="POST">
                    <input type="text" name="pasifyap_id" value='.$uye["id"].' hidden>
                    <button class="btn btn-secondary m-1" title="Pasif yapmak için tıklayınız...">
                    <i class="fa fa-ban"></i></button>
                    </form>

                    <a class="btn btn-info m-1" title="Düzenlemek için tıklayınız..." 
                    href="admin.php?duzenle=uye&id=' . $uye["id"] . '" role="button"><i class="fas fa-edit"></i></a>


                    <a class="btn btn-danger m-1" onclick="if(confirm(\'Bu kullanıcıyı silmek istediğinizden emin misiniz?\')) window.parent.location=\'admin.php?sil=uye&id=' . $uye["id"] . '\';" role="button" 
                    title="Silmek için tıklayınız..."><i class="fa fa-trash"></i>
                    </a>

                    </div>
                    </td>

                    </tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- ////////// AKTİF ÜYELER ALANI BİTİŞİ ////////// -->    
      </div>


      <div class="box" id="div3">
        <!-- ////////// GERİ BİLDİRİM ALANI BAŞLANGICI ////////// -->
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex justify-content-between">

            <h4 class="mb-0 font-weight-bold text-danger"><i class="far fa-comment-dots"></i> Geri Bildirimler</h4>

          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="width:3%;">No</th>
                    <th style="width:60%;">Bildirim Açıklaması</th>
                    <th style="width:10%; text-align: center;">Bildirimi Yapan</th>
                    <th style="width:5%; text-align: center;">Bildirilen Soru ID</th>
                    <th style="width:11%; text-align: center;">Kayıt Zamanı</th>
                    <th style="width:11%; text-align: center;">İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $bildirimCek = $db->query("SELECT * FROM bildirimler where durum=0 Order By id DESC");

                  if ($bildirimCek->num_rows == 0) { 
                    echo "
                    <td colspan=7 class='alert alert-light text-center font-italic'> İnceleme Bekleyen Bildirim Yok...</td>
                    ";}

                    $i=0;
                    while ($bildirim = $bildirimCek->fetch_assoc()) {

                      $uyeAdSoyadcek=$db->query("SELECT ad_soyad FROM uyeler WHERE id = {$bildirim["uye_id"]}")->fetch_row()[0];

                      $i++;

                      echo '<tr>
                      <td align="center" style="vertical-align: middle; font-weight: bold;">' . $i . '</td>

                      <td style="vertical-align: middle; ">' . $bildirim["bildirim"] . '</td>

                      <td style="vertical-align: middle; text-align: center; font-weight: bold;">' . $uyeAdSoyadcek . '</td>

                      <td style="vertical-align: middle; text-align: center;">' . $bildirim["soru_id"] . '</td>


                      <td style="vertical-align: middle; text-align: center;">' . date("d.m.Y - h:i", $bildirim["tarih"]) . '</td>


                      <td style="vertical-align: middle; text-align: center;">
                      <div class="d-flex justify-content-center">

                      <form action="admin.php" method="POST">
                      <input type="text" name="bildirim_aktifle" value='.$bildirim["id"].' hidden>
                      <button class="btn btn-success btn m-1" title="Onaylamak için tıklayınız..."><i class="fa fa-check"></i></button>
                      </form>

                      <a class="btn btn-info m-1" title="Soruyu düzenlemek için tıklayınız..." href="admin.php?duzenle=soru&id=' . $bildirim["soru_id"] . '"
                      role="button"><i class="fas fa-edit"></i></a>

                      <a class="btn btn-danger m-1" title="Silmek için tıklayınız..." onclick="if(confirm(\'Bu geri bildirimi silmek istediğinizden emin misiniz?\')) window.parent.location=\'admin.php?sil=bildirim&id='.$bildirim["id"].'\';"
                      role="button"> <i class="fa fa-trash"></i>
                      </a>

                      </div>
                      </td>

                      </tr>';
                    }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- ////////// GERİ BİLDİRİM ALANI BİTİŞİ ////////// -->
        </div>


        <div class="box" id="div4">
          <!-- ////////// SORU KATEGORİLERİ ALANI BAŞLANGICI ////////// -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-sitemap" aria-hidden="true"></i> Soru Kategorileri</h4>
              <button data-toggle="modal" data-target="#kategori" class="btn btn-success mb-1  waves-effect waves-light"
              tabindex="0">
              <span><i class="fas fa-plus fa-sm text-white-50"></i> YENİ KATEGORİ EKLE</span>
            </button>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="text-align: center;">No</th>
                    <th>Kategori Adı</th>
                    <th style="text-align: center;">Soru Sayısı</th>
                    <th style="text-align: center;">İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $kategoriCek = $db->query("SELECT * FROM kategoriler ORDER BY id ASC");
                  $i=0;
                  while ($kategori = $kategoriCek->fetch_assoc()) {
                    $i++;
                    $soruSayisi = $db->query("SELECT id FROM sorular WHERE kategori = {$kategori['id']}")->num_rows;
                    echo '<tr><td align="center" style="font-weight: bold;">'.$i.'</td><td>' . $kategori["isim"] . '</td><td align="center">' . $soruSayisi . '</td><td align="center"><a class="btn btn-info m-1" title="Düzenlemek için tıklayınız..." href="admin.php?duzenle=kategori&id=' . $kategori["id"] . '"
                    role="button"><i class="fas fa-edit"></i></a>

                    <a class="btn btn-danger mt-1" title="Silmek için tıklayınız..." onclick="if(confirm(\'Bu kategoriyi silmek istediğinizden emin misiniz?\')) window.parent.location=\'admin.php?sil=kategori&id=' . $kategori["id"] . '\';"
                    role="button"> <i class="fa fa-trash"></i></a></td></tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- ////////// SORU KATEGORİLERİ ALANI BİTİŞİ ////////// -->
      </div>


      <!-- Butonla ile gizli alanların gösterilmesini sağlar. -->
      <script type="text/javascript">
        $(document).ready(function() {
          $('.toggle-button').click(function() {
            var divId = $(this).data('div');
            if ($('#'+divId).is(':visible')) {
              $('#'+divId).hide();
            } else {
                    $('.box').hide(); // Tüm div'leri gizle
                    $('#'+divId).show(); // Seçilen div'i göster
                  }
                });
        });
      </script>



      <style> /*Text Editörünün yüksekliğini ayarlamak için*/
      .ck-editor__editable_inline { min-height: 90px; }
  </style>
  
      <!-- YENİ SORU EKLEME MODAL -->
      <div class="modal-success mr-1 mb-1 d-inline-block">
        <!-- Modal -->
        <div class="modal fade text-left" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
        aria-hidden="true">
        <div class="modal-dialog-scrollable  modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="card-header">
              <h5 class="modal-title text-center">Yeni Soru Ekleme</h5>
            </div>

            <section id="floating-label-layouts">
              <div class="row ">
                <div class="col-md-12 ">
                  <div class="card">
                    <div class="card-body">
                      <form class="form" method="POST" action="admin.php?soruEkle">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12 col-12">
                              <div class="form-group">
                                <label for="last-name-column"
                                class="font-weight-bold text-dark">Kategori : <span class="font-italic text-danger">***Kategori seçmeyi unutmayınız.</span> </label>
                                <div class="form-group">
                                  <select name="kategori" required="required" class="form-control" >
                                    <option value="0" selected="selected">Seçim Yapınız...
                                    </option>
                                    <?php
                                    $kategoriler = $db->query("SELECT * FROM kategoriler");
                                    while ($kategori = $kategoriler->fetch_assoc()) {
                                      echo '<option value="' . $kategori["id"] . '">' . $kategori["isim"] . '</option>';
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-12 col-12">
                              <label for="first-name-column"
                              class="font-weight-bold text-dark">Soru Cümlesi :</label>
                              <div class="form-group">
                                <textarea class="form-control" name="soru" id="soru" required="required"
                                rows="4"
                                placeholder="Soruyu giriniz...">
                              </textarea>

                              <script>
                                ClassicEditor
                                .create( document.querySelector( '#soru' ) )
                                .catch( error => {
                                  console.error( error );
                                } );
                              </script>
                            </div>
                          </div>

                          <div class="col-md-6 col-12">
                            <label for="first-name-column"
                            class="font-weight-bold text-dark">Seçenek - 1-A) :</label>
                            <div class="form-group">
                              <input type="text" name="a" required="required"
                              placeholder="Seçenek bilgisi giriniz..."
                              class="form-control">
                            </div>
                          </div>

                          <div class="col-md-6 col-12">
                            <label for="first-name-column"
                            class="font-weight-bold text-dark">Seçenek - 2-B) :</label>
                            <div class="form-group">
                              <input type="text" name="b" required="required"
                              placeholder="Seçenek bilgisi giriniz..."
                              class="form-control">
                            </div>
                          </div>

                          <div class="col-md-6 col-12">
                            <label for="first-name-column"
                            class="font-weight-bold text-dark">Seçenek - 3-C) :</label>
                            <div class="form-group">
                              <input type="text" name="c" required="required"
                              placeholder="Seçenek bilgisi giriniz..."
                              class="form-control">
                            </div>
                          </div>

                          <div class="col-md-6 col-12">
                            <label for="first-name-column"
                            class="font-weight-bold text-dark">Seçenek - 4-D) :</label>
                            <div class="form-group">
                              <input type="text" name="d" required="required"
                              placeholder="Seçenek bilgisi giriniz..."
                              class="form-control">
                            </div>
                          </div>

                          <div class="col-md-3 col-12">
                            <div class="form-group">
                              <label for="last-name-column"
                              class="font-weight-bold text-danger">Doğru Seçenek :</label>
                              <div class="form-group">
                                <select name="dogru_cevap" required="required" class="form-control">
                                  <option value="" selected="selected">Seçim Yapınız...
                                  </option>
                                  <option required="required" value="a"><span>1-</span> A
                                  </option>
                                  <option required="required" value="b"><span>2-</span> B
                                  </option>
                                  <option required="required" value="c"><span>3-</span> C
                                  </option>
                                  <option required="required" value="d"><span>4-</span> D
                                  </option>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-9 col-12">
                            <label for="first-name-column"
                            class="font-weight-bold text-danger">Cevap Açıklaması :</label>
                            <div class="form-group">
                              <textarea class="form-control" name="aciklama" id="aciklama"
                              required="required" rows="4"
                              placeholder="Açıklama giriniz...">
                            </textarea>
                            <script>
                              ClassicEditor
                              .create( document.querySelector( '#aciklama' ) )
                              .catch( error => {
                                console.error( error );
                              } );
                            </script>
                          </div>
                        </div>

                        <div class="col-12">
                          <button type="submit" name="ekle"
                          class="btn btn-success  btn-block"><i class="fas fa-save"></i> 
                        G Ö N D E R</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
</div>
<!-- YENİ SORU EKLEME MODAL -->





<!-- YENİ ÜYE EKLEME MODAL -->
<div class="modal-success mr-1 mb-1 d-inline-block">
  <!-- Modal -->
  <div class="modal fade text-left" id="uye" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
  aria-hidden="true">
  <div class="modal-dialog-scrollable  modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-header">
        <h5 class="modal-title text-center">Yeni Üye Ekleme</h5>
      </div>

      <section id="floating-label-layouts">
        <div class="row ">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <form class="form" method="POST" action="admin.php?uyeEkle">
                  <div class="modal-body">
                    <div class="row">

                      <div class="col-md-12 col-12">
                        <label for="first-name-column"
                        class="font-weight-bold text-dark">Kullanıcı Adı:</label>
                        <div class="form-group">
                          <input type="text" name="kullanici" required="required"
                          placeholder="Kullanıcı adını giriniz." class="form-control">
                        </div>
                      </div>

                      <div class="col-md-12 col-12">
                        <label for="first-name-column"
                        class="font-weight-bold text-dark">Şifre:</label>
                        <div class="form-group">
                          <input type="password" name="sifre" required="required"
                          placeholder="Kullanıcı şifresini giriniz."
                          class="form-control">
                        </div>
                      </div>

                      <div class="col-md-12 col-12">
                        <label for="first-name-column"
                        class="font-weight-bold text-dark">Adı Soyadı:</label>
                        <div class="form-group">
                          <input name="ad_soyad" required="required"
                          placeholder="Kişinin Adı ve Soyadını giriniz."
                          class="form-control">
                        </div>
                      </div>

                      <div class="col-md-12 col-12">
                        <label for="first-name-column"
                        class="font-weight-bold text-dark">Ünvan:</label>
                        <div class="form-group">
                          <input type="text" name="unvan" required="required"
                          placeholder="Kullanıcı ünvanını giriniz."
                          class="form-control">
                        </div>
                      </div>

                      <div class="col-md-12 col-12">
                        <label for="first-name-column"
                        class="font-weight-bold text-dark">Üye Tipi:</label>
                        <div class="form-group">
                          <select name="admin" class="form-control">
                            <option value = "0" selected>Normal Üye</option>
                            <option value = "1">Admin</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block"><i
                          class="fas fa-save"></i> E K L E </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
<!-- YENİ ÜYE EKLEME MODAL -->



<!-- YENİ KATEGORİ EKLEME MODAL -->
<div class="modal-success mr-1 mb-1 d-inline-block">
  <!-- Modal -->
  <div class="modal fade text-left" id="kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
  aria-hidden="true">
  <div class="modal-dialog-scrollable  modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-header">
        <h5 class="modal-title text-center">Yeni Kategori Ekleme</h5>
      </div>

      <section id="floating-label-layouts">
        <div class="row ">
          <div class="col-md-12 ">
            <div class="card">
              <div class="card-body">
                <form class="form" method="POST" action="admin.php?kategoriEkle">
                  <div class="modal-body">
                    <div class="row">

                      <div class="col-md-12 col-12">
                        <label for="first-name-column"
                        class="font-weight-bold text-dark">Kategori Adı:</label>
                        <div class="form-group">
                          <input type="text" name="kategori" required="required"
                          placeholder="Kategori adını giriniz." class="form-control">
                        </div>
                      </div>

                      <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block"><i
                          class="fas fa-save"></i> E K L E </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
<!-- YENİ KATEGORİ EKLEME MODAL -->




<?php
$soruCek = $db->query("SELECT * FROM sorular");
while ($soru = $soruCek->fetch_assoc()) {
  $kategoriAdi = $db->query("SELECT isim FROM kategoriler WHERE id = {$soru["kategori"]}")->fetch_row()[0];
  ?>
  <!-- SORU GÖSTERME MODAL -->
  <div id="soruModal-<?=$soru['id']?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">                
          <h5 class="text-secondary">Soru Id: <?=$soru['id']?></h5>                    
          <h5 class="text-danger ml-auto"> <b>Kategori:</b> <?=$kategoriAdi?></h5>
          <a class="close" data-dismiss="modal">&times;</a>
        </div>
        
        <div class="modal-body">

          <div class="alert alert-info text-lg text-justify"><b>SORU: </b>                     
           <span><?=htmlspecialchars_decode($soru['soru'])?></span><hr>                       

           <div class="col-md-12 form-group">
            <label class="btn btn-light
            <?php if($soru['dogru_cevap']=='a') {echo 'alert-success';} ?>">
            <input disabled type="radio" name="cevap-soru" value="a" required=""> <b>A)</b> <?=$soru['a']?>
          </label>
        </div>

        <div class="col-md-12 form-group">
          <label class="btn btn-light
          <?php if($soru['dogru_cevap']=='b') {echo 'alert-success';} ?>">
          <input disabled type="radio" name="cevap-soru" value="b" required=""> <b>B)</b> <?=$soru['b']?></label>
        </div>

        <div class="col-md-12 form-group">
          <label class="btn btn-light
          <?php if($soru['dogru_cevap']=='c') {echo 'alert-success';} ?>">
          <input disabled type="radio" name="cevap-soru" value="c" required=""> <b>C)</b> <?=$soru['c']?></label>
        </div>

        <div class="col-md-12 form-group">
          <label class="btn btn-light
          <?php if($soru['dogru_cevap']=='d') {echo 'alert-success';} ?>">
          <input disabled type="radio" name="cevap-soru" value="d" required=""> <b>D)</b> <?=$soru['d']?></label>
        </div>
        
        <div class="d-flex">                                    
          <div class="ml-auto p-0"><div class="btn btn-success text-white">Doğru Cevap: <span class="alert bg-dark font-weight-bold text-white ml-auto"><?=strtoupper($soru['dogru_cevap'])?></span></div></div>
        </div>

      </div>
      <label class="m-2 p-2 alert alert-dark text-justify"><b>Açıklama:</b> <?=htmlspecialchars_decode($soru['aciklama'])?></label>
    </div>
    
    <div class="modal-footer">                  
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>                    
    </div>                        
  </div>
</div>
</div>
<!-- SORU GÖSTERME MODAL -->
<?php } ?>



<?php require_once('include/footer.php'); ?>