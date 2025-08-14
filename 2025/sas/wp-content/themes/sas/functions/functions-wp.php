<?php


//上部マージン削除
add_filter('show_admin_bar', '__return_false');

//head整理
//https://www.cloud9works.net/web/how-to-remove-meta-generator-from-wordpress/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles', 10);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);

//サムネイル有効
//add_theme_support('post-thumbnails', array('post', 'page', 'group', 'article'));


//自動srcset無効
add_filter('wp_calculate_image_srcset_meta', '__return_null');


//デフォルトjQuery読み込まない
function my_delete_local_jquery()
{
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '3.6.0');
}
add_action('wp_enqueue_scripts', 'my_delete_local_jquery');


//グローバルスタイル無効
//http://webgaku.net/jp/wordpress/global-styles-inline-css/
add_action('wp_enqueue_scripts', 'remove_my_global_styles');
function remove_my_global_styles()
{
	wp_dequeue_style('global-styles');
}


////////////////////////////////////////////////////////////////////////////////////////
//
// 更新通知メール
// https://tamoc.com/stop-notice-wordpress-plugin/
//
////////////////////////////////////////////////////////////////////////////////////////
//「Wordpress本体」の自動更新メール通知を停止する
add_filter('auto_core_update_send_email' , '__return_false');

// 「プラグイン」の自動更新メール通知を停止する
add_filter( 'auto_plugin_update_send_email', '__return_false' );

// 「テーマ」の自動更新メール通知を停止する
add_filter( 'auto_theme_update_send_email', '__return_false' );




?>