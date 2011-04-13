<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Por favor, n&atilde;o carregue esta p&aacute;gina diretamente!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Post restrito.</p>
	<?php
		return;
	}
?>

<h3>Coment&aacute;rios</h3>
<?php if ( have_comments() ) : ?>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ul class="commentlist">
		<?php 
		wp_list_comments('type=comment&callback=jquery_comment');
		//wp_list_comments('avatar_size=64'); ?>
	</ul>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
	<div id="respond">
		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<h4>Deixe seu Coment&aacute;rio</h4>
			<p>
				<label for="author">Nome <small>(obrigat&oacute;rio)</small></label>
				<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			</p>
			<p>
				<label for="email">Email <small>(obrigat&oacute;rio)</small></label>
				<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			</p>
			<p>
				<label for="url">Website</label>
				<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
			</p>
			<p>
				<label for="comment">Coment&aacute;rio</label>
				<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
			</p>
			<p>
				<input name="submit" type="submit" id="submit" tabindex="5" value="Enviar" />
				<?php comment_id_fields(); ?>
			</p>
		<?php do_action('comment_form', $post->ID); ?>
		
		</form>
	</div>
<?php endif; // if you delete this the sky will fall on your head ?>
