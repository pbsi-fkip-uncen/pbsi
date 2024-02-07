<?php
$slug = 'artikel';
$section = $slug;

$query = new \Contentful\Delivery\Query;
$query->setContentType('page')
			->where('fields.slug', $slug);
$entries = $client->getEntries($query);

$query = new \Contentful\Delivery\Query;
$query->setContentType('article');
$articles = $client->getEntries($query);

if ($entries->getTotal() < 1) {
	_404();
}

$entry = $entries[0];
setMetaTags($entry);

if (!$entry->getMetaTitle()) {
	$entry_title = $entry ->getTitle();
	$metaTitle = $entry_title.' - PBSI - ';

}
?>

<?php include('includes/header.php');?>

<div id="introduction" class="container">
	<div class="center">
		<div class="wrapper">
			<h1>Artikel</h1>
			<div class="intro"><p><?= $entry->getIntroduction(); ?></p></div>
		</div>
	</div>
</div>

<section class="section">
	<div class="container">
		<div class="columns">
			<?php if($entry->getImages()) { ?>
			<?php foreach($entry->getImages() as $img){?>
					<div class="column">
						<?= getImage($img, 'img-full'); ?>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="columns is-multiline is-mobile">
			
			<?php
			foreach ($articles as $article){
				?>
				<div class="column is-4-tablet">
					<div class="card">
						<div class="card-image">
							<figure class="image is-4by3">
								<img src="<?= $article->getImages()[0]->getFile()->getUrl(); ?>" />
							</figure>
						</div>

						<div class="card-content">
							<h2 class="title is-3"> 
								<?=$article->getTitle(); ?>
							</h2>
						</div>
					</div>
				</div>
			<?php } ?>
			
		</div>
	</div>
</section>

<?php include('includes/footer.php');?>