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

<?php endwhile; else : ?>
			<li>
				<h2>Nenhum resultado encontrado</h2>
				<?php get_search_form(); ?>
			</li>	
		<?php endif;
	get_sidebar(); 
	get_footer(); 
?>