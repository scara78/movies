<?php

if (false) :
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
endif;

$url = 'https://www.youtube.com/results?search_query=' . $q;
if (isset($p)) {
	$url .= '&page=' . $p;
}
$url .= '&hl=en';
$html = file_get_contents($url);
$html = preg_replace('/\s\s+|\r|\n/', '', $html);
$html = str_replace(' ">', '">', $html);
$html = strstr($html, 'class="item-section"><li>');
$a = preg_match_all('/<h3 class="yt\-lockup\-title"><a href="\/watch\?v=(.*)" (.*)>(.*)<\/h3>(.*)/sUi', $html, $jcon, PREG_SET_ORDER);
$YT_API_ARRAY = dirname(__FILE__) . '/API-YT.txt';
$YT_API_LIST = file_get_contents($YT_API_ARRAY);
$APIKEY = explode("\n", $YT_API_LIST);
$randomKeys = array_rand($APIKEY, 1);
$googleApi = trim($APIKEY[$randomKeys]);
$url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=" . urlencode($q) . "&type=video&maxResults=10&key=" . $googleApi . "&pageToken=" . $page . "";

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true

));
$response = curl_exec($curl);
$youtube = json_decode($response, true);
$pageNextToken = $youtube['nextPageToken'];
$pagePrevToken = $youtube['prevPageToken'];

$totalPage = ceil($youtube["pageInfo"]["totalResults"] / 10);

if (count($jcon) == 0) {
	$jcon = [];
	$pPageToken = isset($youtube['prevPageToken']) ? $youtube['prevPageToken'] : NULL;
	$nPageToken = isset($youtube['nextPageToken']) ? $youtube['nextPageToken'] : NULL;
	$i_count = 0;
	foreach ($youtube['items'] as $item) {
		$id = $item['id']['videoId'];
		$title = urldecode($item['snippet']['title']);
		$description = $item['snippet']['description'];
		$publishedAt = $item['snippet']['publishedAt'];
		$channelId = $item['snippet']['channelId'];
		$channelTitle = $item['snippet']['channelTitle'];
		$thumb = "https://i.ytimg.com/vi/" . $id . "/mqdefault.jpg";
		$pdate = explode('T', $publishedAt);
		$pdate = $pdate[0];
		$pdate = date_create($pdate);
		$publish_date = date_format($pdate, "M d, Y");

		$jcon[] = [
			$id,
			$id,
			$id,
			$title . '</a><h4><span class="accessible-description" id="description-id-' . $id . '"> - ' . $description . '.</h4></span>',
			'',
			'',
			''
		];
	}
	curl_close($curl);
}
