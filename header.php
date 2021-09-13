<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package WordPress
 * @subpackage gackun_portfolio
 */
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>gackun site</title>
  <link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri();?>/images/favicon-48x48.ico"
    sizes="48x48">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">

    <header class="header mb-30">
      <div class="inner">
        <a href="<?= home_url();?>/" class="header__logo">
          <img src="<?= get_template_directory_uri();?>/images/logo.png" alt="YoshikawaGakuのロゴ"
            class="header__logo--img">
          <h1 class="header__logo--ttl">YoshikawaGaku</h1>
        </a>
        <nav>
          <ul class="header__nav">
            <li class="header__nav--item"><a href="<?= home_url();?>/">ホーム</a></li>
            <li class="header__nav--item"><a href="<?= home_url();?>/portfolio">ポートフォリオ</a></li>
            <li class="header__nav--item"><a href="<?= home_url();?>/blog">ブログ</a></li>
            <li class="header__nav--item"><a href="<?= home_url();?>/button">ボタンデザイン</a></li>
          </ul>
        </nav>
      </div>
    </header><!-- #masthead -->

    <main id="content" class="site-content">
      <div class="inner">
        <?php custom_breadcrumb(); ?>