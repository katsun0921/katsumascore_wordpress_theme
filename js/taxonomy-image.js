/**
 * カテゴリー画像アップロード機能のJavaScript（バニラJS版）
 */
document.addEventListener('DOMContentLoaded', function() {
    
    let mediaUploader;
    
    // 画像選択ボタンのクリックイベント
    document.addEventListener('click', function(e) {
        if (e.target && e.target.id === 'category-image-button') {
            e.preventDefault();
            
            // メディアアップローダーが既に作成されている場合は開く
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            
            // メディアアップローダーを作成
            mediaUploader = wp.media({
                title: 'カテゴリー画像を選択',
                button: {
                    text: '選択'
                },
                multiple: false
            });
            
            // 画像が選択された時の処理
            mediaUploader.on('select', function() {
                const attachment = mediaUploader.state().get('selection').first().toJSON();
                const imageIdField = document.getElementById('category-image-id');
                const previewDiv = document.getElementById('category-image-preview');
                const removeButton = document.getElementById('category-image-remove');
                
                // 隠しフィールドに画像IDを設定
                if (imageIdField) {
                    imageIdField.value = attachment.id;
                }
                
                // プレビュー画像を表示
                if (previewDiv) {
                    const imageHtml = '<img src="' + attachment.url + '" style="max-width: 300px; height: auto;">';
                    previewDiv.innerHTML = imageHtml;
                }
                
                // 削除ボタンを表示
                if (removeButton) {
                    removeButton.style.display = 'inline-block';
                }
            });
            
            // メディアアップローダーを開く
            mediaUploader.open();
        }
    });
    
    // 画像削除ボタンのクリックイベント
    document.addEventListener('click', function(e) {
        if (e.target && e.target.id === 'category-image-remove') {
            e.preventDefault();
            
            const imageIdField = document.getElementById('category-image-id');
            const previewDiv = document.getElementById('category-image-preview');
            
            // 隠しフィールドをクリア
            if (imageIdField) {
                imageIdField.value = '';
            }
            
            // プレビュー画像を削除
            if (previewDiv) {
                previewDiv.innerHTML = '';
            }
            
            // 削除ボタンを非表示
            e.target.style.display = 'none';
        }
    });
});