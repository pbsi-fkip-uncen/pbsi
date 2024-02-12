<?php

/* set default meta title and description */
global $metaTitle, $metaDescription, $metaKeywords, $websiteURL, $websiteName;

// move this to globals to grab from Setting
$websiteName = 'PBSI - Pendidikan Bahasa dan Sastra Indonesia';
$websiteURL = '';

if (!isset($metaTitle) || is_null($metaTitle)) {
	$metaTitle = 'PBSI - Pendidikan Bahasa dan Sastra Indonesia';
}

if (!isset($metaDescription) || is_null($metaDescription)) {
	$metaDescription = 'PBSI - Pendidikan Bahasa dan Sastra Indonesia';
}

if (!isset($metaKeywords) || is_null($metaKeywords)) {
	$metaKeywords = 'PBSI - Pendidikan Bahasa dan Sastra Indonesia';
}

?>
<!doctype html>

<head>
	<base href="<?php echo APP_PATH; ?>" />

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">

	<title>
		<?php echo $metaTitle; ?>
	</title>
	<meta name="description" content="<?php echo $metaDescription; ?>" />
	<meta name="keywords" content="<?php echo $metaKeywords; ?>">

	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo $websiteURL; ?>" />
	<meta property="og:site_name" content="<?php echo $websiteName; ?>" />
	<meta property="og:title" content="<?php echo $metaTitle; ?>" />
	<meta property="og:description" content="<?php echo $metaDescription; ?>" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?php echo $metaTitle; ?>" />
	<meta name="twitter:description" content="<?php echo $metaDescription; ?>" />

	<link rel="shortcut icon" href="assets/img/favicon.png" type="image/png" />
	<link rel="canonical" href="<?php echo $websiteURL; ?>" />
	<link rel="stylesheet" type="text/css" href="assets/css/bulma.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
	<link rel="stylesheet" href="assets/css/baguetteBox.css">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/overwrite2.css">
	<link rel="stylesheet" type="text/css" href="assets/css/overwrite.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



	<?php
	// only shows error on localhost
	if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
	} else {
		?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<?php
	}
	?>
</head>

<body id="body">

	<?php require_once 'partials/_nav.php'; ?>
	<!--[if lt IE 8]>
	<div id="browserupgrade">
		<p>
			You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>
			to improve your experience.
		</p>
	</div>
<![endif]-->