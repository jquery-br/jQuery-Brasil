<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function shrsb_authentication_page($apikey = null) {
    global $shrsb_plugopts;
    ?>
    <script type ="text/javascript">
            function authenticate(apikey,callback) {
                if(!apikey) {
                    return false;
                }
                var args = {};
                args["install_url"] = '<?php echo get_option('siteurl')?>';
                args["api_key"] = apikey;
                var validation_url = <?php echo '"'.$shrsb_plugopts['shrbase'].'"' ?> +"/api/auth/apikey/";
                jQuery.ajax({
                            url : validation_url,
                            type: 'get',
                            data: args,
                            success: authHandler,
                            dataType:'jsonp'
                        });
            }

            function authHandler(obj) {
                var imgSrc = <?php echo '"'.$shrsb_plugopts['shrbase'].'"' ?> +"/media/images/" + (obj["auth"]?"pass":"fail") + ".png";
                var dispText = "Authentication " + (obj["auth"]?"Succeeded":"Failed") + ".";
                if(obj["auth"]) {
                    jQuery("#sexy-bookmark-pro-authenticate").get(0).submit();
                }
                jQuery("#auth-status-img").get(0).src = imgSrc;
                jQuery("#auth-status-text").text(dispText);
            }

            function submitHandler() {
                var api = jQuery("#apikey").get(0).value;
                authenticate(api);
            }
            
    </script>

    <h2 class="shrsblogo"><span class="sh-logo"></span></h2>
    <iframe style ="display:none" name ="_formtarget" id ="_formtarget"></iframe>

        <div id="shrsb-col-left" style="width:100%;">
            <ul id="shrsb-sortables">
                <li>
                    <div class="box-mid-head">
                        <h2 class="fugue f-status"><?php _e('Shareaholic Pro', 'shrsb'); ?></h2>
                    </div>
                    <div class="box-mid-body">
                          <div class="padding">
                            <div style="position:relative;width:80%;">
                                <p><strong>
                                    <?php _e('Shareaholic Professional is coming!!!!', 'shrsb'); ?>
                                    </strong>
                                    <br><br>
                                    <?php _e('We are excited to offer you a host of features like Analytics to give you insight about your website traffic and user activity.'.
                                            'Be the first one to grab the opportunity and register for a free account today!!', 'shrsb'); ?>
                                </p>
                            </div>
                          </div>
                          <div class="shrsbsubmit">
                              <input type="button" onclick ="window.open(<?php echo '\"'.$shrsb_plugopts['shrbase'].'\"' ?> +'/publishers_apps/new_publishers_app')" value="<?php _e('Get Share Pro', 'shrsb'); ?>" />
                          </div>
                    </div>
                </li>
                
                <li>
                    <div class="box-mid-head">
                        <h2 class="fugue f-status"><?php _e('Authenticate', 'shrsb'); ?></h2>
                    </div>
                    <div class="box-mid-body">
                        <form target="_formtarget" name="sexy-bookmark-pro-authenticate" id="sexy-bookmark-pro-authenticate" action="" method="post">
                            <div class="padding">
                                <div>
                                    <strong><?php _e('Status','shrsb')?></strong>
                                    <div style="padding: 2px;">
                                      <div style="float: left; margin-right: 5px; padding-top: 1px;">
                                        <img id="auth-status-img" alt = "" src=<?php $status = $apikey?"pass.png":"transparent.gif"; echo $shrsb_plugopts['shrbase']."/media/images/".$status?>
                                                                    style="width: 12px; height: 12px;">
                                      </div>
                                      <span id="auth-status-text"><?php $status = $apikey?_e('Authenticated','shrsb'):"";?></span>
                                    </div>
                                </div>
                                <br>
                                <div style="position:relative;width:80%;">
                                    <label for="apikey"><?php _e('Enter the API key that you registered for your application.', 'shrsb'); ?></label><br />
                                    <input type ="text" id="apikey" name="apikey" value ="<?php $status = $apikey ? $apikey : ''; echo $status;?>"/>
                                </div>
                             </div>
                            <div class="shrsbsubmit"><input type="button" onclick ="submitHandler()" value="<?php _e('Authenticate', 'shrsb'); ?>" /></div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        
    
    

    <div id="shrsb-col-right">
        <div class="box-right">
            <div class="box-right-head">
                <h3><?php _e('Why Register ?', 'shrsb'); ?></h3>
            </div>
            <div class="box-right-body">
                <div class="padding">
                    <ul class="infolinks">
                        <li>Analytics to increase website traffic</li>
                        <li>Advance UI features</li>
                        <li>It's fast, secure, & free to signup!</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box-right">
            <div class="box-right-head">
                <h3 class="fugue f-info-frame"><?php _e('Helpful Plugin Links', 'shrsb'); ?></h3>
            </div>
            <div class="box-right-body">
                <div class="padding">
                    <ul class="infolinks">
                        <li><a href="http://sexybookmarks.shareaholic.com/documentation/usage-installation" target="_blank"><?php _e('Installation &amp; Usage Guide', 'shrsb'); ?></a></li>
                        <li><a href="http://sexybookmarks.shareaholic.com/documentation/faq" target="_blank"><?php _e('Frequently Asked Questions', 'shrsb'); ?></a></li>
                        <li><a href="http://sexybookmarks.shareaholic.com/contact-forms/bug-form" target="_blank"><?php _e('Bug Submission Form', 'shrsb'); ?></a></li>
                        <li><a href="http://sexybookmarks.shareaholic.com/contact-forms/feature-request" target="_blank"><?php _e('Feature Request Form', 'shrsb'); ?></a></li>
                        <li><a href="http://sexybookmarks.shareaholic.com/contact-forms/translation-submission-form" target="_blank"><?php _e('Submit a Translation', 'shrsb'); ?></a></li>
                        <li><a href="http://www.shareaholic.com/tools/browser/" target="_blank"><?php _e('Shareaholic Browsers Add-ons', 'shrsb'); ?></a></li>
                        <li><a href="http://www.shareaholic.com/tools/wordpress/credits" target="_blank"><?php _e('Thanks &amp; Credits', 'shrsb'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div style="padding:15px;"><iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FShareaholic&amp;layout=standard&amp;show_faces=true&amp;width=240&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:80px;" allowTransparency="true"></iframe>
        </div>

    </div>
	<?php
}

?>
