<?php

$baslik = "Sınav Salonu";
require_once('include/header.php');


/////////////////////// SINAV BAŞLAT //////////////////////
if (isset($_GET["sinavBaslat"])) {

    $soruSayisi = $_POST["adet"];
    $kategoriArray = $_POST["kategori"];

    if ($soruSayisi <= 0 || empty($kategoriArray)) {
        header("Location:sinav.php");
        exit;
    }

    $yanlislar = false;
    if (isset($_POST["yanlis"]))
        $yanlislar = true;

    $soruidleri = array();

    if ($yanlislar) {
        $sql = "SELECT * FROM isaretlemeler WHERE uye_id = $userID";
        if(!in_array(0, $kategoriArray)) {
            $kategoriList = implode(',', $kategoriArray);
            $sql .= " AND soru_id IN (SELECT id FROM sorular WHERE kategori IN ($kategoriList))";
        }
        $isaretlenenSorular = $db->query($sql);

        while($soru = $isaretlenenSorular->fetch_assoc()){
            if ($soru["cevap"] == $db->query("SELECT dogru_cevap FROM sorular WHERE id = {$soru["soru_id"]}")->fetch_row()[0])
                continue;

            if (in_array($soru["soru_id"], $soruidleri))
                continue;

            if (count($soruidleri) == $soruSayisi)
                break;

            array_push($soruidleri, $soru["soru_id"]);
        }
    } else {
        $kategoriList = implode(',', $kategoriArray);
        if ($kategoriList == "0") {
            $sql = "SELECT * FROM sorular WHERE durum=1 ORDER BY rand() LIMIT " . $soruSayisi;
        } else {
            $sql = "SELECT * FROM sorular WHERE kategori IN ($kategoriList) AND durum = 1 ORDER BY rand() LIMIT " . $soruSayisi;
        }

        $soruCek = $db->query($sql);

        if ($soruCek->num_rows == 0) {
            header("Location:sinav.php?error");
            exit;
        } else {
            while ($soru = $soruCek->fetch_assoc()) {
                array_push($soruidleri, $soru["id"]);
            }
        }
    }

    if(count($soruidleri) == 0) header("Location:sinav.php?soruyok");
    else header("Location:sinav.php?baslama=" . time() . "&sinav=" . json_encode($soruidleri));

    exit;
}
/////////////////////// SINAV BAŞLAT //////////////////////



