<?php
// レンタル広告を表示するページ。劇場で上映中でありVODで配信をしていない時は表示をしない。
$titleJp = get_post_meta($post->ID, 'title_jp', true);
$is_cinema_showing = get_field('cinema_info_filed_is_cinema_showing');
$is_vod_distribution = get_field('vod_group_is_vod_distribution');
?>
<?php if (!$is_cinema_showing && $is_vod_distribution) : ?>
<section>
  <ul>
    <li>
      <a href="https://px.a8.net/svt/ejp?a8mat=3T0HTG+7IATF6+47OU+BXYE9" rel="nofollow">
        <img border="0" width="468" alt="カルチュア・コンビニエンス・クラブ株式会社"
          src="https://www22.a8.net/svt/bgt?aid=230130484454&wid=001&eno=01&mid=s00000019659002006000&mc=1"></a>
      <img border="0" width="1" height="1" src="https://www17.a8.net/0.gif?a8mat=3T0HTG+7IATF6+47OU+BXYE9" alt="">
    </li>
    <li>
      <a href="https://px.a8.net/svt/ejp?a8mat=3T0HTG+7FX302+2GMK+6BU5T" rel="nofollow">
        <img border="0" width="468" alt="株式会社デジタルコマース"
          src="https://www20.a8.net/svt/bgt?aid=230130484450&wid=001&eno=01&mid=s00000011486001063000&mc=1"></a>
      <img border="0" width="1" height="1" src="https://www19.a8.net/0.gif?a8mat=3T0HTG+7FX302+2GMK+6BU5T" alt="">
    </li>
    <li>
      <a href="https://px.a8.net/svt/ejp?a8mat=3T0HTG+7FBNEA+2D8M+NVWSH" rel="nofollow">
        <img border="0" width="468" alt="株式会社ゲオ"
          src="https://www26.a8.net/svt/bgt?aid=230130484449&wid=001&eno=01&mid=s00000011047004012000&mc=1"></a>
      <img border="0" width="1" height="1" src="https://www14.a8.net/0.gif?a8mat=3T0HTG+7FBNEA+2D8M+NVWSH" alt="">
    </li>
  </ul>
</section>
<?php endif; ?>