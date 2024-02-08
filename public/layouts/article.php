<?php
$slug = 'artikel';
$section = $slug;

$query = new \Contentful\Delivery\Query;
$query->setContentType('article');
$articles = $client->getEntries($query);

if ($entries->getTotal() < 1) {
	_404();
}

// $entry = $entries[0];
// setMetaTags($entry);


?>

<?php include('includes/header.php'); ?>

<div id="introduction" class="container">
	<div class="center mt-3r">
		<div class="wrapper">
			<h1 class="big-title big-title-left big-title-blue mb-5">Artikel</h1>
		</div>
	</div>
</div>

<section class="section">
	<div class="container">
		<div class="columns is-multiline is-mobile">
			<?php
			// foreach ($articles as $article) {
			if (count($articles) < 2) {
				for ($x = 0; $x <= 10; $x++) {
					?>
					<div class="column is-3-tablet is-6-mobile">
						<a href="artikel/<?= $articles[0]->getSlug(); ?>">
							<div class="news-item news-item-cat-blog col-md-4">
								<div class="news-item-image">
									<?php $src = 'assets/img/placeholder.webp';
									if ($articles[0]->getThumbnail() != null) {
										$src = $articles[0]->getThumbnail()->getFile()->getUrl();
									} ?>
									<div class="news-item-image-inner article-card"
										style="background-image: url('<?= $src; ?>')">
										<img src="<?= $src; ?>" class="portfolio-img">
									</div>
								</div>
								<div class="news-item-content">
									<div class="news-item-date">
										<?php $posteddate = date('Y-m-d');
										if ($articles[0]->getPublishedAt() != null) {
											$posteddate = $articles[0]->getPublishedAt();
										}
										?>
									</div>
									<div class="news-item-title font-size-32">
										<a href="<?= $articles[0]->getSlug(); ?>" data-wpel-link="internal">
											<span class="font-eurostile-bold">
												<?= $articles[0]->getTitle(); ?>
											</span>
										</a>
									</div>
									<div class="news-item-desc font-proximanova-regular">
										<a href="<?= $entry->getSlug() ?>/<?= $subpages->getSlug(); ?>">Lihat Selengkapnya</a>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php }
			} else {
				foreach ($articles as $article) { ?>
					<div class="column is-3-tablet is-6-mobile">
						<a href="artikel/<?= $article->getSlug(); ?>">
							<div class="news-item news-item-cat-blog col-md-4">
								<div class="news-item-image">
									<?php $src = 'assets/img/placeholder.webp';
									if ($article->getThumbnail() != null) {
										$src = $article->getThumbnail()->getFile()->getUrl();
									} ?>
									<div class="news-item-image-inner article-card"
										style="background-image: url('<?= $src; ?>')">
										<img src="<?= $src; ?>" class="portfolio-img">
									</div>
								</div>
								<div class="news-item-content">
									<div class="news-item-date">
										<?php $posteddate = date('Y-m-d');
										if ($article->getPublishedAt() != null) {
											$posteddate = $article->getPublishedAt();
										}
										?>
									</div>
									<div class="news-item-title font-size-32">
										<a href="<?= $article->getSlug(); ?>" data-wpel-link="internal">
											<span class="font-eurostile-bold">
												<?= $article->getTitle(); ?>
											</span>
										</a>
									</div>
									<div class="news-item-desc font-proximanova-regular">
										<a href="artikel/<?= $article->getSlug(); ?>">Lihat Selengkapnya</a>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php }
			} ?>
		</div>
	</div>
</section>

<?php include('includes/footer.php'); ?>