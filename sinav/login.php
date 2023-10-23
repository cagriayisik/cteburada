<?php
require_once('include/headerUP.php');

//* Kullanıcı çıkış butonuna basmış ise;
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location:../index.php");
    exit;
}
///////////////////////////////////////



//* Kullanıcı giriş butonuna basmış ise;

if (isset($_POST["kullanici"]) && isset($_POST["sifre"])) {

    $sifre1Md5=md5($_POST["sifre"]);
    // Kullanıcı adı ve şifre veritabanında var mı kontrol et
    $stmt = $db->prepare("SELECT * FROM uyeler WHERE kullanici = ? AND sifre = ?");
    $stmt->bind_param("si", $_POST["kullanici"], $sifre1Md5);
    $stmt->execute();
    $result = $stmt->get_result();

    // Doğru kullanıcı adı ve şifre girildiyse - sorgudan gelen satır sayısı 1 ise
    if ($result->num_rows == 1) {

         $row = $result->fetch_assoc();

         // Kullanıcının (Aktif-Pasif)Durumunu Kontrol Edelim.
         if ($row['durumu']==1) {
            
            // SESSION Oturumu başlat
            $_SESSION["kullanici"] = $_POST["kullanici"];
            $_SESSION["sifre"] = md5($_POST["sifre"]);            
            
            // Girişe izin ver
            header("Location:index.php");
            exit;
        }
        else {
            header("Location:login.php?onaysiz_hesap");
            exit;
        }
    } 
    else {        

        // Hatalı giriş yapıldı, hata mesajı göster
        header("Location:login.php?hatali_girdi");
        exit;
    }
}

///////////////////////////////////////////////////////



//* Kullanıcı üye kayıt formu kısmında Kaydet butonuna basmış ise;
if (isset($_POST["uyekaydet"])) {
    $sifreMd5=md5($_POST["sifre1"]);

    $tarih = time();
    $uyeekleme=$db->query("INSERT INTO uyeler (kullanici, sifre, ad_soyad, unvan, kurumu, admin, durumu, kayit_zamani) 
        VALUES ('{$_POST["kullanici1"]}', '$sifreMd5', '{$_POST["ad_soyad"]}', '{$_POST["unvan"]}', '{$_POST["kurumu"]}', '0', '0', $tarih )");

        if (!$uyeekleme) {
            header("Location:login.php?basarisiz_kayit");
            exit;
        }
        else {
            header("Location:login.php?basarili_kayit");
            exit;                                  
        }      
    }
///////////////////////////////////////


    ?>


    <!-- ===== Login & Signup CSS ===== -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <div class="container">
        <div align="center"><a href="../"><img src="assets/img/login.png" class="mt-3" style="height: 120px; align-items: center;" alt="logo"></a>
            <br>
            <h2 class="mt-3 font-weight-bold text-danger">GÖREVDE YÜKSELME SINAVI HAZIRLIK SİSTEMİ</h2>
        </div>
        <hr>

        <div class="forms">
            <div class="form login">
                <span class="title">Giriş Ekranı</span>

                <?php //Uyarıları ekrana yazdırma alanı.

                //* Kullanıcı adı veya şifre hatalı girilmiş ise;
                if (isset($_GET["hatali_girdi"])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-2 text-center" role="alert">
                    Kullanıcı Adı veya Şifre Hatalı..!</div>                
                <?php }

                //* Hesap henüz onaylanmamış ise;
                if (isset($_GET["onaysiz_hesap"])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show mt-2 text-center" role="alert">
                    Üyeliğiniz Henüz Onaylanmadı..!</div>
                <?php } 

                //* Kullanıcı kaydı başarılı ise;
                if (isset($_GET["basarili_kayit"])) { ?>
                    <div class="alert alert-success alert-dismissible fade show mt-2 text-center" role="alert">
                    Üye Kaydınız Başarıyla Oluşturuldu...!</div>
                <?php }

                //* Kullanıcı kaydı sırasında veritabanı hatası oluşmuş ise;
                if (isset($_GET["basarisiz_kayit"])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-2 text-center" role="alert">
                    Hata: Üye Kaydınız Yapılamadı...!</div>
                <?php } 

                ?>

                <form action="login.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="kullanici" placeholder="Kullanıcı adınızı giriniz..." required>
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>

                    <div class="input-field">
                        <input type="password" class="password" name="sifre" placeholder="Şifrenizi giriniz..." required>
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <i class="fa fa-eye-slash showHidePw" aria-hidden="true"></i>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="girisyap" value="Giriş Yap">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Üye Değil misiniz?
                        <a href="#" class="text signup-link">Kayıt Ol</a>
                    </span>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Kayıt Ekranı</span>

                <form action="login.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="kullanici1" placeholder="Kullanıcı adını giriniz..." required>
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>

                    <div class="input-field">
                        <input type="password" class="password" name="sifre1" placeholder="Şifrenizi giriniz..." required>
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <i class="fa fa-eye-slash showHidePw" aria-hidden="true"></i>
                    </div>

                    <div class="input-field">
                        <input type="text" name="ad_soyad" placeholder="Adınız ve Soyadınız" required>
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                    </div>

                    <div class="input-field">
                        <input type="text" name="unvan" placeholder="Unvanınız" required>
                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                    </div>

                    <div class="input-field">
                        <input type="text" name="kurumu" placeholder="Çalıştığınız Kurumun Adı" required>
                        <i class="fa fa-university" aria-hidden="true"></i>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="uyekaydet" value="Kaydet">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Zaten Üye misiniz?
                        <a href="#" class="text login-link">Giriş Yap</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>

