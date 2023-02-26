<?php
// あらすじを表示
$summaryGroup = get_field('acf_summary_group');
if (isset($summaryGroup['acf_summary_text'])) :
?>
<p>あらすじ</p>
<blockquote>
  <p>
    <?php echo $summaryGroup['acf_summary_text'] ?>
  </p>
  <cite><a href="<?php echo $summaryGroup['acf_ref_url'] ?>"
      target="_blank"><?php echo $summaryGroup['acf_summary_ref'] ?></a></cite>
</blockquote>
<?php endif; ?>