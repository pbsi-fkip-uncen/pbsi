<?php
$params = $match['params'];
$slug = $params['slug'];
$section = 'artikel';


$query = new \Contentful\Delivery\Query;

$query->setContentType('articles')
->where('fields.slug',$slug);
$entries = $client->getEntries($query);


if ($entries->getTotal() < 1) {
	_404();
}

$entry = $entries[0];

if (!$entry->getMetaTitle()) {
	$entry_title = $entry ->getTitle();
	$metaTitle = $entry_title.'  - PBSI -';

}
?>

<?php include('includes/header.php');?>

<section class="section">
	<div class="container">
		<div class="columns is-multiline is-mobile is-centered">
			<div class="column">
				<h2 class="title is-3"> 
					<?= $entry->getTitle(); ?>

				</h2>
				<div class="image">
					<img src="<?= $entry->getImages()[0]->getFile()->getUrl(); ?>" />
				</div>
				<div class="intro"><p><?= $entry->getIntroduction(); ?></p></div>
			</div>
		</div>
	</div>
</section>




<?php include('includes/footer.php');?>