if (isset($_GET["sonuc"])) { // Sınavı bitirdim, sonuçları göster ve kaydet

    $soruSayisi = $_GET["sonuc"];

    $baslangic = $_GET["baslama"];
    $simdi = $_POST["bitis"];

    $gecen = $simdi - $baslangic;

    if($gecen/60 >= 1){
        $dakika =  $gecen / 60;
        $dakika = floor($dakika);

        $saniye = $gecen - (60 * $dakika);
    }
    else{
        $dakika = 0;
        $saniye = $gecen;
    }

    if ($dakika < 10)
        $dakika = "0" . $dakika;

    if ($saniye < 10)
        $saniye = "0" . $saniye;


      ?>


      <!-- /////////////////////////////////////////// SONUÇLAR BAŞLAMA ////////////////////////////////////////////// -->
      <div class="card shadow mb-4" style="background-image: url(assets/img/arkaplan.jpg)">
        <div class="card-header py-3">
            <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-chart-line" aria-hidden="true"></i> Sonuçlar</h4>
        </div>
        <div class="card-body">

            <?php
              $sorularSonuc = array();
              $dogrular=0;
              $yanlislar=0;
              for ($i = 0; $i < $soruSayisi; $i++) {

                array_push($sorularSonuc, $_POST["soru-id-" . $i]);
                $soruID = $_POST["soru-id-" . $i];
                $soruCevap = $_POST["cevap-soru-" . $i];

                $soru = $db->query("SELECT * FROM sorular WHERE id = $soruID")->fetch_assoc();
                $sira=$i+1;
                $tarih = time();
                $db->query("INSERT INTO isaretlemeler (uye_id, soru_id, cevap, tarih) VALUES ($userID, $soruID, '$soruCevap', $tarih)");
                if ($soruCevap==$soru["dogru_cevap"]) { $dogrular++; } else{ $yanlislar++;}

                echo '<div class="border border-dark alert alert-light text-lg text-justify"><b>'.$sira.'.SORU: </b>' . htmlspecialchars_decode($soru['soru']) . '
                <div class="row">

                <div class="col-md-12 form-group mt-4">
                <input disabled type="radio" ' . ($soruCevap == "a" ? "checked" : "") . '/>
                <label class="btn btn-light' . ((($soruCevap == "a" && $soru["dogru_cevap"] == "a") || $soru["dogru_cevap"] == "a") ? " alert-success" : ($soruCevap == "a" ? " alert-danger" : "")) . '">A) ' . $soru["a"] . '</label>
                </div>

                <div class="col-md-12 form-group">
                <input disabled type="radio" ' . ($soruCevap == "b" ? "checked" : "") . '/>
                <label class="btn btn-light' . ((($soruCevap == "b" && $soru["dogru_cevap"] == "b") || $soru["dogru_cevap"] == "b") ? " alert-success" : ($soruCevap == "b" ? " alert-danger" : "")) . '">B) ' . $soru["b"] . '</label>
                </div>

                <div class="col-md-12 form-group">
                <input disabled type="radio" ' . ($soruCevap == "c" ? "checked" : "") . '/>
                <label class="btn btn-light' . ((($soruCevap == "c" && $soru["dogru_cevap"] == "c") || $soru["dogru_cevap"] == "c") ? " alert-success" : ($soruCevap == "c" ? " alert-danger" : "")) . '">C) ' . $soru["c"] . '</label>
                </div>

                <div class="col-md-12 form-group">
                <input disabled type="radio" ' . ($soruCevap == "d" ? "checked" : "") . '/>
                <label class="btn btn-light' . ((($soruCevap == "d" && $soru["dogru_cevap"] == "d") || $soru["dogru_cevap"] == "d") ? " alert-success" : ($soruCevap == "d" ? " alert-danger" : "")) . '">D) ' . $soru["d"] . '</label>
                </div>

                </div>';

                $istatistik1 = $db->query("SELECT * FROM isaretlemeler WHERE soru_id = $soruID and cevap = '{$soru['dogru_cevap']}'");
                $dogru_cozum_sayisi = $istatistik1->num_rows;

                $istatistik2 = $db->query("SELECT * FROM isaretlemeler WHERE soru_id = $soruID and cevap != '{$soru['dogru_cevap']}'");
                $yanlis_cozum_sayisi = $istatistik2->num_rows;

                if ($soru['dogru_cevap'] == $soruCevap)
                    echo '<div class="alert alert-success" role="alert"><h4 class="alert-heading"><i class="fa fa-check" aria-hidden="true"></i> TEBRİKLER | Cevabınız Doğru</h4><hr><p>' . htmlspecialchars_decode($soru['aciklama']) . '</p></div>';
                else
                    echo '<div class="alert alert-danger" role="alert"><h4 class="alert-heading"><i class="fa fa-times" aria-hidden="true"></i> MAALESEF | Cevabınız Yanlış</h4> (Doğru Cevap: <strong>' . strtoupper($soru['dogru_cevap']) . '</strong> iken sizin cevabınız: <strong>' . strtoupper($soruCevap) . '</strong> oldu.)<hr><p>' . htmlspecialchars_decode($soru['aciklama']) . '</p></div>';

                echo '<div style="text-align: center;" class="text-info"> Bu soru <strong>'.$dogru_cozum_sayisi.'</strong> kez DOĞRU, <strong>'.$yanlis_cozum_sayisi.'</strong> kez YANLIŞ olarak cevaplanmıştır... </div>';

                echo '<div class="d-flex justify-content-end">                    

                    <div class="mr-2">
                    <div id="contact" class="d-flex justify-content-end">
                    <button id="bildirBtn_'.$soruID.'" type="button" class="btn btn-primary" 
                    data-toggle="modal" data-target="#bildiriModal-'.$soruID.'">
                    <i class="far fa-comment-dots"></i> Bildir
                    </button>
                    </div>
                    </div>

                        <script>
                            var bildirBtn_'.$soruID.' = document.getElementById("bildirBtn_'.$soruID.'");
                            bildirBtn_'.$soruID.'.addEventListener("click", function() {
                            bildirBtn_'.$soruID.'.style.display = "none";
                            });
                        </script>
                    </div>';

                echo '</div> ';

                echo '<hr class="mb-4 mt-4" color="brown" style="border-width: 4px;">';                

            }

                echo "<script>
    Swal.fire({
        position: 'top-center',
        icon: 'info',
        title: 'Sınavı Bitirme Süreniz:&nbsp;<strong>".$dakika.":".$saniye."</strong>',
        showConfirmButton: false,
        html: '".$soruSayisi." Soruda <strong>".$dogrular."</strong> Doğru / <strong>".$yanlislar."</strong> Yanlış cevap verdiniz...<hr> <b></b> milisaniye sonra kapanacak.',
        timer: 5000,
        timerProgressBar: true,
        didOpen: () => {
        Swal.showLoading()
        const b = Swal.getHtmlContainer().querySelector('b')
        timerInterval = setInterval(() => { b.textContent = Swal.getTimerLeft() }, 100) },
        willClose: () => { clearInterval(timerInterval) } })
        .then((result) => {        
        if (result.dismiss === Swal.DismissReason.timer) {
        console.log('I was closed by the timer')
        }
    });
