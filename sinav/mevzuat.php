<?php

$baslik = "Mevzuat";
require_once('include/header.php');

?>


<!-- Button Alanı -->
<div align="center">

  <button class="btn btn-danger mr-4 mb-3 toggle-button" data-div="div1">
    <table>
      <tr>
        <td rowspan="2"><lottie-player src="assets/img/kanun.json"  background="transparent"  speed="1"  style="width: 70px; height: 100%;"  loop  autoplay></lottie-player></td>
        <td class="font-weight-bold" style="font-size: 1.69rem;">Kanunlar</td>
    </tr>
    <tr>
        <td class="text-light font-weight-bold">Kanun Sayısı: <span class="badge badge-dark" style="font-size:1rem;">19</span></td>
    </tr>
</table>            
</button>


<button class="btn btn-secondary mr-4 mb-3 toggle-button" data-div="div2">
    <table>
      <tr>
        <td rowspan="2"><lottie-player src="assets/img/kanun1.json"  background="transparent"  speed="1"  style="width: 70px; height: 100%;"  loop  autoplay></lottie-player></td>
        <td class="font-weight-bold" style="font-size: 1.69rem;">C.Başkanı Kararnameleri</td>
    </tr>
    <tr>
        <td class="text-light font-weight-bold">Kararname Sayısı: <span class="badge  badge-dark" style="font-size:1rem;">2</span></td>
    </tr>
</table>            
</button>


<button class="btn btn-primary mr-4 mb-3 toggle-button" data-div="div3">
    <table>
      <tr>
        <td rowspan="2"><lottie-player src="assets/img/kanun.json"  background="transparent"  speed="1"  style="width: 70px; height: 100%;"  loop  autoplay></lottie-player></td>
        <td class="font-weight-bold" style="font-size: 1.69rem;">Yönetmelikler</td>
    </tr>
    <tr>
        <td class="text-light font-weight-bold">Yönetmelik Sayısı: <span class="badge  badge-dark" style="font-size:1rem;">28</span></td>
    </tr>
</table>            
</button>


