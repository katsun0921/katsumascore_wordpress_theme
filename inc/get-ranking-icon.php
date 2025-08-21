<?php
// ランキングアイコンを取得する関数
function get_ranking_icon( $value ) {
    $icon_base_url = get_stylesheet_directory_uri() . '/images/icons/';

    // 文字列が入る可能性を考慮して数値に変換
    $num = floatval( $value );

    // 範囲とアイコンのマッピング
    $map = [
        [ 'min' => 1,   'max' => 2,   'icon' => 'c-rank-icon.png'  ],
        [ 'min' => 2,   'max' => 3,   'icon' => 'b-rank-icon.png'  ],
        [ 'min' => 3,   'max' => 4,   'icon' => 'a-rank-icon.png'  ],
        [ 'min' => 4,   'max' => 4.5, 'icon' => 's-rank-icon.png'  ],
        [ 'min' => 4.5, 'max' => 5,   'icon' => 'ss-rank-icon.png' ],
    ];

    foreach ( $map as $range ) {
        if ( $num >= $range['min'] && $num < $range['max'] ) {
            return '<img src="' . esc_url( $icon_base_url . $range['icon'] ) . '" alt="rating icon" class="rating-icon" />';
        }
    }

    // 最大値 5 の場合のみ
    if ( $num === 5.0 ) {
        return '<img src="' . esc_url( $icon_base_url . 'ss.png' ) . '" alt="rating icon" class="rating-icon" />';
    }

    return ''; // 範囲外や数値変換できなかった場合は空
}