</script>";
            
            
            ?>

            <center><a href="sinav.php" class="btn btn-info btn-icon-split my-5">
                <span class="icon text-white-50">
                    <i class="fa fa-retweet" aria-hidden="true"></i>
                </span>
                <span class="text">YENİ SINAV BAŞLAT</span>
            </a></center>
        </div>
    </div>
    <!-- /////////////////////////////////////////// SONUÇLAR BİTİŞ ////////////////////////////////////////////// -->

<?php } else if (isset($_GET["sinav"])) { // Yeni sınav başladı

    $sorular = json_decode($_GET["sinav"]);

    ?>

    <!-- /////////////////////////////////////////// SORULAR BAŞLAMA ////////////////////////////////////////////// -->
    <div class="card shadow mb-4" style="background-image: url(assets/img/arkaplan.jpg)">
        <div class="card-header py-3 d-flex justify-content-between">
            <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-bullhorn">          
            </i> Sınav Soruları</h4>                       
        </div>
        <div class="card-body">

            <form action="sinav.php?baslama=<?= $_GET["baslama"] ?>&sonuc=<?= count($sorular) ?>" method="POST">

                <?php
                $renk = true;

                echo '<input type="hidden" id="bitis" name="bitis" value="">';

                for ($i = 0; $i < count($sorular); $i++) {

                    $soru = $db->query("SELECT * FROM sorular WHERE id = $sorular[$i]")->fetch_assoc();

                    $cevaplar = ["a", "b", "c", "d"];

                    $sira=$i+1;
                    

                    //Soru yazdırılıyor
                    echo '<div class="alert alert-' . ($renk ? "info" : "dark") . ' text-lg text-justify"><b>'.$sira.'.SORU: </b>';
                    ?>

                    <span><?=htmlspecialchars_decode($soru['soru'])?></span>

                    <?php
                    echo '<hr>
                    <input type="hidden" name="soru-id-' . $i . '" value="' . $sorular[$i] . '">';


                    // A seçeneği yazdırılıyor
                    echo '<div class="col-md-12 form-group"><label class="btn btn-light">';                    
                    $sec = rand(0, count($cevaplar) - 1);
                    echo '<input type="radio" name="cevap-soru-' . $i . '" value="' . $cevaplar[$sec] . '" required="" /> <b>A)</b> 
                    ' . $soru[$cevaplar[$sec]];
                    unset($cevaplar[$sec]);
                    $cevaplar = array_values($cevaplar);
                    echo '</label></div>';

                    // B seçeneği yazdırılıyor
                    echo '<div class="col-md-12 form-group"><label class="btn btn-light">'; 
                    $sec = rand(0, count($cevaplar) - 1);
                    echo '<input type="radio" name="cevap-soru-' . $i . '" value="' . $cevaplar[$sec] . '" required="" /> <b>B)</b> 
                    ' . $soru[$cevaplar[$sec]];
                    unset($cevaplar[$sec]);
                    $cevaplar = array_values($cevaplar);
                    echo '</label></div>';

                    // C seçeneği yazdırılıyor
                    echo '<div class="col-md-12 form-group"><label class="btn btn-light">';
                    $sec = rand(0, count($cevaplar) - 1);
                    echo '<input type="radio" name="cevap-soru-' . $i . '" value="' . $cevaplar[$sec] . '" required="" /> <b>C)</b> 
                    ' . $soru[$cevaplar[$sec]];
                    unset($cevaplar[$sec]);
                    $cevaplar = array_values($cevaplar);
                    echo '</label></div>';                   

                    // D seçeneği yazdırılıyor
                    echo '<div class="col-md-12 form-group"><label class="btn btn-light">';
                    $sec = rand(0, count($cevaplar) - 1);
                    echo '<input type="radio" name="cevap-soru-' . $i . '" value="' . $cevaplar[$sec] . '" required="" /> <b>D)</b> 
                    ' . $soru[$cevaplar[$sec]];
                    unset($cevaplar[$sec]);
                    $cevaplar = array_values($cevaplar);                    
                    echo '</label>

                    </div>

                    <div class="d-flex justify-content-end">                    

                    <div class="mr-2">
                    <div id="contact" class="d-flex justify-content-end">
                    <button id="bildirBtn_'.$sorular[$i].'" type="button" class="btn btn-primary" 
                    data-toggle="modal" data-target="#bildiriModal-'.$sorular[$i].'">
                    <i class="far fa-comment-dots"></i> Bildir
                    </button>
                    </div>
                    </div>

                    <script>
                    var bildirBtn_'.$sorular[$i].' = document.getElementById("bildirBtn_'.$sorular[$i].'");
                    bildirBtn_'.$sorular[$i].'.addEventListener("click", function() {
                        bildirBtn_'.$sorular[$i].'.style.display = "none";
                        });
                        </script>

                        <div>
                        <div class="btn btn-danger text-white">
                        <i class="far fa-edit mr-1"></i> <span class="badge bg-dark">'.$soru["soruyu_yazan"].'</span>
                        </div>
                        </div>

                        </div>


                        </div>                   

                        <hr color="brown" style="border-width: 3px; margin: 30px;">';

                   //Soru kartlarının farklı renkte olması için
                        if ($renk)
                         $renk = false;
                     else
                         $renk = true;
                 }           



                 ?>

                 <div align="center">
                    <button type="submit" style="margin-bottom:20px" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text">Sınavı Bitir</span>
                    </button>
                </div>

            </form>


            <!-- ZAMANLAYICI -->
            <div id="timer">--:--</div>

            <style>
                #timer{
                    position: fixed;
                    z-index: 2000;
                    bottom: 0;
                    right: 93%;
                    background: #4e73df;
                    color: white;
                    font-size: 1.2rem;
                    font-weight: bold;
                    padding: 10px 20px;
                    border-top-left-radius: 10px;
                    border-top-right-radius: 10px;
                    box-shadow: 0 0 10px 0 rgba(0,0,0,0.5);
                }
            </style>

            <script>
                function gecenSure() {
                    var baslangic = <?= $_GET["baslama"] ?>;
                    var simdi = Math.floor(Date.now()/1000);

                    $("#bitis").val(simdi);

                    var gecen = simdi - baslangic;

                    var dakika, saniye;
                    if((gecen / 60) >= 1){
                        dakika = Math.floor((gecen / 60));                            
                        saniye = gecen - (60 * Math.floor(dakika));
                    }else{
                        dakika = "00";
                        saniye = gecen;
                    }

                    if(dakika < 10) dakika = "0" + Math.floor(dakika);
                    if(saniye < 10) saniye = "0" + saniye;

                    $("#timer").text(dakika + ":" + saniye);
                }

                setInterval(function () { gecenSure() }, 1000);
            </script>

            <!-- ZAMANLAYICI -->

        </div>
    </div>
    <!-- /////////////////////////////////////////// SORULAR BİTİŞ ////////////////////////////////////////////// -->

