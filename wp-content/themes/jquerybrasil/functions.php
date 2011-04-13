<?php
function get_autor() {
	$blogusers = get_users('&orderby=post_count&order=desc');
    //echo '<ul>';
    foreach ($blogusers as $user) {
        //echo '<li>';
	echo get_avatar($user->user_email,45,$user->user_login,$user->user_login);
	//var_dump($user);
	//echo $user->user_login;
	//echo '</li>';
    }
    //echo '</ul>';
}

function get_lastest_post($qtde = 4, $echo = true){
	$posts = get_posts("numberposts=$qtde");
	
	$html = "<ul>";
	foreach($posts as $post) {
		$postid = $post->ID;
		$title = $post->post_title;
		$cc = $post->comment_count;
		$link = get_permalink($postid);
		$html .=  "<li><a href='$link'>$title ($cc)</a></li>";
	}
	$html .= "</ul>";
	if($echo) echo $html;
}

function the_content_limit($max_char, $more_link_text = '(more...)') {
    $content = get_the_content($more_link_text);
    the_content_limit_func($content, $max_char, $more_link_text);
}

function the_content_limit_func($content, $max_char, $more_link_text = '(more...)') {
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) {
      echo "<div>";
      echo $content;
      echo "</div>";
   } else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        //$content = $content;
        echo "<div>";
        echo $content;
        echo "... <span class='more'>$more_link_text</span>";
        echo "</div>";
   } else {
      echo "<div>";
      echo $content;
      echo "</div>";
   }
}

function jquery_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<span class="avatar"><?php echo get_avatar($comment,$size='64',$default='<path_to_url>' ); ?></span>
		<span class="autor-date">
			<span class="autor"><?php comment_author_link(); ?></span>
			<span class="date"><?php comment_date("j \d\e F \d\e Y"); ?></span>
		</span>
		<span class="comment_text">
			<?php comment_text() ?>
			<?php if ($comment->comment_approved == '0') : ?>
		         	<em><?php _e('Your comment is awaiting moderation.') ?></em>
		        	<br />
		    <?php endif; ?>
			<?php edit_comment_link(__('(Edit)'),'  ','') ?>	
		</span>
 
     	<!-- <div class="reply">
        	<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      	</div> -->
	</li>
	
<?php } ?>