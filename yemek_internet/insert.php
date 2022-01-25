<?php

$baglanti = new mysqli("localhost", "root", "", "yemek_tarif_php");

if ($baglanti->connect_errno > 0) {
    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
}

$baglanti->set_charset("utf8");

$sorgu = $baglanti->prepare("SELECT * FROM yemek");

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}

$sorgu->execute();

$sonuc = $sorgu->get_result();

while ($cikti = $sonuc->fetch_array()) {
    echo "Yemek Adı: " . $cikti["yemek_ad"] . "<br /> Yemek malzemesi: " . $cikti["malzeme"] . "<br /> Tarif: " . $cikti["tarif"] . "<hr />";
}

$sorgu->close();
$baglanti->close();

?>
