-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 Eki 2023, 20:27:29
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sinav`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bildirimler`
--

CREATE TABLE `bildirimler` (
  `id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `soru_id` int(11) NOT NULL,
  `bildirim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tarih` int(11) NOT NULL,
  `durum` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bildirimler`
--

INSERT INTO `bildirimler` (`id`, `uye_id`, `soru_id`, `bildirim`, `tarih`, `durum`) VALUES
(92, 1, 163, 'bu sorunun cevabı yanlış', 1680281829, 1),
(93, 1, 203, 'CEVAP hepsi yanlış', 1680299277, 1),
(94, 1, 163, 'cevap şahsi dosya', 1680299571, 1),
(95, 1, 112, 'bak buna bilmiyoruz', 1680300939, 1),
(98, 1, 43, 'bak buna', 1680301035, 1),
(99, 1, 203, 'xxxxxxxxxxxx', 1680302451, 1),
(101, 1, 195, 'hhh', 1687693990, 1),
(102, 1, 196, 'ssss', 1687693997, 1),
(103, 1, 199, 'jkjhkjh', 1687694005, 1),
(104, 1, 194, 'klkjlkj', 1687694009, 1),
(105, 1, 197, 'gfhgf', 1687694167, 1),
(106, 1, 167, 'gfdgdfg', 1687875997, 1),
(107, 1, 168, 'nbnbv', 1687876171, 1),
(114, 1, 143, 'cevap yannışşşşşş', 1688653692, 1),
(115, 1, 143, 'bvcb', 1688654159, 0),
(116, 1, 219, 'gfhgfh', 1689773683, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `isaretlemeler`
--

CREATE TABLE `isaretlemeler` (
  `id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `soru_id` int(11) NOT NULL,
  `cevap` varchar(1) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tarih` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `isaretlemeler`
--

INSERT INTO `isaretlemeler` (`id`, `uye_id`, `soru_id`, `cevap`, `tarih`) VALUES
(898, 1, 190, 'b', 1680850238),
(899, 1, 152, 'b', 1680850238),
(900, 1, 197, 'c', 1680850238),
(901, 1, 199, 'd', 1680850238),
(902, 1, 210, 'c', 1680850238),
(903, 1, 216, 'd', 1680850238),
(904, 1, 190, 'b', 1680850247),
(905, 1, 152, 'b', 1680850247),
(906, 1, 197, 'c', 1680850247),
(907, 1, 199, 'd', 1680850247),
(908, 1, 210, 'c', 1680850247),
(909, 1, 216, 'd', 1680850247),
(910, 1, 188, 'a', 1681365309),
(911, 1, 189, 'd', 1681365309),
(912, 1, 190, 'd', 1681365309),
(913, 1, 187, 'd', 1681365309),
(914, 1, 191, 'c', 1681365309),
(915, 1, 256, 'c', 1681394016),
(916, 1, 216, 'c', 1681394016),
(917, 1, 190, 'b', 1681394016),
(918, 1, 214, 'a', 1683020543),
(919, 1, 185, 'c', 1687173020),
(920, 1, 184, 'c', 1687173020),
(921, 1, 157, 'a', 1687173158),
(922, 1, 156, 'a', 1687173158),
(923, 1, 190, 'd', 1687173333),
(924, 1, 197, 'd', 1687173333),
(925, 1, 216, 'c', 1687173333),
(926, 1, 256, 'd', 1687173333),
(927, 1, 156, 'd', 1687173333),
(928, 1, 197, 'b', 1687693861),
(929, 1, 194, 'a', 1687693861),
(930, 1, 199, 'b', 1687693861),
(931, 1, 195, 'b', 1687693861),
(932, 1, 196, 'a', 1687693861),
(933, 1, 194, 'a', 1687694179),
(934, 1, 199, 'd', 1687694179),
(935, 1, 196, 'a', 1687694179),
(936, 1, 197, 'b', 1687694179),
(937, 1, 195, 'a', 1687694179),
(938, 1, 195, 'a', 1687694363),
(939, 1, 194, 'a', 1687694363),
(940, 1, 196, 'b', 1687694363),
(941, 1, 199, 'd', 1687694364),
(942, 1, 197, 'b', 1687694364),
(943, 1, 167, 'b', 1687876150),
(944, 1, 168, 'd', 1687876150),
(945, 1, 207, 'a', 1688218633),
(946, 1, 208, 'b', 1688218633),
(947, 1, 213, 'b', 1688419143),
(948, 1, 212, 'd', 1688419143),
(949, 1, 211, 'a', 1688419143),
(950, 1, 210, 'c', 1688419143),
(951, 1, 142, 'c', 1688653660),
(952, 1, 257, 'c', 1688653660),
(953, 1, 261, 'd', 1688653660),
(954, 1, 258, 'c', 1688653660),
(955, 1, 262, 'a', 1688653660),
(956, 1, 141, 'd', 1688653660),
(957, 1, 259, 'b', 1688653660),
(958, 1, 256, 'd', 1688653660),
(959, 1, 143, 'a', 1688653660),
(960, 1, 144, 'c', 1688653660),
(961, 1, 260, 'b', 1688653660),
(962, 2, 148, 'a', 1688917835),
(963, 2, 150, 'c', 1688917835),
(964, 2, 151, 'd', 1688917835),
(965, 2, 146, 'a', 1688917835),
(966, 2, 149, 'c', 1688917835),
(967, 2, 147, 'b', 1688917835),
(968, 1, 186, 'b', 1689697038),
(969, 1, 219, 'a', 1689773814),
(970, 1, 220, 'b', 1689773814);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `isim` varchar(128) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `isim`) VALUES
(1, '5275 Sayılı Kanun'),
(2, '6331 Sayılı İş Sağlığı Kanunu'),
(3, 'CGTİHK Yönetmeliği'),
(4, '4675 Sayılı İnfaz Hakimliği Kanunu'),
(5, '5271 Sayılı Ceza Muhakemesi Kanunu'),
(6, '5237 Sayılı Türk Ceza Kanunu'),
(7, '3713 Sayılı Terörle Mücadele Kanunu'),
(8, 'Emanet Eşya Yönetmeliği'),
(9, 'Emanet Para Yönetmeliği'),
(10, 'Ziyaret Yönetmeliği'),
(11, 'Ödül Yönetmeliği'),
(12, 'Ölüm ve Mazeret İzinleri Yönetmeliği'),
(13, 'Personel İaşe Yönetmeliği'),
(14, 'Taşınır Mal Yönetmeliği'),
(15, 'Ek Ders Ücretleri Genelgesi'),
(16, 'İşyurtları İdare ve İhale Yönetmeliği'),
(17, 'Açığa Ayırma Yönetmeliği'),
(18, '657 Sayılı Devlet Memurları Kanunu'),
(19, '2886 Sayılı Devlet İhale Kanunu'),
(20, '4734 Sayılı Kamu İhale Kanunu'),
(21, '4735 Sayılı Kamu İhale Sözleşmeleri Kanunu'),
(22, '5018 Sayılı Kamu Mali Yönetim Kanunu'),
(23, '7201 Sayılı Tebligat Kanunu'),
(24, '5510 Sayılı Sosyal Sigortalar Kanunu'),
(25, '3071 Sayılı Dilekçe Hakkı Kanunu'),
(26, '4 Numaralı Cumhurbaşkanlığı Kararnamesi'),
(27, 'İç Kontrol ve Ön Mali Kontrole İlişkin Usul ve Esaslar'),
(28, 'Kamu Zararlarının Tahsiline İlişkin Usul ve Esaslar Hakkında Yönetmelik'),
(29, 'Merkezi Yönetim Harcama Belgeleri Yönetmeliği'),
(30, 'Kamu İhale Genel Tebliği'),
(31, '6245 Sayılı Harcırah Kanunu'),
(32, '1 Numaralı Cumhurbaşkanlığı Kararnamesi'),
(33, 'Adalet Bakanlığı - MEB arasında Eğitim ve Öğretim İş Birliği Protokolü'),
(34, '172 Sayılı Tedavi Nedenli Nakil ve Ceza Tehir İşlemleri Genelgesi'),
(35, 'Adalet Bakanlığı Disiplin Yönetmeliği'),
(36, 'Hükümlülerin Değerlendirilmesine Dair Yönetmelik'),
(39, 'Genel Kültür - Genel Yetenek');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE `sorular` (
  `id` int(11) NOT NULL,
  `soru` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kategori` int(11) NOT NULL,
  `a` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `b` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `c` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `d` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `dogru_cevap` varchar(1) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `soruyu_yazan` varchar(99) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `durum` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`id`, `soru`, `kategori`, `a`, `b`, `c`, `d`, `dogru_cevap`, `aciklama`, `soruyu_yazan`, `durum`) VALUES
(141, 'Aşağıdakilerden hangisi, 5275 sayılı Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Kanun uyarınca,\r\nhükümlünün istemiyle Cumhuriyet başsavcılığı tarafından infazın ertelenmesine engel olan\r\ndurumlardan biri değildir?', 1, 'Hükümlünün terör suçlarından mahkûm olmuş olması', 'Hükümlünün cinsel dokunulmazlığa karşı suçlardan mahkûm olmuş olması', 'Hükümlü hakkında mükerrirlere özgü infaz rejiminin uygulanmasına karar verilmiş olması', 'Hükümlünün taksirle işlediği bir suçtan dolayı dört yıl hapis cezasına mahkûm olmuş olması', 'd', '2021 - İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(142, '5275 sayılı Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Kanun uyarınca, hükümlülerin disiplin\r\nsoruşturmalarıyla ilgili aşağıdakilerden hangisi yanlıştır?', 1, 'Hükümlülerin uyarma, kınama ve bazı etkinliklere katılmaktan alıkoyma haricindeki disiplin cezalarını gerektiren eylemlerinin öğrenilmesinden itibaren derhâl ve en geç beş gün içinde kurum en üst amirince atanan bir görevli tarafından soruşturmaya başlanır.', 'Disiplin soruşturmasının tamamlanması gereken on beş günlük süre, firar halinde, hükümlünün yakalandığının öğrenildiği tarihte başlar.', 'Hükümlünün ceza infaz kurumu dışındaki eylemleri nedeniyle yapılacak disiplin soruşturması, hükümlünün eylemden sonra nakledildiği ceza infaz kurumu disiplin kurulu tarafından yapılır.', 'Haklarında disiplin soruşturması yapılanlara, yüklenen eylemin niteliği ve sonuçları ile üç gün içinde savunmalarını vermeleri, aksi hâlde bu haklarından vazgeçmiş sayılacakları yazılı olarak bildirilir.', 'c', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(143, '&lt;p&gt;5275 sayılı Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Kanun uyarınca, aşağıdakilerden hangisi hükümlü hakkında “&lt;i&gt;haberleşme veya iletişim araçlarından yoksun bırakma veya kısıtlama&lt;/i&gt;” disiplin cezasının uygulanmasını gerektiren eylemlerden biri &lt;span style=&quot;color:hsl(0,75%,60%);&quot;&gt;&lt;strong&gt;değildir&lt;/strong&gt;&lt;/span&gt;?&lt;/p&gt;', 1, 'Protesto amacıyla idarece verilen yemeği topluca almama eylemine katılmak', 'Kurum işyurdu yönetim kurulunca uygun görülen işte çalışmamak', 'Odalarda, eklentilerinde ve diğer alanlarda ilâç ve gıda maddesi stoku yapmak', 'Tünel kazmaya teşebbüs etmek', 'd', '&lt;p&gt;&lt;i&gt;&lt;strong&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/strong&gt;&lt;/i&gt;&lt;/p&gt;', 'admin', 1),
(144, '5275 sayılı Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Kanun uyarınca, koşullu salıverilmeye\r\nilişkin aşağıdakilerden hangisi yanlıştır?', 1, 'Suç işlemek için örgüt kurmak veya yönetmek ya da örgütün faaliyeti çerçevesinde işlenen bir suçtan dolayı müebbet hapis cezasına mahkûm edilmiş olanlar, otuz yılını infaz kurumunda çektikleri takdirde, koşullu salıverilmeden yararlanabilirler.', 'Cinsel dokunulmazlığa karşı işlenen suçlardan hapis cezasına mahkûm olan çocuklar, cezalarının üçte ikisini infaz kurumunda çektikleri takdirde, koşullu salıverilmeden yararlanabilirler.', '30/3/2020 tarihinden sonra işlenen suçlar bakımından, koşullu salıverilme süresinin hesaplanmasında, hükümlünün onsekiz yaşını dolduruncaya kadar infaz kurumunda geçirdiği bir gün, iki gün olarak dikkate alınır.', 'İkinci defa tekerrür hükümlerinin uygulanması durumunda, hükümlü koşullu salıverilmez.', 'c', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(145, '6331 Sayılı İş Sağlığı ve Güvenliği Kanunu’na göre, aşağıdakilerden hangisi, iş sağlığı ve\r\ngüvenliğinde risklerden korunma ilkelerinden biri değildir?', 2, 'Kaçınılması mümkün olmayan riskleri analiz etmek', 'Kişisel korunma tedbirlerine, toplu korunma tedbirlerine göre öncelik vermek', 'Tehlikeli olanı, tehlikesiz veya daha az tehlikeli olanla değiştirmek', 'Teknik gelişmelere uyum sağlamak', 'b', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(146, 'Ceza İnfaz Kurumlarının Yönetimi ile Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Yönetmelik\r\nuyarınca, aşağıdakilerden hangisi kuruma alındıktan sonra Cumhuriyet Başsavcılığınca hükümlüye\r\nverilen süre belgesinde yer alması gereken hususlardan biri değildir?', 3, 'Adli kontrol tedbiri olarak yurtdışına çıkış yasağı konan süre', 'İnfaz defteri numarası', 'Tutuklulukta veya gözaltında geçirdiği süre', 'Hakederek ve koşullu salıverileceği tarih', 'a', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(147, 'Ceza İnfaz Kurumlarının Yönetimi ile Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Yönetmelik\r\nuyarınca, ceza infaz kurumlarında, müdürün görevleriyle ilgili aşağıdakilerden hangisi yanlıştır?', 3, 'Kamu kurum ve kuruluşları ile bakanlıklar tarafından istenilen istatistiki bilgi ve belgelerin hazırlanmasını sağlar ve Cumhuriyet başsavcılığına sunar.', 'On beş günde en az bir defa olmak üzere gündüzleri, ayda en az bir defa olmak üzere geceleri kurumun bütün faaliyetlerini tetkik ederek, işlerin mevzuat ve emirler çerçevesinde yürüyüp yürümediğini denetler.', 'Kurum hizmetleriyle ilgili genel ihtiyaçları, öncelikleri, bir sonraki yılda yapılacak işleri belirler ve bu konularla ilgili tahmini gider verilerini hazırlayarak Adalet Bakanlığına sunar.', 'Mevzuat ve yetkili mercilerce verilen emirler çerçevesinde kurumun genel idare ve işyurduna ait hesap işlerinin yürütülmesini ve denetimini yapar.', 'b', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(148, 'Ceza İnfaz Kurumlarının Yönetimi ile Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Yönetmelik\r\nuyarınca, kapalı kurumlarda bulunan hükümlülerin telefonla görüşme hakkıyla ilgili aşağıdakilerden\r\nhangisi yanlıştır?', 3, 'Hükümlüler başka kurumlarda hükümlü olan akrabalarını ve “Telefon Görüşme Formu”yla önceden bildirmiş olmak kaydıyla arkadaşlarını telefonla arayabilirler.', 'Hükümlü hücreye koyma cezasının infazı sırasında yakınlarıyla telefonla görüşme hakkından kural olarak yararlanamaz.', 'Ağırlaştırılmış müebbet hapis cezası alan hükümlüler, idare ve gözlem kurulunun uygun gördüğü hâllerde ve on beş günde bir olmak üzere eşi, altsoy ve üstsoyu, kardeşleri ve vasisi ile on dakikayı geçmemek üzere sadece sesli görüşebilir.', 'Görüntülü telefon görüşmesi yapılmasına imkân sağlayan teknik alt yapının kurulu bulunduğu Adalet Bakanlığı’nca belirlenen kurumlarda, bu sistem oda veya koğuş içine ya da idarece uygun görülen diğer yerlere kurulabilir.', 'a', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(149, '&lt;ol&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Zararın aynen iade edilmesi; hükümlünün işlediği suç nedeniyle haksız olarak ele geçirdiği şeyi aynen ya da satın almak suretiyle suçtan zarar görene iade etmesidir.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Zararın tazmin edilmesi, suç nedeniyle verilen zararın, hükümlü tarafından ya da başkası aracılığıyla çalışmak, çalıştırılmak, tamir etmek veya buna benzer faaliyetlerle giderilmesidir.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Mağdurun veya kamunun uğradığı zararın miktarı, mahkemece kararda belirtilmemiş ise Cumhuriyet savcısınca tespit edilir.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Mağdurun ya da kamunun uğradığı zararın tamamen giderilmesini içeren kesinleşmiş ilâm Cumhuriyet başsavcılığına verildikten sonra, Cumhuriyet savcısı, zararın otuz gün içinde tamamen giderilmesini hükümlüye tebliğ eder.&amp;nbsp;&lt;/li&gt;&lt;/ol&gt;&lt;p style=&quot;text-align:justify;&quot;&gt;Ceza İnfaz Kurumlarının Yönetimi ile Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Yönetmelik uyarınca, kısa süreli hapis cezasının çevrildiği seçenek yaptırımlardan mağdurun veya kamunun uğradığı zararın giderilmesi yaptırımının infazıyla ilgili yukarıdakilerden hangileri doğrudur?&lt;/p&gt;', 3, 'I ve II', 'I ve IV', 'I, II ve III', 'III ve IV', 'b', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(150, 'Ceza İnfaz Kurumlarının Yönetimi ile Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Yönetmelik\r\nuyarınca, hükümlünün dışarıdan gönderilen hediyeleri kabul etme hakkıyla ilgili aşağıdakilerden\r\nhangisi yanlıştır?', 3, 'Kapalı kurumlarda, bir kişiden aynı tarih için bir kez hediye kabul edilebilir.', 'Kapalı kurumlarda, kişi, kurum veya kuruluşlar tarafından hükümlülere dağıtılmak üzere dışarıdan toplu olarak getirilen veya gönderilen hediyelerin dağıtımında Cumhuriyet başsavcılığının izni aranır.', 'Açık kurumlar ile çocuk eğitimevlerinde barındırılan hükümlülere gönderilecek hediyelerin cins ve miktarı, Adalet Bakanlığınca belirlenir.', 'Kapalı kurumlarda, hediye, ziyaretçi tarafından verilebileceği gibi posta veya kargo yolu ile de gönderilebilir.', 'c', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(151, 'Ceza İnfaz Kurumlarının Yönetimi ile Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Yönetmelik\r\nuyarınca, hükümlülerin mektup göndermeleri ve gelen mektupların kendilerine verilmesiyle mektup\r\nokuma komisyonu hakkında aşağıdakilerden hangisi yanlıştır?', 3, 'Mektup okuma komisyonu, bu işle görevlendirilen ikinci müdür başkanlığında, idare memuru ve yüksekokul mezunu iki infaz ve koruma memurundan oluşur.', 'Mektup okuma komisyonunca, mahalline gönderilmesi veya hükümlüye verilmesi sakıncalı görülen mektuplar, en geç yirmi dört saat içinde disiplin kuruluna verilir.', 'Başka kurumlara nakledilmiş hükümlülerin mektupları, açılmaksızın en kısa sürede nakledildikleri kuruma gönderilir.', 'Salıverilen hükümlülere gönderilen mektuplar, salıverilme defterine kaydedilen adresine gönderilir.', 'd', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(152, '&lt;ol&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Şikâyet başvurusu, şikâyet süresinin geçmesinden sonra yapılmışsa infaz hâkimi, başvuru dilekçesini esasa girmeden reddeder.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Disiplin cezasına karşı yapılan şikâyet üzerine infaz hâkimi, hükümlü veya tutuklunun savunmasını aldıktan ve talep edilen diğer delilleri toplayıp değerlendirdikten sonra kararını verir.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;İnfaz hâkiminin şikâyet üzerine verdiği kararına karşı şikâyetçi veya ilgili Cumhuriyet savcısı tarafından, tebliğden itibaren yedi gün içinde Ceza Muhakemesi Kanunu hükümlerine göre itiraz yoluna gidilebilir.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;İtiraz, infaz hâkimliğinin yargı çevresinde bulunduğu ağır ceza mahkemesine en yakın ağır ceza mahkemesinin yargı çevresinde bulunan infaz hâkimliğine yapılır.&amp;nbsp;&lt;/li&gt;&lt;/ol&gt;&lt;p style=&quot;text-align:justify;&quot;&gt;4675 sayılı İnfaz Hâkimliği Kanunu uyarınca, infaz hâkimliğince şikâyet üzerine verilen kararlarla ilgili yukarıdakilerden hangileri doğrudur?&lt;/p&gt;', 4, 'I ve II', 'I, II ve III', 'I, II, III ve IV', 'II, III ve IV', 'b', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(153, '5271 sayılı Ceza Muhakemesi Kanunu’na göre, verilen tutuklama kararına ilişkin aşağıdakilerden\r\nhangisi doğrudur?', 5, 'Tutuklama istenildiğinde, şüpheli veya sanık, kendisinin seçeceği veya baro tarafından görevlendirilecek bir müdafiin yardımından yararlanır.', 'Soruşturma evresinde ağır cezayı gerektiren suçüstü hallerinde, Cumhuriyet savcısı tarafından tutuklama kararı verilebilir.', 'Kovuşturma evresinde sanığın tutuklanmasına, sanığın yargılandığı mahkemenin çevresinde bulunan sulh ceza hakimliğince karar verilir.', 'Soruşturma evresindeki tutuklama kararlarına karşı, istinaf kanun yolu açıktır.', 'a', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(154, '5237 sayılı Türk Ceza Kanunu’nda düzenlenen aşağıdaki suçlardan hangisi kamu görevlileri\r\ntarafından işlenebilen özgü suçlardan biri değildir?', 6, 'Görevi kötüye kullanma', 'Zimmet', 'Görevi yaptırmamak için direnme', 'Zor kullanma yetkisine ilişkin sınırın aşılması', 'c', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(155, '3713 sayılı Terörle Mücadele Kanunu’nda yer alan şartla salıverilmeye ilişkin hükme göre,\r\naşağıdakilerden hangisi yanlıştır?', 7, 'Tutuklu veya hükümlü iken firar veya ayaklanma suçundan mahkûm edilmiş bulunanlar şartla salıverilmeden yararlanamazlar.', 'Disiplin cezası olarak bir defa hücre hapsi cezası almış olanlar, bu disiplin cezası kaldırılmış olsa bile şartla salıverilmeden yaralanamazlar.', 'Ağırlaştırılmış müebbet ağır hapis cezasına mahkûm olan terör suçluları şartla salıverilme hükümlerinden yararlanamaz.', 'Terörle Mücadele Kanunu’nun kapsamına giren suçlardan mahkûm olanlar, hükümlerinin kesinleşme tarihinden sonra bu Kanunun kapsamına giren bir suçu işlemeleri halinde, şartla salıverilmeden yararlanamazlar.', 'b', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(156, 'Ceza İnfaz Kurumlarında Bulundurulabilecek Eşya ve Maddeler Hakkında Yönetmeliğe göre,\r\nhükümlülerin koğuş, oda ve eklentilerinde bulundurabilecekleri aşağıdaki giyim eşyalarından\r\nhangisinin sayısı yanlıştır?', 8, 'Dört adet gömlek', 'İki adet kravat', 'Bir adet kemer', 'Üç takım pijama', 'd', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(157, 'Ceza İnfaz Kurumlarında Bulundurulabilecek Eşya ve Maddeler Hakkında Yönetmelik uyarınca\r\naşağıdakilerden hangisi hükümlülerin, koğuş, oda veya eklentilerinde, kantinden temin edilmek\r\nkoşuluyla kişisel ve çevresel temizliklerini temin için bulundurabilecekleri eşyalardan biri değildir?', 8, 'Çakılı tırnak makası', 'Tarak', 'Çamaşır mandalı', 'Tıraş sabunu', 'a', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(158, 'Hükümlü ve Tutukluların Emanete Alınan Kişisel Paralarının Kullanımına Dair Yönetmelik uyarınca,\r\nhükümlü ve tutukluların ihtiyaçlarını idareye bildirdikleri ihtiyaç istem formu kaç nüsha düzenlenir?', 9, 'İki', 'Üç', 'Bir', 'Dört', 'a', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(159, 'Hükümlü ve Tutukluların Emanete Alınan Kişisel Paralarının Kullanımına Dair Yönetmelik’te yer alan\r\nbanka hesabındaki paralar ve faiz gelirleriyle ilgili aşağıdakilerden hangisi yanlıştır?', 9, 'Deftere kaydı yapılan paralar, kurum adına bankada açılacak hükümlü emanet para hesabında, tasarruf mevduatı olarak muhafaza olunur, ödeme günleri ve toplam tutarları da dikkate alınarak vadeli olarak tutulur.', 'Hükümlü ve tutuklular emanet para hesabında biriken faiz gelirleri ile ilgili olarak ceza infaz kurumları lehine açık feragatte veya hibede bulunabilir.', 'Faiz gelirleri hükümlü ve tutukluların eğitim ve sosyal ihtiyaçlarının karşılanması ile iyileştirilmeye yönelik faaliyetlerin dışında kullanılır.', 'Faiz gelirlerinden yapılan harcamalar, belge ve faturalara dayandırılır ve bir dosyada korunarak denetimlerde ibraz edilir.', 'c', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(160, 'Hükümlü ve Tutukluların Ziyaret Edilmeleri Hakkında Yönetmelik uyarınca, aşağıdakilerden hangisi\r\nhükümlü ve tutuklular ile görüşmek isteyen kan ve kayın hısımlarından istenen bilgi ve belgelerden\r\nbiri değildir?', 10, 'Akrabalık durumları', 'Ziyarette bulunulmak istenen tutuklu veya hükümlünün tutukluluk ve hükümlülüğüne ilişkin mahkeme kararı', 'T.C. kimlik numarası', 'Nüfus cüzdanı aslının ziyaret süresince ceza infaz kurumlarında yetkili görevlilere teslimi', 'b', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(161, 'Hükümlü ve Tutukluların Ziyaret Edilmeleri Hakkında Yönetmelik uyarınca, Türk Ceza Kanunu’nda\r\nyer alan aşağıdaki suçlardan hangisinden dolayı tutuklu ve hükümlü olanların milletvekilleri\r\ntarafından ziyaret edilmelerinde Adalet Bakanlığı’nın yazılı izni aranır?', 10, 'Taksirle insan öldürme', 'Çocukların cinsel istismarı', 'Hakaret', 'Suç işlemeye tahrik', 'd', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(162, 'Hükümlü ve Tutukluların Ziyaret Edilmeleri Hakkında Yönetmelik uyarınca, milletvekillerinin\r\ngörüşmelerine ilişkin olarak aşağıdakilerden hangisi yanlıştır?', 10, 'Milletvekillerinin, ceza infaz kurumlarındaki yaşam şartlarını yerinde görerek tespitlerde bulunmak, inceleme yapmak veya hükümlü ve tutuklular ile görüşmede bulunmak amacıyla yapmış oldukları istemler, ceza infaz kurumu idaresine bilgi vermek koşuluyla yerine getirilir.', 'Milletvekilleri, hükümlü ve tutuklularla açık ziyaret şeklinde görüşemez.', '3713 sayılı Terörle Mücadele Kanununda yer alan suçlardan tutuklu ve hükümlülerin milletvekilleri tarafından ziyaret edilmelerinde Bakanlığın yazılı izni aranır.', 'Ceza infaz kurumlarındaki tutuklu ve hükümlüler ile barındırıldıkları bölümler, Türkiye Büyük Millet Meclisi I ̇nsan Haklarını I ̇nceleme Komisyonu ve diğer komisyonların başkan ve üyeleri ile yanlarında bulunan görevliler tarafından komisyon kararı ve görevleri çerçevesinde ziyaret edilebilir. ', 'b', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(163, '&lt;p&gt;Hükümlü ve Tutukluların Ödüllendirilmesi Hakkında Yönetmelik’te düzenlenen ödüllendirme usulüne göre, aşağıdakilerden hangisi &lt;strong&gt;doğrudur&lt;/strong&gt;?&lt;/p&gt;', 11, 'Kurul, yalnızca kurumda görev yapan servislerin teklifi üzerine ilgililerin ödüllendirilmesine karar verebilir.', 'Kurul, ödül verilecek hükümlü ve tutukluları ayda en az iki kez yapacağı toplantıda oy birliğiyle kararlaştırır ve ödülün niteliğine göre uygun şekilde ilgililere bildirir.', 'Hükümlü ve tutuklulara verilen ve geri alınan ödüller kayıt altına alınarak bir sureti ilgililerin şahsı̂ dosyalarında saklanır.', 'Ödülün geri alınmasını gerektiren şartların ortaya çıkması hâlinde Kurul, henüz uygulanmamış olan ödülün derhâl geri alınmasına karar verebilirken, hâlen uygulanmakta olan ödül geri alınamaz.', 'c', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(164, 'Hükümlü ve Tutuklulara Yakınlarının Ölümü veya Hastalığı Nedeniyle Verilebilecek Mazeret İzinlerine\r\nDair Yönetmeliğe göre, yakınlarının ölümü nedeniyle hükümlü ve tutuklulara verilebilecek cenazeye\r\nkatılma izni hakkında, aşağıdakilerden hangisi yanlıştır?', 12, 'Açık ceza infaz kurumlarında bulunanlar dış güvenlik görevlisi refakatinde izne gönderilir.', 'Hükümlü ve tutukluların, izin sırasında gece konakladıkları ev, ceza infaz kurumu veya diğer yerlerde geçirdikleri tüm süreler izin süresine dâhildir.', 'Kapalı ceza infaz kurumlarında bulunanlar dış güvenlik görevlisi refakatinde izne gönderilir.', 'Çocuk eğitim evlerinde bulunanlar refakatsiz izne gönderilir.', 'a', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(165, 'Hükümlü ve Tutuklulara Yakınlarının Ölümü veya Hastalığı Nedeniyle Verilebilecek Mazeret İzinlerine\r\nDair Yönetmeliğe göre, Kapalı ceza infaz kurumunda bulunan hükümlü ve tutukluların, mazeret izni\r\nsırasında gece konaklaması yapabilecekleri yerler hakkında aşağıdaki esaslardan hangisi doğrudur?', 12, 'Vali, gece konaklama yapılabilecek yer konusunda karar verme yetkisini vali yardımcısı veya kaymakamlara devredemez.', 'İl Jandarma Komutanlığı, ilgili yer kolluk birimleriyle irtibata geçerek elde ettiği bilgilere göre oluşturduğu hükümlü veya tutuklunun nerede konaklaması gerektiğine ilişkin kendi görüşünü de içeren resmi yazıyı derhâl valilik makamına sunar.', 'Gece konaklaması yapması gerekenler, sadece kendisine veya eşine ait evde kalabilir; güvenli görülen başka bir yerde kalamaz.', 'Gece konaklaması yapması gerekenler, kendisinin veya eşinin annesine, babasına, kardeşine, çocuğuna, torununa, büyükbabasına veya büyükannesine ait evde kalamaz', 'b', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(166, '25978 sayılı Resmi Gazete’de yayınlanan Hükümlü ve Tutuklular İle Ceza İnfaz Kurumları Personelinin\r\nİaşe Yönetmeliğine göre ambar sayım ve denetimi ile gıda maddelerinin kontrolü hakkında\r\naşağıdakilerden hangisi söylenemez?', 13, 'Ambar mevcudu; müdür veya görevlendireceği ikinci müdürün başkanlığında ambar memuru ile infaz ve koruma memurundan oluşacak bir heyet marifetiyle en az ayda bir defa sayılır.', 'Sayımlar sırasında noksanlık bulunması durumunda, sorumlularından tazmin etmesi istenir ve haklarında gerekli işlemlerin yaptırılması sağlanır.', 'Ambar mevcudunun sayımında müdür veya görevlendireceği ikinci müdürün bulunmaması hâlinde bu görev ambar memuru başkanlığında oluşturulacak heyet tarafından yerine getirilir.', 'Ambardan kurum mutfağına teslim edilen gıda maddelerinin eksiksiz olarak iaşeye dahil edilmesi, pişirilmesi ve dağıtılması, ikinci müdür veya görevlendirilen bir yetkili ile varsa kurum hekimi tarafından müştereken sıkı bir şekilde kontrol edilir.', 'c', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(167, '&lt;p&gt;Taşınır Mal Yönetmeliğine göre, satın alınan taşınırların giriş işlemleri ile ilgili aşağıdakilerden hangisi &lt;span style=&quot;color:hsl(0, 75%, 60%);&quot;&gt;&lt;strong&gt;doğrudur&lt;/strong&gt;&lt;/span&gt;?&lt;/p&gt;', 14, 'Satın alınan taşınırlar için, teslim alındıktan sonra, Taşınır Kod Listesindeki hesap kodları itibarıyla ikişer nüsha Taşınır İşlem Fişi düzenlenir.', 'Farklı hesaplara kaydı gereken taşınırların aynı faturada yer alması halinde, faturadaki taşınırların kaydedileceği hesap sayısınca fatura fotokopileri çıkarılır ve üzerine her hesap için düzenlenen Taşınır İşlem Fişinin numarası yazılır.', 'Alımı bir merkezden yapılarak birden fazla birime doğrudan teslim edilen taşınırlar için, taşınırın teslim edildiği birimlerce üç nüsha Taşınır Geçici Alındısı düzenlenir ve bir nüshası alımı yapan birime gönderilir.', 'Satın alınan dergi ve gazete gibi süreli yayınların bedellerinin ödenmesi sırasında Taşınır İşlem Fişi düzenlenir.', 'b', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(168, '&lt;p&gt;Taşınır Mal Yönetmeliğine göre, kamu idarelerince bütün taşınırların ve bunlara ilişkin işlemlerin kayıt altına alınması esastır. Bu kapsamda aşağıdaki taşınır kayıtlarından hangisi miktar ve değer olarak kayıtlara alınarak &lt;span style=&quot;color:hsl(0, 75%, 60%);&quot;&gt;&lt;strong&gt;takip edilmez&lt;/strong&gt;&lt;/span&gt;?&lt;/p&gt;', 14, 'Önceki yıldan devren gelen taşınırlar ile içinde bulunulan yılda herhangi bir şekilde edinilen veya elden çıkarılan taşınırlar', 'Taşınırlardaki kayıp, fire, yıpranma ve benzeri nedenlerle meydana gelen azalmalar', 'Sayım sonucunda ortaya çıkan fazlalar', 'Bedelsiz devir, kullanılamaz hale gelme, yok olma ve hurdaya ayrılma hallerinde kayıt değeri', 'd', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(169, '&lt;p style=&quot;text-align:justify;&quot;&gt;Ceza ve Tevkifevleri Genel Müdürlüğünün Kurumlarda Ders ve Ek Ders Ücretleri Hakkındaki 139/1 Sayılı Genelgesi’nde, Adalet Bakanlığı Ders ve Ek Ders Saatlerine İlişkin Karar’da “&lt;i&gt;Kurum dışından görevlendirilecek kişilerin ek ders görevi saatleri&lt;/i&gt;&quot; hakkında yapılan açıklamalar doğrultusunda aşağıdakilerden hangisi yanlıştır?&lt;/p&gt;', 15, 'Diyanet İşleri Başkanlığına bağlı fakülte veya yüksekokul mezunu müftülük personeli ile din ve ahlak bilgisi dersi öğretmenlerinin tam gün esaslı yürütülecek görevi; onay yazılarında aksi belirtilmedikçe (2) saati maaş, (6) saati ek ders karşılığı haftada (8) saat çalışmayı ifade etmektedir. ', 'Üzerinde resmî görev bulunmayanlardan ihtiyaç duyulan branş ve dallarda öğretmen adayları veya emekli öğretmenlerin ceza infaz kurumlarında tam gün çalıştırılabilmesi için Genel Müdürlük onayı; denetimli serbestlik müdürlüklerinde denetimli serbestlik müdürünün onayı gerekmektedir.', 'Cezaevi vaizi unvanı ile herhangi bir kurumda tam gün esaslı olarak görevlendirilen müftülük personeli, iki ayrı ceza infaz kurumundan aynı anda ders ve ek ders ücreti alamaz. Ancak görevlendirme onayında iki ayrı ceza infaz kurumu için ayrı görevlendirme bulunması halinde, ders ve ek ders ücretleri her kurumda fiilen görev yaptığı saat süresince tahakkuk ettirilir. Her halde toplam ders saati haftada 24 saati geçemez.', 'Diyanet İşleri Başkanlığına bağlı fakülte veya yüksekokul mezunu müftülük personeli ile din ve ahlak bilgisi dersi öğretmenlerinin tam gün esaslı yaptıkları görevler; kurumda yapmış oldukları hazırlık, planlama, konferans, seminer, belirli gün ve haftalarla ilgili programlar, dini içerikli yayınlar konusundaki çalışmalar, gözlem ve sınıflandırma formları ile benzeri form ve çizelgelerin doldurulması, manevi rehberlik faaliyetleri ve ilgili müfredat uyarınca okuttukları din kültürü ve ahlak bilgisi dersleri gibi hizmetleri kapsamaktadır.', 'a', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(170, 'Ceza ve Tevkifevleri Genel Müdürlüğünün Kurumlarda Ders ve Ek Ders Ücretleri Hakkındaki 139/1\r\nSayılı Genelgesi’nde, Adalet Bakanlığı Ders ve Ek Ders Saatlerine İlişkin Karar’da yapılan açıklamalar\r\ndoğrultusunda aşağıdakilerden hangisi söylenemez?', 15, 'Eğitim uzmanı ya da öğretmen sayısının yetersiz olması durumunda, eğitim ve öğretim servisi ile psiko sosyal serviste görevlendirilen personel öncelikli olmak üzere her sınav salonunda bir personel olacak şekilde görevlendirme yapılabilir.', 'Görevlendirilen personel, sınav salonlarını düzenlemek, hükümlü ve tutukluların sınavda hazır bulundurulmalarını sağlamakla yükümlü olup, sınav süresince fiilen görev yapar ve her oturum için (6) saat ek ders ücreti alır.', 'Aylık olarak hazırlanan ek ders puantaj cetvelleri Mahalli İdareler Harcama Belgeleri Yönetmeliği ekinde bulunan 14 nolu ek ders puantaj cetveli örneğine uygun olarak düzenlenir. Bu cetvelin “düzenleyen\" bölümünü gerçekleştirme görevlisi olarak görevlendirilen ikinci müdür ve “birim amiri\" bölümünü harcama yetkilisi olarak kurum müdürü; denetimli serbestlik müdürlüklerinde, “düzenleyen\" bölümünü gerçekleştirme görevlisi olarak müdür tarafından görevlendirilen personel, “birim amiri\" bölümünü ise harcama yetkilisi olarak ikinci kurum müdürü imzalar.', 'Milli Eğitim Bakanlığı mevzuatı gereğince kendi bünyelerinde oluşturulan sınav yürütme kurul ve komisyonları ile sınav merkezlerince görevlendirilen sınav salon başkanı, gözcü, gözetmen, bina sınav sorumlusu dışında, kurum idarelerince sınavlara ilişkin ayrıca bir kurul, komisyon kurulmayacak ve sınav salon başkanı, gözcü, gözetmen, bina sınav sorumlusu gibi unvanlarda görevlendirme yapılmayacaktır.', 'c', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(181, '26036 sayılı Resmi Gazete’de yayınlanan Ceza İnfaz Kurumları ile Tutukevleri İşyurtları Kurumu ve\r\nİşyurtları’nın İdare ve İhale Yönetmeliğine göre, hükümlü ve tutuklu çalıştırmanın kapsamı ile ilgili\r\naşağıdakilerden hangisi söylenemez?', 16, 'Hükümlüler, bulundukları ceza infaz kurumlarının içinde veya dışında işyurduna ait atölye ve işkollarında veyahut kurum dışında kamu veya özel sektöre ait işyerlerinde; tutuklular ile hükmen tutuklular ise ceza infaz kurumu içindeki atölye ve işkollarında çalıştırılırlar.', 'Açık ceza infaz kurumlarındaki hükümlülerden; iş temin edildiği halde çalışmayanlar, işi savsaklayanlar, boykot edenler, sürekli hastalığı sebebiyle çalışamayacak durumda olanlar ve iş düzenine intibak edemeyenler kapalı ceza infaz kurumuna iade edilirler.', 'Hükümlüler, kendisine veya ortaklarına ait işyerleri ile üçüncü dereceye kadar kan ve kayın hısımlarına ait işyerlerinde çalıştırılamazlar.', 'Kapalı ceza infaz kurumlarındaki ekip ve grup çalışmalarına katılan hükümlüler dışında kalan hükümlüler, infaz kurumu dışındaki iş alanlarında çalıştırılamazlar.', 'd', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(182, '26036 sayılı Resmi Gazete’de yayınlanan Ceza İnfaz Kurumları ile Tutukevleri İşyurtları Kurumu ve\r\nİşyurtları’nın İdare ve İhale Yönetmeliğine göre, hükümlülerin kurum dışındaki işyerlerinde\r\nçalıştırılmaları için işveren ile ceza infaz kurumu yetkilileri arasında düzenlenecek protokol ile ilgili\r\naşağıdakilerden hangisi söylenemez?', 16, 'İşverence, her ay sonunda tahakkuk ettirilecek ücret tutarı, en geç ertesi ayın ilk haftası içerisinde işyurdu müdürlüğünce bildirilecek banka hesabına yatırılır ve işyurdu bütçesine gelir kaydedilir. Bu şekilde çalışan hükümlülere İşyurdu Yönetim Kurulunca belirlenen ücret ödenir.', 'Protokol; işveren veya temsilcisi ile işyurdu bulunan kurumlarda işyurdu müdürü, işyurdu bulunmayan kurumlarda ise mahallî Cumhuriyet başsavcısı tarafından imzalanır.', 'Taraflardan biri, belirtilen tarihin bitiminden en az on beş gün önce yazılı olarak bildirim yapmadığı takdirde, protokol aynı süre ve esaslar çerçevesinde yenilenmiş sayılır.', 'Protokolde; çalıştırılacak hükümlülere verilecek ücret, çalışma saatleri, ulaşım, iaşe, güvenlik, protokolün süresi ve diğer hususlar düzenlenir. Ücret, yürürlükte bulunan on altı yaştan büyükler için uygulanan asgari ücretten aşağı olamaz.', 'a', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(183, 'Açık Ceza İnfaz Kurumlarına Ayrılma Yönetmeliğine göre, aşağıdakilerden hangisi doğrudan açık\r\nkuruma ayrılacak hükümlülerden değildir?', 17, 'Kasıtlı suçlardan toplam üç yıl veya daha az süreyle hapis cezasına mahkum olanlar', 'Cinsel dokunulmazlığa karşı suçlardan toplam iki yıl veya daha az süreyle hapis cezasına mahkum olanlar', 'Taksirli suçlardan toplam beş yıl veya daha az süreyle hapis cezasına mahkum olanlar', '9/6/1932 tarihli ve 2004 sayılı I ̇cra ve I ̇flas Kanunu gereğince tazyik hapsine tabi tutulanlar', 'b', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(184, '&lt;p&gt;657 sayılı Devlet Memurları Kanunu’na göre, “&lt;strong&gt;izinler&lt;/strong&gt;” ile ilgili olarak aşağıdakilerden hangisi yanlıştır?&lt;/p&gt;', 18, 'Çocuğu evlenen memura, isteği üzerine yedi gün izin verilir.', 'Eşi doğum yapan memura, isteği üzerine on gün babalık izni verilir.', 'Teyzesi vefat eden memura, isteği üzerine yedi gün mazeret izni verilir.', 'Görevi sırasında veya görevinden dolayı bir kazaya veya saldırıya uğrayan memur, iyileşinceye kadar izinli sayılır.', 'c', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(185, '&lt;p&gt;657 sayılı Devlet Memurları Kanunu’na göre, aşağıdaki fiillerden hangisi için adı geçen Kanun’da öngörülen disiplin cezası, “&lt;strong&gt;disiplin amiri&lt;/strong&gt;” tarafından verilmez?&lt;/p&gt;', 18, 'Devlet memuru vakarına yakışmayan tutum ve davranışta bulunmak', 'Hizmet dışında Devlet memurunun itibar ve güven duygusunu sarsacak nitelikte davranışlarda bulunmak', 'Yetki almadan gizli bilgileri açıklamak', 'Devlete ait resmi belge, araç, gereç ve benzerlerini özel menfaat sağlamak için kullanmak', 'c', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(186, '&lt;p style=&quot;text-align:justify;&quot;&gt;2886 sayılı Devlet İhale Kanunu’nun “&lt;strong&gt;ihale komisyonları&lt;/strong&gt;”na ilişkin düzenlemesinde, belediyelere ait ihalelerin, aşağıdaki makamlardan hangisi tarafından yürütüleceği belirtilmiştir?&lt;/p&gt;', 19, 'Belediye meclisi', 'Belediye encümeni', 'Vali', 'Belediye başkanı', 'b', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(187, '&lt;p&gt;4734 sayılı Kamu İhale Kanunu’na göre, “&lt;strong&gt;büyük onarım&lt;/strong&gt;”, aşağıdaki kavramlardan hangisinin tanımında yer almaktadır?&lt;/p&gt;', 20, 'Hizmet', 'Mal', 'Danışman', 'Yapım', 'd', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(188, '&lt;p style=&quot;text-align:justify;&quot;&gt;I. Pazarlık usulü II. Açık ihale usulü III. Belli istekliler arasında ihale usulü 4734 sayılı Kamu İhale Kanunu uyarınca, “&lt;strong&gt;ön ilan&lt;/strong&gt;” yapılan hâllerde, ihalenin, yukarıda belirtilen ihale usullerinden hangisiyle/hangileriyle gerçekleştirilmesi mümkün değildir?&lt;/p&gt;', 20, 'Yalnız I', 'Yalnız II', 'I ve III', 'Yalnız III', 'a', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(189, '&lt;ol&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;İlan ve ihale dokümanında belirtilmesi kaydıyla, belli istekliler arasında ihalede, tekliflerin değerlendirilmesi aşamasının tamamlanmasından sonra elektronik eksiltme yapılabilir.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Tüm danışmanlık hizmet alımı ihalelerinde elektronik eksiltme uygulanabilir.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Dinamik alım sistemi ve çerçeve anlaşma kapsamında yapılan ihalelerde, elektronik eksiltme uygulanamaz.&amp;nbsp;&lt;/li&gt;&lt;/ol&gt;&lt;p style=&quot;text-align:justify;&quot;&gt;4734 sayılı Kamu İhale Kanunu’na göre, “elektronik eksiltme” ile ilgili olarak yukarıdakilerden hangileri yanlıştır?&lt;/p&gt;', 20, 'I ve II', 'I ve III', 'I, II ve III', 'II ve III', 'd', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(190, '&lt;p&gt;4734 sayılı Kamu İhale Kanunu’na göre, açık ihale usulüyle yapılan ihalenin sonucunun bütün isteklilere bildiriminden itibaren kaç gün geçmedikçe sözleşme &lt;strong&gt;imzalanamaz&lt;/strong&gt;?&lt;/p&gt;', 20, '3', '5', '7', '10', 'd', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(191, '&lt;ol&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;İhale konusu mal veya hizmet alımları ile yapım işlerinin özgün nitelikte ve karmaşık olması nedeniyle teknik ve mali özelliklerinin gerekli olan netlikte belirlenememesi durumunda, “pazarlık usulü” ile ihale yapılabilir.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Yaklaşık maliyeti eşik değerin yarısını aşan yapım işi ihaleleri, “belli istekliler arasında ihale” usulüne göre yaptırılabilir.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Milletlerarası tahkim yoluyla çözülmesi öngörülen uyuşmazlıklarla ilgili davalarda, 4734 sayılı Kanun kapsamındaki idareleri temsil ve savunmak üzere avukatlardan yapılacak hizmet alımları, ilan yapılmaksızın ve teminat alınmaksızın “doğrudan temin” usulüyle gerçekleştirilebilir.&amp;nbsp;&lt;/li&gt;&lt;/ol&gt;&lt;p style=&quot;text-align:justify;&quot;&gt;4734 sayılı Kamu İhale Kanunu’na göre, yukarıdakilerden hangileri doğrudur?&lt;/p&gt;', 20, 'I ve II', 'I ve III', 'I, II ve III', 'II ve III', 'c', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(192, '4735 sayılı Kamu İhale Sözleşmeleri Kanunu uyarınca, sözleşme türlerine göre fiyat farkı\r\nverilebilmesine ilişkin esas ve usulleri tespit yetkisi ile ilgili olarak aşağıdakilerden hangisi doğrudur?', 21, 'Kamu İhale Kurumu’nun teklifi üzerine Hazine ve Maliye Bakanlığı yetkilidir.', 'Kamu İhale Kurumu’nun teklifi üzerine Cumhurbaşkanı yetkilidir.', 'Doğrudan Kamu İhale Kurumu yetkilidir.', 'Doğrudan Cumhurbaşkanı yetkilidir.', 'b', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(193, '&lt;ol&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;4735 sayılı Kanun’da belirtilen yasak fiil veya davranışları nedeniyle haklarında mükerrer ceza hükmolunan kişilerin ortağı olduğu şahıs şirketleri, mahkeme kararı ile sürekli olarak kamu ihalelerine katılmaktan yasaklanır.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;4735 sayılı Kanun’da belirtilen fiil veya davranışlardan 5237 sayılı Türk Ceza Kanunu’na göre suç teşkil eden fiil veya davranışlarda bulunan kişiler hakkında Türk Ceza Kanunu hükümlerine göre ceza kovuşturması yapılmak üzere yetkili Cumhuriyet Savcılığına suç duyurusunda bulunulabilmesi için, bu durumun, iş tamamlanmadan önce tespit edilmiş olması şarttır.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Sürekli olarak kamu ihalelerine katılmaktan yasaklanmış olanlara ilişkin mahkeme kararları, Kamu İhale Kurumunca bildirimi izleyen on gün içinde Resmî Gazete’de yayımlanmak suretiyle duyurulur.&amp;nbsp;&lt;/li&gt;&lt;/ol&gt;&lt;p style=&quot;text-align:justify;&quot;&gt;4735 sayılı Kamu İhale Sözleşmeleri Kanunu’na göre, yukarıdakilerden hangileri yanlıştır?&lt;/p&gt;', 21, 'I ve II', 'I ve III', 'I, II ve III', 'II ve III', 'd', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(194, '&lt;p&gt;5018 sayılı Kamu Mali Yönetimi ve Kontrol Kanunu’na göre, bütçe türleri ve kapsamı hakkında aşağıdakilerden hangisi &lt;strong&gt;yanlıştır&lt;/strong&gt;?&lt;/p&gt;', 22, 'Mahallî idare bütçesi, mahallî idare kapsamındaki kamu idarelerinin bütçesi olup bu Kanuna ekli (IV) sayılı cetvelde yer alan her bir mahalli kamu idaresinin bütçesidir.', 'Genel bütçe, Devlet tüzel kişiliğine dâhil olan ve bu Kanuna ekli (I) sayılı cetvelde yer alan kamu idarelerinin bütçesidir.', 'Özel bütçe, bir bakanlığa bağlı veya ilgili olarak belirli bir kamu hizmetini yürütmek üzere kurulan, gelir tahsis edilen, bu gelirlerden harcama yapma yetkisi verilen, kuruluş ve çalışma esasları kanunla veya Cumhurbaşkanlığı kararnamesiyle düzenlenen ve bu Kanuna ekli (II) sayılı cetvelde yer alan her bir kamu idaresinin bütçesidir.', 'Düzenleyici ve denetleyici kurum bütçesi, kanunla veya Cumhurbaşkanlığı kararnamesiyle kurul, kurum veya üst kurul şeklinde teşkilatlanan ve bu Kanuna ekli (III) sayılı cetvelde yer alan her bir düzenleyici ve denetleyici kurumun bütçesidir.', 'a', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(195, '&lt;p&gt;5018 sayılı Kamu Mali Yönetimi ve Kontrol Kanunu’na göre, harcama yetkilisi, harcama talimatı ve sorumluluk hakkında aşağıdakilerden hangisi &lt;strong&gt;doğrudur&lt;/strong&gt;?&lt;/p&gt;', 22, 'Harcama yetkisinin devredilmesi, yetkiyi devredenin idarî sorumluluğunu ortadan kaldırmaz.', 'Bütçelerden harcama yapılabilmesi, Hazine ve Maliye Bakanlığı’nın harcama talimatı vermesiyle mümkündür.', 'Harcama talimatlarında, hizmet gerekçesi ve gerçekleştirme usulü ile gerçekleştirmeyle görevli olanlara ilişkin bilgiler yer alır.', 'Harcama yetkilileri, sadece bütçede öngörülen ödenekleri kadar harcama yapabilir.', 'a', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(196, '&lt;p&gt;5018 sayılı Kamu Mali Yönetimi ve Kontrol Kanunu’na göre, ödenemeyen giderler ve bütçeleştirilmiş borçlara ilişkin aşağıdakilerden hangisi &lt;strong&gt;söylenemez&lt;/strong&gt;?&lt;/p&gt;', 22, 'Ödeme emri belgesine bağlandığı halde ödenemeyen tutarlar, bütçeye gider yazılarak emanet hesaplarına alınır ve buradan ödenir.', 'İlgili olduğu malî yılın sonundan başlayarak on yıl içinde alacaklıları tarafından geçerli bir mazerete dayanmaksızın, yazılı talep edilmediğinden veya belgeleri verilmediğinden dolayı ödenemeyen borçlar zamanaşımına uğrayarak kamu idareleri lehine düşer. ', 'Ancak, malın alındığı veya hizmetin yapıldığı malî yılı izleyen beşinci yılın sonuna kadar talep edilmeyen emanet hesaplarındaki tutarlar bütçeye gelir kaydedilir.', 'Kamu idarelerinin nakit mevcudunun tüm ödemeleri karşılayamaması halinde giderler, muhasebe kayıtlarına alınma sırasına göre ödenir.', 'b', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(197, '&lt;p&gt;5018 sayılı Kamu Mali Yönetimi ve Kontrol Kanunu’na göre, aşağıda verilen tanımlardan hangisi &lt;span style=&quot;color:hsl(0, 75%, 60%);&quot;&gt;&lt;strong&gt;yanlıştır&lt;/strong&gt;&lt;/span&gt;?&lt;/p&gt;', 22, 'Muhasebe Hizmeti: Gelirlerin ve alacakların tahsili, giderlerin hak sahiplerine ödenmesi, para ve parayla ifade edilebilen değerler ile emanetlerin alınması, saklanması, ilgililere verilmesi, gönderilmesi ve diğer tüm malî işlemlerin kayıtlarının yapılması ve raporlanması işlemleridir.', 'Kamu Yatırım Projesi: Usulüne uygun olarak düzenlenmiş sözleşme esaslarına veya kanun veya Cumhurbaşkanlığı kararnamesi hükmüne dayanılarak iş yaptırılması, mal veya hizmet alınması karşılığında geleceğe yönelik bir ödeme yükümlülüğüne girilmesidir.', 'Kamu Zararı: Kamu görevlilerinin kasıt, kusur veya ihmallerinden kaynaklanan mevzuata aykırı karar, işlem veya eylemleri sonucunda kamu kaynağında artışa engel veya eksilmeye neden olunmasıdır.', 'Ödenek Üstü Harcama: Kamu zararı oluşturmamakla birlikte bütçelere, ayrıntılı harcama programlarına, serbest bırakma oranlarına aykırı olarak veya ödenek gönderme belgelerindeki ödenek miktarını aşan harcamadır.', 'b', '&lt;p&gt;&lt;i&gt;&lt;strong&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/strong&gt;&lt;/i&gt;&lt;/p&gt;', 'admin', 1),
(199, '&lt;p&gt;Aşağıdakilerden hangisi, 5018 sayılı Kamu Mali Yönetimi ve Kontrol Kanunu’na göre, ilgili şartların yerine getirilmesiyle girişilen ertesi yıla yüklenme için niteliğinden dolayı malî yılla sınırlı tutulamayan ve sürekliliği bulunan iş ve hizmetler kapsamına &lt;strong&gt;girmez&lt;/strong&gt;?&lt;/p&gt;', 22, 'Türk Silahlı Kuvvetlerinin yapım, onarım, etüt ve proje işleri, araştırma-geliştirme projeleri, giyecek ve yiyecek alımları, makine-teçhizat, silah-mühimmat-teçhizat alımlarıyla bunların bakım, onarım ve imalat işleri', 'Taşıtların malî sorumluluk sigortası ile yurt dışından tedariki yapılan silah, silah-teçhizat ve mühimmat sevkinin her türlü riske karşı sigortalanması amacıyla yaptırılan nakliyat sigortası', 'Milli İstihbarat Teşkilatı Müsteşarlığının etüt ve proje işleri, araştırma-geliştirme projeleri, makine, silahmühimmat, teçhizat ve sistem alımlarıyla bunların bakım, onarım ve imalat işleri', 'Dışişleri Bakanlığının, Cumhurbaşkanlığının onayıyla, yabancı ülkelerde dış temsilcilik binası veya arsa satın alınması, bina yaptırılması veya kiralanması işleri', 'd', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(200, '7201 sayılı Tebligat Kanunu hükümlerine göre, ilanen tebligat hangi durumda yapılır?', 23, 'İlanen tebligat yapılması için muhatabın adresinin meçhul olması gerekir. ', 'İlanen tebligat yapılabilmesi için muhatabın yerleşim yerinin bir yabancı ülkede olması ve Türkiye’de de mutad meskeninin bulunmaması gerekir.', 'İlanen tebligat sadece Türkiye’de yaşayan yabancılara yapılabilir.', 'İlanen tebligat yapılabilmesi için muhatabın Adres Kayıt Sistemi’nde iş yeri adresinin bulunmaması gerekli ve yeterlidir.', 'a', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(201, '5510 Sayılı Sosyal Sigortalar ve Genel Sağlık Sigortası Kanunu’na göre, hizmet akdi ile çalışmamakla\r\nbirlikte, ceza infaz kurumları ile tutukevleri bünyesinde oluşturulan tesis, atölye ve benzeri ünitelerde\r\nçalıştırılan hükümlü ve tutuklular hakkında uygulanan sigorta kolları aşağıdakilerden hangisinde\r\ndoğru verilmiştir?', 24, 'İş kazası ve meslek hastalığı sigortası - Hastalık sigortası', 'Hastalık sigortası - Analık sigortası', 'İş kazası ve meslek hastalığı sigortası - Analık sigortası', 'Ölüm sigortası - Hastalık sigortası', 'c', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(203, '&lt;ol&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Türkiye’de ikamet eden yabancıların dilekçe hakkını kullanabilmesi için, dilekçelerinin Türkçe yazılması zorunlu değildir.&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Türkiye Büyük Millet Meclisi’ne veya yetkili makamlara verilen veya gönderilen dilekçelerde, dilekçe sahibinin adı-soyadı ve imzasının bulunması yeterlidir.&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Türk vatandaşlarının ve Türkiye’de ikamet eden yabancıların, kendileri ve kamu ile ilgili dilek ve şikayetleri konusunda yetkili makamlara yaptıkları başvuruların sonucu veya yapılmakta olan işlemin safahatı hakkında, dilekçe sahiplerine en geç altmış gün içinde gerekçeli olarak cevap verilir.&amp;nbsp;&lt;/li&gt;&lt;/ol&gt;&lt;p style=&quot;text-align:justify;&quot;&gt;3071 sayılı Dilekçe Hakkının Kullanılmasına Dair Kanun&#039;a göre, yukarıdakilerden hangileri &lt;strong&gt;yanlıştır&lt;/strong&gt;?&lt;/p&gt;', 25, 'I ve II', 'I ve III', 'II ve III', 'I, II ve III', 'd', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(204, '4 sayılı Bakanlıklara Bağlı, İlgili, İlişkili Kurum ve Kuruluşlar ile Diğer Kurum ve Kuruluşların Teşkilatı\r\nHakkında Cumhurbaşkanlığı Kararnamesi’ne göre, Ceza İnfaz Kurumları ile Tutukevleri İşyurtları\r\nKurumu’na ilişkin olarak aşağıdakilerden hangisi yanlıştır?', 26, 'İşyurtları Daire Başkanlığı, bir Daire Başkanı ile yeteri kadar tetkik hâkimi ve diğer personelden oluşur.', 'Ceza İnfaz Kurumları ile Tutukevleri İşyurtları Kurumu’na ilgili mevzuatına göre tahsis edilmiş olan sermaye miktarı, ihtiyaç hâlinde Adalet Bakanı’nın kararıyla üç katına kadar artırılabilir.', 'Ünitelerde üretilen ekonomik değerleri pazarlamak, işyurtlarının amaçları arasındadır.', 'Ceza İnfaz Kurumları ile Tutukevleri İşyurtları Kurumu’nun organları; İşyurtları Kurumu Yüksek Kurulu ile Daire Başkanlığı ve işyurtlarıdır.', 'b', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(205, 'İç Kontrol ve Ön Malî Kontrole İlişkin Usul Ve Esaslar çerçevesinde aşağıdakilerden hangisi yanlıştır?', 27, 'Ön malî kontrol sonucunda yazılı görüş düzenlenmesi halinde bu yazıda sadece görüşün belirtilmesi yeterlidir, talep edilmesi halinde gerekçe açıklanır.', 'Malî hizmetler biriminin ön malî kontrolüne tâbi malî karar ve işlemler, kontrol edilmek üzere malî hizmetler birimine gönderilir.', 'Malî hizmetler birimince kontrol edilen işlemler hakkında görüş yazısı düzenlenir ve ilgili birime gönderilir.', 'Malî hizmetler biriminin görüş yazısı ilgili işlem dosyasında saklanır ve bir örneği de ödeme emri belgesine eklenir.', 'a', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(206, '&lt;p style=&quot;text-align:justify;&quot;&gt;26324 sayılı Resmi Gazete’de yayınlanan Kamu Zararlarının Tahsiline İlişkin Usul ve Esaslar Hakkında Yönetmelik hükümlerine göre, kamu idaresinin yönetim ve kullanımında olan bir taşınırın &lt;strong&gt;09.06.2021&lt;/strong&gt; tarihinde zarar gördüğü tespit edilmiştir. Kamu zararının tespiti ile kamu zararından doğan bu alacağa ilişkin zamanaşımı ne zaman dolacaktır?&lt;/p&gt;', 28, '09.07.2021', '09.08.2021', '31.12.2031', '31.12.2026', 'c', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(207, '&lt;p&gt;26040 sayılı (3. Mükerrer) Resmi Gazete’de yayınlanan Merkezi Yönetim Harcama Belgeleri Yönetmeliğine göre, aşağıdakilerden hangisi ön ödeme olan mevzuatları gereği yüklenicilere verilecek avanslar şeklinde yapılacak kamu harcamalarında, ödeme belgesi olarak bağlanacak kanıtlayıcı belgeler arasında &lt;span style=&quot;color:hsl(0, 75%, 60%);&quot;&gt;&lt;strong&gt;gösterilemez&lt;/strong&gt;&lt;/span&gt;?&lt;/p&gt;', 29, 'Gereken hallerde kredi izin yazısı', 'Avans teminatına ilişkin alındının onaylı örneği', 'Gereken hallerde Bakanlığın uygun görüş yazısı veya üst yöneticinin kararı', 'Harcama talimatı, ihale mevzuatına göre yapılacak alımlarda onay belgesi', 'a', '&lt;p&gt;&lt;i&gt;&lt;strong&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/strong&gt;&lt;/i&gt;&lt;/p&gt;', 'admin', 1),
(208, '&lt;p&gt;26040 sayılı (3. Mükerrer) Resmi Gazete’de yayınlanan Merkezi Yönetim Harcama Belgeleri Yönetmeliğine göre, Kamu İhale Kanunu’nun (e) fıkrasında sayılan kuruluşlardan yapılan mal ve hizmet alım giderlerinin ödenmesinde aşağıdaki belgelerden hangisi &lt;span style=&quot;color:hsl(0, 75%, 60%);&quot;&gt;&lt;strong&gt;aranmaz&lt;/strong&gt;&lt;/span&gt;?&lt;/p&gt;', 29, 'Hizmet alımlarında Hizmet İşleri Hakediş Raporu', 'Kredi anlaşmasında öngörülmüş ise kreditör onay belgesi', 'Mal ve malzeme alımlarında taşınır işlem fişi', 'Düzenlenmesi gereken hallerde protokol', 'b', '&lt;p&gt;&lt;i&gt;&lt;strong&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/strong&gt;&lt;/i&gt;&lt;/p&gt;', 'admin', 1),
(210, '&lt;p&gt;27327 sayılı Resmi Gazete’de yayınlanan Kamu İhale Genel Tebliği’ne göre, ihale komisyonu hakkında aşağıdakilerden hangisi &lt;span style=&quot;color:hsl(0, 75%, 60%);&quot;&gt;&lt;strong&gt;söylenemez&lt;/strong&gt;&lt;/span&gt;?&lt;/p&gt;', 30, 'İhale komisyonlarının idare personelinden oluşturulması gerekmekte olup, ihaleyi yapan idarede yeterli sayı veya nitelikte personel bulunmaması halinde bu Kanun kapsamındaki idarelerden komisyona üye alınabilecektir.', 'Yedek üyelerin asıl üyelerin taşıması gereken özellikleri haiz olması gerekir. Yedek üyeler tespit edilirken ihale konusu işin uzmanları ile muhasebe veya mali işlerden sorumlu personel yerine geçecek yedek üyeler mutlaka belirlenmelidir.', 'İhale işlem dosyasının birer örneği, ilan veya davet tarihini izleyen yedi gün içinde idare tarafından ihale komisyonunun asıl üyelerine verilir. İdare tarafından gerek görüldüğü takdirde, yedek üyelere de ihale işlem dosyasının birer örneği verilebilir. Yedek üyenin asıl üyenin yerine ihale komisyonunda görev alması halinde ise ihale işlem dosyasının bir örneğinin yedek üyeye verilmesi zorunludur.', ' İhale komisyonu başkan ve üyeleri çekimser oy kullanamazlar ve verdikleri oy ve kararlardan sorumludurlar. Bu nedenle, çoğunluk görüşüne katılmayanların karşı oylarını ve gerekçesini komisyon kararına yazarak imzalamaları gerekmektedir. İhale komisyonunun eksiksiz toplanıp karar vermesi gerektiğinden, eksik üye ile ihale komisyon kararı alınamaz.', 'c', '&lt;p&gt;&lt;i&gt;&lt;strong&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/strong&gt;&lt;/i&gt;&lt;/p&gt;', 'admin', 1);
INSERT INTO `sorular` (`id`, `soru`, `kategori`, `a`, `b`, `c`, `d`, `dogru_cevap`, `aciklama`, `soruyu_yazan`, `durum`) VALUES
(211, '&lt;p&gt;27327 sayılı Resmi Gazete’de yayınlanan Kamu İhale Genel Tebliği’ne göre, idarelerin Elektronik Kamu Alımları Platformuna kayıt işlemleri hakkında aşağıdakilerden hangisi &lt;span style=&quot;color:hsl(0, 75%, 60%);&quot;&gt;&lt;strong&gt;yanlıştır&lt;/strong&gt;&lt;/span&gt;?&lt;/p&gt;', 30, 'Bir idare kullanıcısının bu idareden herhangi bir sebeple ayrılması veya Elektronik Kamu Alımları Platformunu kullanımını gerektirmeyen bir göreve atanması durumunda platform sorumlusu tarafından bu kişinin hesabı “kapalı” durumuna getirilecektir. Ayrıca, idareden ayrılma durumunda düzenlenen ilişik kesme belgelerinde bu kişinin Elektronik Kamu Alımları Platformu üzerinde işlem yapma yetkisinin kapatıldığı hususuna yer verilmeli ve bu durum Kamu İhale Bülteninde yayımlanmalıdır.', 'İdarenin Elektronik Kamu Alımları Platformuna kaydı, Elektronik Kamu Alımları Platformu üzerinden düzenlenen protokolün posta yolu ile ya da elden Kuruma ulaştırılması yoluyla gerçekleştirilmektedir. Düzenlenen protokolde, Elektronik Kamu Alımları Platformunda yer alan iş ve işlemleri idare adına yürütmek üzere en fazla iki platform sorumlusunun belirtilmesi gerekmektedir. İdare, Kuruma gönderdiği bu protokolün durumuna ilişkin bilgilere Elektronik Kamu Alımları Platformu üzerinden erişebilecektir. Protokoldeki bilgilerin eksik olması durumunda yapılacak iş ve işlemlerin takibinden idareler sorumludur.', 'Platform sorumluları ihale sürecinde yer alacak tüm kullanıcı/kullanıcıları tanımlamaya ve bu kişilerin bilgilerinde değişiklik yapmaya yetkilidir. Birden fazla platform sorumlusunun belirlendiği ve bunlardan birinin değiştiği hallerde, değişen platform sorumlusu kendi yerine yeni bir platform sorumlusu tanımlayabileceği gibi, diğer platform sorumlusu tarafından da bu tanımlama yapılabilecektir. Platform sorumlularının ikisinin de aynı anda değişmesi durumunda ise değişikliğe ilişkin belgelerin posta yolu ile ya da elden Kuruma ulaştırılması gerekmektedir.', 'Elektronik Kamu Alımları Platformuna yeni eklenecek kullanıcıların tanımlanmaları, gerekli yetki ve rollerinin atanması işlemleri de platform sorumlusu tarafından yapılacaktır. Bu kapsamda; ihale yetkilisi tarafından yedekleriyle birlikte görevlendirilen ihale komisyonu başkan ve üyelerinin, görevlendirildikleri ihaleyle sınırlı olarak tanımlanmaları da platform sorumlusu tarafından yapılacaktır.', 'a', '&lt;p&gt;&lt;i&gt;&lt;strong&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/strong&gt;&lt;/i&gt;&lt;/p&gt;', 'admin', 1),
(212, '&lt;p&gt;27327 sayılı Resmi Gazete’de yayınlanan Kamu İhale Genel Tebliği’ne göre, kısmi tekliflerin değerlendirilmesi süreci ile ilgili aşağıdakilerden hangisi &lt;span style=&quot;color:hsl(0, 75%, 60%);&quot;&gt;&lt;strong&gt;söylenemez&lt;/strong&gt;&lt;/span&gt;?&lt;/p&gt;', 30, 'Kısmi teklif verilebilen ihalelerde isteklilerce her bir iş kısmına ayrı ayrı teklif vermek suretiyle işin tamamına teklif verilebileceği gibi, ihale dokümanında belirtilen kısımlardan bazılarına da teklif verilebilecektir.', 'Kısmi teklife açık olan ihalelere yönelik şikâyet veya itirazen şikâyet başvurusunda bulunulması halinde başvuru sonuçlandırılmadan sözleşme imzalanamaz. Bu durumda, başvuruya konu edilmeyen diğer kısım/kalem veya gruplara ilişkin sözleşmeler imzalanabilecektir.', 'Kısmi teklif verilmesine imkân tanınan ihalede; aday veya isteklinin yeterlik değerlendirmesi, başvuruda bulunduğu veya teklif verdiği her bir kısım için ayrı ayrı yapılacaktır', 'Mal ve hizmet alımlarında bir idareye bağlı birimlerin ihtiyaçlarının bir merkezden yapılan ihale ile karşılanması amacıyla kısmi teklife imkân verilen ihalelere münhasıran ve idari şartnamenin “Kısmi teklife ilişkin açıklamalar” başlığı altında idarece bu hususun düzenlenmiş olması kaydıyla her bir kısım için ayrı ayrı sözleşme imzalanabilecektir. Ayrı ayrı sözleşmeye bağlanacak her kısım için ayrı geçici teminat alınacaktır.', 'd', '&lt;p&gt;&lt;i&gt;&lt;strong&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/strong&gt;&lt;/i&gt;&lt;/p&gt;', 'admin', 1),
(213, '&lt;p&gt;27327 sayılı Resmi Gazete’de yayınlanan Kamu İhale Genel Tebliği’ne göre, idarelerce belgelerdeki eksik bilgilerin tamamlatılması hakkında aşağıdakilerden hangisi &lt;span style=&quot;color:hsl(0, 75%, 60%);&quot;&gt;&lt;strong&gt;yanlıştır&lt;/strong&gt;&lt;/span&gt;?&lt;/p&gt;', 30, 'İdarelerce bilgi eksikliklerinin tamamlatılmasına ilişkin olarak verilen süre içinde aday veya isteklilerce sunulan belgelerin, başvuru veya ihale tarihinden sonraki bir tarihte düzenlenmesi halinde, bu belgeler, aday veya isteklinin başvuru veya ihale tarihi itibarıyla ihaleye katılım şartlarını sağladığını tevsik etmesi halinde kabul edilecektir.', 'Bilgi eksikliklerinin giderilmesine ilişkin belgeler, idarece ilgili kurum veya kuruluştan re’sen istenebilir. Söz konusu belgelerin aday veya istekliler tarafından tamamlatılmasının istenilmesi halinde ise bilgi eksikliklerinin giderilmesine ilişkin belgelerin niteliği dikkate alınarak idarelerce aday veya isteklilere yedi iş gününden az olmamak üzere makul bir tamamlama süresi verilecektir.', 'Bilgi eksikliklerinin tamamlatılmasına ilişkin belgelerin yazılı olarak istenilmesi ve aday ve isteklilerce bir dilekçe ekinde sunulması gerekmektedir. İdarece belirlenen sürede eksik bilgileri tamamlamayan aday ve isteklilerin başvuruları veya teklifleri değerlendirme dışı bırakılır ve isteklilerin geçici teminatları gelir kaydedilir.', 'İlgili mevzuatına göre ihaleye katılma şartı olarak istenmesi gereken belge veya bilgilerin idarece istenmediği ve bu durumun tekliflerin değerlendirilmesi aşamasında tespit edildiği hallerde, idarelerce bu tür belge veya bilgiler başvuruların ya da tekliflerin değerlendirilmesi aşamasında aday veya isteklilerden talep edilemeyecek ve tamamlatılamayacaktır.', 'b', '&lt;p&gt;&lt;i&gt;&lt;strong&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/strong&gt;&lt;/i&gt;&lt;/p&gt;', 'admin', 1),
(214, '6245 sayılı Harcırah Kanunu’nda geçen yol masrafı, yevmiye, aile masrafı ve yer değiştirme\r\nmasrafının birlikte verilmesini icap ettiren hallere göre aşağıdakilerden hangisi yanlıştır?', 31, 'Emekliliğini isteyen veya emekliye sevk olunan yahut haklarında toptan ödeme hükümleri uygulanan memur ve hizmetlilere, Türkiye dâhilinde ikamet edecekleri yere kadar ve yalnız bir defaya mahsus olmak üzere verilir.', 'Yurt içinde veya yurt dışında görev yapmakta iken yurt içinde veya yurt dışındaki sürekli bir göreve naklen atanan ya da yabancı ülkelerdeki memuriyet merkezi değiştirilen memur ve hizmetlilere yeni görev yerlerine kadar verilir.', 'Kadro dolayısıyla açıkta kalan veya vekâlet emrine alınan memurlara açık aylıklarını Türkiye dâhilinde tesviye ettirecekleri yere kadar verilir.', 'Asilin vüruduna kadar muvakkaten gönderilmiş olmayıp da vekâlet namı altında asaleten gönderilen ve vekâlet müddeti belli olmayan kumandan ve memurlara vazife mahallerine kadar verilir.', 'a', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(215, '&lt;ol&gt;&lt;li&gt;Kurumlarda hükümlülerin ve tutukluların eğitim ve öğrenim işlerini düzenlemek&lt;/li&gt;&lt;li&gt;Adalet Bakanı’na veya Adalet Bakanlığı’na mevzuatla verilen cezai işlerle ilgili işlemleri yürütmek&lt;/li&gt;&lt;li&gt;Yurtdışında işlenen ve Türk yargı yetkisine giren suçlar konusunda adli makamlara bilgi ve belge sağlanmasına yardımcı olmak&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&amp;nbsp;1 sayılı Cumhurbaşkanlığı Teşkilatı Hakkında Cumhurbaşkanlığı Kararnamesi’nde, yukarıdakilerden hangileri, Ceza ve Tevkifevleri Genel Müdürlüğü’nün görev ve yetkileri arasında sayılmamıştır?&lt;/p&gt;', 32, 'I ve II', 'I ve III', 'I, II ve III', 'II ve III', 'd', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(216, 'Adalet Bakanlığı ile Milli Eğitim Bakanlığı arasında yapılan Eğitim ve Öğretim İş Birliği Protokolü,\r\naşağıdakilerden hangisini kapsamaz?', 33, 'Tutuklular', 'Eski hükümlüler', 'Annesinin yanında kalan 0-2 yaş grubu çocuklar', 'Yükümlüler', 'c', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(217, 'Adalet Bakanlığının Ceza İnfaz Kurumlarında Barındırılanların Uluslararası Standartlarda İnsan\r\nHakları Merkezli Sağlığa Erişimi ve Tedavileri, Tedavi Nedeniyle Nakilleri, Ceza Tehiri İşlemleri\r\nGenelgesi’ne göre, sirkülasyonu ve mevcudu fazla olan kurumlar hariç, hükümlü ve tutukluların\r\ntüberküloz taramasının hangi sıklıkla yapılması gerekir? ', 34, 'Yılda en az bir defa', 'Yılda en az iki defa', 'Ayda en az bir defa', 'Haftada en az bir defa', 'a', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(218, 'Adalet Bakanlığının Ceza İnfaz Kurumlarında Barındırılanların Uluslararası Standartlarda İnsan\r\nHakları Merkezli Sağlığa Erişimi ve Tedavileri, Tedavi Nedeniyle Nakilleri, Ceza Tehiri İşlemleri\r\nGenelgesi’ne göre, hükümlü ve tutukluların sağlık kuruluşlarına sevk ve tedavileri konusunda\r\naşağıdakilerden hangisi yanlıştır?', 34, 'Hastaneye sevk konusunda azami çabukluğun sağlanması için gerekli önlemler ilgili Cumhuriyet başsavcılığınca alınır.', 'Özel sağlık kuruluşlarına sevk ve buralarda tedavi hiçbir koşulda mümkün değildir.', 'Üniversite hastanelerine sevk ve buralarda tedavi mümkündür.', 'Acil olarak sağlık kuruluşlarına sevk gerektiğinde, eğer aile ve kurum hekimi kurumda değilse, o an kurumda bulunan en üst yetkilinin yazılı izniyle de sevk mümkündür.', 'b', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(219, '&lt;p&gt;Adalet Bakanlığı Disiplin Yönetmeliğine göre, aşağıdakilerden hangisi &lt;span style=&quot;color:hsl(0, 75%, 60%);&quot;&gt;&lt;strong&gt;doğrudur&lt;/strong&gt;&lt;/span&gt;?&lt;/p&gt;', 35, 'Memur hakkında, kanun yollarına başvuru sebebi olarak ileri sürülebilecek hususları içeren ihbar ve şikâyetler işleme konulmaz.', 'Aynı olaydan dolayı memur hakkında adli soruşturma veya kovuşturma bulunması durumunda, disiplin soruşturması yapılamaz.', 'Muhakkik, kendisini görevlendiren disiplin amirinin bütün yetkilerini haizdir.', 'Bakanlık Disiplin Kurulu başkan ve üyelerinin görev süreleri üç yıldır.', 'a', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(220, '&lt;ol&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Bu Yönetmelik hükümleri, adli ve idari yargı hâkim ve savcıları ile Adalet Bakanlığı merkez ve taşra teşkilatlarında görevli memurlar ile sözleşmeli personel hakkında uygulanır.&amp;nbsp;&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Yüksek Disiplin Kurulu, Adalet Bakanı’nın başkanlığında, Teftiş Kurulu Başkanı, Ceza İşleri Genel Müdürü, Ceza ve Tevkifevleri Genel Müdürü, Personel Genel Müdürü ile varsa Devlet memurunun üyesi olduğu sendikanın temsilcisinden oluşur.&lt;/li&gt;&lt;li style=&quot;text-align:justify;&quot;&gt;Denetimli Serbestlik Bürolarında görevli psikoloğun ikinci disiplin amiri, Ceza ve Tevkifevleri Genel Müdür Yardımcısıdır.&amp;nbsp;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;Adalet Bakanlığı Disiplin Yönetmeliğine göre, yukarıdakilerden hangileri &lt;span style=&quot;color:hsl(0, 75%, 60%);&quot;&gt;&lt;strong&gt;yanlıştır&lt;/strong&gt;&lt;/span&gt;?&lt;/p&gt;', 35, 'I ve II', 'I ve III', 'I, II ve III', 'II ve III', 'c', '&lt;p&gt;2021 İkinci Müdürlük GYS çıkmış sorusudur.&lt;/p&gt;', 'admin', 1),
(221, 'Gözlem ve Sınıflandırma Merkezleri ile Hükümlülerin Değerlendirilmesine Dair Yönetmeliğe göre,\r\nhükümlünün tanınması, davranışlarının değerlendirilerek hakkında uygulanacak rejimin belirlenmesi,\r\nkişinin durumuna uygun ceza infaz kurumuna ayrılması, infazın bireyselleştirilmesi, iyileştirme\r\nprogramlarına katılması, hükümlülük süresi içerisinde davranışlarının izlenmesi ve hükümlü\r\nhakkındaki iyi hâl değerlendirmesine dayanak oluşturması amacıyla ceza infaz kurumunda kalma\r\nsüresi altı aydan fazla olan hükümlüler hakkında düzenlenen ve gelişim puanlamasını içeren belgeye\r\nne ad verilir?', 36, 'Bireyselleştirme raporu', 'İyileştirme raporu', 'Gelişim değerlendirme raporu', 'Sınıflandırma raporu', 'c', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(222, 'Gözlem ve Sınıflandırma Merkezleri ile Hükümlülerin Değerlendirilmesine Dair Yönetmeliğe göre,\r\naşağıdakilerden hangisi hükümlülerin bulundukları veya gönderildikleri ceza infaz kurumlarında\r\nayrıldıkları ve bu Yönetmelikte sayılan gruplardan biri değildir?', 36, 'Tehlike hâli taşıyanlar', 'Gözlem sürecinin devamına karar verilenler', 'Zihinsel ve bedensel durumları nedeniyle veya yaşları itibarıyla özel bir infaz rejimine tâbi tutulması gerekenler', 'Hakkında koruma tedbirlerinin uygulanmasına devam edilenler', 'd', '2021 İkinci Müdürlük GYS çıkmış sorusudur.', 'admin', 1),
(223, 'Gözlem ve Sınıflandırma Merkezleri ile Hükümlülerin Değerlendirilmesine Dair Yönetmeliğe göre,\r\naşağıdakilerden hangisi zihinsel ve bedensel durumlar nedeniyle yapılan gruplandırmanın\r\nkapsamında değildir?', 36, 'Cinsel yönelimi farklı olanlar', 'Aktif örgüt üyesi olanlar', 'Uyuşturucu ve alkol bağımlılığı olanlar', 'Akıl hastalığı dışında psikolojik rahatsızlığı olanlar', 'b', '2021 İkinci Müdürlük GYS çıkmış sorusudur.\r\n', 'admin', 1),
(256, '&lt;p style=&quot;text-align:justify;&quot;&gt;5275 sayılı Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Kanun uyarınca, yakalama emrine ilişkin aşağıdakilerden hangisi yanlıştır?&lt;/p&gt;', 1, 'Hükümlünün kasten işlediği bir suçtan üç yıldan fazla hapis cezasına mahkûm olması halinde cezasının infazı için doğrudan yakalama emri çıkarılır', 'Hükümlünün taksirle işlediği bir suçtan beş yıldan fazla hapis cezasına mahkûm olması halinde cezasının infazı için doğrudan yakalama emri çıkarılır.', 'Hükümlünün hapis cezasının infazı için gönderilen çağrı kâğıdını tebellüğ ettikten sonra 10 gün içerisinde gelmemesi halinde yakalama emri çıkarılır.', 'Adlî para cezasından çevrilen hapis cezasının infazı için doğrudan yakalama emri çıkarılır.', 'd', '&lt;p&gt;2021 İdare Memurluğu Görevde Yükselme Sınavı Sorusudur.&lt;/p&gt;', 'admin', 1),
(257, '&lt;p&gt;5275 sayılı Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Kanun uyarınca, 30/3/2020 tarihinden sonraki eylemleri bakımından, çocuk hükümlüler hakkında verilen disiplin cezalarının kalkmasıyla ilgili aşağıdakilerden hangisi doğrudur?&lt;/p&gt;', 1, 'Kınama cezası kurum en üst amiri tarafından kaldırılır.', 'Bazı etkinliklere katılmaktan alıkoyma cezası kurum en üst amirinin önerisi ve disiplin kurulu kararıyla kalkar.', 'Çocuğun bulunduğu kurumun disiplin kurulu, kurum kurallarına uyma, iyileştirme programında ilerleme veya verilen ceza ile amaçlanan sonucun gerçekleşmesi durumunda, çocuk hakkında verilen disiplin cezasını süre koşulu aranmaksızın her zaman kaldırabilir.', 'Firarın söz konusu olup olmadığına bakılmaksızın, disiplin cezaların kalkması için öngörülen süreler cezanın infazının tamamlandığı günden itibaren başlar.', 'c', '&lt;p&gt;2021 İdare Memurluğu Görevde Yükselme Sınavı Sorusudur.&lt;/p&gt;', 'admin', 1),
(258, '&lt;p&gt;5275 sayılı Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Kanun uyarınca, aşağıdaki suçlardan hangisi, hükümlünün suçu, suç işlemek amacıyla örgüt kurmak, yönetmek veya bu örgütün faaliyeti çerçevesinde işlemekten mahkûm olması halinde, cezası, süresine bakılmaksızın yüksek güvenlikli kapalı infaz kurumunda infaz edilecek suçlardan biri değildir?&lt;/p&gt;', 1, ' İnsanlığa karşı suçlar', ' Kasten öldürme suçu', 'Uyuşturucu veya uyarıcı madde kullanılmasını kolaylaştırma suçu', 'Anayasayı ihlâl suçu', 'c', '&lt;p&gt;2021 İdare Memurluğu Görevde Yükselme Sınavı Sorusudur.&lt;/p&gt;', 'admin', 1),
(259, '&lt;p&gt;5275 sayılı Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Kanun uyarınca, “hücreye koyma” disiplin cezasıyla ilgili aşağıdakilerden hangisi yanlıştır?&lt;/p&gt;', 1, 'Hücreye koyma cezası verilse bile, cezanın infazı sırasında hükümlünün açık havaya çıkma hakkı saklıdır.', 'Hücreye koyma cezasının infazına başlanması için cezanın kesinleşmesi gerekli ve yeterlidir.', 'Hücreye konulan hükümlünün, resmî ve yetkili merciler ve avukat ile görüşmesine engel olunmaz.', 'Hücreye koyma cezasının infazı, hükümlünün geceli ve gündüzlü, bir hücrede tek başına tutulması suretiyle yerine getirilir.', 'b', '&lt;p&gt;2021 İdare Memurluğu Görevde Yükselme Sınavı Sorusudur.&lt;/p&gt;', 'admin', 1),
(260, '&lt;p&gt;5275 sayılı Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Kanun uyarınca, hükümlülerin, mahkûmiyete konu suç nedeniyle doğmuş zararın aynen iade, suçtan önceki hâle getirme veya tazmin suretiyle tamamen giderilmesine dair hukukî sorumlulukları saklı kalmak üzere, hapis cezasının konutta çektirilmesi özel infaz usulüyle ilgili olarak aşağıdakilerden hangisi yanlıştır?&lt;/p&gt;', 1, 'Kadın veya çocukların mahkûm oldukları toplam bir yıl veya daha az süreli hapis cezasının konutunda çektirilmesine infaz hâkimi tarafından karar verilebilir', 'Altmışbeş yaşını bitirmiş kişilerin mahkûm oldukları toplam bir yıl altı ay veya daha az süreli hapis cezasının konutunda çektirilmesine infaz hâkimi tarafından karar verilebilir.', 'Yetmiş yaşını bitirmiş kişilerin mahkûm oldukları toplam iki yıl veya daha az süreli hapis cezasının konutunda çektirilmesine infaz hâkimi tarafından karar verilebilir', 'Yetmişbeş yaşını bitirmiş kişilerin mahkûm oldukları toplam dört yıl veya daha az süreli hapis cezasının konutunda çektirilmesine infaz hâkimi tarafından karar verilebilir.', 'b', '&lt;p&gt;2021 İdare Memurluğu Görevde Yükselme Sınavı Sorusudur.&lt;/p&gt;', 'admin', 1),
(261, '&lt;p&gt;5275 sayılı Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Kanun uyarınca, adlî para cezasının infazına ilişkin aşağıdakilerden hangisi yanlıştır?&lt;/p&gt;', 1, 'Adlî para cezasını içeren ilâm Cumhuriyet Başsavcılığına verildikten sonra, Cumhuriyet savcısı otuz gün içinde adlî para cezasının ödenmesi için hükümlüye bir ödeme emri tebliğ eder', 'Hükümlü, tebliğ olunan ödeme emri üzerine belli süre içinde adlî para cezasını ödemezse, Cumhuriyet savcısının kararı ile ödenmeyen kısma karşılık gelen gün miktarı hapis cezasına çevrilerek, hükümlünün iki saat çalışması karşılığı bir gün olmak üzere kamuya yararlı bir işte çalıştırılmasına karar verilir.', 'Çocuklar hakkında hükmedilen adlî para cezasının ödenmemesi hâlinde, bu ceza hapse çevrilemez.', 'Adlî para cezası hükümde açıkça takside bağlanmış olmasa da, Cumhuriyet savcısınca taksit süresi iki yılı geçmemek ve taksit miktarı dörtten az olmamak üzere taksite bağlanabilir.', 'd', '&lt;p&gt;2021 İdare Memurluğu Görevde Yükselme Sınavı Sorusudur.&lt;/p&gt;', 'admin', 1),
(262, '&lt;p&gt;5275 sayılı Ceza ve Güvenlik Tedbirlerinin İnfazı Hakkında Kanun uyarınca, aşağıdakilerden hangisi, koşullu salıverilen hükümlünün, salıvermeden sonraki denetim süresi içerisinde tabi tutulabileceği yükümlülüklerden biri değildir?&lt;/p&gt;', 1, 'Kamuya yararlı bir işte ücretsiz olarak çalıştırılma', 'Belirli bir bölgede denetim ve gözetim altında bulundurma', 'Belirlenen yer veya bölgelere gitmeme', 'Belirlenen programlara katılma', 'a', '&lt;p&gt;2021 İdare Memurluğu Görevde Yükselme Sınavı Sorusudur.&lt;/p&gt;', 'admin', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `kullanici` varchar(24) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ad_soyad` varchar(120) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `unvan` varchar(24) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kurumu` varchar(150) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `admin` int(3) NOT NULL DEFAULT '0',
  `durumu` int(3) NOT NULL,
  `kayit_zamani` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kullanici`, `sifre`, `ad_soyad`, `unvan`, `kurumu`, `admin`, `durumu`, `kayit_zamani`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Çağrı AYIŞIK', 'Admin', 'Bursa E Tipi Kapalı CİK', 1, 1, 1679257795),
(2, 'eren', '291b74dec227f7ba5d04a1db8e99588b', 'Eren ASLAN', 'İdare Memuru', 'Bursa Açık CİK', 1, 1, 1679257795),
(28, 'seher', '0192023a7bbd73250516f069df18b500', 'Seher KELEŞ', 'İdare Memuru', 'Bursa H Tipi Kapalı CİK', 0, 1, 1679257795),
(27, 'ergun', '539a4065fbeebcee9e0a39ebf93b1cd0', 'Ergün KURT', 'İdare Memuru', 'Ümraniye E Tipi Kapalı CİK', 0, 1, 1679257795),
(35, 'alparslan', '9e2a629541fc932e5ebebd39f88441a5', 'Alparslan AYIŞIK', 'Öğrenci', 'Anaokulu', 0, 0, 1679257795),
(74, 'Zehra', 'd41d8cd98f00b204e9800998ecf8427e', 'Zehra Ergen', '2.Müdür', 'Bursa E Tipi', 0, 1, 1680163307);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bildirimler`
--
ALTER TABLE `bildirimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `isaretlemeler`
--
ALTER TABLE `isaretlemeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sorular`
--
ALTER TABLE `sorular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bildirimler`
--
ALTER TABLE `bildirimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- Tablo için AUTO_INCREMENT değeri `isaretlemeler`
--
ALTER TABLE `isaretlemeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=971;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `sorular`
--
ALTER TABLE `sorular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
