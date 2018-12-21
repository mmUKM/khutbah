<?php
/**
 * @package Khutbah_JAIS
 */

/**
 * Theme Update Checker
 * @link http://w-shadow.com/blog/2011/06/02/automatic-updates-for-commercial-themes/
 */

require get_template_directory() . '/lib/theme-updates/theme-update-checker.php';
  new ThemeUpdateChecker(
    'khutbah-master',
    'https://raw.githubusercontent.com/mmUKM/khutbah/master/package.json'
  );

/**
 * Admin Favicon
 * Login Favicon
 */
function jrwtdw_add_favicon() {
  $favicon_url = get_template_directory_uri() . '/favicon.ico';
  echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

add_action( 'login_head', 'jrwtdw_add_favicon' );
add_action( 'admin_head', 'jrwtdw_add_favicon' );

/**
 * Theme Features & Support
 * @link http://generatewp.com/theme-support/
 */

if ( ! function_exists('jrwtdw_theme_features') ) {

  function jrwtdw_theme_features()  {

    add_theme_support( 'post-thumbnails', array( 'post', 'page', 'portfolio' ) );

    set_post_thumbnail_size( 200, 200, true );

    add_theme_support( 'custom-header', array(
      'default-image' => get_template_directory_uri() . '/img/logo-main.png',
      'width'         => 960,
      'height'        => 100,
    ));

    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    register_nav_menus( array(
      'primary'   => __( 'Primary Navigation', 'jrwtdw' ),
      'secondary' => __( 'Secondary Navigation', 'jrwtdw' ),
    ));

  }

  add_action( 'after_setup_theme', 'jrwtdw_theme_features' );

}

if ( ! function_exists('jrwtdw_theme_require') ) {

  function jrwtdw_theme_require()  {

    require_once  get_template_directory() . '/inc/theme-navmenu.php';
    require_once  get_template_directory() . '/inc/theme-post-type.php';
    require_once  get_template_directory() . '/inc/theme-options.php';

  }

  add_action( 'after_setup_theme', 'jrwtdw_theme_require' );

}

/**
 * Show admin bar
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/show_admin_bar
 */

function jrwtdw_admin_bar() {
  return false;
}
add_filter( 'show_admin_bar' , 'jrwtdw_admin_bar');



if ( ! function_exists( 'jrwtdw_theme_sidebar' ) ) {

  function jrwtdw_theme_sidebar() {

    register_sidebar( array(
      'id'            => 'sidebar_1',
      'name'          => __( 'Frontpage: One Column', 'jrwtdw' ),
      'description'   => __( 'Full width widget', 'jrwtdw' ),
      'before_title'  => '<h2>',
      'after_title'   => '</h2>',
      'before_widget' => '<div class="section group"><div class="col span_12_of_12 frontpage-widget">',
      'after_widget'  => '</div></div>',
    ));

    register_sidebar( array(
      'id'            => 'sidebar_2',
      'name'          => __( 'Page Sidebar', 'jrwtdw' ),
      'description'   => __( 'Page Sidebar', 'jrwtdw' ),
      'before_title'  => '<h2>',
      'after_title'   => '</h2>',
      'before_widget' => '<div class="page-sidebar">',
      'after_widget'  => '</div>',
    ));

    register_sidebar( array(
      'id'            => 'sidebar_3',
      'name'          => __( 'Footer: Left', 'jrwtdw' ),
      'description'   => __( 'Footer content', 'jrwtdw' ),
      'before_title'  => '<h2 class="hide">',
      'after_title'   => '</h2>',
      'before_widget' => '<div class="left-footer">',
      'after_widget'  => '</div>',
    ));
  }

  add_action( 'widgets_init', 'jrwtdw_theme_sidebar' );

}


function jrwtdw_wp_admin_scripts() {

  wp_enqueue_style( 'admin', get_template_directory_uri() . '/css/admin.min.css', false, '1.0' );

}

add_action( 'admin_enqueue_scripts', 'jrwtdw_wp_admin_scripts' );

if ( ! function_exists( 'jrwtdw_theme_scripts' ) ) {

  function jrwtdw_theme_scripts() {

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '2.3.1', false );
    wp_enqueue_script( 'uikit', get_template_directory_uri() . '/lib/uikit/js/uikit.min.js', array(), '1.0', true );
    wp_enqueue_script( 'uikit-icon', get_template_directory_uri() . '/lib/uikit/js/uikit-icons.min.js', array(), '1.0', true );
    wp_enqueue_script( 'uikit-slider', get_template_directory_uri() . '/lib/uikit/js/components/slider.min.js', array(), '1.0', true );
    wp_enqueue_script( 'uikit-slideshow', get_template_directory_uri() . '/lib/uikit/js/components/slideshow.min.js', array(), '1.0', true );
    wp_enqueue_script( 'theme', get_template_directory_uri() . '/js/scripts.js', array(), '1.0', true );

    wp_enqueue_style( 'fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,300,600,400', false, '1.0' );
    wp_enqueue_style( 'uikit', get_template_directory_uri() . '/lib/uikit/css/uikit.min.css', false, '1.0' );
    
    wp_enqueue_style( 'theme', get_stylesheet_uri(), false, '1.0' );

  }

  add_action( 'wp_enqueue_scripts', 'jrwtdw_theme_scripts' );

}

