<?php
if (preg_match('/function\.php/', $_SERVER['REQUEST_URI'])) {
	header('Location: /');
	exit();
}

if (!defined('ROOT')) {
	$requri = preg_replace('/(.*)\?(.*)/', '\1', $_SERVER['REQUEST_URI']);
	define('ROOT', $requri);
}

require 'wp-includes/vendor/autoload.php';

use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;

function site_url()
{
	$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';
	$domain = $_SERVER['HTTP_HOST'];
	$domain = $protocol . '://' . $domain;
	return $domain;
}

function profile()
{
	$file = file_get_contents('wp-admin/file/json/profile.json');
	$data = json_decode($file);
	return $data;
}

function path_url()
{
	$path_url = $_SERVER['REQUEST_URI'];
	return $path_url;
}

function potong($content, $start, $end)
{
	if ($content && $start && $end) {
		$r = explode($start, $content);
		if (isset($r[1])) {
			$r = explode($end, $r[1]);
			return $r[0];
		}
		return '';
	}
}

function ember($pecah)
{
	$pecah = mb_convert_encoding($pecah, "UTF-8", mb_detect_encoding($pecah, "WINDOWS-1252, UTF-8, ISO-8859-1, ISO-8859-15", true));
	return $pecah;
}

function sanitize_title($title)
{
	$raw_title = $title;
	$raw_title = strtolower($raw_title);
	$raw_title = rawurlencode($raw_title);
	$raw_title = str_replace(array("'", '"', ' ', '.', '&', '#', "&#x2019"), '-', $raw_title);
	$raw_title = preg_replace('/\-\-+/', '-', $raw_title);
	$raw_title = preg_replace('/[^\w\d\%]/siu', '-', $raw_title);
	$raw_title = trim($raw_title, '-');

	$title = $title;

	$special_chars = array("?", "[", "]", "/", "\\", "=", "<", ">", ":", ".", ";", ",", "'", "\"", "&", "$", "#", "*", "(", ")", "|", "~", "`", "!", "{", "}", "%", "+", "'", "’", "39", chr(0));

	$title = preg_replace("#\x{00a0}#siu", ' ', $title);
	$title = str_replace($special_chars, '', $title);
	$title = str_replace(array('%20', '+'), '-', $title);
	$title = preg_replace('/[\r\n\t -]+/', '-', $title);
	$title = trim($title, '.-_');

	if ('' === $title || false === $title) {
		$title = $raw_title;
	}

	return $title;
}

function mbstring_binary_safe_encoding($reset = false)
{
	static $encodings = array();
	static $overloaded = null;

	if (is_null($overloaded))
		$overloaded = function_exists('mb_internal_encoding') && (ini_get('mbstring.func_overload') & 2);

	if (false === $overloaded)
		return;

	if (!$reset) {
		$encoding = mb_internal_encoding();
		array_push($encodings, $encoding);
		mb_internal_encoding('ISO-8859-1');
	}

	if ($reset && $encodings) {
		$encoding = array_pop($encodings);
		mb_internal_encoding($encoding);
	}
}

function reset_mbstring_encoding()
{
	mbstring_binary_safe_encoding(true);
}

function startsWith($haystack, $needle)
{
	$length = strlen($needle);
	$lengthHaystack = strlen($haystack);
	if ($lengthHaystack >= $length)
		return (substr($haystack, 0, $length) === $needle);
	else
		return false;
}

function endsWith($haystack, $needle)
{
	$length = strlen($needle);
	if ($length == 0) {
		return true;
	}

	return (substr($haystack, -$length) === $needle);
}

function get_contents($url)
{
	if (function_exists('curl_exec')) {
		$ch = curl_init();

		$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
		$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
		$header[] = "Cache-Control: max-age=0";
		$header[] = "Connection: keep-alive";
		$header[] = "Keep-Alive: 300";
		$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
		$header[] = "Accept-Language: en-us,en;q=0.5";
		$header[] = "Pragma: ";

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_REFERER, "http://www.facebook.com");
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/" . rand(3, 5) . "." . rand(0, 3) . " (Windows NT " . rand(3, 5) . "." . rand(0, 2) . "; rv:2.0.1) Gecko/20100101 Firefox/" . rand(3, 5) . ".0.1");
		$url_get_contents_data = curl_exec($ch);
		curl_close($ch);
		if ($url_get_contents_data == false) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_URL, $url);
			$url_get_contents_data = curl_exec($ch);
			curl_close($ch);
		}
	} elseif (function_exists('file_get_contents')) {
		$url_get_contents_data = @file_get_contents($url);
	} elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
		$handle = fopen($url, "r");
		$url_get_contents_data = stream_get_contents($handle);
	} else {
		$url_get_contents_data = false;
	}
	return $url_get_contents_data;
}

function get_api()
{
	$MV_API_ARRAY = dirname(__FILE__) . '/wp-includes/source/API-MOVIE.txt';
	$MV_API_LIST = file_get_contents($MV_API_ARRAY);
	$APIKEYMV = explode("\n", $MV_API_LIST);
	$randomKeysmv = array_rand($APIKEYMV, 1);
	$movieapi = trim($APIKEYMV[$randomKeysmv]);
	$api = $movieapi;
	return $api;
}

function get_pathcache()
{
	$pathcachefilm = file_get_contents('wp-admin/file/txt/cachepath.txt');
	return $pathcachefilm;
}

function now_playing($results)
{
	$path = get_pathcache();

	CacheManager::setDefaultConfig(new ConfigurationOption([
		'path' => $path
	]));

	$InstanceCache = CacheManager::getInstance('sqlite');

	$key = md5('now_playing');
	$CachedString = $InstanceCache->getItem($key);

	if (!$CachedString->isHit()) { //jika cache belum ada
		$api = get_api();
		$url = 'https://api.themoviedb.org/3/movie/popular?api_key=' . $api . '&page=1';
		$data = file_get_contents($url);
		$character = json_decode($data, true);
		foreach (array_slice($character["results"], 0, 16) as $key) {
			$id = $key["id"];
			$id = dechex($id);
			$views = $key["vote_average"];
			$title = $key['title'];
			$poster = $key["poster_path"];
			$url = $key["title"];
			$url = str_replace(' ', '-', $url);
			$url = str_replace(')', '', $url);
			$url = str_replace(':', '-', $url);
			$url = str_replace('--', '-', $url);
			$url = str_replace('--', '-', $url);
			$url = str_replace('.', '', $url);
			$url = strtolower($url);
			$tahun = $key["release_date"];
			$tahun = date("Y", strtotime($tahun));

			$results[] = array(
				'id' => $id,
				'views' => $views,
				'title' => $title,
				'poster' => $poster,
				'url' => $url,
				'tahun' => $tahun,
			);
		}
		$CachedString->set($results)->expiresAfter(30); //dalam detik
		$InstanceCache->save($CachedString);
	} else { //jika sudah ada
		$results =  $CachedString->get();
	}
	foreach ($results as $key) {
		echo '<div class="col-md-125" itemscope="itemscope" itemtype="http://schema.org/Movie">
			<div class="gmr-item-modulepost">
				<a href="/movie/' . $key["url"] . '-' . $key["id"] . '" itemprop="url" title="' . $key["title"] . '" rel="bookmark"><img width="152" height="222" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . '" class="attachment-medium size-medium wp-post-image" alt="" itemprop="image" srcset="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 205w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 287w" sizes="(max-width: 152px) 100vw, 152px" title="' . $key["title"] . '" style="height: 188px;">
				</a>
				<header class="entry-header text-center">
					<div class="gmr-button-widget">
						<div class="clearfix gmr-popup-button-widget">
							<a href="/trailer/' . $key["url"] . '-' . $key["tahun"] . '-' . $key["id"] . '" class="button gmr-trailer-popup" title="Trailer for ' . $key["title"] . '" rel="nofollow">Trailer</a>
						</div>

						<div class="clearfix">
							<a href="/movie/' . $key["url"] . '-' . $key["tahun"] . '-' . $key["id"] . '" class="button gmr-watch-btn" itemprop="url" title="' . $key["title"] . '" rel="bookmark">Watch Movie</a> </div>
					</div>
					<h2 class="entry-title" itemprop="headline">
						<a href="/movie/' . $key["url"] . '-' . $key["tahun"] . '-' . $key["id"] . '" itemprop="url" title="' . $key["title"] . '" rel="bookmark">' . $key["title"] . ' (' . $key["tahun"] . ')</a>
					</h2>
				</header><!-- .entry-header -->
				<div class="gmr-rating-item"><span class="icon_star"></span>' . $key["views"] . '</div>
			</div>
		</div>';
	}
}

