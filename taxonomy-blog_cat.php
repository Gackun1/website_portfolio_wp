<?php

get_header(); ?>

<div class="post-list">

  <?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>

  <?php $terms = get_the_terms($post->ID, 'blog_cat'); ?>


  <div class="post-list__item">
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

    <div class="post-list__ttl">
      <?php the_title(); ?>
      <?php the_content(); ?>
    </div>

  </div>

  <?php endwhile; ?>

  <?php else : ?>
  何も投稿がありません。
  <?php endif; ?>


</div>


<?php get_footer(); ?>