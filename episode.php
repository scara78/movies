<?php
$profile = profile();
$id_film = get_idfilm();
$eps = get_eps();
$data = series_details($id_film);
foreach ($data as $film) :
	$title = $film['title'];
	$thumbnail = $film['thumbnail'];
	$desc = $film['desc'];
	$genre_name = $film['genre_name'];
	$country = $film['country'];
	$views = $film['views'];
	$tagline = $film['tagline'];
	$budget = $film['budget'];
	$revenue = $film['revenue'];
	$url = $film['url'];
	$release = $film['release'];
	$tahun = $film['tahun'];
	$trailer = $film['trailer'];
	$link_film = $film['link_film'];
	$link_safelink = $film['link_safelink'];
	$created_by = $film['created_by'];
	$last_episode_to_air = $film['last_episode_to_air'];
	$number_of_episodes = $film['number_of_episodes'];
	$keyword_player = $title;
	$keyword_player = str_replace(' ', '+', $keyword_player);
	$id_player = search_player($keyword_player);
	$link_film = "https://database.gdriveplayer.us/player.php?type=drama&id=" . $id_player . "&episode=" . $eps;
	$link_download = "https://9xbud.com/$link_film";
	$link_safelink = base64_encode($link_download);

	include_once('wp-includes/meta/meta_watch.php');
	include_once('header.php');
