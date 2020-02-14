<?php

function generate_id($length = 5)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function folderSize($dir)
{
    $size = 0;
    foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : folderSize($each);
    }
    return $size;
}

function rrmdir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir")
                    rrmdir($dir . "/" . $object);
                else unlink($dir . "/" . $object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

function url($url)
{
    $url = str_replace(' ', '-', $url);
    $url = str_replace('.', '-', $url);
    $url = str_replace('(', '', $url);
    $url = str_replace(')', '', $url);
    $url = str_replace(':', '-', $url);
    $url = strtolower($url);
    return $url;
}

function movies_tampil()
{
    $getfile = file_get_contents('file/json/film.json');
    $jsonfile = json_decode($getfile);
    $results = $jsonfile->results;
    return $results;
}

function mv_edit_get()
{
    $getfile = file_get_contents('file/json/film.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["results"];
    return $jsonfile;
}

function pass_get()
{
    $getacc = file_get_contents('file/json/acc.json');
    $jsondataacc = json_decode($getacc, true);
    return $jsondataacc;
}

function ads_header()
{
    $textfileheader = file_get_contents('file/txt/header.txt');
    return $textfileheader;
}
function ads_footer()
{
    $textfilefooter = file_get_contents('file/txt/footer.txt');
    return $textfilefooter;
}

function ads_homeatas()
{
    $textfileadshomeatas = file_get_contents('file/txt/adshomeatas.txt');
    return $textfileadshomeatas;
}

function ads_single()
{
    $textfileadssingle = file_get_contents('file/txt/adssingle.txt');
    return $textfileadssingle;
}
function ads_watchatas()
{
    $textfileadswatchatas = file_get_contents('file/txt/adswatchatas.txt');
    return $textfileadswatchatas;
}

function ads_watchbawah()
{
    $textfileadswatchbawah = file_get_contents('file/txt/adswatchbawah.txt');
    return $textfileadswatchbawah;
}

function api_show()
{
    $fileapi = file_get_contents('../wp-includes/source/API-MOVIE.txt');
    return $fileapi;
}

function keywords_title()
{
    $filekeywordtitle = '../wp-content/uploads/keyword/keyword.txt';
    $textkeywordtitle = file_get_contents($filekeywordtitle);
    return $textkeywordtitle;
}

function keywords_director()
{
    $filekeyworddirector = '../wp-content/uploads/keyword/director.txt';
    $textkeyworddirector = file_get_contents($filekeyworddirector);
    return $textkeyworddirector;
}

function keywords_cast()
{
    $filekeywordcast = '../wp-content/uploads/keyword/cast.txt';
    $textkeywordcast = file_get_contents($filekeywordcast);
    return $textkeywordcast;
}

function stream()
{
    $location = "file/json/link_film.json";
    $getfile = file_get_contents($location);
    $jsonfile = json_decode($getfile);
    $results = $jsonfile->results;
    return $results;
}

function stream_id()
{
    $getfile = file_get_contents('file/json/link_film.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["results"];
    return $jsonfile;
}

function cache_path()
{
    $filecache = 'file/txt/cachepath.txt';
    $isicache = file_get_contents($filecache);
    return $isicache;
}

function cache_sitemap()
{
    $filecachesitemap = 'file/txt/cachesitemappath.txt';
    $isicachesitemap = file_get_contents($filecachesitemap);
    return $isicachesitemap;
}

function cache_trailer()
{
    $cache_trailer = 'file/txt/cachetrailer.txt';
    $isicache_trailer = file_get_contents($cache_trailer);
    return $isicache_trailer;
}

function cache_path_size()
{
    $dircachefilm = cache_path();
    $dircachefilmsize = folderSize($dircachefilm);
    $dircachefilmsizekb = round($dircachefilmsize / 1024);
    return $dircachefilmsizekb;
}

function sitemap_cache_size()
{
    $dircachesitemap = cache_sitemap();
    $dircachesitemapsize = folderSize($dircachesitemap);
    $dircachesitemapsizekb = round($dircachesitemapsize / 1024);
    return $dircachesitemapsizekb;
}

function trailer_cache_size()
{
    $dircachesitemap = cache_trailer();
    $dircachesitemapsize = folderSize($dircachesitemap);
    $dircachesitemapsizekb = round($dircachesitemapsize / 1024);
    return $dircachesitemapsizekb;
}