function get_trailer($id_film_trailer)
{
	$path = file_get_contents('wp-admin/file/txt/cachetrailer.txt');
	CacheManager::setDefaultConfig(new ConfigurationOption([
		'path' => $path
	]));

	$InstanceCache = CacheManager::getInstance('sqlite');

	$key = base64_encode($id_film_trailer);
	$CachedString = $InstanceCache->getItem($key);

	if (!$CachedString->isHit()) { //jika cache belum ada
		$api = get_api();
		$url = 'https://api.themoviedb.org/3/movie/' . $id_film_trailer . '?api_key=' . $api . '&language=en-US&append_to_response=videos';
		$data = file_get_contents($url);
		$character = json_decode($data, true);
		$trailer = $character["videos"]["results"];
		$trailer = $trailer[0]["key"];

		$CachedString->set($trailer)->expiresAfter(604800);
		$InstanceCache->save($CachedString);
	} else { //jika sudah ada
		$trailer =  $CachedString->get();
	}
	return $trailer;
}

function top_rated($results)
{
	$path = get_pathcache();
	CacheManager::setDefaultConfig(new ConfigurationOption([
		'path' => $path
	]));

	$InstanceCache = CacheManager::getInstance('sqlite');

	$key = md5('top_rated');
	$CachedString = $InstanceCache->getItem($key);

	if (!$CachedString->isHit()) { //jika cache belum ada
		$api = get_api();
		$url = 'https://api.themoviedb.org/3/movie/top_rated?api_key=' . $api . '&language=en-US&page=1';
		$data = file_get_contents($url);
		$character = json_decode($data, true);
		foreach ($character["results"] as $key) {
			$id = $key["id"];
			$id = dechex($id);
			$views = $key["vote_average"];
			$title = $key['title'];
			$poster = $key["poster_path"];
			$url = $key["title"];
			$url = str_replace(' ', '-', $url);
			$url = str_replace(')', '', $url);
			$url = str_replace(':', '-', $url);
			$url = str_replace('--', '-', $url);
			$url = str_replace('--', '-', $url);
			$url = str_replace('.', '', $url);
			$url = strtolower($url);
			$tahun = $key["release_date"];
			$tahun = date("Y", strtotime($tahun));
			$genres = $key["genre_ids"];

			$results[] = array(
				'id' => $id,
				'views' => $views,
				'title' => $title,
				'poster' => $poster,
				'url' => $url,
				'tahun' => $tahun,
				'genre' => $genres,
			);
		}
		$CachedString->set($results)->expiresAfter(604800);
		$InstanceCache->save($CachedString);
	} else { //jika sudah ada
		$results =  $CachedString->get();
	}
	foreach ($results as $key) {
		echo '<article id="post" class="col-md-20 item" itemscope="itemscope" itemtype="http://schema.org/Movie">
		<div class="gmr-box-content gmr-box-archive text-center" style="height: 391px;">
			<div class="content-thumbnail text-center">
				<a href="/movie/' . $key["url"] . '-' . $key['tahun'] . '-' . $key["id"] . '" itemprop="url" title="' . $key["title"] . '" rel="bookmark">
					<img width="152" height="228" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . '" class="attachment-medium size-medium wp-post-image" alt="" itemprop="image" srcset="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 152w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 60w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 170w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 300w" sizes="(max-width: 152px) 100vw, 152px" title="' . $key["title"] . '"">
				</a>
				
			</div>
			<div class="item-article">
				<header class="entry-header">
					<h2 class="entry-title" itemprop="headline">
						<a href="/movie/' . $key["url"] . '-' . $key['tahun'] . '-' . $key["id"] . '" itemprop="url" title="' . $key["title"] . '" rel="bookmark">' . $key["title"] . '   (' . $key['tahun'] . ')</a>
					</h2>
				<div class="gmr-movie-on">';
		$genres = $key['genre'];
		foreach ($genres as $nilai_genres) {
			$id_genresfilm = $nilai_genres;
			$urlgenre = 'wp-admin/file/json/genre.json';
			$datagenre = file_get_contents($urlgenre);
			$charactergenre = json_decode($datagenre, true);
			$genre_name = $charactergenre["genres"];
			foreach ($genre_name as $keygenre) {
				if ($keygenre["id"] == $id_genresfilm) {
					echo '<a href="' . $_SERVER["HTTP_HOST"] . '/genre/' . strtolower($keygenre["name"]) . '" rel="category tag">' . $keygenre["name"] . ', </a>';
				}
			}
		}
		echo '<a href="/movie/' . $key["url"] . '-' . $key['tahun'] . '-' . $key["id"] . '" rel="category tag">' . $tahun . '</a></div>
						<div class="gmr-popup-button">
							<a href="/trailer/' . $key["url"] . '-' . $key['tahun'] . '-' . $key["id"] . '" class="button gmr-trailer-popup" title="Trailer for ' . $key[" title"] . '" rel="nofollow">
								<span class="icon_film" aria-hidden="true"></span>
								<span class="text-trailer">Trailer</span>
							</a>
						</div>
						<div class="gmr-watch-movie">
							<a href="/movie/' . $key["url"] . '-' . $key['tahun'] . '-' . $key["id"] . '" class="button gmr-watch-button" itemprop="url" title="' . $key["title"] . '" rel="bookmark">Watch</a>
						</div>
					</header><!-- .entry-header -->
				</div><!-- .item-article -->
			</div><!-- .gmr-box-content -->
		</article><!-- #post-## --> ';
	}
}