<?php } else { ?>

    <div class="row d-flex justify-content-between">

        <!-- /////////////////////////////////////////// KARIŞIK ÇÖZ BAŞLAMA ////////////////////////////////////////////// -->
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h5 class="mb-0 font-weight-bold text-info"><i class="fa fa-play" aria-hidden="true"></i> Karışık Çöz</h5>            
                </div>

                <lottie-player src="assets/img/karisik.json"  background="transparent"  speed="1"  style="width: 100%; height: 300px;"  loop  autoplay></lottie-player>

                <div class="card-body">
                    <form action="sinav.php?sinavBaslat" method="post">
                        <div class="col-12">

                            <?php if (isset($_GET["error"]))
                            echo '<div class="alert alert-warning alert-dismissible fade show mt-2 text-center" role="alert">Kategoride soru yok..!</div>'; ?>

                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1" style="visibility: hidden;">Sınav Kategorisi</div>
                            <select class="form-control" name="kategori[]" id="kategori1" multiple="multiple" hidden="hidden">
                                <option value="0" selected="selected">GENEL - Tüm Kategoriler</option>                                
                            </select>

                            <script type="text/javascript">
                               $(function () {
                                $('#kategori1').multipleSelect({
                                    selectAll: false
                                })
                            })
                        </script>

                    </div>
                    <div class="col-12 my-4">
                        <div class="text-sm font-weight-bold text-dark mb-1">SORU SAYISI</div>
                        <input type="number" class="form-control" name="adet" placeholder="Soru sayısını giriniz..." />
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-info btn-icon-split" title="Soruyu cevapladığınız anda doğru cevabın göründüğü sınav şeklidir...">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text" >Çalışma Başlat</span>
                        </button>
                    
                        <button type="submit" class="btn btn-primary btn-icon-split" title="Girdiğiniz soru sayısı kadar sorudan oluşan sınavı başlatır...">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text" >Deneme Başlat</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /////////////////////////////////////////// KARIŞIK ÇÖZ BİTİŞ ////////////////////////////////////////////// -->



    <!-- /////////////////////////////////////////// KONU SEÇEREK ÇÖZ BAŞLAMA /////////////////////////////////////// -->
    <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h5 class="mb-0 font-weight-bold text-info"><i class="fa fa-play" aria-hidden="true"></i> Konu Seçerek Çöz</h5>            
            </div>
            <lottie-player src="assets/img/secerek.json"  background="transparent"  speed="1"  style="width: 100%; height: 300px;"  loop  autoplay></lottie-player>
            <div class="card-body">
                <form action="sinav.php?sinavBaslat" method="post">
                    <div class="col-12">

                        <?php if (isset($_GET["error"]))
                        echo '<div class="alert alert-warning alert-dismissible fade show mt-2 text-center" role="alert">Kategoride soru yok..!</div>'; ?>

                        <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Sınav Kategorisi</div>
                        <select class="form-control" name="kategori[]" id="kategori2" multiple="multiple" placeholder="Kategori seçiniz...">                                
                            <?php
                            $kategoriCek = $db->query("SELECT * FROM kategoriler");
                            while ($kategori = $kategoriCek->fetch_assoc()) {
                                echo '<option value="' . $kategori["id"] . '">' . $kategori["isim"] . '</option>';
                            }
                            ?>
                        </select>

                        <script type="text/javascript">
                           $(function () {
                            $('#kategori2').multipleSelect({
                                selectAll: false,
                                showClear: true,
                                filter: true,
                                filterAcceptOnEnter: true
                            })
                        })
                    </script>

                </div>
                <div class="col-12 my-4">
                    <div class="text-sm font-weight-bold text-dark mb-1">SORU SAYISI</div>
                    <input type="number" class="form-control" name="adet" placeholder="Soru sayısını giriniz..." />
                </div>                        
                <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-info btn-icon-split" title="Soruyu cevapladığınız anda doğru cevabın göründüğü sınav şeklidir...">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text" >Çalışma Başlat</span>
                        </button>
                    
                        <button type="submit" class="btn btn-primary btn-icon-split" title="Girdiğiniz soru sayısı kadar sorudan oluşan sınavı başlatır...">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text" >Deneme Başlat</span>
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- /////////////////////////////////////////// KONU SEÇEREK ÇÖZ BİTİŞ /////////////////////////////////////// -->


<div class="col-md-12 col-lg-6 col-xl-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h5 class="mb-0 font-weight-bold text-info"><i class="fa fa-play" aria-hidden="true"></i> Hata Yapılan Soruları Çöz</h5>
        </div>
        <lottie-player src="assets/img/hata.json"  background="transparent"  speed="1"  style="width: 100%; height: 300px;"  loop  autoplay></lottie-player>
        <div class="card-body">
            <form action="sinav.php?sinavBaslat" method="post">
                <div class="col-12">                           

                    <?php if (isset($_GET["soruyok"]))
                    echo '<div class="alert alert-warning alert-dismissible fade show mt-2 text-center" role="alert">Hata yapılan sorunuz yok...</div>'; ?>

                    <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Sınav Kategorisi</div>
                    <select class="form-control"  name="kategori[]" id="kategori3" multiple="multiple" placeholder="Kategori seçiniz...">
                        <?php
                        $kategoriCek = $db->query("SELECT * FROM kategoriler");
                        while ($kategori = $kategoriCek->fetch_assoc()) {
                            echo '<option value="' . $kategori["id"] . '">' . $kategori["isim"] . '</option>';
                        }
                        ?>
                    </select>

                    <script type="text/javascript">
                       $(function () {
                        $('#kategori3').multipleSelect({
                            selectAll: true,
                            showClear: true,
                            filter: true,
                            filterAcceptOnEnter: true
                        })
                    })
                </script>

            </div>
            <div class="col-12 my-4">
                <div class="text-sm font-weight-bold text-dark mb-1">SORU SAYISI</div>
                <input type="number" class="form-control" name="adet" placeholder="Soru sayısını giriniz..." />
            </div>
            <div class="col-12 my-4">
                <label class="font-italic" hidden><input type="checkbox" name="yanlis" checked> Sadece Yanlış Çözdüğüm Soruları Getir</label>
            </div>
            <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-info btn-icon-split" title="Soruyu cevapladığınız anda doğru cevabın göründüğü sınav şeklidir...">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text" >Çalışma Başlat</span>
                        </button>
                    
                        <button type="submit" class="btn btn-primary btn-icon-split" title="Girdiğiniz soru sayısı kadar sorudan oluşan sınavı başlatır...">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text" >Deneme Başlat</span>
                        </button>
                    </div>
        </form>
    </div>
</div>
</div>

</div>


<?php }
if (isset($sorular)) {


for ($i = 0; $i < count($sorular); $i++) { // Her bir bildirim için MODAL ve JS Kodu oluşturalım.
   ?>

   <!-- GERİBİLDİRİM MODAL -->
   <div id="bildiriModal-<?=$sorular[$i]?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <h3 class="text-danger font-weight-bold">Geri Bildirim Formu</h3>
                <a class="close" data-dismiss="modal">&times;</a>
            </div>
            

         <form id="bildirimFormu-<?=$sorular[$i]?>" name="contact" role="form">
            <div class="modal-body">

                <input type="hidden" id="userID" name="userID" value="<?=$userID?>">
                <input type="hidden" id="soruID" name="soruID" value="<?=$sorular[$i]?>">

                <div class="d-flex justify-content-between mt-2 mb-0">
                    <div class="form-group h5">
                        <label for="aciklama">Açıklamalar</label>                        
                    </div>
                    <span class="h5">Soru ID: <strong><?=$sorular[$i]?></strong></span>
                </div>

                <textarea name="aciklama" class="form-control" rows="5"></textarea>

            </div>

            <div class="ml-3 text-danger font-weight-bold">
                Geri bildiriminiz için teşekkür ederiz...<i class="fa fa-heart" aria-hidden="true"></i>
         </div>
            <div class="modal-footer">                  
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                <input type="submit" class="btn btn-primary" id="submit">
            </div>
        </form>
    </div>
</div>
</div>
<!-- GERİBİLDİRİM MODAL -->

<!-- GERİBİLDİRİM JS Kodu -->
<script type="text/javascript">
    $(document).ready(function(){ 

      $("#bildirimFormu-<?=$sorular[$i]?>").submit(function(event){

        $.ajax({

          type: "POST",
          url: "bildiriKaydet.php",
          cache:false,
          data: $('form#bildirimFormu-<?=$sorular[$i]?>').serialize(),

          success: function(response){
            $("#contact").html(response)
            $("#bildiriModal-<?=$sorular[$i]?>").modal('hide');
        },
        error: function(){
            alert("Error");
        }
    });
        return false;
    });
  });
</script>
<!-- GERİBİLDİRİM Js Kodu -->


<?php } 
}
?>










