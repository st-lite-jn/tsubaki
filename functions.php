<?php
$tsbk_funcs_globs = array_merge(
    glob(__DIR__ . '/functions/snippets/*.php'), // テーマ内で使用するスニペット関数
    glob(__DIR__ . '/functions/settings/*.php'), // テーマの設定に関する関数
    glob(__DIR__ . '/functions/admin-screens/*.php'), // WordPressの管理画面に関する関数
    glob(__DIR__ . '/functions/global-variables/*.php'), // テーマ内のグローバル変数を返す関数
    glob(__DIR__ . '/functions/template-parts/*.php'),// テンプレート内のパーツを生成する関数
    glob(__DIR__ . '/functions/theme-customizers/*.php'),// テーマカスタマイザーの定義
    glob(__DIR__ . '/functions/post-types/*.php'), // 投稿タイプの編集・カスタム投稿タイプの定義
    glob(__DIR__ . '/functions/taxonomies/*.php') // タクソノミーの編集・カスタムタクソノミーの定義
);
foreach($tsbk_funcs_globs as $tsbk_funcs_glob) {
    include $tsbk_funcs_glob;
}
