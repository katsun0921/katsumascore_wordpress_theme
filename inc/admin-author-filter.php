<?php
/**
 * 管理画面の投稿一覧に「著者フィルタ」を追加
 */

if ( ! function_exists( 'my_admin_author_filter' ) ) {
    add_action( 'restrict_manage_posts', function ( $post_type ) {
        // 投稿タイプを制限したい場合は以下を有効化
        // if ( $post_type !== 'post' ) return;

        $selected = isset( $_GET['author'] ) ? $_GET['author'] : '';
        wp_dropdown_users( array(
            'show_option_all' => 'すべての著者',
            'name'            => 'author',
            'selected'        => $selected,
            'who'             => 'authors',
        ) );
    } );

    add_action( 'pre_get_posts', function ( $query ) {
        if ( is_admin() && $query->is_main_query() && ! empty( $_GET['author'] ) ) {
            $query->set( 'author', $_GET['author'] );
        }
    } );
}