<button class="btn btn-dark mr-4 mb-3 toggle-button" data-div="div4">
    <table>
      <tr>
        <td rowspan="2"><lottie-player src="assets/img/kanun1.json"  background="transparent"  speed="1"  style="width: 70px; height: 100%;"  loop  autoplay></lottie-player></td>
        <td class="font-weight-bold" style="font-size: 1.69rem;">Genelgeler</td>
    </tr>
    <tr>
        <td class="text-light font-weight-bold">Genelge Sayısı: <span class="badge  badge-light" style="font-size:1rem;">18</span></td>
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
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
          <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-tags" aria-hidden="true"></i> Kanunlar</h4>
      </div>

      <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Sayı</th>
                  <th>Türü</th>
                  <th>Mevzuat Adı</th>              
              </tr>
          </thead>
          <tbody>
            <tr>
                <td><strong>2709</strong></td>
                <td><strong>Anayasa</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.2709.pdf" target="_blank">Türkiye Cumhuriyeti Anayasası</a></td>
            </tr>
            <tr>
                <td><strong>657</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="https://www.mevzuat.gov.tr/MevzuatMetin/1.5.657.pdf" target="_blank" class="text-danger font-weight-bold">Devlet Memurları Kanunu</a></td>
            </tr>
            <tr>
                <td><strong>1721</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.3.1721.pdf" target="_blank">Hapishane ve Tevkifhanelerin İdaresi Hakkında Kanun</a></td>
            </tr>
            <tr>
                <td><strong>2548</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="https://www.mevzuat.gov.tr/MevzuatMetin/1.3.2548.pdf" target="_blank">Ceza Evleriyle Mahkeme Binaları İnşası Karşılığı Olarak Alınacak Har&ccedil;lar Ve Mahk&uuml;mlara &Ouml;dettirilecek Yiyecek Bedelleri Hakkında Kanun</a></td>
            </tr>
            <tr>
                <td><strong>2802</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.2802.pdf" target="_blank">Hakimler ve Savcılar Kanunu</a></td>
            </tr>
            <tr>
                <td><strong>3713</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.3713.pdf" target="_blank" class="text-danger font-weight-bold">Ter&ouml;rle M&uuml;cadele Kanunu</a></td>
            </tr>
            <tr>
                <td><strong>4301</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.4301.pdf" target="_blank">Ceza İnfaz Kurumları İle Tutukevleri İşyurtları Kurumuna İlişkin Bazı Mali H&uuml;k&uuml;mlerin D&uuml;zenlenmesi Hakkında Kanun</a></td>
            </tr>
            <tr>
                <td><strong>4675</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.4675.pdf" target="_blank" class="text-danger font-weight-bold">İnfaz Hakimliği Kanunu</a></td>
            </tr>
            <tr>
                <td><strong>4681</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.4681.pdf" target="_blank">Ceza İnfaz Kurumları ve Tutukevleri İzleme Kurulları Kanunu</a></td>
            </tr>
            <tr>
                <td><strong>4769</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.4769.pdf" target="_blank">Ceza İnfaz Kurumları ve Tutukevleri Eğitim Merkezleri Kanunu</a></td>
            </tr>
            <tr>
                <td><strong>5237</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.5237.pdf" target="_blank" class="text-danger font-weight-bold">T&uuml;rk Ceza Kanunu</a></td>
            </tr>
            <tr>
                <td><strong>5252</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.5252.pdf" target="_blank">T&uuml;rk Ceza Kanununun Y&uuml;r&uuml;rl&uuml;l&uuml;k ve Uygulama Şekli Hakkında Kanun</a></td>
            </tr>
            <tr>
                <td><strong>5271</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.5271.pdf" target="_blank" class="text-danger font-weight-bold">Ceza Muhakemesi Kanunu</a></td>
            </tr>
            <tr>
                <td><strong>5275</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.5275.pdf" target="_blank" class="text-danger font-weight-bold">Ceza ve G&uuml;venlik Tedbirlerinin İnfazı Hakkında Kanun</a></td>
            </tr>
            <tr>
                <td><strong>5320</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.5320.pdf" target="_blank">Ceza Muhakemesi Kanununun Y&uuml;r&uuml;rl&uuml;l&uuml;k ve Uygulama Şekli Hakkında Kanun</a></td>
            </tr>
            <tr>
                <td><strong>5326</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.5326.pdf" target="_blank">Kabahatler Kanunu</a></td>
            </tr>
            <tr>
                <td><strong>5352</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.5352.pdf" target="_blank">Adli Sicil Kanunu</a></td>
            </tr>
            <tr>
                <td><strong>5395</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.5395.pdf" target="_blank">&Ccedil;ocuk Koruma Kanunu</a></td>
            </tr>
            <tr>
                <td><strong>5402</strong></td>
                <td><strong>Kanun</strong></td>
                <td><a href="http://www.mevzuat.gov.tr/MevzuatMetin/1.5.5402.pdf" target="_blank">Denetimli Serbestlik ve Yardım Merkezleri ile Koruma Kurulları Kanunu</a></td>
            </tr>        
        </tbody>
    </table>
</div>
</div>
</div>
</div>









<div class="box" id="div2">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
          <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-tags" aria-hidden="true"></i> Cumhurbaşkanlığı Kararnameleri</h4>
      </div>

      <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Sayı</th>
                  <th>Türü</th>
                  <th>Mevzuat Adı</th>              
              </tr>
          </thead>
          <tbody>        
            <tr>
                <td><strong>1</strong></td>
                <td><strong>Cumhurbaşkanlığı Kararnameleri</strong></td>
                <td><a href="https://www.mevzuat.gov.tr/MevzuatMetin/19.5.1.pdf" target="_blank">Cumhurbaşkanlığı Teşkilatı Hakkında Cumhurbaşkanlığı Kararnamesi</a></td>
            </tr>
            <tr>
                <td><strong>4</strong></td>
                <td><strong>Cumhurbaşkanlığı Kararnameleri</strong></td>
                <td><a href="https://www.mevzuat.gov.tr/MevzuatMetin/19.5.4.pdf" target="_blank" class="text-danger font-weight-bold">Bakanlıklara Bağlı, İlgili, İlişkili Kurum ve Kuruluşlar İle Diğer Kurum ve Kuruluşların Teşkilatı Hakkında Cumhurbaşkanlığı Kararnamesi</a></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>
</div>








