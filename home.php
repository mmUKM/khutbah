<?php
/**
 * @package Khutbah_JAIS
 */
get_header(); ?>

<?php get_template_part( 'content', 'slider' ); ?>

<div class="wrap front-content">
    <?php if (dynamic_sidebar( 'sidebar_1' )) : else : endif; ?>
</div>

<?php get_footer(); ?>