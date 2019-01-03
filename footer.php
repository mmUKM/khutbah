<?php
/**
 * @package Khutbah_JAIS
 */
?>
<div class="push"></div>
</div><!--wrapper-->
    <footer class="uk-padding">

    <div class="wrap section group">
        <div class="col span_4_of_12">
            <?php if (dynamic_sidebar( 'sidebar_3' )) :
            else: { ?>
                <nav>
                    <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'secondary',
                        'menu'              => 'Secondary Navigation',
                        'menu_class'        => 'footer-nav',
                    ));
                    ?>
                </nav>
            <?php
            } endif; ?>
        </div>
        <div class="col span_4_of_12">&nbsp;</div>
        <div class="col span_4_of_12">
            <h3 class="uk-h3" style="color:#fff;">Sertai Kami</h3>
            <a href="<?php echo get_option('jrwtdw_twitter'); ?>" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
            <a href="<?php echo get_option('jrwtdw_facebook'); ?>" class="uk-icon-button uk-margin-small-right" uk-icon="facebook"></a>
            <a href="<?php echo get_option('jrwtdw_soundcloud'); ?>" class="uk-icon-button uk-margin-small-right" uk-icon="soundcloud"></a>
            <a href="<?php echo get_option('jrwtdw_youtube'); ?>" class="uk-icon-button uk-margin-small-right" uk-icon="youtube"></a>
            <a href="<?php echo get_option('jrwtdw_instagram'); ?>" class="uk-icon-button" uk-icon="instagram"></a>

            <h3 class="uk-h3" style="color:#fff;">dengan Kerjasama</h3>
            <a href="">
                <img src="<?php echo get_option('jrwtdw_footer_logo_right'); ?>" alt="">
            </a>
        </div>
    </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>