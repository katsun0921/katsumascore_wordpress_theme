<?php
// レビューサイトのスコアを紹介するtemplate
// TODO: get_field_objectはACFの関数。wordpress関数を使いたい。
$filmakrs = 'filmakrs';
$imdb = 'imdb';
$rottenTomatoes = 'rotten_tomatoes';
$eigaCom = 'eiga_com';
$moviesYahoo = 'movies_yahoo';
$anikore = 'anikore';

$siteNames = array(
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
foreach ((array) $siteNames as $site) :
  if (get_field_object($site)) :
    $label = get_field_object($site)['label'];
    $addValue = array_merge(get_field_object($site)['value'], getMax($site), array("label" => $label));
    array_push($reviewSites, array($site => $addValue));
  endif;
endforeach;
?>
<?php if ($reviewSites > 0) : ?>
  <section>
    <h2>
      <?php echo pll_current_language() === 'en' ? 'Review Site Scores' : '各サイトのレビュースコア'; ?>
    </h2>

    <!-- Score Details -->
    <ul class="u-flex u-flex-wrap u-gap-4 u-mt-4">
      <?php foreach ((array) $reviewSites as $key => $value) :
        $data = $value[key($value)];
        $siteUrl = strlen($data['site_url']) > 0 ? 'href="' . $data['site_url'] . '" target="_blank" rel="noopener"' : '';
        $score = strlen($data['score']) > 0 ? $data['score'] : '';
        // rotten tomatoes audience score
        $score_audience = '';
        if (key($value) === $rottenTomatoes) :
          $score_audience =  strlen($data['score_audience']) > 0 ? $data['score_audience'] : '';
        endif;
        $max = strlen($data['max']) > 0 ? $data['max'] : '';
      ?>
        <?php if ($score) : ?>
          <li>
            <a <?php echo $siteUrl ?>>
              <span>
                <?php echo $data['label'] . ": " . $score . "/" . $max ?>
              </span>
              <?php if ($score_audience) : ?>
                <span class="u-ml-2">
                  <?php echo "AUDIENCE: " . $score_audience . "/" . $max ?>
                </span>
              <?php endif ?>
            </a>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
    <!-- Chart.js Script (CDN) -->
    <script src="<?php echo esc_url(get_template_directory_uri() . '/js/chart.js'); ?>"></script>

    <!-- Chart Container -->
    <div class="review-scores-chart-container u-mx-auto u-my-0 u-relative u-max-h-custom-property" style="--custom-max-height: 800px;">
      <canvas id="reviewScoresChart" width="600" height="400"></canvas>
    </div>


    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // データの準備
        const reviewData = [
          <?php
          $chartData = [];
          foreach ((array) $reviewSites as $key => $value) :
            $data = $value[key($value)];
            $score = strlen($data['score']) > 0 ? floatval($data['score']) : 0;
            $max = strlen($data['max']) > 0 ? floatval($data['max']) : 10;
            $normalizedScore = $max > 0 ? ($score / $max) * 10 : 0;

            // 通常のスコア
            if ($score > 0) :
              $label = esc_js($data['label']);
              // Rotten TomatoesにはTomatometerを明記
              if (key($value) === $rottenTomatoes) :
                $label .= ' (Tomatometer)';
              endif;
              $chartData[] = [
                'label' => $label,
                'score' => $normalizedScore,
                'originalScore' => $score . "/" . $max
              ];
            endif;

            // Rotten TomatoesのAUDIENCEスコアを別途追加
            if (key($value) === $rottenTomatoes) :
              $score_audience = strlen($data['score_audience']) > 0 ? floatval($data['score_audience']) : 0;
              if ($score_audience > 0) :
                $normalizedAudienceScore = $max > 0 ? ($score_audience / $max) * 10 : 0;
                $chartData[] = [
                  'label' => esc_js($data['label']) . ' (AUDIENCE)',
                  'score' => $normalizedAudienceScore,
                  'originalScore' => $score_audience . "/" . $max
                ];
              endif;
            endif;
          endforeach;

          foreach ($chartData as $index => $item) :
            echo json_encode($item);
            if ($index < count($chartData) - 1) echo ',';
          endforeach;
          ?>
        ];

        if (reviewData.length === 0) return;

        // チャートの最大値を定義
        const maxScore = 10;

        // 平均スコアを計算
        const averageScore = reviewData.reduce((sum, item) => sum + item.score, 0) / reviewData.length;

        // 中央にテキストを表示するプラグイン
        const centerTextPlugin = {
          id: 'centerText',
          afterDraw: function(chart) {
            const ctx = chart.ctx;
            const centerX = (chart.chartArea.left + chart.chartArea.right) / 2;
            const centerY = (chart.chartArea.top + chart.chartArea.bottom) / 2;

            ctx.save();
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';

            // 平均スコア/最大値のテキスト
            ctx.font = 'bold 24px noto-sans, sans-serif';
            ctx.fillStyle = '#2c3e50';
            ctx.fillText(averageScore.toFixed(1) + '/' + maxScore, centerX, centerY - 15);

            // 「平均」ラベル
            ctx.font = '16px noto-sans, sans-serif';
            ctx.fillStyle = '#2c3e50';
            ctx.fillText('<?php echo pll_current_language() === 'en' ? 'Average' : '平均値'; ?>', centerX, centerY + 15);

            ctx.restore();
          }
        };

        // プラグインを登録
        Chart.register(centerTextPlugin);

        // Chart.jsの設定
        const ctx = document.getElementById('reviewScoresChart').getContext('2d');

        const chart = new Chart(ctx, {
          type: 'radar',
          data: {
            labels: reviewData.map(item => item.label + ' (' + item.originalScore + ')'),
            datasets: [{
              label: '<?php echo pll_current_language() === 'en' ? 'Review Scores' : 'レビュースコア'; ?>',
              data: reviewData.map(item => item.score),
              backgroundColor: 'rgba(102, 126, 234, 0.3)',
              borderColor: '#667eea',
              borderWidth: 3,
              pointBackgroundColor: '#ff6b6b',
              pointBorderColor: '#fff',
              pointBorderWidth: 3,
              pointRadius: 8
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
              intersect: false
            },
            hover: {
              mode: null
            },
            scales: {
              r: {
                angleLines: {
                  display: true,
                  color: 'rgba(102, 126, 234, 0.3)',
                  lineWidth: 2
                },
                grid: {
                  color: 'rgba(102, 126, 234, 0.2)',
                  lineWidth: 2
                },
                pointLabels: {
                  font: {
                    size: 14,
                    weight: 'bold',
                    family: 'Arial, sans-serif'
                  },
                  color: '#2c3e50',
                  padding: 10
                },
                ticks: {
                  beginAtZero: true,
                  min: 0,
                  max: maxScore,
                  stepSize: 2,
                  display: true,
                  backdropColor: 'rgba(255, 255, 255, 0.8)',
                  color: '#667eea',
                  font: {
                    size: 12,
                    weight: 'bold'
                  }
                },
                suggestedMin: 0,
                suggestedMax: maxScore
              }
            },
            plugins: {
              legend: {
                display: false
              },
              tooltip: {
                enabled: false
              },
              centerText: true
            },
            elements: {
              line: {
                tension: 0
              }
            },
            animation: {
              duration: 2000,
              easing: 'easeOutQuart'
            }
          }
        });
      });
    </script>
    <?php
    // score_analysisフィールドの値を取得して表示
    $score_analysis = get_field('score_analysis');
    if ($score_analysis) :
    ?>
      <div class="score-analysis u-mt-6">
        <?php echo wp_kses_post($score_analysis); ?>
      </div>
    <?php endif; ?>
    <div>

    </div>
    <p class="u-mt-4">
      <?php if (pll_current_language() === 'en') : ?>
        <strong>Information on this page is current as of
          <time datetime="<?php the_time(get_the_date('Y-m-d')); ?>">
            <?php echo get_the_date('F j, Y'); ?>
          </time>.<br>Please check each site for the latest scores.
        </strong>
      <?php else: ?>
        <strong>本ページの情報は
          <time datetime="<?php the_time(get_the_date('Y-m-d')); ?>">
            <?php echo get_the_date('Y年n月j日'); ?>
          </time>時点のものです。<br>各サイトの最新スコアは各々のサイトにてご確認ください。
        </strong>
      <?php endif; ?>
    </p>
  </section>
<?php endif; ?>
