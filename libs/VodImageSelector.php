<?php

class VodImageSelector {
    private $vodImageBaseUrl;
    private $imageMap;

    public function __construct() {
        $this->vodImageBaseUrl = get_template_directory_uri() . '/images/vod/';

        $this->imageMap = [
            'amazon-prime-video-com'   => 'amazon-prime-video.webp',
            'amazon-prime-video-jp'   => 'amazon-prime-video.webp',
            'apple-tv-plus-com'      => 'apple-tv-plus.webp',
            'apple-tv-plus-cojp'     => 'apple-tv-plus.webp',
            'disneyplus-com'  => 'disney-plus.webp',
            'disneyplus-jp'  => 'disney-plus.webp',
            'dmmtv-jp'  => 'dmm-tv.webp',
            'dmmtv-com'  => 'dmm-tv.webp',
            'u-next-ja'  => 'u-next.webp',
            'u-next-com'  => 'u-next.webp',
            'youtube-com'  => 'youtube.webp',
            'youtube-cojp'  => 'youtube.webp',
            'netflix-com'  => 'netflix.webp',
            'netflix-jp'  => 'netflix.webp',
        ];
    }

    /**
     * スラッグに対応する画像のURLを返す
     *
     * @param string $slug
     * @return string | null
     */
    public function getVodImageUrl($slug) {
        // スラッグが未定義 は default.jpg を返す
        if (empty($slug) || !isset($this->imageMap[$slug])) {
            return null;
        }

        return $this->vodImageBaseUrl . $this->imageMap[$slug];
    }
}
