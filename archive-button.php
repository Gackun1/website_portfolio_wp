<?php

get_header(); ?>


<h2 class="ttl-02">共通のCSS</h2>
<div class="codebox codebox-main">
  <div class="codebox__item">
    <div class="codebox__head">
      <h3 class="codebox__ttl">CSS</h3>
      <div class="codebox__copy"></div>
    </div>
    <pre class="line-numbers"><code class="language-css">html {
  box-sizing: border-box;
  font-size: 62.5%;
}
.pure-btn {
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  position: relative;
  padding: 1rem 5rem;
  text-decoration: none;
  letter-spacing: 0.1rem;
  font-size: 1.6rem;
  color: #333;
  background: #fff;
  border: 2px solid #333;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}</code></pure>
    </div>
  </div>

  <div class="btn-list">

  <?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
  
  <?php 
    $html_field = get_field('html'); 
    $html_escape = $html_field ? htmlentities($html_field, ENT_QUOTES, 'UTF-8') : "";
    
    $css_field = get_field('css');
    $css_escape = $css_field ? htmlentities($css_field, ENT_QUOTES, 'UTF-8') : "";

    $terms = get_the_terms($post->ID, 'button_cat'); 
   ?>

  <div class="btn-list__item">
    <a href="<?php the_permalink(); ?>" class="link">
      <h2 class="ttl-03 mb-10"><?php the_title(); ?></h2>
      <time datetime="the_time( 'Y-m-d' )"><?php the_time( 'Y.m.d' ); ?></time>
    </a>

    <ul class="category-list mb-30">
      <?php if (!empty($terms)) : ?>
      <?php foreach ( $terms as $term ) : ?>
      <li class="category-list__item"><a href="<?= esc_url(get_term_link($term)); ?>"><?= $term->name; ?></a></li>
      <?php endforeach; ?>
      <?php endif; ?>
    </ul>

    <div class="btn-box">
      <?= $html_field ?>
    </div>
    <button class="btn-more-code pure-btn mt-40">
      <span class="btn-more-code__icon">
        <span class="btn-more-code__icon--line"></span>
        <span class="btn-more-code__icon--line"></span>
      </span>コードを見る</button>
    <div class="codebox-wrap">
      <div class="codebox">
        <div class="codebox__item">
          <div class="codebox__head">
            <h3 class="codebox__ttl">HTML</h3>
            <div class="codebox__copy"></div>
          </div>
          <pre class="line-numbers"><code class="language-html"><?= $html_escape ?></code></pure>
        </div>
        <div class="codebox__item">
          <div class="codebox__head">
            <h3 class="codebox__ttl">CSS</h3>
            <div class="codebox__copy"></div>
          </div>
          <pre class="line-numbers language-css"><code class="language-css"><?= $css_escape ?></code></pure>
        </div>
      </div>
    </div>
  </div>

  <?php endwhile; ?>

  <?php else : ?>
  何も投稿がありません。
  <?php endif; ?>


</div>


<?php get_footer(); ?>