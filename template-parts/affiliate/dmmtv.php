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
  <a href="https://px.a8.net/svt/ejp?a8mat=3TJ6EJ+BCFDRM+59RE+601S1" rel="nofollow">
    <img border="0" width="300" height="300" alt=""
      src="https://www23.a8.net/svt/bgt?aid=231002155686&wid=001&eno=01&mid=s00000024593001008000&mc=1"></a>
  <img border="0" width="1" height="1" src="https://www14.a8.net/0.gif?a8mat=3TJ6EJ+BCFDRM+59RE+601S1" alt="">
</div>
<?php if ($is_affiliate_code) : ?>
<?php echo $affiliate_code ?>
<?php else : ?>
<a style="display: block;" href="<?php echo esc_url($url) ?>" target="_blank" rel="noopener noreferrer">
  <?php echo $streaming_text; ?>
</a>

<?php endif; ?>