<?php if( !is_home() || !is_front_page() ) : ?>

<aside id="sidebar" class="sidebar">
  <div class="sidebar__search">
    <p class="sidebar__ttl">キーワードで探す</p>
    <?php get_search_form(); ?>
  </div>
  <div class="sidebar__blog">
    <p class="sidebar__ttl">ブログのカテゴリ一覧</p>
    <ul class="sidebar__list">
      <?php $terms = get_terms("blog_cat"); ?>
      <?php foreach ( $terms as $term ) : ?>
      <li class="sidebar__list-item">
        <a href="<?= get_term_link($term); ?>" class="sidebar__link">
          <?= esc_html($term->name); ?>
          <span class="sidebar__count"><?= $term->count; ?></span>
        </a>
      </li>
      <?php endforeach;  ?>
    </ul>
  </div>
  <div class="sidebar__portfolio">
    <p class="sidebar__ttl">ポートフォリオのカテゴリ一覧</p>
    <ul class="sidebar__list">
      <?php $terms = get_terms("portfolio_cat"); ?>
      <?php foreach ( $terms as $term ) : ?>
      <li class="sidebar__list-item">
        <a href="<?= get_term_link($term); ?>" class="sidebar__link">
          <?= esc_html($term->name); ?>
          <span class="sidebar__count"><?= $term->count; ?></span>
        </a>
      </li>
      <?php endforeach;  ?>
    </ul>
  </div>
</aside>

<?php endif; ?>