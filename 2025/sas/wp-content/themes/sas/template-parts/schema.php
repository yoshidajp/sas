<?php

// common
$home = get_home_url();
$output = '';
$url = '';

//branch
if( is_home() ){
	$url = $home;
}
if( is_page() ){
	$url = get_the_permalink();
	$title = get_the_title();
	$output = <<< EOT
,
				{
					"@type": "ListItem",
					"position": 2,
					"name": "{$title}",
					"item": "{$url}"
				}

EOT;
}
if( is_singular('news') ){
	$url = get_the_permalink();
	$title = get_the_title();
	$output = <<< EOT
,
				{
					"@type": "ListItem",
					"position": 2,
					"name": "お知らせ",
					"item": "{$home}/news/"
				},
				{
					"@type": "ListItem",
					"position": 3,
					"name": "{$title}",
					"item": "{$url}"
				}

EOT;
}
?>

	<!-- schema -->
	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "BreadcrumbList",
			"itemListElement": [
				{
					"@type": "ListItem",
					"position": 1,
					"name": "トップページ",
					"item": "<?php echo $home; ?>/"
				}<?php echo $output; ?>
			]
		}
	</script>
	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type" : "WebSite",
			"name" : "伊香保 ACAPPELLA STAIRS",
			"alternateName" : ["いかぺら", "伊香保アカペラステアーズ"],
			"url" : "<?php echo $home ; ?>"
		}
	</script>
