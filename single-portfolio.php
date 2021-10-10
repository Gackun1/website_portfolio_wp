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

<?php 
$img_main = get_field('main');
$img_pc = get_field('pc'); 
$img_sp = get_field('sp'); 
?>

<div class="edit-area">
  <?php if(!empty($img_main)) : ?>
  <div class="js-image-popup">
    <img src="<?= $img_main ?>" alt="" class="portfolio-mainimg js-image-popup__button">
    <div class="js-image-popup__zoom-button"></div>
    <div class="js-image-popup__bg">
      <div class="js-image-popup__window">
        <div class="js-image-popup__close-button"></div>
        <div class="js-image-popup__image"><img src="<?= $img_pc ?>" alt=""></div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  
  <?php the_content(); ?>
</div>
<?php endwhile; ?>



<?php get_footer(); ?>