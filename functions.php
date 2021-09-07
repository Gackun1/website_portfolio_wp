<?php

function add_files() {
	// サイト共通のCSSの読み込み
	wp_enqueue_style( 'main', get_stylesheet_uri() );
  wp_enqueue_style( 'prism-css', get_template_directory_uri() . '/css/prism.css', "", '' );
  wp_enqueue_script( 'prism-js', get_template_directory_uri() . '/js/prism.js', "", '' );
  wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/script.js', "", '' );
}
add_action('wp_enqueue_scripts', 'add_files');

// rel="prev"とrel=“next"表示の削除
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

// WordPressバージョン表示の削除
remove_action('wp_head', 'wp_generator');

// 絵文字表示のための記述削除（絵文字を使用しないとき）
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// アイキャッチ画像の有効化
add_theme_support('post-thumbnails');

// メインクエリのカスタマイズ
//トップページの記事一覧の表示件数を5件に
function custom_main_query($query){
    if(is_admin() || ! $query->is_main_query()):
        return;
    endif;
    if($query->is_home()):
        $query->set('posts_per_page',5);
    endif;
}
add_action('pre_get_posts','custom_main_query');

// ウィジェットの機能を追加
add_theme_support('widgets');

//カスタム投稿タイプ
add_action('init', 'create_post_type_by_button');
function create_post_type_by_button() {
  $args = array(
    'label' => 'ボタン',
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'has_archive' => true,
    'capability_type' => 'post',
    // 'hierarchical' => true, 階層構造を有効にする（固定ページのようにする）
    'menu_position' => 5,
    'supports' => ['title','editor','thumbnail','revisions'],
    'rewrite' => ['slug' => 'button', 'with_front' => false],
    'menu_icon' => 'dashicons-format-aside',
  );
  register_post_type('button',$args);
  //分類を追加
  $tax_args = [
    'label' => 'カテゴリー',
    'public' => true,
    'show_ui' => true,
    // 'hierarchical' => true,
    'query_var'=> true,
    'rewrite' => ['slug' => 'button_cat', 'with_front' => false]
  ];
  register_taxonomy('button_cat','button',$tax_args);
}

add_action('init', 'create_post_type_by_blog');
function create_post_type_by_blog() {
  $args = array(
    'label' => 'ブログ',
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'has_archive' => true,
    'capability_type' => 'post',
    'menu_position' => 5,
    'supports' => ['title','editor','thumbnail','revisions'],
    'rewrite' => ['slug' => 'blog', 'with_front' => false],
    'menu_icon' => 'dashicons-format-aside',
    'show_in_rest' => true,
  );
  register_post_type('blog',$args);
  //分類を追加
  $tax_args = [
    'label' => 'カテゴリー',
    'public' => true,
    'show_ui' => true,
    'query_var'=> true,
    'rewrite' => ['slug' => 'blog_cat', 'with_front' => false]
  ];
  register_taxonomy('blog_cat','blog',$tax_args);
}

//カスタム投稿 一覧ページの表示数
function change_posts_per_page($query) {
  if ( is_admin() || ! $query->is_main_query() )
      return;
  if ( $query->is_archive('button') ) { //カスタム投稿タイプを指定
      $query->set( 'posts_per_page', '20' ); //表示件数を指定
  }
  if ( $query->is_archive('blog') ) { //カスタム投稿タイプを指定
    $query->set( 'posts_per_page', '20' ); //表示件数を指定
}
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

//ぱんくずリスト
include( get_template_directory().'/php/breadcrumb.php' );

//ブロックエディタ
include( get_template_directory().'/php/blockeditor.php' );
?>