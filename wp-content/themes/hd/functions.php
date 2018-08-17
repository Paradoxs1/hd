<?php

add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter('ot_show_pages', '__return_true' );

function theme_options_parent($parent){
	$parent = '';
	return $parent;
}
add_filter('ot_theme_options_parent_slug', 'theme_options_parent', 20);

require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
require( trailingslashit( get_template_directory() ) . 'functions/theme-options.php' );
require( trailingslashit( get_template_directory() ) . 'functions/meta-boxes.php' );

	function hd_setup() {
		
		load_theme_textdomain( 'hd', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		
		register_nav_menus( array(
			'menu' => 'Меню',
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'hd_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

	}
add_action( 'after_setup_theme', 'hd_setup' );

function hd_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hd_content_width', 640 );
}
add_action( 'after_setup_theme', 'hd_content_width', 0 );

function hd_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hd' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hd' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hd_widgets_init' );

function comicpress_copyright() {
    global $wpdb;
    $copyright_dates = $wpdb->get_results("
        SELECT
        YEAR(min(post_date_gmt)) AS firstdate,
        YEAR(max(post_date_gmt)) AS lastdate
        FROM
        $wpdb->posts
        WHERE
        post_status = 'publish'
    ");
    $output = '';
    if($copyright_dates) {
        $copyright = "&copy; " . $copyright_dates[0]->firstdate;
        if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
            $copyright .= '-' . $copyright_dates[0]->lastdate;
        }
        $output = $copyright;
    }
    return $output;
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Просмотры');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
        if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}


function wp_corenavi() {
  global $wp_query;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<div class="navigation">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}


function hd_style() {
  wp_enqueue_style( 'awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
  wp_enqueue_style( 'hd-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'hd_style' );

function hd_scripts() {
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js',  array ('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'hd_scripts' );

//require get_template_directory() . '/inc/custom-header.php';
//require get_template_directory() . '/inc/template-tags.php';
//require get_template_directory() . '/inc/template-functions.php';
//require get_template_directory() . '/inc/customizer.php';
//
//if ( defined( 'JETPACK__VERSION' ) ) {
//	require get_template_directory() . '/inc/jetpack.php';
//}

