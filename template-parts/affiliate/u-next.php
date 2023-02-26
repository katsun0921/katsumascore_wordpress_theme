<?php [
  'url' => $url,
  'unregistered_text' => $unregistered_text,
  'streaming_text' => $streaming_text,
  'is_affiliate_code' => $is_affiliate_code,
  'affiliate_code' => $affiliate_code
  ] = $args; ?>
<p style="margin-bottom: 0px;">
  <?php echo $unregistered_text; ?>
</p>
<div>
  <a href="https://px.a8.net/svt/ejp?a8mat=3T0HTG+2GPLWY+3250+6FWRL" rel="nofollow">
    <img border="0" width="320" height="100" alt="" style="width: 100%"
      src="https://www21.a8.net/svt/bgt?aid=230130484149&wid=001&eno=01&mid=s00000014274001082000&mc=1"></a>
  <img border="0" width="1" height="1" src="https://www11.a8.net/0.gif?a8mat=3T0HTG+2GPLWY+3250+6FWRL" alt="U-NEXT">
</div>
<?php if ($is_affiliate_code) : ?>
<?php echo $affiliate_code ?>
<?php else : ?>
<a style="display: block;" href="<?php echo esc_url($url) ?>" target="_blank" rel="noopener noreferrer">
  <?php echo $streaming_text; ?>
</a>
<?php endif; ?>
