<?php get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>
<?php $terms = get_the_terms($post->ID, 'button_cat'); ?>


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

<?php $html_field = get_field('html');  ?>
<?php if ($html_field) : ?>
<?php $html_escape = htmlentities($html_field, ENT_QUOTES, 'UTF-8'); ?>
<?php endif; ?>

<?php $css_field = get_field('css');  ?>
<?php if ($css_field) : ?>
<?php $css_escape = htmlentities($css_field, ENT_QUOTES, 'UTF-8'); ?>
<?php endif; ?>

<div class="btn-area">
  <div class="btn-box">
    <?= $html_field ?>
  </div>
  <div class="codebox-wrap">
    <div class="codebox">
      <div class="codebox__item">
        <div class="codebox__head">
          <h3 class="codebox__ttl">HTML</h3>
          <div class="codebox__copy"></div>
        </div>
        <pre class="line-numbers"><code class="language-html"><?= $html_escape; ?></code></pure>
      </div>
      <div class="codebox__item">
        <div class="codebox__head">
          <h3 class="codebox__ttl">CSS</h3>
          <div class="codebox__copy"></div>
        </div>
        <pre class="line-numbers language-css"><code class="language-css"><?= $css_escape; ?></code> </pure>
      </div>
    </div>
  </div>
</div>


<div class="edit-area">
  <?php the_content(); ?>
</div>
<?php endwhile; ?>



<?php get_footer(); ?>