<?php  get_header();?>


<section class="section home-top">
  <div class="home-top__inner">
    <h1 class="home-top__ttl">
      <span class="home-top__subttl">WEB DESIGNER / DEVELOPER</span>
      <span class="home-top__mainttl">YOSHIKAWA GAKU</span>
    </h1>
  </div>
</section>


<!-- tecblog -->
<section class="section home-blog">
  <h2 class="section__ttl">Blog</h2>

  <?php
    $post;
    $args = ['posts_per_page' => 5, 'post_type' => 'blog', 'orderby' => 'date', 'order' => 'DESC'];
    $myposts = get_posts($args);
  ?>

  <!-- post entries -->
  <div class="blog-entries">

    <?php if ($myposts) : ?>
    <?php foreach($myposts  as $post) : setup_postdata($post); ?>

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
    if (!$img_link) {
      $img_link = get_template_directory_uri().'/images/logo-a-500x342.png';
    }
    $terms = get_the_terms($post->ID, 'blog_cat');
    $post_type_link = esc_url(get_post_type_archive_link('blog'));
    ?>

    <!-- post item -->
    <article class="blog-entries__item">
      <a href="<?= $post_link; ?>"><img src="<?= $img_link; ?>" alt="" class="blog-entries__img"></a>
      <div class="blog-entries__txtbox">
        <a href="<?= $post_link; ?>">
          <h3 class="blog-entries__ttl"><?= $title; ?></h3>
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
        <a href="<?= $post_link; ?>">>続きを読む</a>
      </div>
    </article>
    <!-- end of post item -->

    <?php endforeach; ?>
    <?php wp_reset_postdata(); endif; ?>
  </div>
  <!-- end of post entries -->

  <a href="<?= $post_type_link; ?>" class="pure-btn btn-05-rounded center-btn">一覧を見る</a>
</section>
<!-- end of tecblog -->


<!-- portfolio -->
<section class="section home-portfolio">
  <h2 class="section__ttl">Portfolio</h2>
  <?php
      $post;
      $args = ['posts_per_page' => 5, 'post_type' => 'portfolio', 'orderby' => 'date', 'order' => 'DESC'];
      $myposts = get_posts($args);
     ?>

  <!-- post entries -->
  <div class="portfolio-entries">

    <?php if ($myposts) : ?>
    <?php foreach($myposts  as $post) : setup_postdata($post); ?>

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
        $img_link = get_the_post_thumbnail_url($post->ID, 'thumb');
        $terms = get_the_terms($post->ID, 'portfolio_cat');
        $post_type_link = esc_url(get_post_type_archive_link('portfolio'));
      ?>

    <!-- post item -->
    <article class="portfolio-entries__item" style="background-image:url(<?= $img_link; ?>)">
      <a href="<?= $post_link; ?>">
        <ul class="category-list mb-10">
          <?php if (!empty($terms)) : ?>
          <?php foreach ($terms as $term) : ?>
          <li class="category-list__item"><?= $term->name; ?></li>
          <?php endforeach; ?>
          <?php endif; ?>
        </ul>
        <h3 class="portfolio-entries__ttl--hover"><?= $title; ?></h3>
        <div class="portfolio-entries__txtbox">
          <p class="portfolio-entries__ttl"><?= $title; ?></p>
          <time class="portfolio-entries__date"><?= get_the_date('Y/m/d'); ?></time>
        </div>
      </a>
    </article>
    <!-- end of post item -->

    <?php endforeach; ?>
    <?php wp_reset_postdata(); endif; ?>
  </div>
  <!-- end of post entries -->

  <a href="<?= $post_type_link; ?>" class="pure-btn btn-05-rounded center-btn">一覧を見る</a>
</section>
<!-- end of portfolio -->

<?php get_footer(); ?>