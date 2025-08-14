<?php


require get_template_directory() . '/functions/functions-define.php';
require get_template_directory() . '/functions/functions-wp.php';
require get_template_directory() . '/functions/functions-custom.php';


///////////////////////////////////////////////////////////////////////////////
//
// common
//
///////////////////////////////////////////////////////////////////////////////

//contact form7 head
//https://web.comoli.net/post/wordpress-delete-cf7-header
add_action('wp', function () {
	if ( is_page('contact') or is_singular('circle')) return;
	add_filter('wpcf7_load_js', '__return_false');
	add_filter('wpcf7_load_css', '__return_false');
});
// Contact Form 7の自動pタグ無効
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}


////////////////////////////////////////////////////////////////////////////////////////
//
// ループ
//
////////////////////////////////////////////////////////////////////////////////////////
function customize_main_query($query)
{
	if (is_admin() || !$query->is_main_query()) {
		return;
	}
	if ($query->is_archive()) {
		$query->set('has_password', false);
	}
}
add_action('pre_get_posts', 'customize_main_query'); // PRE_GET_POSTSにフック


//ランダムオーダー
add_action('pre_user_query', 'my_random_user_query');
function my_random_user_query($class)
{
	if ('rand' == $class->query_vars['orderby'])
		$class->query_orderby = str_replace('user_login', 'RAND()', $class->query_orderby);
	return $class;
}


////////////////////////////////////////////////////////////////////////////////////////
//
// タイトル変更
//
////////////////////////////////////////////////////////////////////////////////////////

add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	} elseif (is_author()) {
		$title = get_the_author();
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_date()) {
		$title = get_the_time('Y年n月');
	} elseif (is_search()) {
		$title = esc_html(get_search_query(false));
	} elseif (is_404()) {
		$title = '「404」ページが見つかりません';
	} else {
	}
	return $title;
});



////////////////////////////////////////////////////////////////////////////////////////
//
// ページネーション
// https://wemo.tech/978
//
////////////////////////////////////////////////////////////////////////////////////////

add_filter('redirect_canonical', 'my_disable_redirect_canonical');

function my_disable_redirect_canonical($redirect_url)
{

	if (is_archive() || is_author()) {
		$subject = $redirect_url;
		$pattern = '/\/page\//'; // URLに「/page/」があるかチェック
		preg_match($pattern, $subject, $matches);

		if ($matches) {
			//リクエストURLに「/page/」があれば、リダイレクトしない。
			$redirect_url = false;
			return $redirect_url;
		}
	}
}

///////////////////////////////////////////////////////////////////////////////
//
// 404対策
// https://increment-log.com/access-redirect-404/
//
///////////////////////////////////////////////////////////////////////////////

// function status404() {
// 	if(is_home()){
// 		$the_path = $_SERVER['REQUEST_URI'];
// 		$the_param = parse_url($the_path, PHP_URL_QUERY);
// 		if( $the_param ){
// 			global $wp_query;
// 			$wp_query->set_404();
// 			status_header(404);
// 		}
// 	}
// }
// add_action( 'template_redirect', 'status404' );