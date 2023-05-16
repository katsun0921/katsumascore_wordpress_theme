<?php
// あらすじを表示
$summaryGroup = get_field('acf_summary_group');
if (isset($summaryGroup['acf_summary_text'])) :
?>
<section class="p-summary u-mt-4">
  <h2><?php echo pll_current_language() === 'en' ? 'Summary' : 'あらすじ'; ?></h2>
  <blockquote>
    <p>
      <?php echo $summaryGroup['acf_summary_text'] ?>
    </p>
    <cite>
      <a href="<?php echo esc_url($summaryGroup['acf_ref_url']) ?>" target="_blank">
        <?php echo $summaryGroup['acf_summary_ref'] ?>
      </a>
    </cite>
  </blockquote>
</section>
<?php endif; ?>