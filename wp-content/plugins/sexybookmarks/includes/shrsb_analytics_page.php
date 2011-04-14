<?php
// UI and stuff o the analytics page


function shrsb_analytics_page() {
?>

    <h2 class="shrsblogo"><span class="sh-logo"></span></h2>

    <div id="shrsb-col-left" style="width:100%;">

        <ul id="shrsb-sortables">
            <li>
                <div class="box-mid-head">
                    <h2 class="fugue f-status"><?php _e('Shareaholic Analtyics', 'shrsb'); ?></h2>
                </div>
                <div class="box-mid-body">
                      <div class="padding">
                        <div style="position:relative;width:80%;">
                            <p><strong>
                                <?php _e('Shareaholic Analtyics is coming!!!!', 'shrsb'); ?>
                                </strong>
                                <br><br>
                                <?php _e('Register your account today to recieve update info via email.', 'shrsb'); ?>
                                <div class="shrsbsubmit">
                                    <input type="button" onclick ="window.open('http://www.shareaholic.com/publishers_apps/new_publishers_app')" value="<?php _e('Get Share Pro', 'shrsb'); ?>" />
                                </div>
                            </p>
                        </div>
                      </div>

                    

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