function sidebar($results)
{

	$path = get_pathcache();
	CacheManager::setDefaultConfig(new ConfigurationOption([
		'path' => $path
	]));

	$InstanceCache = CacheManager::getInstance('sqlite');

	$key = md5('sidebar');
	$CachedString = $InstanceCache->getItem($key);

	if (!$CachedString->isHit()) { //jika cache belum ada
		$api = get_api();
		$url = 'https://api.themoviedb.org/3/trending/all/day?api_key=' . $api . '';
		$data = file_get_contents($url);
		$character = json_decode($data, true);
		foreach (array_slice($character["results"], 0, 8) as $key) {
			$id = $key["id"];
			$id = dechex($id);
			$title = $key["title"];
			$poster = $key["poster_path"];
			$url = $key["title"];
			$popular = $key["popularity"];
			$url = str_replace(' ', '-', $url);
			$url = str_replace(')', '', $url);
			$url = str_replace(':', '', $url);
			$url = str_replace('--', '-', $url);
			$url = str_replace('--', '-', $url);
			$url = str_replace('.', '', $url);
			$url = strtolower($url);
			$tahun = $key["release_date"];
			$tahun = date("Y", strtotime($tahun));
			$genres = $key["genre_ids"];

			$results[] = array(
				'id' => $id,
				'title' => $title,
				'poster' => $poster,
				'url' => $url,
				'tahun' => $tahun,
				'genre' => $genres,
				'popular' => $popular,
			);
		}
		$CachedString->set($results)->expiresAfter(604800);
		$InstanceCache->save($CachedString);
	} else { //jika sudah ada
		$results =  $CachedString->get();
	}
	foreach ($results as $key) {
		echo '<li>
				<div class="idmuvi-rp-link clearfix">
					<a href="/movie/' . $key["url"] . '-' . $key["id"] . '" itemprop="url" title="' . $key['title'] . '  (' . $key['tahun'] . ')">
						<img width="60" height="90" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . '" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" itemprop="image" srcset="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 60w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 152w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 170w" sizes="(max-width: 60px) 100vw, 60px" title="' . $key['title'] . '">
						<span class="idmuvi-rp-title">
						' . $key['title'] . '  (' . $key['tahun'] . ') </span>
					</a>
					<div class="idmuvi-rp-meta idmuvi-rp-author">
						<a href="/movie/' . $key["url"] . '-' . $key["id"] . '" rel="category tag">' . $key["popular"] . '  Views</a>
					</div>
				</div>
			</li>';
	}
}

function movie_details($id_film)
{
	$path = get_pathcache();
	CacheManager::setDefaultConfig(new ConfigurationOption([
		'path' => $path
	]));

	$InstanceCache = CacheManager::getInstance('sqlite');

	$key = base64_encode($id_film);
	$CachedString = $InstanceCache->getItem($key);

	if (!$CachedString->isHit()) { //jika cache belum ada
		$api = get_api();
		$url = 'https://api.themoviedb.org/3/movie/' . $id_film . '?api_key=' . $api . '&language=en-US&append_to_response=videos';
		$data = file_get_contents($url);
		$character = json_decode($data, true);
		$title = $character["title"];
		$thumbnail = $character["poster_path"];
		$desc = $character["overview"];
		$imdb_id = $character["imdb_id"];
		$genre_name = $character["genres"];
		$country = $character["production_countries"];
		$views = $character["popularity"];
		$tagline = $character["tagline"];
		$budget = $character["budget"];
		$revenue = $character["revenue"];
		$url = $character["title"];
		$url = str_replace(' ', '-', $url);
		$url = str_replace(')', '', $url);
		$url = str_replace(':', '-', $url);
		$url = strtolower($url);
		$release = date("d-m-Y", strtotime($character["release_date"]));
		$tahun = date("Y", strtotime($character["release_date"]));
		$trailer = $character["videos"]["results"];
		$trailer = $trailer[0]["key"];
		$link_film = "https://database.gdriveplayer.us/player.php?imdb=" . $imdb_id;
		$link_download = "https://9xbud.com/$link_film";
		$link_safelink = base64_encode($link_download);

		$results[] = array(
			'title' => $title,
			'thumbnail' => $thumbnail,
			'desc' => $desc,
			'genre_name' => $genre_name,
			'country' => $country,
			'views' => $views,
			'tagline' => $tagline,
			'budget' => $budget,
			'revenue' => $revenue,
			'url' => $url,
			'release' => $release,
			'tahun' => $tahun,
			'trailer' => $trailer,
			'link_film' => $link_film,
			'link_safelink' => $link_safelink,
		);

		$CachedString->set($results)->expiresAfter(604800);
		$InstanceCache->save($CachedString);
	} else { //jika sudah ada
		$results =  $CachedString->get();
	}
	return $results;
}

