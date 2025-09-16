<?php
/**
 * カテゴリーとカスタムタクソノミーに画像を登録・表示する機能
 *
 * @package Katsumascore
 */

class Katsumascore_Taxonomy_Image {

    /**
     * コンストラクタ
     */
    public function __construct() {
        // 管理画面でのフック
        add_action('category_add_form_fields', array($this, 'add_category_image_field'));
        add_action('category_edit_form_fields', array($this, 'edit_category_image_field'));
        add_action('created_category', array($this, 'save_category_image'));
        add_action('edited_category', array($this, 'save_category_image'));

        // カスタムタクソノミー用のフック（例: タグなど）
        add_action('post_tag_add_form_fields', array($this, 'add_category_image_field'));
        add_action('post_tag_edit_form_fields', array($this, 'edit_category_image_field'));
        add_action('created_post_tag', array($this, 'save_category_image'));
        add_action('edited_post_tag', array($this, 'save_category_image'));

        // 管理画面でのスクリプト・スタイル読み込み
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

        // カラム表示
        add_filter('manage_edit-category_columns', array($this, 'add_image_column'));
        add_filter('manage_category_custom_column', array($this, 'display_image_column'), 10, 3);
        add_filter('manage_edit-post_tag_columns', array($this, 'add_image_column'));
        add_filter('manage_post_tag_custom_column', array($this, 'display_image_column'), 10, 3);
    }

    /**
     * 新規カテゴリー追加時の画像フィールド
     */
    public function add_category_image_field() {
        ?>
        <div class="form-field term-image-wrap">
            <label for="category-image-id"><?php _e('画像', 'katsumascore'); ?></label>
            <p>
                <input type="hidden" id="category-image-id" name="category-image-id" value="">
                <input type="button" class="button button-secondary" id="category-image-button" value="<?php _e('画像を選択', 'katsumascore'); ?>">
                <input type="button" class="button button-secondary" id="category-image-remove" value="<?php _e('画像を削除', 'katsumascore'); ?>" style="display: none;">
            </p>
            <div id="category-image-preview" style="margin-top: 10px;"></div>
            <p class="description"><?php _e('カテゴリー用の画像を選択してください。', 'katsumascore'); ?></p>
        </div>
        <?php
    }

    /**
     * カテゴリー編集時の画像フィールド
     */
    public function edit_category_image_field($term) {
        $image_id = get_term_meta($term->term_id, 'category-image-id', true);
        ?>
        <tr class="form-field term-image-wrap">
            <th scope="row">
                <label for="category-image-id"><?php _e('画像', 'katsumascore'); ?></label>
            </th>
            <td>
                <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo esc_attr($image_id); ?>">
                <input type="button" class="button button-secondary" id="category-image-button" value="<?php _e('画像を選択', 'katsumascore'); ?>">
                <input type="button" class="button button-secondary" id="category-image-remove" value="<?php _e('画像を削除', 'katsumascore'); ?>" <?php echo empty($image_id) ? 'style="display: none;"' : ''; ?>>
                <div id="category-image-preview" style="margin-top: 10px;">
                    <?php
                    if (!empty($image_id)) {
                        echo wp_get_attachment_image($image_id, 'medium', false, array('style' => 'max-width: 300px; height: auto;'));
                    }
                    ?>
                </div>
                <p class="description"><?php _e('カテゴリー用の画像を選択してください。', 'katsumascore'); ?></p>
            </td>
        </tr>
        <?php
    }

    /**
     * カテゴリー画像の保存
     */
    public function save_category_image($term_id) {
        if (isset($_POST['category-image-id'])) {
            $image_id = sanitize_text_field($_POST['category-image-id']);
            if (!empty($image_id)) {
                update_term_meta($term_id, 'category-image-id', $image_id);
            } else {
                delete_term_meta($term_id, 'category-image-id');
            }
        }
    }

    /**
     * 管理画面でのスクリプト・スタイル読み込み
     */
    public function enqueue_scripts($hook) {
        if ('edit-tags.php' === $hook || 'term.php' === $hook) {
            wp_enqueue_media();
            wp_enqueue_script(
                'katsumascore-taxonomy-image',
                get_template_directory_uri() . '/js/taxonomy-image.js',
                array('jquery'),
                '1.0.0',
                true
            );
        }
    }

    /**
     * カテゴリー一覧に画像カラムを追加
     */
    public function add_image_column($columns) {
        $new_columns = array();
        foreach ($columns as $key => $value) {
            if ($key === 'posts') {
                $new_columns['image'] = __('画像', 'katsumascore');
            }
            $new_columns[$key] = $value;
        }
        return $new_columns;
    }

    /**
     * カテゴリー一覧の画像カラム表示
     */
    public function display_image_column($content, $column_name, $term_id) {
        if ($column_name === 'image') {
            $image_id = get_term_meta($term_id, 'category-image-id', true);
            if (!empty($image_id)) {
                $content = wp_get_attachment_image($image_id, array(50, 50), false, array('style' => 'width: 50px; height: 50px; object-fit: cover;'));
            } else {
                $content = '—';
            }
        }
        return $content;
    }

    /**
     * カテゴリー画像IDを取得
     */
    public static function get_category_image_id($term_id) {
        return get_term_meta($term_id, 'category-image-id', true);
    }

    /**
     * カテゴリー画像URLを取得
     */
    public static function get_category_image_url($term_id, $size = 'medium') {
        $image_id = self::get_category_image_id($term_id);
        if (!empty($image_id)) {
            return wp_get_attachment_image_url($image_id, $size);
        }
        return false;
    }

    /**
     * カテゴリー画像を表示
     */
    public static function display_category_image($term_id, $size = 'medium', $attr = array()) {
        $image_id = self::get_category_image_id($term_id);
        if (!empty($image_id)) {
            return wp_get_attachment_image($image_id, $size, false, $attr);
        }
        return false;
    }
}

// インスタンス化
new Katsumascore_Taxonomy_Image();