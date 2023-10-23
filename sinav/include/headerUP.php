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
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>CTE Burada</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>

</head>
