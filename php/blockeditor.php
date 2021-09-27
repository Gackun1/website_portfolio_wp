<?php
function mytheme_setup_theme_supported_features() {

  //幅広・全幅画像のサポート
  add_theme_support( 'align-wide' );
  
  //埋め込みコンテンツのレスポンシブ対応
  add_theme_support( 'responsive-embeds' );
  
  //ブロックのフォントサイズ
  add_theme_support( 'editor-font-sizes', [
      [ 'name' => __( 'XS', 'themeLangDomain' ), 'size' => 10, 'slug' => 'xs' ],
      [ 'name' => __( 'S', 'themeLangDomain' ), 'size' => 12, 'slug' => 's' ],
      [ 'name' => __( 'M', 'themeLangDomain' ), 'size' => 16, 'slug' => 'm' ],
      [ 'name' => __( 'L', 'themeLangDomain' ), 'size' => 20, 'slug' => 'l' ],
      [ 'name' => __( 'XL', 'themeLangDomain' ), 'size' => 24, 'slug' => 'xl' ],
      [ 'name' => __( 'XXL', 'themeLangDomain' ), 'size' => 28, 'slug' => 'xxl' ],
      [ 'name' => __( 'XXXL', 'themeLangDomain' ), 'size' => 32, 'slug' => 'xxxl' ],
    ]
  );
}
  
//デフォルトのブロックパターンを削除
// remove_theme_support( 'core-block-patterns' );

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );
add_editor_style( get_template_directory_uri() . '/editor/editor-style.css' );
add_theme_support( 'editor-styles' );
add_theme_support( 'wp-block-styles' );
add_action( 'enqueue_block_editor_assets', function() {
  wp_enqueue_script( 'my-style-selector', get_template_directory_uri() . '/editor/editor-helper.js', [ 'wp-blocks' ] );
});

?>