function related_movies($id_film)
{
	$path = get_pathcache();
	CacheManager::setDefaultConfig(new ConfigurationOption([
		'path' => $path
	]));

	$InstanceCache = CacheManager::getInstance('sqlite');

	$key = md5($id_film);
	$CachedString = $InstanceCache->getItem($key);

	if (!$CachedString->isHit()) { //jika cache belum ada
		$api = get_api();
		$path_json_related_videos = 'https://api.themoviedb.org/3/movie/' . $id_film . '/similar?api_key=' . $api . '&language=en-US&page=1';
		$data_rv = file_get_contents($path_json_related_videos);
		$data_related = json_decode($data_rv, true);
		foreach (array_slice($data_related["results"], 0, 10) as $keyrelated) {
			$id = $keyrelated["id"];
			$id = dechex($id);
			$title = $keyrelated["title"];
			$url = $keyrelated["title"];
			$url = str_replace(' ', '-', $url);
			$url = str_replace(')', '', $url);
			$url = str_replace(':', '-', $url);
			$url = str_replace(',', '', $url);
			$url = str_replace('.', '', $url);
			$url = str_replace('/', '-', $url);
			$url = str_replace('--', '-', $url);
			$url = str_replace('---', '-', $url);
			$url = strtolower($url);
			$tahun = $keyrelated["release_date"];
			$release = $keyrelated["release_date"];
			$tahun = date("Y", strtotime($tahun));
			$genres = $keyrelated["genre_ids"];
			$poster = $keyrelated["poster_path"];

			$results[] = array(
				'id' => $id,
				'title' => $title,
				'poster' => $poster,
				'url' => $url,
				'tahun' => $tahun,
				'genres' => $genres,
				'release' => $release,
			);
		}
		$CachedString->set($results)->expiresAfter(604800);
		$InstanceCache->save($CachedString);
	} else { //jika sudah ada
		$results =  $CachedString->get();
	}
	foreach ($results as $value) {
		$id = $value['id'];
		$title = $value['title'];
		$poster = $value['poster'];
		$tahun = $value['tahun'];
		$url = $value['url'];
		$genres = $value['genres'];
		$release = $value['release'];

		echo '<article class="item col-md-20" itemscope="itemscope" itemtype="http://schema.org/Movie">
		<div class="gmr-box-content gmr-box-archive text-center" style="height: 371px;">
			<div class="content-thumbnail text-center">
				<a href="/movie/' . $url . '-' . $tahun . '-' . $id . '" itemprop="url" title="Permalink to: ' . $title . '  (' . $tahun . ')" rel="bookmark">
					<img width="152" height="228" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . '" class="attachment-medium size-medium wp-post-image" alt="" itemprop="image" srcset="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . ' 152w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . ' 60w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . ' 170w" sizes="(max-width: 152px) 100vw, 152px" title="' . $title . '  (' . $tahun . ')">
				</a>
				<div class="gmr-quality-item"><a href="/movie/' . $url . '-' . $tahun . '-' . $id . '" rel="tag">HD</a></div>
			</div>
			<div class="item-article">
				<h2 class="entry-title" itemprop="headline">
					<a href="/movie/' . $url . '-' . $tahun . '-' . $id . '" itemprop="url" title="Permalink to: ' . $title . '  (' . $tahun . ')" rel="bookmark">' . $title . '  (' . $tahun . ')</a>
				</h2>
			<div class="gmr-movie-on">';
		foreach ($genres as $nilai_genres) {
			$id_genresfilm = $nilai_genres;
			$urlgenre = 'wp-admin/file/json/genre.json';
			$datagenre = file_get_contents($urlgenre);
			$data_filmgenre = json_decode($datagenre, true);
			$genre_name = $data_filmgenre["genres"];

			foreach ($genre_name as $keygenre) {
				if ($keygenre["id"] == $id_genresfilm) {
					echo '<a href="' . site_url() . '/genre/' . strtolower($keygenre["name"]) . '" rel="category tag">' . $keygenre["name"] . ', </a>';
				}
			}
		}
		echo '</div>
			<span class="screen-reader-text">
				<time itemprop="dateCreated" datetime="' . $release . '">' . $release . '</time>
			</span>
			<span class="screen-reader-text">
				<span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person">
					<span itemprop="name">
						<a href="#" rel="tag"></a>
					</span>
				</span>,
				<span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person">
					<span itemprop="name">
						<a href="" rel="tag"></a>
					</span>
				</span>
			</span>
				<div class="gmr-popup-button">
					<a href="/trailer/' . $url . '-' . $tahun . '-' . $id . '" class="button gmr-trailer-popup" title="Trailer for ' . $title . '" rel="nofollow">
						<span class="icon_film" aria-hidden="true"></span>
						<span class="text-trailer">Trailer</span>
					</a>
				</div>
				<div class="gmr-watch-movie">
					<a href="/movie/' . $url . '-' . $tahun . '-' . $id . '" class="button gmr-watch-button" itemprop="url" title="Permalink to: ' . $title . '  (' . $tahun . ')" rel="bookmark">Watch</a>
				</div>
			</div>
		</div>
	</article>';
	}
}

function get_idfilm()
{
	$get_link = rawurldecode($_SERVER['REQUEST_URI']);
	$get_link = explode('-', $get_link);
	$get_link = array_values(array_slice($get_link, -1))[0];
	$id_film = hexdec($get_link);
	return $id_film;
}

function get_eps()
{
	$get_link = rawurldecode($_SERVER['REQUEST_URI']);
	$get_link = explode('/', $get_link);
	$get_link = array_values(array_slice($get_link, +2))[0];
	$id_film = $get_link;
	return $id_film;
}

function get_idpost()
{
	$get_link = rawurldecode($_SERVER['REQUEST_URI']);
	$get_link = explode('-', $get_link);
	$get_link = array_values(array_slice($get_link, -1))[0];
	return $get_link;
}

function single_total($title)
{
	$path = get_pathcache();
	CacheManager::setDefaultConfig(new ConfigurationOption([
		'path' => $path
	]));

	$InstanceCache = CacheManager::getInstance('sqlite');

	$key = base64_encode($title);
	$CachedString = $InstanceCache->getItem($key);

	if (!$CachedString->isHit()) { //jika cache belum ada
		$api = get_api();
		$url = 'https://api.themoviedb.org/3/search/movie?api_key=' . $api . '&query=' . $title . '&page=1&include_adult=false';
		$data = file_get_contents($url);
		$character = json_decode($data, true);
		$CachedString->set($character)->expiresAfter(604800);
		$InstanceCache->save($CachedString);
	} else { //jika sudah ada
		$character =  $CachedString->get();
	}
	return $character;
}

function single_series($title)
{
	// $path = get_pathcache();
	// CacheManager::setDefaultConfig(new ConfigurationOption([
	// 	'path' => $path
	// ]));

	// $InstanceCache = CacheManager::getInstance('sqlite');

	// $key = base64_encode($title);
	// $CachedString = $InstanceCache->getItem($key);

	// if (!$CachedString->isHit()) { //jika cache belum ada
	$api = get_api();
	$url = 'https://api.themoviedb.org/3/search/tv?api_key=' . $api . '&query=' . $title . '&page=1&include_adult=false';
	$data = file_get_contents($url);
	$character = json_decode($data, true);
	// 	$CachedString->set($character)->expiresAfter(604800);
	// 	$InstanceCache->save($CachedString);
	// } else { //jika sudah ada
	// 	$character =  $CachedString->get();
	// }
	return $character;
}

function single_show_series($results)
{
	foreach ($results as $key) {
		$id_film = $key["id"];
		$id_film = dechex($id_film);
		$title = $key["name"];
		$url = $title;
		$url = str_replace(' ', '-', $url);
		$url = str_replace(')', '', $url);
		$url = str_replace(':', '-', $url);
		$url = str_replace(',', '', $url);
		$url = str_replace('.', '', $url);
		$url = str_replace('/', '-', $url);
		$url = str_replace('--', '-', $url);
		$url = str_replace('---', '-', $url);
		$url = strtolower($url);
		$tahun = $key["first_air_date"];
		$tahun = date("Y", strtotime($tahun));
		$poster = $key["poster_path"];

		echo '<article class="col-md-20 item" itemscope="itemscope" itemtype="http://schema.org/Movie">
		<div class="gmr-box-content gmr-box-archive text-center" style="height: 391px;">
			<div class="content-thumbnail text-center">
				<a href="/series/' . $url . '-' . $tahun . '-' . $id_film . '" itemprop="url" title="' . $title . '" rel="bookmark">
					<img width="152" height="228" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . '" class="attachment-medium size-medium wp-post-image" alt="" itemprop="image" srcset="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . ' 152w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . ' 60w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . ' 170w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . ' 300w" sizes="(max-width: 152px) 100vw, 152px" title="' . $title . '"">
				</a>
				
			</div>
			<div class="item-article">
				<header class="entry-header">
					<h2 class="entry-title" itemprop="headline">
						<a href="/series/' . $url . '-' . $tahun . '-' . $id_film . '" itemprop="url" title="' . $title . '" rel="bookmark">' . $title . '   (' . $tahun . ')</a>
					</h2>
				<div class="gmr-movie-on">
				</div>
				</header><!-- .entry-header -->
			</div><!-- .item-article -->
		</div><!-- .gmr-box-content -->
	</article><!-- #post-## --> ';
	}
}

