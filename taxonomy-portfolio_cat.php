<?php get_header(); ?>

<h1 class="ttl-01">Portfolio</h1>

<section class="section">
  <div class="archive-portfolio">

    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

    <?php
      $title = $post->post_title;
      $date = get_the_date('Y/m/d');
      $post_link = get_permalink($post->ID);
      $img_link = get_the_post_thumbnail_url($post->ID, 'thumb');
      $terms = get_the_terms($post->ID, 'portfolio_cat');
      $post_type_link = esc_url(get_post_type_archive_link('portfolio'));
    ?>

    <!-- post item -->
    <article class="archive-portfolio__item">
      <a class="archive-portfolio__link" href="<?= $post_link; ?>">
        <div class="archive-portfolio__imgbox">
          <img src="<?= $img_link; ?>" alt="" class="archive-portfolio__img">
          <div class="archive-portfolio__hov">
            <p class="archive-portfolio__ttlhov"><?= $title; ?></p>
          </div>
        </div>
        <h3 class="archive-portfolio__ttl"><?= $title; ?></h3>
        <time class="archive-portfolio__date"><?= $date ?></time>
      </a>

      <ul class="category-list">
        <?php if (!empty($terms)) : ?>
        <?php foreach ($terms as $term) : ?>
        <li class="category-list__item"><a href="<?= esc_url(get_term_link($term)); ?>"><?= $term->name; ?></a></li>
        <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </article>
    <!-- end of post item -->

    <?php endwhile; ?>

    <?php else : ?>
    何も投稿がありません。
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>