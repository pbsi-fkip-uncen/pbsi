<?php
$params = $match['params'];
$slug = $params['slug'];
$section = 'artikel';

$query = new \Contentful\Delivery\Query;
$query->setContentType('article')
	->where('fields.slug', $slug);
$entries = $client->getEntries($query);

if ($entries->getTotal() < 1) {
	_404();
}

$entry = $entries[0];

if (!$entry->getMetaTitle()) {
	$entry_title = $entry->getTitle();
	$metaTitle = $entry_title . '  - PBSI -';

}
?>

<?php include('includes/header.php'); ?>

<section class="section">
	<div class="container">
		<div class="columns is-multiline is-mobile is-centered">
			<div class="column">
				<div class="image2 mb-3r">
					<?php $src = 'assets/img/placeholder.webp';
					if ($entry->getThumbnail() != null) {
						$src = $entry->getThumbnail()->getFile()->getUrl();
					} ?>
					<img src="<?= $src; ?>"/>
				</div>
				<h2 class="title is-3 mt-3r">
					<?= $entry->getTitle(); ?>
				</h2>
				<div class="intro">
					<p>
						<?= $parser->parse($entry->getDescription()); ?>
					</p>
				</div>
				<div class="intro">
					<p>
						<?= $parser->parse($entry->getArticle()); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>




<?php include('includes/footer.php'); ?>