<?php 
	get_header();
	
	if (have_posts()) : 
		while (have_posts()) : 
			the_post(); 
			if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); 
?>
			<!-- POSTS -->
				<div class="post single-post">
					<div class="posthead">
						<span class="date">
							<?php the_time('d/m/Y') ?>
						</span><!-- /date -->
						<span class="autor">
							<?php the_author_posts_link(); ?>
						</span>
						<?php //the_category(" | ")?>
					</div><!-- /headpost -->
					<div class="postcontent">
						<h1><?php the_title() ?></h1>
						<?php the_content(); ?>
						<hr />
						<?php the_tags("")?>				
					</div>
					<?php edit_post_link('Editar', '<p>', '</p>');?>
					<div id="comments">
						<?php comments_template(); ?>
					</div>
				</div>
			<!-- /POSTS -->
<?php 
		endwhile; 
	else : 
	
	//this function is in functions.php
	_nothing_found;
	
	endif;
	get_sidebar(); 
	get_footer(); 
?>