function series_details($id_film)
{

	$api = get_api();
	$url = 'https://api.themoviedb.org/3/tv/' . $id_film . '?api_key=' . $api . '&language=en-US&append_to_response=videos';
	$data = file_get_contents($url);
	$character = json_decode($data, true);
	$title = $character["name"];
	$thumbnail = $character["poster_path"];
	$desc = $character["overview"];
	$created_by = $character['created_by'];
	$last_episode_to_air = $character['last_episode_to_air'];
	$number_of_episodes = $character['number_of_episodes'];
	$imdb_id = $character["imdb_id"];
	$genre_name = $character["genres"];
	$country = $character["production_countries"];
	$views = $character["popularity"];
	$tagline = $character["tagline"];
	$budget = $character["budget"];
	$revenue = $character["revenue"];
	$url = $title;
	$url = str_replace(' ', '-', $url);
	$url = str_replace(')', '', $url);
	$url = str_replace(':', '-', $url);
	$url = strtolower($url);
	$release = date("d-m-Y", strtotime($character["first_air_date"]));
	$tahun = date("Y", strtotime($character["first_air_date"]));
	$trailer = $character["videos"]["results"];
	$trailer = $trailer[0]["key"];

	$results[] = array(
		'title' => $title,
		'thumbnail' => $thumbnail,
		'desc' => $desc,
		'created_by' => $created_by,
		'last_episode_to_air' => $last_episode_to_air,
		'number_of_episodes' => $number_of_episodes,
		'genre_name' => $genre_name,
		'country' => $country,
		'views' => $views,
		'tagline' => $tagline,
		'budget' => $budget,
		'revenue' => $revenue,
		'url' => $url,
		'release' => $release,
		'tahun' => $tahun,
		'trailer' => $trailer,
	);
	return $results;
}

function single_show($results)
{
	foreach ($results as $key) {
		$id_film = $key["id"];
		$id_film = dechex($id_film);
		$title = $key["title"];
		$url = $key["title"];
		$url = str_replace(' ', '-', $url);
		$url = str_replace(')', '', $url);
		$url = str_replace(':', '-', $url);
		$url = str_replace(',', '', $url);
		$url = str_replace('.', '', $url);
		$url = str_replace('/', '-', $url);
		$url = str_replace('--', '-', $url);
		$url = str_replace('---', '-', $url);
		$url = strtolower($url);
		$tahun = $key["release_date"];
		$tahun = date("Y", strtotime($tahun));
		$poster = $key["poster_path"];

		echo '<article class="col-md-20 item" itemscope="itemscope" itemtype="http://schema.org/Movie">
		<div class="gmr-box-content gmr-box-archive text-center" style="height: 391px;">
			<div class="content-thumbnail text-center">
				<a href="/movie/' . $url . '-' . $tahun . '-' . $id_film . '" itemprop="url" title="' . $title . '" rel="bookmark">
					<img width="152" height="228" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . '" class="attachment-medium size-medium wp-post-image" alt="" itemprop="image" srcset="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . ' 152w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . ' 60w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . ' 170w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster . ' 300w" sizes="(max-width: 152px) 100vw, 152px" title="' . $title . '"">
				</a>
				
			</div>
			<div class="item-article">
				<header class="entry-header">
					<h2 class="entry-title" itemprop="headline">
						<a href="/movie/' . $url . '-' . $tahun . '-' . $id_film . '" itemprop="url" title="' . $title . '" rel="bookmark">' . $title . '   (' . $tahun . ')</a>
					</h2>
				<div class="gmr-movie-on">
				</div>
				</header><!-- .entry-header -->
			</div><!-- .item-article -->
		</div><!-- .gmr-box-content -->
	</article><!-- #post-## --> ';
	}
}

function youtube_results($q)
{
	require_once('wp-includes/source/youtube.php');
	if (isset($q)) {
		$q = str_replace(array('search/', 'movies/'), '', $q);
		$title = urldecode($q);
		$title = str_replace(array('-', 'download'), ' ', $title);
		$title = mb_convert_case(ember($title), MB_CASE_TITLE, "UTF-8");
	}

	for ($i = 0; $i < 15; $i++) {
		if (!empty($jcon[$i][2])) {
			$yid = $jcon[$i][1];
			if (preg_match('/\&/', $yid)) {
				$yid = strstr($yid, '&', true);
			}
			if (!empty($jcon[$i][1])) {
				$thumb = 'https://i.ytimg.com/vi/' . $yid . '/mqdefault.jpg';
			} else {
				$thumb = '/cover.png';
			}
			$judulyt = strstr($jcon[$i][3], '</a>', true);
			$judulyt = preg_replace('/(.*)\.[\w\d]{3,6}/i', '\1', $judulyt);
			$judulyt = str_replace(array('_', '...'), ' ', $judulyt);

			echo '<article class="col-md-20 item" itemscope="itemscope" itemtype="http://schema.org/Movie">
					<div class="gmr-box-content gmr-box-archive text-center" style="height: 391px;">
						<div class="content-thumbnail text-center">
							<a href="#" itemprop="url" title="' . $judulyt . '" rel="bookmark">
								<img width="152" height="228" src="' . $thumb . '" class="attachment-medium size-medium wp-post-image" alt="" itemprop="image" srcset="' . $thumb . ' 152w, ' . $thumb . ' 60w, ' . $thumb . ' 170w, ' . $thumb . ' 300w" sizes="(max-width: 152px) 100vw, 152px" title="' . $judulyt . '" "="">
							</a>
							
						</div>
						<div class="item-article">
							<header class="entry-header">
								<h2 class="entry-title" itemprop="headline">
									<a href="#" itemprop="url" title="' . $judulyt . '" rel="bookmark">' . $judulyt . '</a>
								</h2>

								<div class="gmr-watch-movie">
									<a href="https://www.youtube.com/watch?v=' . $yid . '" class="button gmr-watch-button gmr-trailer-popup" itemprop="url" title="' . $judulyt . '" rel="bookmark">Watch</a>
								</div>
							</header><!-- .entry-header -->
						</div><!-- .item-article -->
					</div><!-- .gmr-box-content -->
				</article>';
		}
	}
}

