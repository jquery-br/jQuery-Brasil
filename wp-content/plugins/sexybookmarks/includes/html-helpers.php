<?php
//list all bookmarks in the plugin options page
function shrsb_network_input_select($name, $hint) {
	global $shrsb_plugopts;
	return sprintf('<label class="%s" title="%s"><input %sname="bookmark[]" type="checkbox" value="%s"  id="%s" /><br />%s</label>',
		$name,
		$hint,
		@in_array($name, $shrsb_plugopts['bookmark'])?'checked="checked" ':"",
		$name,
		$name,
		shrsb_truncate_text(end(explode('-', $name)), 9)
	);
}

function shrsb_truncate_text($text, $nbrChar, $append='..') {
     if(strlen($text) > $nbrChar) {
          $text = substr($text, 0, $nbrChar);
          $text .= $append;
     }
     return $text;
}

// returns the option tag for a form select element
// $opts array expecting keys: field, value, text
function shrsb_form_select_option($opts) {
	global $shrsb_plugopts;
	$opts=array_merge(
		array(
			'field'=>'',
			'value'=>'',
			'text'=>'',
		),
		$opts
	);
	return sprintf('<option%s value="%s">%s</option>',
		($shrsb_plugopts[$opts['field']]==$opts['value'])?' selected="selected"':"",
		$opts['value'],
		$opts['text']
	);
}

// given an array $options of data and $field to feed into shrsb_form_select_option
function shrsb_select_option_group($field, $options) {
	$h='';
	foreach ($options as $value=>$text) {
		$h.=shrsb_form_select_option(array(
			'field'=>$field,
			'value'=>$value,
			'text'=>$text,
		));
	}
	return $h;
}

function shrsb_is_mobile_browser() {
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    $isMobile = false;
    if(preg_match('/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
        $isMobile = true;
    }
    return $isMobile;

}

// function to list bookmarks that have been chosen by admin
function bookmark_list_item($name, $opts=array()) {
	global $shrsb_plugopts, $shrsb_bookmarks_data, $post;
    $onclick = "";
  $post_info = shrsb_get_params($post->id);
  // If Twitter, check for custom tweet configuration and modify tweet accordingly
  if($name == 'shr-twitter') {

  if(!shrsb_is_mobile_browser()) {
      $clickHandler = '
           if(typeof(SHR_config) == "undefined" || !SHR_config) {
                window["SHR_config"] = {};
            }

            window["__shr_service"] = "twitter";
            window["__shr_log"] = true;
            window["__shr_center"] = true;


            SHR_config["shortener"] ="'.$post_info['shortener'].'";
            SHR_config["shortener_key"] ="'.$post_info['shortener_key'].'";
            SHR_config["apikey"] = "'.$shrsb_plugopts['apikey'].'";
            SHR_config["twitter_template"] = "'.$shrsb_plugopts['tweetconfig'].'";
            SHR_config["link"] = "'.PERMALINK.'";
            SHR_config["title"] = "'.TITLE.'";
            SHR_config["short_link"] = "'.$post_info['short_link'].'";

            if(!window.SHR || !window.SHR.Servicelet) {
                var d = document;
                var s=d.createElement("script");
                s.setAttribute("language","javascript");
                s.id="shr-servicelet";
                s.setAttribute("src", "'.$shrsb_plugopts['shrbase'].'" + "/media/js/servicelet.min.js");
                d.body.appendChild(s);
            } else{
                SHR.Servicelet.show();
            }
            return false;
            ';

          foreach ($opts as $key=>$value) {
            $clickHandler = str_replace(strtoupper($key),  $value, $clickHandler);
          }
          $clickHandler = str_replace('"',"'",$clickHandler);
          $clickHandler = str_replace(array("\n","\r"),"",$clickHandler);
          $onclick = " onclick=\"$clickHandler\"";
    }
  
    $url = $shrsb_plugopts['shrbase'].'/api/share/?'.implode('&amp;',array(
    																		'title=TITLE',
    																		'link=PERMALINK',
    																		'notes='.$post_info['notes'],
    																		'short_link='.$post_info['short_link'],
                                                                            'shortener='.$post_info['shortener'],
                                                                            'shortener_key='.$post_info['shortener_key'],
    																		'v=1',
    																		'apitype=1',
    																		'apikey='.$shrsb_plugopts['apikey'],
    																		'source=Shareaholic',
    																		'template='.urlencode($shrsb_plugopts['tweetconfig']),
    																		'service='.$shrsb_bookmarks_data[$name]['id'],
    																		'tags='.$post_info['d_tags'],
    																		'ctype='
    																		));
  }
  else if($name == 'shr-comfeed') {// Otherwise, use default baseUrl format
      $url=$shrsb_bookmarks_data[$name]['baseUrl'];
  }
  else {
	 $url = $shrsb_plugopts['shrbase'].'/api/share/?'.implode('&amp;',array(	
																			'title=TITLE',
																			'link=PERMALINK',
																			'notes='.$post_info['notes'],
																			'short_link='.$post_info['short_link'],
                                                                            'shortener='.$post_info['shortener'],
                                                                            'shortener_key='.$post_info['shortener_key'],
																			'v=1',
																			'apitype=1',
																			'apikey='.$shrsb_plugopts['apikey'],
																			'source=Shareaholic',
																			'template=',
																			'service='.$shrsb_bookmarks_data[$name]['id'],
																			'tags='.$post_info['d_tags'],
																			'ctype='
																			));
  }


	if($name == 'shr-facebook') {
		$onclick = " onclick=\"window.open(this.href,'sharer','toolbar=0,status=0,width=626,height=436'); return false;\"";
	}
  else {
    if($shrsb_plugopts['targetopt'] == '_blank') {
      $topt = ' class="external"';
    }
    else {
      $topt = '';
    }
  }
	foreach ($opts as $key=>$value) {
		$url=str_replace(strtoupper($key), $value, preg_replace('/\s+/', '%20', $url));
	}
	if(is_feed()) {
		return sprintf(
			"\t\t".'<li class="%s">'."\n\t\t\t".'<a href="%s" rel="%s"%s title="%s">%s</a>'."\n\t\t".'</li>'."\n",
			$name,
			$url,
			$shrsb_plugopts['reloption'],
			$topt,
			$shrsb_bookmarks_data[$name]['share'],
			$shrsb_bookmarks_data[$name]['share']
		);
	}
	else {
		return sprintf(
			"\t\t".'<li class="%s">'."\n\t\t\t".'<a href="%s" rel="%s"%s title="%s"%s>&nbsp;</a>'."\n\t\t".'</li>'."\n",
			$name,
			$url,
			$shrsb_plugopts['reloption'],
			$topt,
			$shrsb_bookmarks_data[$name]['share'],
			$onclick
		);
	}
}

