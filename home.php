<?php  get_header();?>


<section class="section home-top">
  <div class="home-top__inner">
    <h1 class="home-top__ttl">
      <span class="home-top__subttl">WEB DESIGNER / DEVELOPER</span>
      <span class="home-top__mainttl">YOSHIKAWA GAKU</span>
    </h1>
  </div>
</section>


<!-- portfolio -->
<section class="section home-portfolio">
  <h2 class="section__ttl">PORTFOLIO</h2>
  <?php
    $post;
    $args = ['posts_per_page' => 6, 'post_type' => 'portfolio', 'orderby' => 'date', 'order' => 'DESC'];
    $myposts = get_posts($args);
  ?>

  <!-- post entries -->
  <div class="portfolio-entries">

    <?php if ($myposts) : ?>
    <?php foreach($myposts  as $post) : setup_postdata($post); ?>

    <?php
      $title = $post->post_title;
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
        <h3 class="portfolio-entries__ttl"><?= $title; ?></h3>
      </a>
    </article>
    <!-- end of post item -->

    <?php endforeach; ?>
    <?php wp_reset_postdata(); endif; ?>
  </div>
  <!-- end of post entries -->

  <a href="<?= $post_type_link; ?>" class="pure-btn btn-05-rounded center-btn">SEE MORE</a>
</section>
<!-- end of portfolio -->


<!-- tecblog -->
<section class="section home-blog">
  <h2 class="section__ttl">BLOG</h2>

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

    <?php endforeach; ?>
    <?php wp_reset_postdata(); endif; ?>
  </div>
  <!-- end of post entries -->

  <a href="<?= $post_type_link; ?>" class="pure-btn btn-05-rounded center-btn">SEE MORE</a>
</section>
<!-- end of tecblog -->


<!-- button -->
<section class="section home-button">
  <h2 class="section__ttl">BUTTON DESIGN</h2>
  <?php
    $post;
    $args = ['posts_per_page' => 6, 'post_type' => 'button', 'orderby' => 'date', 'order' => 'DESC'];
    $myposts = get_posts($args);
  ?>

  <!-- post entries -->
  <div class="button-entries">
    <div class="btn-list">
      <?php if ($myposts) : ?>
      <?php foreach($myposts  as $post) : setup_postdata($post); ?>

      <?php
        $title;
        if (mb_substr($post->post_title, 'UTF-8') > 50) {
          $title = mb_substr($post->post_title, 0, 50, 'UTF-8') . '...';
        } else {
          $title = $post->post_title;
        }
        $post_link = get_permalink($post->ID);
        $terms = get_the_terms($post->ID, 'button_cat');
        $post_type_link = esc_url(get_post_type_archive_link('button'));
        $html_field = get_field('html'); 
        $html_escape = $html_field ? htmlentities($html_field, ENT_QUOTES, 'UTF-8') : "";
        $css_field = get_field('css');
        $css_escape = $css_field ? htmlentities($css_field, ENT_QUOTES, 'UTF-8') : "";
      ?>

      <!-- post item -->
      <div class="btn-list__item">
        <a href="<?= $post_link; ?>" class="link">
          <h3 class="ttl-03 mb-10"><?= $title; ?></h3>
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
          </span>コードを見る
        </button>
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
      <!-- end of post item -->

      <?php endforeach; ?>
      <?php wp_reset_postdata(); endif; ?>
    </div>
  </div>
  <!-- end of post entries -->

  <a href="<?= $post_type_link; ?>" class="pure-btn btn-05-rounded center-btn">SEE MORE</a>
</section>
<!-- end of button -->

<?php if( is_home() ) : ?>
  <style>
    #canvas canvas {
      object-fit: cover;
      z-index: -1;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
    }
  </style>
  <div id="canvas"></div>
  <script src="<?= get_template_directory_uri() ?>/js/matter.js"></script>
  <script src="<?= get_template_directory_uri() ?>/js/index-anime.js"></script>
<?php endif;?>

<?php get_footer(); ?>