<?php 
if (isset($sorularSonuc)) {


for ($i = 0; $i < count($sorularSonuc); $i++) { // Her bir bildirim için MODAL ve JS Kodu oluşturalım.
   ?>

   <!-- GERİBİLDİRİM MODAL -->
   <div id="bildiriModal-<?=$sorularSonuc[$i]?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <h3 class="text-danger font-weight-bold"><i class="far fa-comment-dots"></i> Geri Bildirim Formu.</h3>
                <a class="close" data-dismiss="modal">&times;</a>
            </div>
            <div class="ml-3 text-danger font-weight-bold">
                Geri bildiriminiz için teşekkür ederiz...<i class="fa fa-heart" aria-hidden="true"></i>
         </div>

         <form id="bildirimFormu-<?=$sorularSonuc[$i]?>" name="contact" role="form">
            <div class="modal-body">

                <input type="hidden" id="userID" name="userID" value="<?=$userID?>">
                <input type="hidden" id="soruID" name="soruID" value="<?=$sorularSonuc[$i]?>">

                <div class="d-flex justify-content-between mt-2 mb-0">
                    <div class="form-group h5">
                        <label for="aciklama">Açıklamalar</label>                        
                    </div>
                    <span class="h5">Soru ID: <strong><?=$sorularSonuc[$i]?></strong></span>
                </div>

                <textarea name="aciklama" class="form-control" rows="5"></textarea>

            </div>
            <div class="modal-footer">                  
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                <input type="submit" class="btn btn-primary" id="submit">
            </div>
        </form>
    </div>
</div>
</div>
<!-- GERİBİLDİRİM MODAL -->

<!-- GERİBİLDİRİM JS Kodu -->
<script type="text/javascript">
    $(document).ready(function(){ 

      $("#bildirimFormu-<?=$sorularSonuc[$i]?>").submit(function(event){

        $.ajax({

          type: "POST",
          url: "bildiriKaydet.php",
          cache:false,
          data: $('form#bildirimFormu-<?=$sorularSonuc[$i]?>').serialize(),

          success: function(response){
            $("#contact").html(response)
            $("#bildiriModal-<?=$sorularSonuc[$i]?>").modal('hide');
        },
        error: function(){
            alert("Error");
        }
    });
        return false;
    });
  });
</script>
<!-- GERİBİLDİRİM Js Kodu -->


<?php } 
}
?>



<?php require_once('include/footer.php'); ?>