?>
	</header>
	<div id="content" class="gmr-content" style="transform: none;">
		<div class="container"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="breadcrumbs" itemscope="itemscope" itemtype="http://schema.org/BreadcrumbList">
						<span itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
							<a itemprop="item" href="<?= site_url() ?>">
								<span itemprop="name">Home</span></a>
							<meta itemprop="position" content="1" />
						</span>
						<span class="separator">
							<span class="arrow_carrot-2right"></span>
						</span>
						<span itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
							<a itemprop="item" href="/<?= $genre_name[0]["name"]; ?>">
								<span itemprop="name"><?= $genre_name[0]["name"]; ?></span></a>
							<meta itemprop="position" content="2" />
						</span>
						<span class="separator">
							<span class="arrow_carrot-2right"></span>
						</span>
						<span itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
							<span itemprop="name">Nonton Film <?= $title . ' (' . $tahun ?>)</span>
							<meta itemprop="position" content="3" />
						</span>
					</div>
					<div class="idmuvi-social-share">
						<ul class="idmuvi-socialicon-share">
							<li class="facebook"><a href="#" class="idmuvi-sharebtn idmuvi-facebook" rel="nofollow" title="Share this"><span class="social_facebook"></span>Sharer</a></li>
							<li class="twitter"><a href="#" class="idmuvi-sharebtn idmuvi-twitter" rel="nofollow" title="Tweet this"><span class="social_twitter"></span>Tweet</a></li>
							<li class="whatsapp"><a class="idmuvi-sharebtn idmuvi-whatsapp" href="#" rel="nofollow" title="Whatsapp">WhatsApp</a></li>
						</ul>
					</div>
					<div class="clearfix">
						<div class="list-table">
							<div class="table-row">
								<div class="table-cell allepisode">
									<div class="element-click"><button class="button button-shadow">Semua Episode<span class="arrow_carrot-down"></span></button>
										<div class="listwrap dropdown">
											<ul class="gmr-listseries">
												<?php
												$episode = $last_episode_to_air['episode_number'];
												for ($i = 1; $i <= $episode; $i++) : ?>
													<li><a href="/eps/<?= $i . '/' . $url . '-subtitle-indonesia-' . dechex($id_film) ?>" title="$title"><?= $title ?> Episode <?= $i ?> Subtitle Indonesia</a></li>
												<?php endfor; ?>

											</ul>
										</div>
									</div>
								</div>
								<div class="table-cell prevnextepisode">
									<nav class="pull-right" role="navigation"><a href="https://youwatch.fun/eps/crash-landing-on-you-episode-2-subtitle-indonesia/" class="button button-shadow" title="Permalink ke: Crash Landing on You Episode 2 Subtitle Indonesia" rel="next"><span class="arrow_carrot-2right"></span></a></nav>
								</div>
							</div>
						</div>
					</div>
					<div class="gmr-notification player-notification global-notification">
						<span style="font-size:13px;">Jika tidak bisa diputar: gunakan server lainnya, bersihkan cache, lakukan reload browser.</span>
					</div>
					<?php adswatchatas(); ?>
					<div class="gmr-server-wrap clearfix muvipro_player_content" id="muvipro_player_content_id">
						<div class="clearfix">
							<div id="player1-tab-content" class="tab-content">
								<div class="gmr-embed-responsive clearfix">
									<?php $ret = player_check($link_film); ?>
									<?php if (!empty($ret)) : ?>
										<iframe src="<?= $link_film ?>" width="100%" height="400" frameborder="0" allowfullscreen="allowfullscreen"></iframe>';
									<?php else : ?>
										<iframe width="1280" height="720" src="https://www.youtube.com/embed/<?= $trailer ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
									<?php endif ?>
								</div>
							</div>
							<div id="player2-tab-content" class="tab-content">
								<div class="gmr-embed-responsive clearfix">
									<?php $datafilm = server_dua(); ?>
									<?php foreach ($datafilm as $keyfilm) : ?>
										<?php if ($keyfilm["id_film"] == get_idpost()) : ?>
											<iframe src="<?= $keyfilm["link"] ?>" width="100%" height="400" frameborder="0" allowfullscreen="allowfullscreen"></iframe>';
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<ul class="gmr-player-nav clearfix">
							<li><a href="javascript:void(0)" class="gmr-switch-button" title="Turn off light" rel="nofollow"><span class="icon_lightbulb" aria-hidden="true"></span> <span class="text">Turn off light</span></a></li>
							<li><a href="#comments" title="Comments" rel="nofollow"><span class="icon_chat_alt" aria-hidden="true"></span> <span class="text">Comments</span></a></li>
							<li><a href="https://www.youtube.com/watch?v=<?= $trailer ?>" class="gmr-trailer-popup" title="<?= $title . ' (' . $tahun ?>)" rel="nofollow"><span class="icon_film" aria-hidden="true"></span> <span class="text">Trailer</span></a></li>
							<li class="pull-right"><a href="#download" title="Download" rel="nofollow"><span class="icon_download" aria-hidden="true"></span> <span class="text">Download</span></a></li>
						</ul>
						<ul class="muvipro-player-tabs nav nav-tabs clearfix" id="gmr-tab">
							<li class="selected">
								<a href="#" id="player1" rel="nofollow">Server1</a>
							</li>
							<li>
								<a href="#" id="player2" rel="nofollow">Server2</a>
							</li>
						</ul>
					</div>
					<div id="lightoff"></div>
				</div>
			</div>
		</div>
		<div class="container gmr-maincontent" style="transform: none;">
			<div class="row" style="transform: none;">
				<div id="primary" class="content-area col-md-9">
					<main id="main" class="site-main" role="main">
						<article id="post-1832" class="single-thumb post-1832 post type-post status-publish format-standard has-post-thumbnail hentry category-semi-korea muviyear-499 muvicountry-korea muviquality-hd muviindex-m" itemscope="itemscope" itemtype="http://schema.org/Movie">
							<div class="gmr-box-content gmr-single">
								<div class="gmr-movie-data clearfix">
									<figure class="pull-left">
										<img width="60" height="90" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2<?= $thumbnail ?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" itemprop="image" srcset="https://image.tmdb.org/t/p/w600_and_h900_bestv2<?= $thumbnail ?> 60w, https://image.tmdb.org/t/p/w600_and_h900_bestv2<?= $thumbnail ?> 152w, https://image.tmdb.org/t/p/w600_and_h900_bestv2<?= $thumbnail ?> 170w" sizes="(max-width: 60px) 100vw, 60px" title="<?= $title ?>">
									</figure>
									<div class="gmr-movie-data-top">
										<h1 class="entry-title" itemprop="name"><?= $title . ' (' . $tahun ?>)</h1>
										<div class="gmr-movie-innermeta">
											<span class="gmr-movie-genre">Genre:
												<?php foreach ($genre_name as $genre_key) : ?>
													<a href="<?= site_url() ?>/genre/<?= strtolower($genre_key['name']) ?>" rel="category tag"><?= $genre_key['name'] ?></a>,
												<?php endforeach; ?>
											</span>
										</div>
										<div class="gmr-movie-innermeta">
											<span class="gmr-movie-quality">Quality: <a href="#" rel="tag">HD</a></span>
											<span class="gmr-movie-genre">Year: <a href="#" rel="tag"><?= $tahun ?></a></span>
											<span class="gmr-movie-view">View: <?= $views ?> views</span>
										</div>
									</div>
								</div>
								<?php adswatchbawah() ?>
								<div class="entry-content entry-content-single" itemprop="description">
									<h2>Nonton Movie <?= $title . ' (' . $tahun ?>) Layarkaca21 Bioskop Online Dunia21
										Streaming Ganool</h2>
									<div class="clearfix content-moviedata">
										<p><?= $desc ?></p>

										<?php foreach ($created_by as $created_by_key) : ?>
											<div class="gmr-moviedata"><strong>Sutradara:</strong><?= $created_by_key['name'] ?></div>
										<?php endforeach; ?>
										<div class="gmr-moviedata"><strong>Rilis Terakhir:</strong><span><time itemprop="dateCreated" datetime="2019-06-19T00:00:00+00:00"><?= $last_episode_to_air['air_date'] ?></time></span></div>
										<div class="gmr-moviedata"><strong>Episode Terakhir:</strong> <?= $last_episode_to_air['episode_number'] ?></div>
										<div class="gmr-moviedata"><strong>Jumlah Episode:</strong> <?= $number_of_episodes ?></div>
										<div class="gmr-moviedata"><strong>Season:</strong><?= $last_episode_to_air['season_number'] ?></div>
										<div class="gmr-moviedata"><strong>Overview:</strong><?= $last_episode_to_air['overview'] ?></div>
									</div>
									<p></p>
									<div id="download" class="gmr-download-wrap clearfix">
										<h3 class="title-download"><?= $title . ' (' . $tahun ?>)</h3>
										<ul class="list-inline gmr-download-list clearfix">
											<li><a href="https://lagi-viral-id.blogspot.com/p/vpn.html?url=<?= $link_safelink ?>" class="button button-shadow" rel="nofollow" target="_blank" title="Download link <?= $title . ' (' . $tahun ?>)"><span class="icon_download" aria-hidden="true"></span>Server1</a></li>
										</ul>
									</div>
									<div class="idmuvi-social-share">
										<ul class="idmuvi-socialicon-share">
											<li class="facebook"><a href="#" class="idmuvi-sharebtn idmuvi-facebook" rel="nofollow" title="Share this"><span class="social_facebook"></span>Sharer</a></li>
											<li class="twitter"><a href="#" class="idmuvi-sharebtn idmuvi-twitter" rel="nofollow" title="Tweet this"><span class="social_twitter"></span>Tweet</a></li>
											<li class="whatsapp"><a class="idmuvi-sharebtn idmuvi-whatsapp" href="h#" rel="nofollow" title="Whatsapp">WhatsApp</a></li>
										</ul>
									</div>
								</div>
								<footer class="entry-footer">
									<div class="gmr-footer-posted-on">
										<span class="byline"> By <span class="entry-author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/person">
												<a class="url fn n" href="<?= site_url() ?>" title="Permalink to: Layarkaca21 Indonesia" itemprop="url">
													<span itemprop="name">Layarkaca21 Indonesia</span>
												</a>
											</span>
										</span>
									</div>
									<span class="cat-links">Posted in
										<?php foreach ($country as $country_key) : ?>
											<a href="<?= site_url() ?>/country/<?= strtolower($country_key[" name"]) ?>" rel="tag"><?= $country_key["name"] ?></a>,
										<?php endforeach; ?>
									</span>
								</footer>
								<div class=" gmr-grid idmuvi-core">
									<h3 class="widget-title gmr-related-title">Related Movies</h3>
									<div class="row grid-container">
										<?php related_movies($id_film) ?>
										<div class="clearfix"></div>
									</div>
								</div>
							</div><!-- .gmr-box-content -->
						</article><!-- #post-## -->
						<div class="gmr-box-content">
							<div id="comments" class="comments-area">
								<div id="respond" class="comment-respond">
									<h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel
												reply</a></small></h3>
									<form action="" method="post" id="commentform" class="comment-form" novalidate="">
										<p class="comment-notes"><span id="email-notes">Your email address will not be
												published.</span> Required fields are marked <span class="required">*</span>
										</p>
										<p class="comment-form-comment"><label for="comment" class="gmr-hidden">Comment</label><textarea id="comment" name="comment" cols="45" rows="4" placeholder="Comment" aria-required="true"></textarea>
										</p>
										<p class="comment-form-author"><input id="author" name="author" type="text" value="" placeholder="Name*" size="30" aria-required="true"></p>
										<p class="comment-form-email"><input id="email" name="email" type="text" value="" placeholder="Email*" size="30" aria-required="true"></p>
										<p class="comment-form-url"><input id="url" name="url" type="text" value="" placeholder="Website" size="30"></p>
										<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><label for="wp-comment-cookies-consent">Save my name, email, and website in this
												browser for the next time I comment.</label></p>
										<p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Post Comment"> <input type="hidden" name="comment_post_ID" value="1832" id="comment_post_ID">
											<input type="hidden" name="comment_parent" id="comment_parent" value="0">
										</p>
										<p style="display: none;"><input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce" value="17653aa188"></p>
										<p style="display: none;"></p> <input type="hidden" id="ak_js" name="ak_js" value="1568400747695">
									</form>
								</div><!-- #respond -->
							</div><!-- #comments -->
						</div><!-- .gmr-box-content -->
					</main><!-- #main -->
				</div><!-- #primary -->
				<?php include_once('sidebar.php') ?>
			</div><!-- .row -->
		</div><!-- .container -->
		<div id="stop-container"></div>
	</div>
<?php endforeach ?>
<?php include_once('footer.php') ?>