<?php
/*
Template Name: Home (Custom)
Description: トップページ用テンプレート
*/

global $post;
get_header();

?>
<main class="custom-home-wrapper">
<?php get_template_part('template-parts/components/swiper'); ?>
</main>
<?php

get_footer();