/**
 * wp_title
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 */

function jrwtdw_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() )
    return $title;

  $title .= get_bloginfo( 'name', 'display' );

  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";

  if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
    $title = "$title $sep " . sprintf( __( 'Page %s', 'jrwtdw' ), max( $paged, $page ) );

  return $title;
}
add_filter( 'wp_title', 'jrwtdw_wp_title', 10, 2 );

/**
 * Login Page
 * @link http://codex.wordpress.org/Customizing_the_Login_Form
 */

function jrwtdw_login_logo() { ?>
<style type="text/css">
    body.login div#login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri();
        ?>/img/logo-admin.png);
        -webkit-background-size: 320px;
        background-size: 320px;
        background-position: center top;
        background-repeat: no-repeat;
        color: #999;
        height: 80px;
        font-size: 20px;
        font-weight: 400;
        line-height: 1.3em;
        margin: 0 auto 0;
        padding: 0;
        text-decoration: none;
        width: 320px;
        text-indent: -9999px;
        outline: 0;
        overflow: hidden;
        display: block;
    }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'jrwtdw_login_logo' );

function jrwtdw_login_logo_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'jrwtdw_login_logo_url' );

function jrwtdw_login_logo_url_title() {
  return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'jrwtdw_login_logo_url_title' );

/**
 * Search form
 */

function jrwtdw_search_form() {
  $form = '
  <form role="search" method="get" class="uk-form search-form" action="'. home_url( '/' ) .'">
  <label>
    <span class="screen-reader-text">'. _x( 'Search for:', 'label' ) .'</span>
    <input type="search" class="search-field" placeholder="'. esc_attr_x( 'Search …', 'placeholder' ) .'" value="'. get_search_query() .'" name="s" title="'. esc_attr_x( 'Search for:', 'label' ) .'" />
  </label>
  <button type="submit" class="uk-button search-submit" >'. esc_attr_x( 'Search', 'submit button' ) .'</button>
</form>';

return $form;

}

add_filter( 'get_search_form', 'jrwtdw_search_form' );

/**
 * Custom post type archive menus
 */
add_action('admin_head-nav-menus.php', 'wpclean_add_metabox_menu_posttype_archive');

function wpclean_add_metabox_menu_posttype_archive() {
add_meta_box('wpclean-metabox-nav-menu-posttype', 'Archives Links', 'wpclean_metabox_menu_posttype_archive', 'nav-menus', 'side', 'default');
}

function wpclean_metabox_menu_posttype_archive() {
$post_types = get_post_types(array('show_in_nav_menus' => true, 'has_archive' => true), 'object');

if ($post_types) :
  $items = array();
  $loop_index = 999999;

  foreach ($post_types as $post_type) {
      $item = new stdClass();
      $loop_index++;

      $item->object_id = $loop_index;
      $item->db_id = 0;
      $item->object = 'post_type_' . $post_type->query_var;
      $item->menu_item_parent = 0;
      $item->type = 'custom';
      $item->title = $post_type->labels->name;
      $item->url = get_post_type_archive_link($post_type->query_var);
      $item->target = '';
      $item->attr_title = '';
      $item->classes = array();
      $item->xfn = '';

      $items[] = $item;
  }

  $walker = new Walker_Nav_Menu_Checklist(array());

  echo '<div id="posttype-archive" class="posttypediv">';
  echo '<div id="tabs-panel-posttype-archive" class="tabs-panel tabs-panel-active">';
  echo '<ul id="posttype-archive-checklist" class="categorychecklist form-no-clear">';
  echo walk_nav_menu_tree(array_map('wp_setup_nav_menu_item', $items), 0, (object) array('walker' => $walker));
  echo '</ul>';
  echo '</div>';
  echo '</div>';

  echo '<p class="button-controls">';
  echo '<span class="add-to-menu">';
  echo '<input type="submit"' . disabled(1, 0) . ' class="button-secondary submit-add-to-menu right" value="' . __('Add to Menu', 'andromedamedia') . '" name="add-posttype-archive-menu-item" id="submit-posttype-archive" />';
  echo '<span class="spinner"></span>';
  echo '</span>';
  echo '</p>';

endif;
}


// portfolio gallery

function jrwtdw_portfolio_gallery( $file_list_meta_key, $img_size = 'medium' ) {

    // Get the list of files
    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

    echo '<div class="portfolio">';
    // Loop through them and output an image
    foreach ( (array) $files as $attachment_id => $attachment_url ) {
      echo '<a href="'. wp_get_attachment_url( $attachment_id ) .'">';
      echo wp_get_attachment_image( $attachment_id, $img_size );
      echo '</a>';
    }
    echo '</div>';
}

function ukmtheme_add_title_to_attachment( $markup, $id ){
  $att = get_post( $id );
  return str_replace( '<a ', '<a title="'.$att->post_title.'" ', $markup );
}
add_filter( 'wp_get_attachment_link', 'ukmtheme_add_title_to_attachment', 10, 5 );