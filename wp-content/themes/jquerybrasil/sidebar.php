	</div>
	<!-- // #CONTENT -->
	<!-- #SIDEBAR -->
	<div id="sidebar">
		<div id="socialize">
			<ul>
				<li>
					<a title="RSS" href="http://feeds.feedburner.com/JqueryBrasil">
						<img alt="RSS icon" src="<?php bloginfo('template_directory'); ?>/img/ico-rss.png">
						<span>ASSINE NOSSO FEED:</span>TODOS OS POSTS
					</a>
				</li>
				<li>
					<a title="jQuery Brasil no Twitter" href="http://twitter.com/jquerybr">
						<img alt="jQuery Brasil no Twitter" src="<?php bloginfo('template_directory'); ?>/img/ico-twitter.png">
						<span>SIGA-NOS NO TWITTER:</span>@JQUERYBR
					</a>
				</li>
			</ul>
		</div>

		<iframe src="http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FjQueryBrasilorg%2F180282775355431&amp;width=340&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=250" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:340px; height:250px; background: #fff; margin-bottom: 20px" allowTransparency="true"></iframe>

		<? /* <h3>$("#ultimos_posts");</h3>
		<div class="widget">
			<?php get_lastest_post()?>
		</div> */ ?>

		<h3>$("#categorias");</h3>
		<div class="widget">
			<?php get_jquery_categories(true); ?>
		</div>
		<h3>$("#colunistas");</h3>

	  	<?php get_autor();?>
	</div>
	<!-- // #SIDEBAR -->
