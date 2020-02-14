<?php
$profile = profile();
$data = post_data();
$id_film = get_idpost();
foreach ($data as $key) :
	if ($key->id_film == $id_film) :
		$link_safelink = base64_encode($key->link1);
		include_once('wp-includes/meta/meta_post.php');
		include_once('header.php'); ?>
		</header>
		<div id="content" class="gmr-content" style="transform: none;">
			<div class="container">
			</div>
			<div class="container gmr-maincontent" style="transform: none;">
				<div class="row" style="transform: none;">
					<div id="primary" class="content-area col-md-9">
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
						<main id="main" class="site-main" role="main">
							<article id="post-1832" class="single-thumb post-1832 post type-post status-publish format-standard has-post-thumbnail hentry category-semi-korea muviyear-499 muvicountry-korea muviquality-hd muviindex-m" itemscope="itemscope" itemtype="http://schema.org/Movie">
								<div class="gmr-box-content gmr-single">
									<div class="idmuvi-social-share">
										<ul class="idmuvi-socialicon-share">
											<li class="facebook"><a href="#" class="idmuvi-sharebtn idmuvi-facebook" rel="nofollow" title="Share this"><span class="social_facebook"></span>Sharer</a></li>
											<li class="twitter"><a href="#" class="idmuvi-sharebtn idmuvi-twitter" rel="nofollow" title="Tweet this"><span class="social_twitter"></span>Tweet</a></li>
											<li class="whatsapp"><a class="idmuvi-sharebtn idmuvi-whatsapp" href="#" rel="nofollow" title="Whatsapp">WhatsApp</a></li>
										</ul>
									</div>
									<?php adswatchatas(); ?>
									<div class="gmr-notification player-notification global-notification">
										Jika tidak bisa diputar: gunakan server lainnya, bersihkan cache, lakukan reload browser. </div>

									<div class="gmr-server-wrap clearfix muvipro_player_content" id="muvipro_player_content_id">
										<div class="clearfix">
											<div id="player1-tab-content" class="tab-content">
												<div class="gmr-embed-responsive clearfix">
													<iframe width="1280" height="720" src="<?= $key->link1; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
												</div>
											</div>
											<div id="player2-tab-content" class="tab-content">
												<div class="gmr-embed-responsive clearfix">
													<iframe width="1280" height="720" src="<?= $key->link2; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
												</div>
											</div>
										</div>

										<ul class="gmr-player-nav clearfix">
											<li><a href="javascript:void(0)" class="gmr-switch-button" title="Turn off light" rel="nofollow"><span class="icon_lightbulb" aria-hidden="true"></span> <span class="text">Turn off light</span></a></li>
											<li><a href="#comments" title="Comments" rel="nofollow"><span class="icon_chat_alt" aria-hidden="true"></span> <span class="text">Comments</span></a></li>
											<li class="pull-right"><a href="#download" title="Download" rel="nofollow"><span class="icon_download" aria-hidden="true"></span> <span class="text">Download</span></a></li>
										</ul>
										<br>

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

									<div class="gmr-movie-data clearfix">
										<figure class="pull-left"><img width="60" height="90" src="<?= $key->linkgambar; ?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" itemprop="image" srcset="" sizes="(max-width: 60px) 100vw, 60px" title="<?= $key->title; ?>"></figure>
										<div class="gmr-movie-data-top">
											<h1 class="entry-title" itemprop="name"><?= $key->title; ?></h1>
											<div class="gmr-movie-innermeta">
												<span class="gmr-movie-genre"><?= $key->genre; ?>
												</span></div>
											<div class="gmr-movie-innermeta">
												<span class="gmr-movie-quality">Quality: <a href="#" rel="tag">HD</a></span>
											</div>
										</div>
									</div>

									<?php adswatchbawah(); ?>

									<div class="entry-content entry-content-single" itemprop="description">
										<h2>Nonton Movie <?= $key->title; ?> Layarkaca21 Bioskop Online Dunia21 Streaming Ganool</h2>

										<p><a href="<?= $_SERVER['HTTP_HOST'] ?>"><strong>LAYARKACA21</strong></a> kami menyediakan film bioskop online Lk21 terbaru jaminan kualitas movie yang terang dengan kata lain sudah bisa di nonton Cinemaindo oleh anda dan juga keluarga terdekat dari gadget hape maupun smartphone Layarkaca21 kesayangan anda. Mohon beri kami dukungan dengan ajak teman-teman / kerabat terdekat anda untuk menonton Layar Kaca 21 film bioskop 21 disini saja ya bos. Jika ada keluhan <b>Ganool</b>&nbsp;anda yang ingin membantu memberikan kritik serta saran mohon beritahu kami di Ganool alamat kontak yang sudah kami sediakan di bagian laman&nbsp;<b>Lk21</b>&nbsp;menu website lk 21 ini ya guy.</p>
										<h2>Download Film Layar kaca 21 Nonton Movie Indoxxi Lk21</h2>
										<p><strong>layar Kaca 21 Nonton Movie Ganool Streaming Film Cinemaindo video Online Lk21 LayarKaca21 Cinema XXI Indoxxi Dunia21 Gudangmovie.</strong> Disini Lk21 menyediakan film film layar Kaca 21 online Lk21 terbaru dengan kualitas mutu movie yang terang dengan kata lain sudah dapat di nonton Cinemaindo oleh anda dan <strong>Dunia21</strong>&nbsp;kembali keluarga terdekat Ganool awal gadget Gudangmovie hape maupun ponsel pintar Layarkaca21 kesayangan kamu</p>
										<h2>CinemaIndo Movie Layar Kaca 21 Kualitas Film Paling Bagus Lengkap Dengan Subtitle Indonesia</h2>
										<p>Streaming Lk21 Film film 21 Online teranyar Nonton Film Dunia21 web Cinemaindo Streaming&nbsp;<strong>Layar Kaca 21</strong> Film bioskop 21 HD Nonton sinema 21 unduh Movie 21 dengan cara cuma-cuma hanya Ada Di Sini! Nonton Movie Online Subtitle Indonesia Film HD Lk21 Koleksi Ganool Movie Online terbaru download Layarkaca21 Film Indoxxi dengan cara free <strong>Gudangmovie</strong> Disini Boskuuu.</p>

										<p></p>
										<div id="download" class="gmr-download-wrap clearfix">
											<h3 class="title-download"><?= $key->title; ?></h3>
											<ul class="list-inline gmr-download-list clearfix">
												<li><a href="https://lagi-viral-id.blogspot.com/p/vpn.html?url=<?= $link_safelink; ?>" class="button button-shadow" rel="nofollow" target="_blank" title="Download link <?= $key->title; ?>"><span class="icon_download" aria-hidden="true"></span>Server1</a></li>
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
									</footer>
								</div><!-- .gmr-box-content -->
							</article><!-- #post-## -->
							<div class="gmr-box-content">
								<div id="comments" class="comments-area">
									<div id="respond" class="comment-respond">
										<h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/mom-next-door-friend-2019/#respond" style="display:none;">Cancel reply</a></small></h3>
										<form action="" method="post" id="commentform" class="comment-form" novalidate="">
											<p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
											<p class="comment-form-comment"><label for="comment" class="gmr-hidden">Comment</label><textarea id="comment" name="comment" cols="45" rows="4" placeholder="Comment" aria-required="true"></textarea></p>
											<p class="comment-form-author"><input id="author" name="author" type="text" value="" placeholder="Name*" size="30" aria-required="true"></p>
											<p class="comment-form-email"><input id="email" name="email" type="text" value="" placeholder="Email*" size="30" aria-required="true"></p>
											<p class="comment-form-url"><input id="url" name="url" type="text" value="" placeholder="Website" size="30"></p>
											<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label></p>
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
	<?php endif; ?>
<?php endforeach; ?>
<?php include_once('footer.php') ?>