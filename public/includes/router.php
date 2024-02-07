<?php
	$router = new AltoRouter();
	$router->setBasePath(BASE_PATH);

	$router->map( 'GET', '/404', '404.php', 'imlost');
	
 $router->map( 'GET', '/home', 'layouts/home.php', 'home2'); //map home

	$router->map( 'GET', '/tentang-kami', 'layouts/about.php', 'about'); 

	$router->map( 'GET', '/artikel', 'layouts/article.php', 'article');
	$router->map( 'GET', '/artikel/[:slug]', 'layouts/article-detail.php', 'article-detail');

	$router->map( 'GET', '/kemahasiswaan', 'layouts/students-page.php', 'students-page');
	$router->map( 'GET', '/kemahasiswaan/[:slug]', 'layouts/students-page-detail.php', 'students-page-detail');

	$router->map( 'GET', '/profil', 'layouts/profile.php', 'profile');
	$router->map( 'GET', '/profil/[:slug]', 'layouts/profile-detail.php', 'profile-detail');

	$router->map( 'GET', '/galeri', 'layouts/gallery.php', 'gallery');

	$router->map( 'GET', '/[:slug]', 'layouts/page.php', 'single-page');
	
	$home = $router->map( 'GET', '/', 'layouts/home.php', 'home'); //map home
	
	$match = $router->match();
?>