<?php
// レビューサイトのスコアを紹介するtemplate
// TODO: get_field_objectはACFの関数。wordpress関数を使いたい。
$amazon = 'amazon';
$filmakrs = 'filmakrs';
$imdb = 'imdb';
$rottenTomatoes = 'rotten_tomatoes';
$eigaCom = 'eiga_com';
$moviesYahoo = 'movies_yahoo';
$anikore = 'anikore';

$siteNames = array(
  $amazon,
  $filmakrs,
  $imdb,
  $rottenTomatoes,
  $eigaCom,
  $moviesYahoo,
  $anikore,
);

function getIndx($siteName)
{
  return array_search('score', array_column(get_field_object($siteName)['sub_fields'], 'label'));
}

function getMax($siteName)
{
  $indexKey = getIndx($siteName);
  return array("max" => get_field_object($siteName)['sub_fields'][$indexKey]["max"]);
}

$reviewSites = [];
foreach ((array) $siteNames as $site) {
  if (get_field_object($site)) {
    $addValue = array_merge(get_field_object($site)['value'], getMax($site));
    $label = get_field_object($site)['label'];
    array_push($reviewSites, array($label => $addValue));
  }
}
?>
<?php if ($reviewSites > 0) : ?>
<section>
  <h2 class="u-mb-4">各サイトのレビューサイトのスコア</h2>
  <ul class="u-list-disc">
    <?php foreach ((array) $reviewSites as $key => $value) :
        $data = $value[key($value)];
        $siteUrl = strlen($data['site_url']) > 0 ? 'href="' . $data['site_url'] . '" target="_blank" rel="noopener"' : '';
        $score = strlen($data['score']) > 0 ? $data['score'] : '';
        $max = strlen($data['max']) > 0 ? $data['max'] : '';
      ?>
    <?php if ($score) : ?>
    <li>
      <a <?php echo $siteUrl ?>>
        <?php echo key($value) . ": " . $score . "/" . $max ?>
      </a>
    </li>
    <?php endif; ?>
    <?php endforeach; ?>
  </ul>
  <p>
    <strong>本ページの情報は<time datetime="<?php the_time(get_the_date('Y-m-d')); ?>"></time>
      <?php echo get_the_date('Y年n月j日'); ?>時点のものです。<br>各サイトの最新スコアは各々のサイトにてご確認ください。
    </strong>
  </p>
</section>
<?php endif; ?>