<?php

$baslik = "Soru Gönder";
require_once('include/header.php');




////////// SORU EKLEME ALANI BAŞLANGICI //////////
if (isset($_GET["soruEkle"])) {

    $soru = $_POST['soru'];  
$soru = htmlspecialchars($soru, ENT_QUOTES, 'UTF-8'); // HTML etiketlerini etkisiz hale getirir

$kategori = (int) $_POST['kategori']; // Kategori kodunu tamsayıya çevirir
$a = htmlspecialchars($_POST['a'], ENT_QUOTES, 'UTF-8'); 
$b = htmlspecialchars($_POST['b'], ENT_QUOTES, 'UTF-8');
$c = htmlspecialchars($_POST['c'], ENT_QUOTES, 'UTF-8');
$d = htmlspecialchars($_POST['d'], ENT_QUOTES, 'UTF-8');
$dogru_cevap = $_POST['dogru_cevap'];

$aciklama = $_POST['aciklama'];
$aciklama = htmlspecialchars($aciklama, ENT_QUOTES, 'UTF-8'); // HTML etiketlerini etkisiz hale getirir


// Kategori kodu doğruluğunu kontrol et
if ($kategori === 0) {
  // Hata mesajı göster
  echo "<script>
  Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'DİKKAT: Kategori Seçmediniz.',
      showConfirmButton: false,
      timer: 2000});
      </script>";

      header("Refresh: 2.2; url=soruGonder.php");
      exit;
  }

  // Veritabanını sorguyu hazırla ve verileri güvenli bir şekilde yerleştir
  $stmt = $db->prepare("INSERT INTO sorular (soru, kategori, a, b, c, d, dogru_cevap, aciklama, soruyu_yazan, durum) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 0)");
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
              title: 'Soru Başarıyla İletildi.',
              showConfirmButton: false,
              timer: 1800});
              </script>";
          }

          header("Refresh: 2.2; url=soruGonder.php");
          exit;
      }
////////// SORU EKLEME ALANI BİTİŞİ //////////
      ?>

      
      <style> /*Text Editörünün yüksekliğini ayarlamak için*/
      .ck-editor__editable_inline { min-height: 90px; }
  </style>


  <div class="modal-content">
    <div class="card-header">
        <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-play" aria-hidden="true"></i> Soru Gönder</h4>
    </div>

    <section id="floating-label-layouts">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">


                        <form class="form" method="POST" action="soruGonder.php?soruEkle">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <label for="last-name-column"
                                                class="font-weight-bold text-dark">Kategori : <span class="font-italic text-danger">***Kategori seçmeyi unutmayınız.</span> </label>
                                                <div class="text-danger font-weight-bold">
                                                 Soru göndererek katkıda bulunduğunuz için teşekkür ederiz. <i class="fa fa-heart" aria-hidden="true"></i>
                                             </div> 
                                         </div>

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

                                <div class="col-12">
                                    <label for="first-name-column"
                                    class="font-weight-bold text-dark">Soru Cümlesi :</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="soru" id="soru" required="required" placeholder="Soruyu giriniz...">
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
                                        autocomplete="off"
                                        class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="first-name-column"
                                    class="font-weight-bold text-dark">Seçenek - 2-B) :</label>
                                    <div class="form-group">
                                        <input type="text" name="b" required="required"
                                        placeholder="Seçenek bilgisi giriniz..."
                                        autocomplete="off"
                                        class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="first-name-column"
                                    class="font-weight-bold text-dark">Seçenek - 3-C) :</label>
                                    <div class="form-group">
                                        <input type="text" name="c" required="required"
                                        placeholder="Seçenek bilgisi giriniz..."
                                        autocomplete="off"
                                        class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="first-name-column"
                                    class="font-weight-bold text-dark">Seçenek - 4-D) :</label>
                                    <div class="form-group">
                                        <input type="text" name="d" required="required"
                                        placeholder="Seçenek bilgisi giriniz..."
                                        autocomplete="off"
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



<?php require_once('include/footer.php'); ?>