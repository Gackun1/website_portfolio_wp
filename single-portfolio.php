<?php get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>
<?php $terms = get_the_terms($post->ID, 'portfolio_cat'); ?>


<!-- 記事のタイトル -->
<h1 class="ttl"><?php the_title(); ?></h1>
<!-- 記事の公開日 -->
<time datetime="the_time( 'Y-m-d' )"><?php the_time( 'Y.m.d' ); ?></time>
<!-- 記事のカテゴリー -->
<ul class="category-list mb-10">
  <?php if (!empty($terms)) : ?>
  <?php foreach ( $terms as $term ) : ?>
  <li class="category-list__item"><a href="<?= esc_url(get_term_link($term)); ?>"><?= $term->name; ?></a></li>
  <?php endforeach; ?>
  <?php endif; ?>
</ul>


<div class="edit-area">
  <?php the_content(); ?>
</div>
<?php endwhile; ?>



<?php get_footer(); ?>