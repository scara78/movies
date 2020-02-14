<?php

$file = "wp-content/uploads/keyword/keyword.txt";
$lines = COUNT(FILE($file));
$jumlah_baris = 200;
$hasil = $lines / $jumlah_baris;
date_default_timezone_set('Asia/Jakarta');
$datelastmod = date('Y-m-d\T07:00:00P');
for ($i = 1; $i <= $hasil; $i++) {
    $mapx .= "<sitemap>\r\n\t\t<loc>http://" . $_SERVER['HTTP_HOST'] . "/post-sitemap-" . $i . ".xml</loc><lastmod>" . $datelastmod . "</lastmod>\r\n\t</sitemap>\r\n\t";
}

$filedirector = "wp-content/uploads/keyword/director.txt";
$linesdirector = COUNT(FILE($filedirector));
$barisdirector = 200;
$hasildirector = $linesdirector / $barisdirector;
date_default_timezone_set('Asia/Jakarta');
$datelastmod = date('Y-m-d\T07:00:00P');
for ($i = 1; $i <= $hasildirector; $i++) {
    $mapx .= "<sitemap>\r\n\t\t<loc>http://" . $_SERVER['HTTP_HOST'] . "/director-sitemap-" . $i . ".xml</loc><lastmod>" . $datelastmod . "</lastmod>\r\n\t</sitemap>\r\n\t";
}

$filecast = "wp-content/uploads/keyword/cast.txt";
$linescast = COUNT(FILE($filecast));
$bariscast = 200;
$hasilcast = $linescast / $bariscast;
date_default_timezone_set('Asia/Jakarta');
$datelastmod = date('Y-m-d\T07:00:00P');
for ($i = 1; $i <= $hasilcast; $i++) {
    $mapx .= "<sitemap>\r\n\t\t<loc>" . site_url() . "/cast-sitemap-" . $i . ".xml</loc><lastmod>" . $datelastmod . "</lastmod>\r\n\t</sitemap>\r\n\t";
}
