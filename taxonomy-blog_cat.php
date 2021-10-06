<?php get_header(); ?>

<h1 class="ttl-01">Blog</h1>

<section class="section">
  <div class="blog-entries">

    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

    <?php
      $title = $post->post_title;
      $date = get_the_date('Y/m/d');
      $post_link = get_permalink($post->ID);
      $img_link = get_the_post_thumbnail_url($post->ID, 'medium');
      if (!$img_link) {
        $img_link = get_template_directory_uri().'/images/logo-a-500x342.png';
      }
      $terms = get_the_terms($post->ID, 'blog_cat');
      $post_type_link = esc_url(get_post_type_archive_link('blog'));
    ?>

    <!-- post item -->
    <article class="blog-entries__item">
      <a class="blog-entries__imgbox" href="<?= $post_link; ?>"><img src="<?= $img_link; ?>" alt="" class="blog-entries__img"></a>
      <div class="blog-entries__txtbox">
        <a class="blog-entries__ttlbox" href="<?= $post_link; ?>">
          <h3 class="blog-entries__ttl"><?= $title; ?></h3>
        </a>

        <time><?= $date ?></time>

        <ul class="category-list mb-10">
          <?php if (!empty($terms)) : ?>
          <?php foreach ($terms as $term) : ?>
          <li class="category-list__item"><a href="<?= esc_url(get_term_link($term)); ?>"><?= $term->name; ?></a></li>
          <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>
    </article>
    <!-- end of post item -->

    <?php endwhile; ?>

    <?php else : ?>
    何も投稿がありません。
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>