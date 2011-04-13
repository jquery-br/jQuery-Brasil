<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" media="screen" />
	
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.lavalamp.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
	
	<!-- wp_head -->
	<?php wp_head(); ?>
	<!-- /wp_head -->
	
	<script type="text/javascript" charset="utf-8">
		$(function() { 
	   		$("#menu ul").lavaLamp({ fx: "backout", speed: 700 })
	   	});
	</script>
	

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22697280-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
	<!-- #EVERYTHING -->
	<div id="everything">
		<!-- #HEADER -->
		<div id="header">
			<a href="<?php bloginfo('url'); ?>" title="Site da comunidade de jQuery do Brasil"><img src="<?php bloginfo('template_directory'); ?>/img/logo.jpg"	 alt="Site da comunidade de jQuery do Brasil" title="Site da comunidade de jQuery do Brasil" /></a>
			<div id="menu">
				<ul class="lavaLamp">
					<li><a href="" title="">documentação</a></li>
					<li><a href="" title="">download</a></li>
					<li><a href="" title="">plugins</a></li>
					<li><a href="" title="">tutoriais</a></li>
					<li><a href="" title="">faq</a></li>
				</ul>
			</div>
		</div>
		<!--// #HEADER -->
		<!-- #CONTAINER -->
		<div id="container">
			<!-- #CONTENT -->
			<div id="content">
<?php //bloginfo('url'); ?>
<?php //bloginfo('template_directory'); ?>