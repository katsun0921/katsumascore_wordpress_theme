<?php
/**
 * 劇場版チェック用のACFフィールド取得
 * single.phpから分離されたACF依存部分
 */

$is_cinema_showing = get_field('cinema_info_filed_is_cinema_showing');
return $is_cinema_showing;