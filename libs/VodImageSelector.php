<?php

class ImageSelector {
    private $bannerImageBaseUrl;
    private $imageMap;

    public function __construct() {
        $this->bannerImageBaseUrl = get_template_directory_uri() . '/images/banner/';
        $this->defaultImageUrl    = get_template_directory_uri() . '/images/logo-primary.png';

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
     * slugに対応する画像のURLを返す
     *
     * @param string $slug
     * @return string
     */
    public function getImageUrl($slug) {
        if (!isset($this->imageMap[$slug])) {
            return $this->defaultImageUrl;
        }

        // 'default'キーだけは別のパス
        if ($slug === 'default') {
            return $this->defaultImageUrl;
        }

        return $this->bannerImageBaseUrl . $this->imageMap[$slug];
    }

    /**
     * スラッグに対応する画像のURLを返す
     *
     * @param string $slug
     * @return string
     */
    public function getImageUrl($slug) {
        // スラッグが未定義 or 明示的に'default'の場合は default.jpg を返す
        if (!isset($this->imageMap[$slug]) || $slug === 'default') {
            return $this->defaultImageUrl;
        }

        return $this->bannerImageBaseUrl . $this->imageMap[$slug];
    }
}
