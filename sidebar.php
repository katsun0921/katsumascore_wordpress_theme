<?php

/**
 * The Sidebar containing the main widget areas.
 *
 * @package pro
 * @since pro 1.0
 */


function display_terms($post_tag = null, $parent_id = 0)
{
  if (empty($post_tag)) {
    return;
  }

  $terms = get_terms(array(
    'taxonomy' => $post_tag, // vodタクソノミー名
    'parent' => $parent_id,
    'hide_empty' => true
  ));

  if (empty($terms)) {
    return;
  }

  echo '<ul class="c-list__terms">';
  foreach ($terms as $term) {
    // Ensure $term is a WP_Term object
    if (!is_object($term)) {
      continue;
    }

    echo '<li class="term-item">';
    echo '<a href="' . get_term_link($term->term_id) . '">' . $term->name . '</a>';

    // 子タームがあるかチェック
    $children = get_terms(array(
      'taxonomy' => $post_tag,
      'parent' => $term->term_id,
      'hide_empty' => true
    ));

    if (!empty($children)) {
      display_terms($post_tag, $term->term_id);
    }

    echo '</li>';
  }
  echo '</ul>';
}

?>

<section class="l-sidebar u-flex u-flex-col u-gap-y-8">
<div>
    <!-- 公式サイトSNSリンク-->
  <?php
  $sns_group = get_field('official_sns', get_the_ID());
  if ($sns_group && is_array($sns_group)) : ?>
    <h2 class="u-font-bold u-text-lg">
      <?php echo pll_current_language() === 'en' ? 'Official SNS Post' : '公式サイトSNSからおすすめポスト'; ?>
    </h2>
      <ul class="u-mt-4">
      <?php foreach ($sns_group as $platform => $sns_data) :
        if (!empty($sns_data['embed'])) : ?>
          <li>
            <?php echo $sns_data['embed']; ?>
          </li>
      <?php endif;
      endforeach; ?>
      </ul>
  <?php endif; ?>
</div>
  <div>
    <h2>Categories</h2>
    <div class="u-mt-4">
      <?php
      display_terms('category'); // 'category'をカスタムタクソノミー名に置き換えてください
      ?>
    </div>
  </div>
  <div>
    <h2>VOD</h2>
    <div class="u-mt-4">
      <?php
      display_terms('vod'); // 'vod'をカスタムタクソノミー名に置き換えてください
      ?>
    </div>
  </div>
  <aside>
    <div class="u-mt-14">
      <!-- admax -->
      <script src="https://adm.shinobi.jp/s/907bbfd51ed847a8ad762bc34b8a57d4"></script>
    </div>
    <!-- facebook -->
    <div class="u-w-full u-mt-8">
      <iframe
        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fp%2FKatsumascore-100072246676709%2F&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=177731676219853"
        width="340"
        height="500"
        style="border:none;overflow:hidden"
        scrolling="no"
        frameborder="0"
        allowfullscreen="true"
        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
    <ul class="u-mt-8">
      <li>
        <!-- ＡＢＥＭＡ -->
        <a href="https://px.a8.net/svt/ejp?a8mat=3T0HTG+7HPDTE+4EKC+63OY9" rel="nofollow">
          <img border="0" width="300" height="250" alt="" src="https://www27.a8.net/svt/bgt?aid=230130484453&wid=001&eno=01&mid=s00000020550001025000&mc=1">
        </a>
        <img border="0" width="1" height="1" src="https://www15.a8.net/0.gif?a8mat=3T0HTG+7HPDTE+4EKC+63OY9" alt="">
      </li>
      <li>
        <!-- 合同会社ＤＭＭ．ｃｏｍ DMM TV -->
        <a href="https://px.a8.net/svt/ejp?a8mat=3TJ6EJ+BCFDRM+59RE+601S1" rel="nofollow">
          <img border="0" width="300" height="300" alt="" src="https://www29.a8.net/svt/bgt?aid=231002155686&wid=001&eno=01&mid=s00000024593001008000&mc=1">
        </a>
        <img border="0" width="1" height="1" src="https://www13.a8.net/0.gif?a8mat=3TJ6EJ+BCFDRM+59RE+601S1" alt="">
      </li>
      <li>
        <!-- 楽天Ｋｏｂｏ電子書籍ストア -->
        <a href="https://px.a8.net/svt/ejp?a8mat=3YYS8R+FH9R02+5EOC+5YZ75" rel="nofollow">
          <img border="0" width="300" height="250" alt="" src="https://www28.a8.net/svt/bgt?aid=240128379936&wid=001&eno=01&mid=s00000025230001003000&mc=1">
        </a>
        <img border="0" width="1" height="1" src="https://www12.a8.net/0.gif?a8mat=3YYS8R+FH9R02+5EOC+5YZ75" alt="">
      </li>
      <li>
        <!-- 合同会社ＤＭＭ．ｃｏｍ DMMブックス -->
        <a href="https://px.a8.net/svt/ejp?a8mat=3YYS8R+FGOBEA+6HW+3SZUAP" rel="nofollow">
          <img border="0" width="300" height="250" alt="" src="https://www25.a8.net/svt/bgt?aid=240128379935&wid=001&eno=01&mid=s00000000842023010000&mc=1"></a>
        <img border="0" width="1" height="1" src="https://www15.a8.net/0.gif?a8mat=3YYS8R+FGOBEA+6HW+3SZUAP" alt="">
      </li>
    </ul>
  </aside>
</section>
