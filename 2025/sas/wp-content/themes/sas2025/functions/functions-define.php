<?php

// テンプレートディレクトリ
function temp_dir(){
	echo get_template_directory_uri();
}

function settings_id(){
	$post_pbj = get_page_by_path('settings');
	return $post_pbj->ID;
}
function home_id(){
	$post_pbj = get_page_by_path('home');
	return $post_pbj->ID;
}

//日本語を明示
define ('WPLANG', 'ja');

?>