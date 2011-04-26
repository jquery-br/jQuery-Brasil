<?php
/**
 * Template Name: Tutoriais
 */

	get_header();
	query_posts(array(
		'category_name' => 'tutorial',
		'paged' => $paged,
		'posts_per_page' => 5
	));
	if (have_posts()) : 
		while (have_posts()) : 
			the_post(); 
			if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts);
				//this function is in functions.php
				_post();
		
		endwhile;  
		
		//this function is in functions.php
		_paginate();
	
	else : 
	
	//this function is in functions.php
	_nothing_found;
	
	endif;
	get_sidebar(); 
	get_footer(); 





?>