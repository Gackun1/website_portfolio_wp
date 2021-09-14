<?php get_header(); ?>

<h1 class="ttl-01">Blog</h1>

<div class="post-list">

  <?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>

  <?php
    $title;
      if (mb_substr($post->post_title, 'UTF-8') > 50) {
      $title = mb_substr($post->post_title, 0, 50, 'UTF-8') . '...';
      } else {
      $title = $post->post_title;
      }
    $content;
    if (mb_strlen($post->post_content, 'UTF-8') > 150) {
      $content = str_replace('\n', '', mb_substr(strip_tags($post-> post_content), 0, 150,'UTF-8')) . '...';
    } else {
      $content = str_replace('\n', '', strip_tags($post->post_content));
    }
    $post_link = get_permalink($post->ID);
    $img_link = get_the_post_thumbnail_url($post->ID, 'medium');
    $terms = get_the_terms($post->ID, 'blog_cat');
    $post_type_link = esc_url(get_post_type_archive_link('blog'));
  ?>

  <!-- post item -->
  <article class="blog-entries__item">
    <a href="<?= $post_link; ?>"><img src="<?= $img_link; ?>" alt="" class="blog-entries__img"></a>
    <div class="blog-entries__txtbox">
      <a href="<?= $post_link; ?>">
        <h2 class="blog-entries__ttl"><?= $title; ?></h2>
      </a>

      <ul class="category-list mb-10">
        <?php if (!empty($terms)) : ?>
        <?php foreach ($terms as $term) : ?>
        <li class="category-list__item"><a href="<?= esc_url(get_term_link($term)); ?>"><?= $term->name; ?></a>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>
      </ul>

      <p class="blog-entries__txt"><?= $content; ?></p>
    </div>
  </article>
  <!-- end of post item -->

  <?php endwhile; ?>

  <?php else : ?>
  何も投稿がありません。
  <?php endif; ?>

</div>

<?php get_footer(); ?>