function film_show()
{
	$url = 'wp-admin/file/json/film.json';
	$data = file_get_contents($url);
	$character = json_decode($data, true);
	$no = 0;
	foreach ($character["results"] as $key => $value) {
		$no++;
		$id_film = $value['id_film'];
		$url = $value["title"];
		$url = str_replace(' ', '-', $url);
		$url = str_replace('(', '', $url);
		$url = str_replace(')', '', $url);
		$url = str_replace(':', '-', $url);
		$url = strtolower($url);
		echo '
		<div class="col-md-125" itemscope="itemscope" itemtype="http://schema.org/Movie">
		<div class="gmr-item-modulepost">
		    <a href="/play/' . $url . '-' . $id_film . '" itemprop="url" title="' . $value["title"] . '" rel="bookmark">
		        <img width="152" height="222" src="' . $value["linkgambar"] . '" title="" style="height: 188px;"></a>
		    <header class="entry-header text-center">
		        <div class="gmr-button-widget">
		            
		            <div class="clearfix">
		                <a href="/play/' . $url . '-' . $id_film . '" class="button gmr-watch-btn" itemprop="url" title="' . $value["title"] . '" rel="bookmark">Watch Movie</a> </div>
		        </div>
		        <h2 class="entry-title" itemprop="headline">
		            <a href="/play/' . $url . '-' . $id_film . '" itemprop="url" title="' . $value["title"] . '" rel="bookmark">' . $value["title"] . '</a>
		        </h2>
		    </header>
		</div>
		</div>';
	}
}

function slider($results)
{
	$path = get_pathcache();
	CacheManager::setDefaultConfig(new ConfigurationOption([
		'path' => $path
	]));

	$InstanceCache = CacheManager::getInstance('sqlite');

	$key = md5('slider');
	$CachedString = $InstanceCache->getItem($key);

	if (!$CachedString->isHit()) { //jika cache belum ada
		$api = get_api();
		$url = 'https://api.themoviedb.org/3/movie/now_playing?api_key=' . $api . '&language=id-ID&page=1&region=ID';
		$data = file_get_contents($url);
		$character = json_decode($data, true);
		foreach ($character["results"] as $key) {
			$id = $key["id"];
			$id = dechex($id);
			$title = $key['title'];
			$poster = $key["poster_path"];
			$url = $key["title"];
			$url = str_replace(' ', '-', $url);
			$url = str_replace(')', '', $url);
			$url = str_replace(':', '-', $url);
			$url = str_replace('--', '-', $url);
			$url = str_replace('--', '-', $url);
			$url = str_replace('.', '', $url);
			$url = strtolower($url);
			$tahun = $key["release_date"];
			$tahun = date("Y", strtotime($tahun));

			$results[] = array(
				'id' => $id,
				'title' => $title,
				'poster' => $poster,
				'url' => $url,
				'tahun' => $tahun,
			);
		}
		$CachedString->set($results)->expiresAfter(604800);
		$InstanceCache->save($CachedString);
	} else { //jika sudah ada
		$results =  $CachedString->get();
	}
	foreach ($results as $key) {
		echo '<div class="owl-item" style="width: 170px; margin-right: 10px;">
			<div class="gmr-slider-content">
				<div class="other-content-thumbnail">
					<a href="/movie/' . $key["url"] . '-' . $key["tahun"] . '-' . $key["id"] . '" itemprop="url" title="' . $key["title"] . '" rel="bookmark">
						<img width="170" height="255" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . '" class="attachment-large size-large wp-post-image" alt="" itemprop="image" srcset="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 205w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 300w" sizes="(max-width: 170px) 100vw, 170px" title="' . $key["title"] . '">
					</a>
				</div>
				<div class="gmr-slide-title">
					<a href="/movie/' . $key["url"] . '-' . $key["tahun"] . '-' . $key["id"] . '" class="gmr-slide-titlelink" title="' . $key["title"] . ' (' . $key["tahun"] . ')">' . $key["title"] . ' (' . $key["tahun"] . ')</a>
				</div>
			</div>
		</div>';
	}
}

function _bot_detected()
{
	return (isset($_SERVER['HTTP_USER_AGENT'])
		&& preg_match('/bot|crawl|slurp|spider|mediapartners/i', $_SERVER['HTTP_USER_AGENT']));
}

function adsheader()
{
	$lks = 'wp-admin/file/txt/header.txt';
	$isi = file_get_contents($lks);
	echo $isi;
}

function adshometop()
{
	$lkshomeatas = 'wp-admin/file/txt/adshomeatas.txt';
	$isihomeatas = file_get_contents($lkshomeatas);
	echo $isihomeatas;
}

function adswatchatas()
{
	$lkswatchatas = 'wp-admin/file/txt/adswatchatas.txt';
	$isiwatchatas = file_get_contents($lkswatchatas);
	echo $isiwatchatas;
}

function adswatchbawah()
{
	$lkswatchbawah = 'wp-admin/file/txt/adswatchbawah.txt';
	$isiwatchbawah = file_get_contents($lkswatchbawah);
	echo $isiwatchbawah;
}

function adssingleatas()
{
	$lkssingle = 'wp-admin/file/txt/adssingle.txt';
	$isisingle = file_get_contents($lkssingle);
	echo $isisingle;
}

function adsfooter()
{
	$lksfooter = 'wp-admin/file/txt/footer.txt';
	$isifooter = file_get_contents($lksfooter);
	echo $isifooter;
}

function post_data()
{
	$url = 'wp-admin/file/json/film.json';
	$data = file_get_contents($url);
	$character = json_decode($data);
	$data = $character->results;
	return $data;
}

function themes()
{
	$getfilehome = file_get_contents('wp-admin/file/json/theme.json');
	$jsonfilehome = json_decode($getfilehome);
	$obj = $jsonfilehome->results;
	$warna = $obj->theme;
	return $warna;
}

function player_check($link_film)
{
	include_once('wp-includes/simplehtmldom/simple_html_dom.php');
	$file = $link_film;
	$html = file_get_html($file);
	$ret = $html->find('div[id=player]');
	return $ret;
}

function server_dua()
{
	$getfilm = file_get_contents(__DIR__ . '/wp-admin/file/json/link_film.json');
	$movie = json_decode($getfilm, true);
	$datafilm = $movie["results"];
	return $datafilm;
}

function sitemap_movies($pageawal, $pageakhir)
{
	$mainurl = 'movie';
	$path = file_get_contents('wp-admin/file/txt/cachesitemappath.txt');

	CacheManager::setDefaultConfig(new ConfigurationOption([
		'path' => $path //1 = 1000 data film
	]));

	$InstanceCache = CacheManager::getInstance('sqlite');

	$key = md5($pageakhir);
	$CachedString = $InstanceCache->getItem($key);
	// page 1 = 20 data film
	// jadi kalau misalnya pageawal = 1, pageakhir = 5 berarti 5 page = 5 x 20 = 100 film
	if (!$CachedString->isHit()) {
		for ($i = $pageawal; $i < $pageakhir + 1; $i++) {
			$api = get_api();
			$url = 'https://api.themoviedb.org/3/movie/popular?api_key=' . $api . '&page=' . $i;
			$data = file_get_contents($url);
			$character = json_decode($data, true);
			foreach ($character["results"] as $key) {
				$id = $key["id"];
				$id = dechex($id);
				$url = $key["title"];
				$url = str_replace(' ', '-', $url);
				$url = str_replace(')', '', $url);
				$url = str_replace(':', '-', $url);
				$url = str_replace('--', '-', $url);
				$url = str_replace('--', '-', $url);
				$url = str_replace('.', '', $url);
				$url = strtolower($url);
				$url = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $url);
				$tahun = $key["release_date"];
				$tahun = date("Y", strtotime($tahun));

				$results[] = array(
					'url' => $url,
					'tahun' => $tahun,
					'id' => $id,
				);
			}
		}
		$CachedString->set($results)->expiresAfter(604800);
		$InstanceCache->save($CachedString);
	} else {
		$results =  $CachedString->get();
	}
	$semuadatasitemap = $results;
	foreach ($semuadatasitemap as $data) {

		$url = $data['url'];
		$tahun = $data['tahun'];
		$id = $data['id'];
		echo '<url>' . "\r\n\t" . '<loc>' . site_url() . '/' . $mainurl . '/' . $url . '-' . $tahun . '-' . $id . '</loc>' . "\r\n\t" . '<changefreq>always</changefreq>' . "\r\n\t" . '<priority>0.6</priority>' . "\r\n\t" . '</url>' . "\r\n";
	}
}

