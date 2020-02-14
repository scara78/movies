<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#" style="transform: none;">

<head itemscope="itemscope" itemtype="http://schema.org/WebSite">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title>Nonton Film <?= $title . ' (' . $tahun . ')' ?> Subtitle Indonesia | <?= $profile->website_name; ?></title>
    <meta name="description" content="Nonton dan download <?= $title . ' (' . $tahun . ')' ?> - <?= $profile->description; ?>. Genre: <?php foreach ($genre_name as $genrename) : ?><?php echo $genrename['name'] . ', ' ?><?php endforeach ?> <?php echo '| Negara:' . $country[0]["name"] ?>">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Nonton Film <?= $title . ' (' . $tahun . ')' ?>">
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="450" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image" content="https://image.tmdb.org/t/p/w600_and_h900_bestv2<?= $thumb ?>" />
    <meta property="og:description" content="Nonton Film <?= $title . ' (' . $tahun . ')' ?> <?= $profile->description; ?>">
    <meta property="og:url" content="<?= site_url() . '' . path_url() ?>">
    <meta property="og:site_name" content="<?= site_url() ?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="Nonton Film <?= $title . ' (' . $tahun . ')' ?> <?= $profile->description; ?>">
    <meta name="twitter:title" content="Nonton Film <?= $title . ' (' . $tahun . ')' ?> | <?= $profile->description; ?>">
    <link rel="dns-prefetch" href="//s0.wp.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//s.w.org">
    <link rel=" canonical" href="<?= site_url() . '' . path_url() ?>">
    <script type='text/javascript' src='<?= site_url() ?>/wp-includes/js/jquery/jquery.js?ver=1.12.4-wp'></script>
    <script type='text/javascript' src='<?= site_url() ?>/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
    <link rel='stylesheet' id='wp-block-library-css' href='<?= site_url() ?>/wp-includes/css/dist/block-library/style.min.css?ver=5.2.3' type='text/css' media='all' />
    <link rel='stylesheet' id='idmuvi-core-css' href='<?= site_url() ?>/wp-content/plugins/idmuvi-core/css/idmuvi-core.css?ver=1.0.0' type='text/css' media='all' />
    <link rel='stylesheet' id='dashicons-css' href='<?= site_url() ?>/wp-includes/css/dashicons.min.css?ver=5.2.3' type='text/css' media='all' />
    <link rel='stylesheet' id='wpmi-icons-css' href='<?= site_url() ?>/wp-content/plugins/wp-menu-icons/assets/css/wpmi.css?ver=2.0.3' type='text/css' media='all' />
    <link rel='stylesheet' id='muvipro-fonts-css' href='https://fonts.googleapis.com/css?family=Open+Sans%3Aregular%2Citalic%2C700%2C300%7CDroid+Sans%3Aregular%2C700%26subset%3Dlatin%2C&#038;ver=1.0.0' type='text/css' media='all' />