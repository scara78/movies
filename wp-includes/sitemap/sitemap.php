<?php if (preg_match('/sitemap\.php/', $_SERVER['REQUEST_URI'])) {
	header('Location: /sitemap.xml', TRUE, 301);
	exit();
}
header("Expires: -1");
header("Cache-Control: private, no-cache, no-cache=Set-Cookie, proxy-revalidate");
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header("Vary: Accept-Encoding");
header('Content-Type: application/xml');

####### SETTING #########$batas = "|#|";

$mapx = '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="//' . $_SERVER['HTTP_HOST'] . '/wp-includes/sitemap/main-sitemap.xsl"?>' . "\r\n";
$mapx .= '' . "\r\n";
$mapx .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\r\n";
$datelastmod = date('Y-m-d\T07:00:00P');
$jumlahsitemapmovies = 2;
for ($jmlsitemap = 1; $jmlsitemap < $jumlahsitemapmovies + 1; $jmlsitemap++) {

	$mapx .= "<sitemap>\r\n\t\t<loc>" . site_url() . "/sitemap-" . $jmlsitemap . ".xml</loc><lastmod>" . $datelastmod . "</lastmod>\r\n\t</sitemap>\r\n\t";
}

include 'sitemap-keyword.php';

$mapx .= '</sitemapindex>';
echo $mapx;
exit;