<div class="box" id="div3">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
          <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-tags" aria-hidden="true"></i> Yönetmelikler</h4>
      </div>

      <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover"  width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>Tarih</th>
                    <th>Türü</th>
                    <th>Mevzuat Adı</th>             
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>28.05.1981</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.6913&amp;MevzuatIliski=0&amp;sourceXmlSearch=ceza%20infaz" target="_blank">Ceza İnfaz Kurumları İle Tevkifevlerinde G&ouml;rev Yapan Personelin &Ouml;d&uuml;llendirilmesine Dair Y&ouml;netmelik</a></td>
                </tr>
                <tr>
                    <td><strong>1.11.1997</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.5007&amp;MevzuatIliski=0&amp;sourceXmlSearch=Ceza%20İnfaz%20Kurumları%20ile%20Tutukevleri%20Kontrolörleri%20Yönetmeliği" target="_blank">Adalet Bakanlığı Ceza İnfaz Kurumları ile Tutukevleri Kontrol&ouml;rleri Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>7.08.2001</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.5027&amp;MevzuatIliski=0&amp;sourceXmlSearch=Ceza%20İnfaz%20Kurumları%20ve%20Tutukevleri%20İzleme%20Kurulları%20Yönetmeliği" target="_blank">Ceza İnfaz Kurumları ve Tutukevleri İzleme Kurulları Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>10.07.2003</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.5015&amp;MevzuatIliski=0&amp;sourceXmlSearch=Memur%20Sınav,%20Atama%20ve%20Nakil%20Yönetmeliği" target="_new">Adalet Bakanlığı Memur Sınav, Atama ve Nakil Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>4.05.2004</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.9479&amp;MevzuatIliski=0&amp;sourceXmlSearch=Ceza%20İnfaz%20Kurumları%20ve%20Tutukevleri%20Personeli%20Eğitim%20Merkezleri%20Kuruluş,%20Görev%20ve%20Çalışma%20Yönetmeliğ" target="_blank">Ceza İnfaz Kurumları ve Tutukevleri Personeli Eğitim Merkezleri Kuruluş, G&ouml;rev ve &Ccedil;alışma Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>4.05.2004</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.5031&amp;MevzuatIliski=0&amp;sourceXmlSearch=Ceza%20İnfaz%20Kurumları%20ve%20Tutukevleri%20Personeli%20Hizmet%20İçi%20Eğitim%20Yönetmeliği" target="_blank">Ceza İnfaz Kurumları ve Tutukevleri Personeli Hizmet İ&ccedil;i Eğitim Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>4.05.2004</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.9478&amp;MevzuatIliski=0&amp;sourceXmlSearch=Ceza%20İnfaz%20Kurumları%20ve%20Tutukevleri%20%20Aday%20Memurları%20Yetiştirme%20Yönetmeliği" target="_blank">Ceza İnfaz Kurumları ve Tutukevleri Aday Memurları Yetiştirme Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>4.05.2004</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.5030&amp;MevzuatIliski=0&amp;sourceXmlSearch=Ceza%20İnfaz%20Kurumları%20ve%20Tutukevleri%20Hizmet%20Öncesi%20Eğitim%20Yönetmeliği" target="_blank">Ceza İnfaz Kurumları ve Tutukevleri Hizmet &Ouml;ncesi Eğitim Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>5.07.2004</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.9480&amp;MevzuatIliski=0&amp;sourceXmlSearch=Ceza%20İnfaz%20Kurumları%20ve%20Tutukevleri%20Personeli%20Eğitim%20Merkezleri%20Öğrenci%20Disiplin,%20Disiplin%20Kurulları" target="_blank">Ceza İnfaz Kurumları ve Tutukevleri Personeli Eğitim Merkezleri &Ouml;ğrenci Disiplin, Disiplin Kurulları ve Disiplin Amirleri Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>5.07.2004</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.6124&amp;MevzuatIliski=0&amp;sourceXmlSearch=Ceza%20İnfaz%20Kurumları%20ve%20Tutukevleri%20Personeli%20Eğitim%20Merkezleri%20öğrenci%20Sicil,%20Sicil%20Amirleri%20ve%20Ödü" target="_blank">Ceza İnfaz Kurumları ve Tutukevleri Personeli Eğitim Merkezleri &Ouml;ğrenci Sicil, Sicil Amirleri ve &Ouml;d&uuml;l Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>17.06.2005</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.8344&amp;MevzuatIliski=0&amp;sourceXmlSearch=Ceza%20İnfaz%20Kurumlarında%20Bulundurulabilecek%20Eşya%20ve%20Maddeler%20Hakkında%20Yönetmelik" target="_blank" class="text-danger font-weight-bold">Ceza İnfaz Kurumlarında Bulundurulabilecek Eşya ve Maddeler Hakkında Y&ouml;netmelik</a></td>
                </tr>
                <tr>
                    <td><strong>29.12.2020</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="https://www.mevzuat.gov.tr/mevzuat?MevzuatNo=36118&amp;MevzuatTur=7&amp;MevzuatTertip=5" target="_blank" class="text-danger font-weight-bold">G&ouml;zlem ve Sınıflandırma Merkezleri İle H&uuml;k&uuml;ml&uuml;lerin Değerlendirilmesine Dair Y&ouml;netmelik</a></td>
                </tr>
                <tr>
                    <td><strong>17.06.2005</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.8345&amp;MevzuatIliski=0&amp;sourceXmlSearch=Hükümlü%20ve%20Tutukluların%20Ziyaret%20Edilmeleri%20Hakkında%20Yönetmelik" target="_blank" class="text-danger font-weight-bold">H&uuml;k&uuml;ml&uuml; ve Tutukluların Ziyaret Edilmeleri Hakkında Y&ouml;netmelik</a></td>
                </tr>
                <tr>
                    <td><strong>13.07.2005</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.9064&amp;MevzuatIliski=0&amp;sourceXmlSearch=Hükümlü%20ve%20Tutukluların%20Emanete%20Alınan%20Kişisel%20Paralarının%20Kullanımına%20Dair%20Yönetmelik" target="_blank" class="text-danger font-weight-bold">H&uuml;k&uuml;ml&uuml; ve Tutukluların Emanete Alınan Kişisel Paralarının Kullanımına Dair Y&ouml;netmelik</a></td>
                </tr>
                <tr>
                    <td><strong>26.10.2005</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.9568&amp;MevzuatIliski=0&amp;sourceXmlSearch=Hukumlu%20ve%20Tutuklular%20ile%20Ceza%20infaz%20Kurumlari" target="_blank" class="text-danger font-weight-bold">H&uuml;k&uuml;ml&uuml; ve Tutuklular ile Ceza İnfaz Kurumları Personelinin İaşe Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>28.10.2005</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.9571&amp;MevzuatIliski=0&amp;sourceXmlSearch=Ceza%20İnfaz%20Kurumları%20Personeli%20Görevde%20Yükselme%20ve%20Ünvan%20Değişikliği%20Yönetmeliği" target="_blank">Ceza ve Tevkifevleri Genel M&uuml;d&uuml;rl&uuml;ğ&uuml; Personeli G&ouml;revde Y&uuml;kselme ve Unvan Değişikliği Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>27.12.2005</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.9735&amp;MevzuatIliski=0&amp;sourceXmlSearch=Ceza%20İnfaz%20Kurumları%20ile%20Tutukevleri%20İşyurtları%20Kurumu%20Ve%20İşyurtlarının%20İdare%20ve%20İhale%20Yönetmeliği" target="_blank" class="text-danger font-weight-bold">Ceza İnfaz Kurumları ile Tutukevleri İşyurtları Kurumu Ve İşyurtlarının İdare ve İhale Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>29.12.2005</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.9746&amp;MevzuatIliski=0&amp;sourceXmlSearch=Tutukevleri%20Personeli%20Eğitim%20Merkezleri%20Öğrencilerinin%20Kıyafet%20Yönetmeliği" target="_blank">Ceza İnfaz Kurumları Personeli ile Ceza İnfaz Kurumları ve Tutukevleri Personeli Eğitim Merkezleri &Ouml;ğrencilerinin Kıyafet Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>24.12.2006</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.10885&amp;MevzuatIliski=0&amp;sourceXmlSearch=Çocuk%20Koruma%20Kanununun%20Uygulanmasına%20İlişkin%20Usûl%20ve%20Esaslar%20Hakkında%20Yönetmelik" target="_blank">&Ccedil;ocuk Koruma Kanununun Uygulanmasına İlişkin Us&ucirc;l Ve Esaslar Hakkında Y&ouml;netmelik</a></td>
                </tr>
                <tr>
                    <td><strong>2.09.2012</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.16564&amp;MevzuatIliski=0&amp;sourceXmlSearch=Açık%20Ceza%20İnfaz%20Kurumlarına%20Ayrılma" target="_blank" class="text-danger font-weight-bold">Açık Ceza İnfaz Kurumlarına Ayrılma Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>10.11.2021</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="https://www.mevzuat.gov.tr/mevzuat?MevzuatNo=39039&amp;MevzuatTur=7&amp;MevzuatTertip=5" target="_blank">Denetimli Serbestlik Hizmetleri Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>12.03.2013</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.17196&amp;MevzuatIliski=0&amp;sourceXmlSearch=DENETİMLİ%20SERBESTLİK%20MÜDÜR%20VE%20MÜDÜR%20YARDIMCILIĞINA" target="_blank">Denetimli Serbestlik M&uuml;d&uuml;r ve M&uuml;d&uuml;r Yardımcılığına Atama Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>30.03.2013</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.17249&amp;MevzuatIliski=0&amp;sourceXmlSearch=Hükümlü%20ve%20Tutukluların%20Ödüllendirilmesi%20Hakkında%20Yönetmelik" target="_blank" class="text-danger font-weight-bold">H&uuml;k&uuml;ml&uuml; ve Tutukluların &Ouml;d&uuml;llendirilmesi Hakkında Y&ouml;netmelik</a></td>
                </tr>
                <tr>
                    <td><strong>28.06.2013</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.18525&amp;MevzuatIliski=0&amp;sourceXmlSearch=Hükümlü%20ve%20Tutuklulara%20Yakınlarının%20Ölümü%20veya%20Hastalığı%20Nedeniyle%20Verilebilecek%20Mazeret%20İzinlerine" target="_blank" class="text-danger font-weight-bold">H&uuml;k&uuml;ml&uuml; ve Tutuklulara Yakınlarının &Ouml;l&uuml;m&uuml; veya Hastalığı Nedeniyle Verilebilecek Mazeret İzinlerine Dair Y&ouml;netmelik</a></td>
                </tr>
                <tr>
                    <td><strong>26.07.2016</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="http://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.22689&amp;MevzuatIliski=0&amp;sourceXmlSearch=Cinsel%20Dokunulmazlığa%20Karşı%20Suçlardan" target="_blank">Cinsel Dokunulmazlığa Karşı Su&ccedil;lardan H&uuml;k&uuml;ml&uuml; Olanlara Uygulanacak Tedavi ve Diğer Y&uuml;k&uuml;ml&uuml;l&uuml;kler Hakkında Y&ouml;netmelik</a></td>
                </tr>
                <tr>
                    <td><strong>05.04.2017</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="https://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=7.5.23479&amp;MevzuatIliski=0&amp;sourceXmlSearch=Adalet%20Bakanl%C4%B1%C4%9F%C4%B1%20Disiplin" target="_blank" class="text-danger font-weight-bold">Adalet Bakanlığı Disiplin Y&ouml;netmeliği</a></td>
                </tr>
                <tr>
                    <td><strong>29.03.2020</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="https://www.mevzuat.gov.tr/Metin.Aspx?MevzuatKod=21.5.2324&amp;MevzuatIliski=0&amp;sourceXmlSearch= " target="_blank" class="text-danger font-weight-bold">Ceza İnfaz Kurumlanın Y&ouml;netimi ile Ceza ve G&uuml;venlik Tedbirlerinin İnfazı Hakkında Y&ouml;netmelik</a></td>
                </tr>
                <tr>
                    <td><strong>14.09.2021</strong></td>
                    <td><strong>Yönetmelik</strong></td>
                    <td><a href="https://www.mevzuat.gov.tr/mevzuat?MevzuatNo=38931&amp;MevzuatTur=7&amp;MevzuatTertip=5" target="_blank">Ceza ve Tevkifevleri Genel M&uuml;d&uuml;rl&uuml;ğ&uuml; İnfaz ve Koruma Memuru Unvanına Atanacaklarda Aranan Sağlık Şartları Y&ouml;netmeliği</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>







