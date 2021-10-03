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
  <title>YoshikawaGaku portfolio site</title>
  <link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri();?>/images/favicon-48x48.ico"
    sizes="48x48">
  <?php echo is_user_logged_in() ? '<style type="text/css">.header{margin-top: 32px;}</style>' : '' ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">

    <header class="header">
      <div class="inner">
        <a href="<?= home_url();?>/" class="header__logo">
          <img src="<?= get_template_directory_uri();?>/images/logo.png" alt="YoshikawaGakuのロゴ"
            class="header__logo-img">
        </a>
        <nav>
          <ul class="header__nav">
            <li class="header__nav-item"><a href="<?= home_url();?>/" class="js-text-hover-rotate">Home</a></li>
            <li class="header__nav-item"><a href="<?= home_url();?>/portfolio" class="js-text-hover-rotate">Portfolio</a></li>
            <li class="header__nav-item"><a href="<?= home_url();?>/blog" class="js-text-hover-rotate">Blog</a></li>
            <li class="header__nav-item"><a href="<?= home_url();?>/button" class="js-text-hover-rotate">ButtonDesign</a></li>
          </ul>
        </nav>
        <nav id="hamburger_nav">
          <ul>
            <li><a href="<?= home_url();?>/" class="js-text-hover-rotate">Home</a></li>
            <li><a href="<?= home_url();?>/portfolio" class="js-text-hover-rotate">Portfolio</a></li>
            <li><a href="<?= home_url();?>/blog" class="js-text-hover-rotate">Blog</a></li>
            <li><a href="<?= home_url();?>/button" class="js-text-hover-rotate">ButtonDesign</a></li>
          </ul>
        </nav>
        <div id="hamburger_button">
          <span class="hamburger_line" id="line1"></span>
          <span class="hamburger_line" id="line2"></span>
          <span class="hamburger_line" id="line3"></span>
        </div>
      </div>
    </header>

    <div class="page-wrapper">

      <?php get_sidebar(); ?>

      <main id="content" class="site-content">
        <div class="inner">
          <?php custom_breadcrumb(); ?>