function sitemap_post($dataawal, $jumlahtampil)
{
	$isifile = file_get_contents('wp-content/uploads/keyword/keyword.txt');
	$data = explode("\n", $isifile);
	$idsite = $_SERVER["REQUEST_URI"];
	$hasil = preg_replace('/[^0-9]/', '', $idsite); //simpan hasil number dari string yaitu = 1
	date_default_timezone_set('Asia/Jakarta');
	$datelastmod = date('Y-m-d\T07:00:00P');
	$mainurl = 'movies';
	$url = "/post-sitemap-$hasil.xml";

	if ($url == $_SERVER["REQUEST_URI"]) {
		if ($hasil == $hasil) {
			$dataawal = $dataawal * ($hasil - 1);
			foreach (array_slice($data, $dataawal, $jumlahtampil) as $key) {
				$key = str_replace(" - ", "-", $key);
				$key = str_replace("", "", $key);
				$key = str_replace(" ", "-", $key);
				$key = strtolower($key);
				$key = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $key);
				echo '<url>' . "\r\n\t" . '<loc>' . site_url() . '/' . $mainurl . '/' . $key . '</loc>' . "\r\n\t" . '<image:image><image:loc>http://' . site_url() . '/wp-content/uploads/image.png</image:loc><image:title><![CDATA[' . $key . ']]></image:title><image:caption><![CDATA[]]></image:caption></image:image><lastmod>' . $datelastmod . '</lastmod>' . "\r\n\t" . '<changefreq>always</changefreq>' . "\r\n\t" . '<priority>0.2</priority>' . "\r\n\t" . '</url>' . "\r\n";
			}
		}
	}
}

function sitemap_director($dataawal, $jumlahtampil)
{
	$isifile = file_get_contents('wp-content/uploads/keyword/director.txt');
	$data = explode("\n", $isifile);
	$idsite = $_SERVER["REQUEST_URI"];
	$hasil = preg_replace('/[^0-9]/', '', $idsite); //simpan hasil number dari string yaitu = 1
	$mainurl = 'director';
	date_default_timezone_set('Asia/Jakarta');
	$datelastmod = date('Y-m-d\T07:00:00P');

	$url = "/director-sitemap-$hasil.xml";
	if ($url == $_SERVER["REQUEST_URI"]) {
		if ($hasil == $hasil) {
			$dataawal = $dataawal * ($hasil - 1);
			foreach (array_slice($data, $dataawal, $jumlahtampil) as $key) {
				$key = str_replace(" - ", "-", $key);
				$key = str_replace("", "", $key);
				$key = str_replace(" ", "-", $key);
				$key = strtolower($key);
				echo '<url>' . "\r\n\t" . '<loc>' . site_url() . '/' . $mainurl . '/' . $key . '</loc>' . "\r\n\t" . '<image:image><image:loc>' . site_url() . '/wp-content/uploads/image.png</image:loc><image:title><![CDATA[' . $key . ']]></image:title><image:caption><![CDATA[]]></image:caption></image:image><lastmod>' . $datelastmod . '</lastmod>' . "\r\n\t" . '<changefreq>always</changefreq>' . "\r\n\t" . '<priority>0.2</priority>' . "\r\n\t" . '</url>' . "\r\n";
			}
		}
	}
}

function sitemap_cast($dataawal, $jumlahtampil)
{
	$isifile = file_get_contents('wp-content/uploads/keyword/cast.txt');
	$data = explode("\n", $isifile);
	$idsite = $_SERVER["REQUEST_URI"];
	$hasil = preg_replace('/[^0-9]/', '', $idsite); //simpan hasil number dari string yaitu = 1
	$mainurl = 'cast';
	date_default_timezone_set('Asia/Jakarta');
	$datelastmod = date('Y-m-d\T07:00:00P');

	$url = "/cast-sitemap-$hasil.xml";
	if ($url == $_SERVER["REQUEST_URI"]) {
		if ($hasil == $hasil) {
			$dataawal = $dataawal * ($hasil - 1);
			foreach (array_slice($data, $dataawal, $jumlahtampil) as $key) {
				$key = str_replace(" - ", "-", $key);
				$key = str_replace("", "", $key);
				$key = str_replace(" ", "-", $key);
				$key = strtolower($key);
				echo '<url>' . "\r\n\t" . '<loc>' . site_url() . '/' . $mainurl . '/' . $key . '</loc>' . "\r\n\t" . '<image:image><image:loc>' . site_url() . '/wp-content/uploads/image.png</image:loc><image:title><![CDATA[' . $key . ']]></image:title><image:caption><![CDATA[]]></image:caption></image:image><lastmod>' . $datelastmod . '</lastmod>' . "\r\n\t" . '<changefreq>always</changefreq>' . "\r\n\t" . '<priority>0.2</priority>' . "\r\n\t" . '</url>' . "\r\n";
			}
		}
	}
}

function url($url)
{
	$url = str_replace(' ', '-', $url);
	$url = str_replace('.', '-', $url);
	$url = str_replace('(', '', $url);
	$url = str_replace(')', '', $url);
	$url = str_replace(':', '-', $url);
	$url = str_replace('---', '-', $url);
	$url = strtolower($url);
	return $url;
}

