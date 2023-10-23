<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'sinirli_root');
define('DB_PASS', 'sinirli_12345678');
define('DB_NAME', 'sinav');


try {
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $db->set_charset("utf8");
    date_default_timezone_set('Europe/Istanbul');
}


catch (Exception $e) {
    // Hata mesajında sadece genel bir mesaj gösterilir
    echo "Bağlantı hatası! Lütfen daha sonra tekrar deneyiniz.";
    
    // Hata kayıt işlemi yapılır
    error_log("Veritabanı bağlantı hatası: " . $e->getMessage());
    
    // Uygulama sonlandırılır
    exit;
}

?>