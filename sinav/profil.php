<?php

$baslik = "Profilim";
require_once('include/header.php');

?>

<div style="display:flex;justify-content:space-between;margin-bottom:20px;">    


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Başarı Yüzdesi
                        </div>
                        
                        <div class="row no-gutters align-items-center">
                            <div class="d-flex flex-row h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <div>%</div>
                                <div class="counter"><?=round($basari)?></div>
                            </div>
                            <div class="col">
                                <div class="progress progress  mr-2">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 0%"  aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chart-line fa-3x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Progress Bar'ın animasyonu için        
        $(".progress-bar").animate({
            width: "<?=$basari?>%",
        }, 2000);
    </script>



    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2" style="background-image: url(assets/img/arkaplan.jpg)">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h3 mb-0 font-weight-bold text-gray-900 counter">
                            <?=($dogrular + $yanlislar)?>
                        </div>
                        <div class="font-weight-bold text-dark text-uppercase mb-1">Çözülen Toplam Soru Sayısı</div>                        
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-sitemap fa-3x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2" style="background-image: url(assets/img/arkaplan.jpg)">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h3 mb-0 font-weight-bold text-gray-900 counter">
                            <?=($dogrular)?>
                        </div>
                        <div class="font-weight-bold text-dark text-uppercase mb-1">Doğru Cevap Sayısı</div>                        
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-check fa-3x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2" style="background-image: url(assets/img/arkaplan.jpg)">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h3 mb-0 font-weight-bold text-gray-900 counter">
                            <?=($yanlislar)?>
                        </div>
                        <div class="font-weight-bold text-dark text-uppercase mb-1">Yanlış Cevap Sayısı</div>                        
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-check fa-3x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<div class="card shadow mb-5">
    <div class="card-header py-3 d-flex justify-content-between">
        <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-edit"></i> Yanlış Çözülen Sorular</h4>            
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="12%">Çözüm Tarihi</th>
                        <th width="48%">Kategori</th>
                        <th width="10%" class="text-center">Soru ID</th>
                        <th width="15%">Soruyu Yazan</th>                       
                        <th width="15%">İşlem</th>                                                
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $isaretlemeler = $db->query("SELECT * FROM isaretlemeler WHERE uye_id = $userID Order By id DESC");

                    while ($isaretleme = $isaretlemeler->fetch_assoc()) {

                        $soru = $db->query("SELECT * FROM sorular WHERE id = {$isaretleme["soru_id"]}")->fetch_assoc();
                        $kategoriAdi = $db->query("SELECT isim FROM kategoriler WHERE id = {$soru["kategori"]}")->fetch_row()[0];

                        if ($soru["dogru_cevap"] != $isaretleme["cevap"]) {     // Sadece yanlış cevaplamaları gösterir.

                            echo '
                            <tr>
                            <td align="center">'.date("d.m.Y H:i", $isaretleme["tarih"]).'</td>

                            <td>'.$kategoriAdi.'</td>

                            <td class="text-center">'.$soru['id'].'</td>

                            <td>'.$soru['soruyu_yazan'].'</td>
                            
                            <td class="text-center">                                    
                            <button data-toggle="modal" data-target="#soruModal-'.$soru['id'].'" class="btn btn-primary" tabindex="0">
                            <span><i class="fas fa-eye"></i> Soruyu Göster</span>
                            </button>                                    
                            </td>                            
                            
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mb-5"><p>&nbsp;&nbsp;&nbsp;</p></div>


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



<?php 
$isaretlemeler = $db->query("SELECT * FROM isaretlemeler WHERE uye_id = $userID Order By id DESC");
while ($isaretleme = $isaretlemeler->fetch_assoc()) {
    $soru = $db->query("SELECT * FROM sorular WHERE id = {$isaretleme["soru_id"]}")->fetch_assoc();
    ?>


    <!-- SORU GÖSTERME MODAL -->
    <div id="soruModal-<?=$soru['id']?>" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">                
                    <h3 class="text-danger font-weight-bold">SORU ID: <?=$soru['id']?></h3>
                    <a class="close" data-dismiss="modal">&times;</a>
                </div>            
                <div class="modal-body">

                    <div class="alert alert-info text-lg text-justify"><b>SORU: </b>                     
                       <span><?=htmlspecialchars_decode($soru['soru'])?></span><hr>
                       <input type="hidden" name="soru-id" value="131">

                       <div class="col-md-12 form-group">
                        <label class="btn btn-light
                        <?php if($soru['dogru_cevap']=='a') {echo 'alert-success';} elseif($isaretleme['cevap']=='a') {echo 'alert-danger';} ?>">
                        <input disabled type="radio" name="cevap-soru" value="a" required=""> <b>A)</b> <?=$soru['a']?>
                    </label>
                </div>

                <div class="col-md-12 form-group">
                    <label class="btn btn-light
                    <?php if($soru['dogru_cevap']=='b') {echo 'alert-success';} elseif($isaretleme['cevap']=='b') {echo 'alert-danger';} ?>">
                    <input disabled type="radio" name="cevap-soru" value="b" required=""> <b>B)</b> <?=$soru['b']?></label>
                </div>

                <div class="col-md-12 form-group">
                    <label class="btn btn-light
                    <?php if($soru['dogru_cevap']=='c') {echo 'alert-success';} elseif($isaretleme['cevap']=='c') {echo 'alert-danger';} ?>">
                    <input disabled type="radio" name="cevap-soru" value="c" required=""> <b>C)</b> <?=$soru['c']?></label>
                </div>

                <div class="col-md-12 form-group">
                    <label class="btn btn-light
                    <?php if($soru['dogru_cevap']=='d') {echo 'alert-success';} elseif($isaretleme['cevap']=='d') {echo 'alert-danger';} ?>">
                    <input disabled type="radio" name="cevap-soru" value="d" required=""> <b>D)</b> <?=$soru['d']?></label>
                </div>

                <hr>


                <div class="d-flex">
                  <div class="p-0"><badge class="badge alert-success mr-2"><?=strtoupper($soru['dogru_cevap'])?><br>Doğru Cevap</badge></div>
                  <div class="p-0"><badge class="badge alert-danger"><?=strtoupper($isaretleme['cevap'])?><br>İşaretlenen</badge></div>
                  <div class="ml-auto p-0"><div class="btn btn-danger text-white">Hazırlayan: <span class="badge bg-dark ml-auto"><?=$soru['soruyu_yazan']?></span></div></div>
              </div>

        </div>
        <label class="m-2 p-1 alert alert-dark text-justify"><b>Açıklama:</b> <?=htmlspecialchars_decode($soru['aciklama'])?></label>
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