function tv_now_playing($results)
{
	$api = get_api();
	$url = 'https://api.themoviedb.org/3/tv/popular?api_key=' . $api . '&page=1';
	$data = file_get_contents($url);
	$character = json_decode($data, true);
	foreach (array_slice($character["results"], 0, 16) as $key) {
		$id = $key["id"];
		$id = dechex($id);
		$views = $key["vote_average"];
		$title = $key['name'];
		$poster = $key["poster_path"];
		$url = $key["name"];
		$url = str_replace(' ', '-', $url);
		$url = str_replace(')', '', $url);
		$url = str_replace(':', '-', $url);
		$url = str_replace('--', '-', $url);
		$url = str_replace('--', '-', $url);
		$url = str_replace('.', '', $url);
		$url = strtolower($url);
		$tahun = $key["first_air_date"];
		$tahun = date("Y", strtotime($tahun));

		$results[] = array(
			'id' => $id,
			'views' => $views,
			'title' => $title,
			'poster' => $poster,
			'url' => $url,
			'tahun' => $tahun,
		);
	}

	foreach ($results as $key) {
		echo '<div class="col-md-125" itemscope="itemscope" itemtype="http://schema.org/Movie">
			<div class="gmr-item-modulepost">
				<a href="/series/' . $key["url"] . '-' . $key["id"] . '" itemprop="url" title="' . $key["title"] . '" rel="bookmark"><img width="152" height="222" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . '" class="attachment-medium size-medium wp-post-image" alt="" itemprop="image" srcset="https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 205w, https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $key["poster"] . ' 287w" sizes="(max-width: 152px) 100vw, 152px" title="' . $key["title"] . '" style="height: 188px;">
				</a>
				<header class="entry-header text-center">
					<div class="gmr-button-widget">
						<div class="clearfix gmr-popup-button-widget">
							<a href="/trailer/' . $key["url"] . '-' . $key["tahun"] . '-' . $key["id"] . '" class="button gmr-trailer-popup" title="Trailer for ' . $key["title"] . '" rel="nofollow">Trailer</a>
						</div>

						<div class="clearfix">
							<a href="/series/' . $key["url"] . '-' . $key["tahun"] . '-' . $key["id"] . '" class="button gmr-watch-btn" itemprop="url" title="' . $key["title"] . '" rel="bookmark">Watch Movie</a> </div>
					</div>
					<h2 class="entry-title" itemprop="headline">
						<a href="/series/' . $key["url"] . '-' . $key["tahun"] . '-' . $key["id"] . '" itemprop="url" title="' . $key["title"] . '" rel="bookmark">' . $key["title"] . ' (' . $key["tahun"] . ')</a>
					</h2>
				</header><!-- .entry-header -->
				<div class="gmr-rating-item"><span class="icon_star"></span>' . $key["views"] . '</div>
			</div>
		</div>';
	}
}


function series_v2()
{
	$url = 'https://api.gdriveplayer.us/v2/series/newest?limit=16';
	$data = file_get_contents($url);
	$character = json_decode($data, true);

	foreach ($character as $key => $value) {
		$id_film = $value['id'];
		$title = $value["title"];
		$poster = $value["poster"];
		$url = $value["title"];
		$url = url($url);
		echo '
		<div class="col-md-125" itemscope="itemscope" itemtype="http://schema.org/Movie">
		<div class="gmr-item-modulepost">
		    <a href="/series/' . $url . '-' . $id_film . '" itemprop="url" title="' . $title . '" rel="bookmark">
		        <img width="152" height="222" src="' . $poster . '" title="" style="height: 188px;"></a>
		    <header class="entry-header text-center">
		        <div class="gmr-button-widget">
		            
		            <div class="clearfix">
		                <a href="/series/' . $url . '-' . $id_film . '" class="button gmr-watch-btn" itemprop="url" title="' . $title . '" rel="bookmark">Watch Movie</a> </div>
		        </div>
		        <h2 class="entry-title" itemprop="headline">
		            <a href="/series/' . $url . '-' . $id_film . '" itemprop="url" title="' . $title . '" rel="bookmark">' . $title . '</a>
		        </h2>
		    </header>
		</div>
		</div>';
	}
}

function tv_details()
{
	$url = 'https://api.gdriveplayer.us/v2/series/newest?limit=16';
	$data = file_get_contents($url);
	$character = json_decode($data, true);

	foreach ($character as $key => $value) {
		$id_film = $value['id'];
		$title = $value["title"];
		$poster = $value["poster"];
		$url = $value["title"];
		$url = url($url);
		echo '
		<div class="col-md-125" itemscope="itemscope" itemtype="http://schema.org/Movie">
		<div class="gmr-item-modulepost">
		    <a href="/series/' . $url . '-' . $id_film . '" itemprop="url" title="' . $title . '" rel="bookmark">
		        <img width="152" height="222" src="' . $poster . '" title="" style="height: 188px;"></a>
		    <header class="entry-header text-center">
		        <div class="gmr-button-widget">
		            
		            <div class="clearfix">
		                <a href="/series/' . $url . '-' . $id_film . '" class="button gmr-watch-btn" itemprop="url" title="' . $title . '" rel="bookmark">Watch Movie</a> </div>
		        </div>
		        <h2 class="entry-title" itemprop="headline">
		            <a href="/series/' . $url . '-' . $id_film . '" itemprop="url" title="' . $title . '" rel="bookmark">' . $title . '</a>
		        </h2>
		    </header>
		</div>
		</div>';
	}
}

function search_player($keyword)
{
	$keyword_player = $keyword;
	$keyword_player = str_replace(' ', '+', $keyword_player);

	$url = 'https://api.gdriveplayer.us/v1/drama/search?title=' . $keyword_player . '&limit=99';
	$data = file_get_contents($url);
	$character = json_decode($data, true);

	foreach ($character as $search) {
		$id = $search['id'];
		$title = $search["title"];
		$poster = $search["poster"];
		$url = $search["title"];
		$url = url($url);

		echo '<article class="item col-md-20" itemscope="itemscope" itemtype="http://schema.org/Movie">
		<div class="gmr-box-content gmr-box-archive text-center" style="height: 371px;">
			<div class="content-thumbnail text-center">
				<a href="/movie/' . $url . '--' . $id . '" itemprop="url" title="Permalink to: ' . $title . '  ()" rel="bookmark">
					<img width="152" height="228" src="' . $poster . '" class="attachment-medium size-medium wp-post-image" alt="" itemprop="image" srcset="' . $poster . ' 152w, ' . $poster . ' 60w, ' . $poster . ' 170w" sizes="(max-width: 152px) 100vw, 152px" title="' . $title . '  ()">
				</a>
				<div class="gmr-quality-item"><a href="/movie/' . $url . '--' . $id . '" rel="tag">HD</a></div>
			</div>
			<div class="item-article">
				<h2 class="entry-title" itemprop="headline">
					<a href="/movie/' . $url . '--' . $id . '" itemprop="url" title="Permalink to: ' . $title . '  ()" rel="bookmark">' . $title . '  ()</a>
				</h2>
			<div class="gmr-movie-on"></div>
			<span class="screen-reader-text">
				<time itemprop="dateCreated" datetime=""></time>
			</span>
			<span class="screen-reader-text">
				<span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person">
					<span itemprop="name">
						<a href="#" rel="tag"></a>
					</span>
				</span>,
				<span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person">
					<span itemprop="name">
						<a href="" rel="tag"></a>
					</span>
				</span>
			</span>
				<div class="gmr-popup-button">
					<a href="/trailer/' . $url . '--' . $id . '" class="button gmr-trailer-popup" title="Trailer for ' . $title . '" rel="nofollow">
						<span class="icon_film" aria-hidden="true"></span>
						<span class="text-trailer">Trailer</span>
					</a>
				</div>
				<div class="gmr-watch-movie">
					<a href="/movie/' . $url . '--' . $id . '" class="button gmr-watch-button" itemprop="url" title="Permalink to: ' . $title . '  ()" rel="bookmark">Watch</a>
				</div>
			</div>
		</div>
	</article>';
	}
}
