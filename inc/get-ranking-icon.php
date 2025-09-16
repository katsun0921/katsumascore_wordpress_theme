<?php
// ランキングアイコンを取得する関数
/**
 * @description 指定された数値に基づいてランキングアイコンファイル(string)を返す
 * @param float|string $value 数値または数値を表す文字列
 * @return string string ファイル名
 */
function get_ranking_icon( $value ) {

    // 文字列が入る可能性を考慮して数値に変換
    $num = floatval( $value );

    // 範囲とアイコンのマッピング
    $map = [
        [ 'min' => 1,   'max' => 2,   'icon' => 'icon-rank-a.png'  ],
        [ 'min' => 2,   'max' => 3,   'icon' => 'icon-rank-b.png'  ],
        [ 'min' => 3,   'max' => 4,   'icon' => 'icon-rank-a.png'  ],
        [ 'min' => 4,   'max' => 4.5, 'icon' => 'icon-rank-s.png'  ],
        [ 'min' => 4.5, 'max' => 5,   'icon' => 'icon-rank-ss.png' ],
    ];

    foreach ( $map as $range ) {
        if ( $num >= $range['min'] && $num < $range['max'] ) {
          return $range['icon'];
        }
    }

    // 最大値 5 の場合のみ
    if ( $num === 5.0 ) {
      return 'icon-rank-ss.png';
    }

    return ''; // 範囲外や数値変換できなかった場合は空
}
