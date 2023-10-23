<?php
header("Content-type: text/javascript; charset=utf-8");
date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME, 'tr_TR.UTF-8');
setlocale(LC_ALL,'turkish');
$hedefzaman="2023-09-09T04:55:00"; //standart iyidir - yıl 4 diğerleri 2 hane yıl-ay-gün-\saatdilimi saat:dakika:saniye
?>
//* ibrahimay.net *//
var simdi = '<?php echo floor(microtime(true)*1000); ?>';
var gelecek = new Date(<?php echo $hedefzaman; ?>).getTime();
var aradakifark = new Date(gelecek-simdi);
function sayacgoster()
{
  var days = Math.floor(aradakifark / (1000 * 60 * 60 * 24));
  var hours = Math.floor((aradakifark % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((aradakifark % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((aradakifark % (1000 * 60)) / 1000);
  aradakifark.setSeconds(aradakifark.getSeconds() - 1);
    girismetni='<font class="onyazi"></font>';
    metinsonu='<font class="sonyazi"></font>';
    if(days <= 0){ gunyaz=''; } else {gunyaz='<font class="gun">' + days + '</font>';}
    if(hours <= 0){ saatyaz=''; } else {saatyaz='<font class="saat">' + hours + '</font>';}
    if(minutes <= 0){ dakikayaz=''; } else {dakikayaz='<font class="dakika">' + minutes + '</font>';}
    if(seconds <= 0){ saniyeyaz=''; } else {saniyeyaz='<font class="saniye">' + seconds + '</font>';}
    document.getElementById('dinamiksayac').innerHTML = girismetni + gunyaz + saatyaz + dakikayaz + saniyeyaz + metinsonu;
    if (aradakifark < 0) {document.getElementById('dinamiksayac').innerHTML = '<font class="sayacdurdu"></font>'; clearInterval(sayacg);}
}
clearInterval(sayacg);
var sayacg= setInterval(sayacgoster, 1000);
document.getElementById('dinamiksayac').style.cssText += 'cursor:pointer';
document.getElementById('dinamiksayac').title = 'ibrahimay.net hizmetidir. İbrahim AY';
//* ibrahimay.net *//