<div class="box" id="div4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
          <h4 class="mb-0 font-weight-bold text-danger"><i class="fa fa-tags" aria-hidden="true"></i> Genelgeler</h4>
      </div>

      <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover"  width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Tarih</th>
                    <th>Türü</th>
                    <th>Mevzuat Adı</th>             
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>172</strong></td>
                    <td><strong>06.01.2020</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/2212020114623172%20genelge.pdf" target="_blank">Ceza İnfaz Kurumlarında Barındırılanların Uluslararası Standartlarda İnsan Hakları Merkezli Sağlığa Erişimi ve Tedavileri, Tedavi Nedeniyle Nakilleri, Ceza Tehiri İşlemleri</a></td>
                </tr>
                <tr>
                    <td><strong>45/1</strong></td>
                    <td><strong>22.01.2007</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019114516cik_nakil.pdf" target="_blank">Ceza İnfaz Kurumlarının Tahsisi, Nakil İşlermleri ve Diğer H&#252;k&#252;mler Hakkında Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>45/2</strong></td>
                    <td><strong>20.12.2016</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/198201911470445-2.pdf" target="_blank">45/1 No.lu Genelgede Değişiklik Yapılmasına Dair Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>46/1</strong></td>
                    <td><strong>01.01.2006</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/198201911532446_1.pdf" target="_blank">Gen&#231; Yetişkin H&#252;k&#252;ml&#252; ve Tutukluların Eğitim ve İyileştirilme İşlemleri ve Diğer H&#252;k&#252;mler Hakkında Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>47</strong></td>
                    <td><strong>01.01.2006</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019115515odenek_kullanimi.pdf" target="_blank">Ceza İnfaz Kurumlarına G&#246;nderilen &#214;deneklerin Kullanımı ve Diğer H&#252;k&#252;mler Hakkında Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>48</strong></td>
                    <td><strong>01.01.2006</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019115632lojman_tahsis.pdf" target="_blank">Ceza İnfaz kurumlarında Lojman Tahsisi ile Yapım ve Onarımlar Hakkında Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>49</strong></td>
                    <td><strong>01.01.2006</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019115725personel_egitim.pdf" target="_blank">Ceza İnfaz Kurumu Personelinin Eğitimi Hakkında Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>50</strong></td>
                    <td><strong>01.01.2006</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019115836disiplin_suclari.pdf" target="_blank">Disiplin Su&#231; ve Cezalarına Ait Esaslar Hakkında Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>51</strong></td>
                    <td><strong>01.01.2006</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019115916cocuk_ogretim.pdf" target="_blank">&#199;ocuk H&#252;k&#252;ml&#252; ve Tutukluların Eğitim &#214;ğretim Faaliyetleri Hakkında Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>52</strong></td>
                    <td><strong>01.01.2006</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019120007personel_islemleri.pdf" target="_blank">Personel İşlemleri Hakkında Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>53/1</strong></td>
                    <td><strong>01.01.2006</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019120053uyap.pdf" target="_blank">Ulusal Yargı Ağı ve İstatistik İşlemleri Hakkında Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>139/1</strong></td>
                    <td><strong>06.09.2012</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019120253139-1.pdf" target="_blank" class="text-danger font-weight-bold">Kurumlarda Ders ve Ek Ders &#220;cretleri Hakkında Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>145</strong></td>
                    <td><strong>29.07.2010</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019134018145_genelge_internet.pdf" target="_blank">İnternet Sitelerinin Oluşturulması ile ilgili Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>151</strong></td>
                    <td><strong>18.06.2012</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019134137151_genelge.pdf" target="_blank">Ceza İnfaz Kurumlarının Tahsisi ve Nakil İşlemleri</a></td>
                </tr>
                <tr>
                    <td><strong>151-EK</strong></td>
                    <td><strong>23.09.2014</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019134703151_guncellenen_ekleri (1).pdf" target="_blank">Ceza İnfaz Kurumlarının Tahsisi ve Nakil İşlemleri (G&#252;ncellenen Ekleri)</a></td>
                </tr>
                <tr>
                    <td><strong>167</strong></td>
                    <td><strong>05.06.2015</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019135613167_Genelge.pdf" target="_blank">Ceza İnfaz Kurumlarının Tahsisi, Nakil İşlermleri ve Diğer H&#252;k&#252;mler Hakkında Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>167/1</strong></td>
                    <td><strong>03.08.2016</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019135700167-1_Genelge.pdf" target="_blank">167 No.lu Genelgede Değişiklik Yapılmasına Dair Genelge</a></td>
                </tr>
                <tr>
                    <td><strong>167/2</strong></td>
                    <td><strong>31.07.2017</strong></td>
                    <td><strong>Genelge</strong></td>
                    <td><a href="https://cte.adalet.gov.tr/Resimler/Dokuman/1982019135737167-2.pdf" target="_blank">167 No.lu Genelgede Değişiklik Yapılmasına Dair Genelge</a></td>
                </tr>


            </tbody>
        </table>
    </div>
</div>
</div>
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


<?php require_once('include/footer.php'); ?>