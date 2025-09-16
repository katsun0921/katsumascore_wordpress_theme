<?php

class ImageSelector
{
  private $vodImageBaseUrl;
  private $categoryImageBaseUrl;
  private $defaultImageUrl;
  private $vodImageMap;
  private $categoryImageMap;

  public function __construct()
  {
    $this->vodImageBaseUrl = get_template_directory_uri() . '/images/vod/';
    $this->categoryImageBaseUrl = get_template_directory_uri() . '/images/categories/';
    $this->defaultImageUrl = get_template_directory_uri() . '/images/main-visual-default.webp';

    $this->vodImageMap = [
      'amazon-prime-video-com'   => 'amazon-prime-video.webp',
      'amazon-prime-video-jp'   => 'amazon-prime-video.webp',
      'apple-tv-com'      => 'apple-tv-plus.webp',
      'apple-tv-cojp'     => 'apple-tv-plus.webp',
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
      'crunchyroll'  => 'crunchyroll.webp',
    ];

    $this->categoryImageMap = [
      // カテゴリースラッグ => ファイル名
      'japan' => 'category-movie-japan.webp',
      'france' => 'category-movie-france.webp',
      'germany' => 'category-movie-germany.webp',
      'australia' => 'category-movie-australia.webp',
      'india-ja' => 'category-movie-india.webp',
      'movie-ja' => 'category-movie.webp',
      'united-kingdom' => 'category-movie-united-kingdom.webp',
      'america-ja' => 'category-movie-america.webp',
      'anime' => 'category-anime.webp',
      'anime-ova-ja' => 'category-anime.webp',
      'anime-film-ja' => 'category-anime.webp',
      'anime-en' => 'category-anime.webp',
      'anime-film-en' => 'category-anime.webp',
      'movie-en' => 'category-movie.webp',
      'america-en' => 'category-movie.webp',
      'australia-en' => 'category-movie-australia.webp',
      'france-en' => 'category-movie-france.webp',
      'germany-en' => 'category-movie-germany.webp',
      'japan-en' => 'category-movie-japan.webp',
      'united-kingdom-en' => 'category-movie-united-kingdom.webp',
    ];
  }

  /**
   * スラッグに対応する画像のURLを返す
   *
   * @param string $slug
   * @return string
   */
  public function getVodImageUrl($slug)
  {
    // スラッグが未定義またはマッピングにない場合はデフォルト画像を返す
    if (empty($slug) || !isset($this->vodImageMap[$slug])) {
      return $this->defaultImageUrl;
    }

    return $this->vodImageBaseUrl . $this->vodImageMap[$slug];
  }

  /**
   * カテゴリースラッグに対応する画像のURLを返す
   *
   * @param string $slug
   * @return string
   */
  public function getCategoryImageUrl($slug)
  {
    // スラッグが未定義またはマッピングにない場合はデフォルト画像を返す
    if (empty($slug) || !isset($this->categoryImageMap[$slug])) {
      return $this->defaultImageUrl;
    }

    return $this->categoryImageBaseUrl . $this->categoryImageMap[$slug];
  }
}
