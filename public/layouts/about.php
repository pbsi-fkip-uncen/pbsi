<?php
$slug = 'tentang-kami';
$section = $slug;

$query = new \Contentful\Delivery\Query;
$query->setContentType('pages')
->where('fields.slug', $slug);
$entries = $client->getEntries($query);

if ($entries->getTotal() < 1) {
	_404();
}
$entry = $entries[0];
setMetaTags($entry);
?>

<?php require_once 'includes/header.php'; ?>

<section class="section">
	<div class="container">
		<div class="columns">
			<div class="column">
				<h1 class="title is-1"><?= $entry->getTitle(); ?></h1>
			</div>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="columns">
			<?php if($entry->getImages()) { ?>
				<div class="column">
					<?= getImage($entry->getImages()[0], 'img-full'); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="columns">
			<div class="column">
				<div class="content">
					<?= $parser->parse($entry->getIntroduction());?>
				</div>
			</div>
		</div>
	</div>
</section>




<?php require_once 'includes/footer.php'; ?>