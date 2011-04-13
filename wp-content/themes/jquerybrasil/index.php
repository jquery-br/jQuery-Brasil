<?php 
	get_header();
	
	if (have_posts()) : while (have_posts()) : the_post(); 
		if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); 
?>
	<!-- POSTS -->
		<div class="post">
			<div class="posthead">
				<span class="date">
					<?php the_time('d/m/Y') ?>
				</span><!-- /date -->
				<span class="autor">
					<?php the_author_link();?>
				</span>
				<?php //the_category(" | ")?>
			</div><!-- /headpost -->
			<div class="postcontent">
				<h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h1>
				<?php /*the_content_limit(300,"<a class='more' href='".get_permalink()."'> Continue lendo →</a>")*/ ?>
				<?php the_content(); ?>
				<?php the_tags("")?>				
			</div>
		</div>
	<!-- /POSTS -->
		<?php 
			endwhile;  ?>
			<div>
				<?php 
				if(function_exists('wp_pagenavi')) { 
					wp_pagenavi(); 
				} else { ?>
					<p class="pagination"> <?php previous_posts_link("P&aacute;gina anterior") ?> <?php next_posts_link("Pr&oacute;xima p&aacute;gina") ?></p>
				<?php } ?>
			</div>
		<?php else : ?>
			<li>
				<h2>Nenhum resultado encontrado</h2>
				<?php get_search_form(); ?>
			</li>	
		<?php endif;
	get_sidebar(); 
	get_footer(); 
?>
