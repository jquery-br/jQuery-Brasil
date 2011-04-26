<?php get_header(); 
	//TODO: TEM QUE ARRUMAR ISSO
	/*
	 * 
	 * <?php query_posts(array(
		//		'category_name' => 'Notícias',
				'cat' => '160',
				'paged' => $paged,
				'posts_per_page' => 5
			)); ?>
	 */	

	
	$author = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); 
	
	if (have_posts('')) : ?>
		<div id="author-page">
			<div id="about">
				<h1>Sobre <?php echo $author->nickname; ?></h1>
				<div id="author-avatar">
					<?php echo get_avatar($author->user_email, '90', $avatar); ?>
				</div>
				<?php echo $author->user_description; ?>
			</div>
			<h2>Ãšltimos posts de <?php echo $author->nickname; ?></h2>
		
		</div>
		<?php 
		while (have_posts()) : 
			the_post(); 
			if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts);
				//this function is in functions.php
				_post();
			
		endwhile;  
			
			//this function is in functions.php
		_paginate();
	endif;
	
	get_sidebar(); 
	get_footer(); 
?>