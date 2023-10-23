<?php
ob_start();
session_start();
require_once('database.php');

$girisVarmi = false;

if (isset($_SESSION["kullanici"]) && isset($_SESSION["sifre"])) {
    $hesapVarmi = $db->query("SELECT id FROM uyeler WHERE kullanici = '{$_SESSION["kullanici"]}' AND sifre = '{$_SESSION["sifre"]}'");
    
    if ($hesapVarmi->num_rows != 0) {
        $girisVarmi = true;
        $userID = $hesapVarmi->fetch_row()[0];
    }
}
else {
    header("Location:login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>
        <?php echo $baslik; ?> - CTE Burada
    </title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Sınav.php - MultiSelect için-->
    <link rel="stylesheet" href="assets/css/multiple-select.min.css" type="text/css">    
    
    <!-- SweetAlert CSS: -->
    <script type="text/javascript" src="assets/js/sweetalert2.all.min.js"></script>

    <!-- CKeditor Eklentisi Js: -->
    <script type="text/javascript" src="assets/vendor/ckeditor5/build/ckeditor.js"></script>


</head>
<?php if ($girisVarmi) { ?>
    <body id="page-top" onload="sayac()">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="z-index:1000;">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon">
                        <lottie-player src="assets/img/home.json"  background="transparent"  speed="1"  style="width: 72px; height: 100%;"  loop  autoplay></lottie-player>
                        
                    </div>
                    <div class="sidebar-brand-text mx-3">CTE <span class="text-warning">Burada</span></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0" />
                <div align="center" class="py-3"><img src="assets/img/login.png" style="height:130px; width: 110px;"></div>
                <hr class="sidebar-divider my-0" />

                
                <li class="nav-item<?=($baslik == "Anasayfa" ? " active" : "") ?>">
                    <a class="nav-link" href="index.php">
                        
                        <span style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, .5), 0 6px 50px 0 rgba(0, 0, 0, 0.5);" class="btn btn-<?=($baslik == "Anasayfa" ? "warning text-primary font-weight-bold" : "light") ?>">Anasayfa</span>
                    </a>
                </li>
                
                <li class="nav-item<?=($baslik == "Sınav" ? " active" : "") ?>">
                    <a class="nav-link" href="sinav.php">
                        
                        <span style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, .5), 0 6px 50px 0 rgba(0, 0, 0, 0.5);" class="btn btn-<?=($baslik == "Sınav Salonu" ? "warning text-primary font-weight-bold" : "light") ?>">Sınav Salonu</span>
                    </a>
                </li>

                <li class="nav-item<?=($baslik == "Soru Gönder" ? " active" : "") ?>">
                    <a class="nav-link" href="soruGonder.php">
                        
                        <span style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, .5), 0 6px 50px 0 rgba(0, 0, 0, 0.5);" class="btn btn-<?=($baslik == "Soru Gönder" ? "warning text-primary font-weight-bold" : "light") ?>">Soru Gönder</span>
                    </a>
                </li>

                <li class="nav-item<?=($baslik == "Mevzuat" ? " active" : "") ?>">
                    <a class="nav-link" href="mevzuat.php">
                        
                        <span style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, .5), 0 6px 50px 0 rgba(0, 0, 0, 0.5);" class="btn btn-<?=($baslik == "Mevzuat" ? "warning text-primary font-weight-bold" : "light") ?>">Mevzuat</span>
                    </a>
                </li>

                <hr class="sidebar-divider d-none d-md-block mb-5">

                <?php
                $adminMi = $db->query("SELECT id FROM uyeler WHERE kullanici = '{$_SESSION['kullanici']}' AND sifre = '{$_SESSION['sifre']}' AND admin = 1");
                if ($adminMi->num_rows != 0) { ?>
                    <li class="nav-item<?=($baslik == "Admin Paneli" ? " active" : "") ?>">
                        <a class="nav-link" href="admin.php">
                            
                            <span style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, .5), 0 6px 50px 0 rgba(0, 0, 0, 0.5);" class="btn btn-<?=($baslik == "Admin Paneli" ? "warning text-primary font-weight-bold" : "light") ?>">Admin Paneli</span>
                        </a>
                    </li>
                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="login.php?logout">
                        
                        <span style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, .5), 0 6px 50px 0 rgba(0, 0, 0, 0.5);" class="btn btn-light"><i class="fas fa-fw fa-sign-out-alt text-danger"></i> Çıkış Yap</span>
                    </a>
                </li>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="text-center d-none d-md-inline">
                    <button class="rounded border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

        <?php }  ?>



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">



                <!-- NAVBAR BAŞLANGIÇ -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <h1 class="h3 mb-0 text-gray-800">
                        <i class="fa fa-podcast" aria-hidden="true"></i>
                        <?php echo $baslik;  ?>
                    </h1>                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if (isset($_SESSION['kullanici'])) {                                                           
                                    $adSoyadcek = $db->query("SELECT ad_soyad From uyeler Where kullanici= '{$_SESSION['kullanici']}' ")->fetch_row()[0];
                                    $unvancek = $db->query("SELECT unvan From uyeler Where kullanici= '{$_SESSION['kullanici']}' ")->fetch_row()[0];
                                    $kayitcek = $db->query("SELECT kayit_zamani From uyeler Where kullanici= '{$_SESSION['kullanici']}' ")->fetch_row()[0];
                                }
                                else { 
                                    $adSoyadcek='';
                                    $unvancek=date('d/m/Y');
                                    $kayitcek='';
                                }
                                ?>
                                
                                <span class="h5 mt-2 font-weight-bold text-gray-800"><?php echo $adSoyadcek; ?></span>
                                <span class="ml-2 text-gray-600">[ <?php echo $unvancek;?> ]</span>
                                <div class="topbar-divider d-none d-sm-block"></div>
                                <img class="img-profile rounded-circle" src="assets/img/TC.png">                                
                            </a>


                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow-lg animated--grow-in" aria-labelledby="userDropdown">


                                <div class="container-fluid">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <div><img class="img-profile rounded-circle m-3" width="55" src="assets/img/avatar.png"></div>
                                        </div>

                                        <div class="col-8">
                                            <div class="text-dark font-weight-bold ml-3 mt-3" style="font-size: 1.30rem;"><?php echo $adSoyadcek; ?></div>
                                            <div class="text-dark font-weight-bold ml-3 font-italic" style="font-size: 1rem;"><?php echo $unvancek;?></div>
                                        </div>
                                    </div>

                                    <div class="col-12" align="center"><strong>Kayıt Tarihi:</strong> <?php echo date("d.m.Y - h:i", $kayitcek);?></div>
                                </div>

                                <div class="dropdown-divider mb-4"></div>

                                <?php
                                // Başarı yüzdesinin hesaplanabilmesi için gerekli sayıları çeker
                                if (isset($userID)) {
                                    $isaretlemeler = $db->query("SELECT * FROM isaretlemeler WHERE uye_id = $userID");
                                    $dogrular = 0;
                                    $yanlislar = 0;

                                    while ($isaret = $isaretlemeler->fetch_assoc()) {
                                        $dogruCevap = $db->query("SELECT dogru_cevap FROM sorular WHERE id = {$isaret["soru_id"]}")->fetch_row()[0];
                                        $isaretlenen = $isaret["cevap"];

                                        if ($dogruCevap == $isaretlenen)
                                            { $dogrular++; }
                                        else { $yanlislar++; }
                                    }

                                    if ($dogrular + $yanlislar!=0)
                                        { $basari=(100*$dogrular)/($dogrular + $yanlislar); } 
                                    else { $basari=0; $dogrular = 0; $yanlislar = 0; }
                                }
                                // Başarı yüzdesinin hesaplanabilmesi için gerekli sayıları çeker
                                ?>

                                <div class="col">
                                    <div class="text-xs font-weight-bold text-info mb-1 text-center">BAŞARI YÜZDESİ</div>
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-center"><?= "%". round($basari)?></div>
                                    <div class="row no-gutters align-items-center">                                        
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?=$basari?>%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil Bilgilerim
                                </a>

                                <form action="uyeduzenle.php" method="post">
                                    <input type="text" hidden name="uyeID" value="<?=$userID?>">
                                    <button type="submit" class="dropdown-item" name="duzenleUye"><i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil Bilgilerimi Düzenle</button>                                
                                </form>                              

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php?logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Çıkış Yap
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- NAVBAR BİTİŞ -->


                <!-- Begin Page Content -->
                <div class="container-fluid" style="margin-top: 30px;">
                    <!-- Page Heading -->
