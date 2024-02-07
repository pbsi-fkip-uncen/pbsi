<?php
$slug = 'galeri';
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
				<?= $entry->getIntroduction(); ?>
			</div>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="tab-1">
			<button class="tablinks" onclick="openGallery(event, 'all')" id="defaultOpen">Semua Galeri</button>
			<button class="tablinks" onclick="openGallery(event, 'lecturers')">Galeri Dosen</button>
			<button class="tablinks" onclick="openGallery(event, 'students')">Galeri Mahasiswa</button>
		</div>

		<div id="all" class="tabcontent-1">
			<div class="div-img-galeri">
				<?php foreach ($entry->getCards() as $card) { ?>
					<?php foreach ($card->getImages() as $img) { ?>
						<div class="img-galeri">
							<a class="" href="<?= $img->getFile()->getUrl(); ?>">
								<img src="<?= $img->getFile()->getUrl(); ?>" />
							</a>
						</div>
					<?php }
				} ?>
			</div>
		</div>

		<div id="lecturers" class="tabcontent-1">
			<div class="div-img-galeri">
				<?php foreach ($entry->getCards() as $card) { ?>
					<?php if ($card->getTitle() == 'Galeri Dosen') { ?>
						<?php foreach ($card->getImages() as $img) { ?>
							<div class="img-galeri">
								<a class="" href="<?= $img->getFile()->getUrl(); ?>">
									<img src="<?= $img->getFile()->getUrl(); ?>" />
								</a>
							</div>
						<?php }
					}
				} ?>
			</div>
		</div>

		<div id="students" class="tabcontent-1">
			<div class="div-img-galeri">
				<?php foreach ($entry->getCards() as $card) { ?>
					<?php if ($card->getTitle() == 'Galeri Mahasiswa') { ?>
						<?php foreach ($card->getImages() as $img) { ?>
							<div class="img-galeri">
								<a class="" href="<?= $img->getFile()->getUrl(); ?>">
									<img src="<?= $img->getFile()->getUrl(); ?>" />
								</a>
							</div>
						<?php }
					}
				} ?>
			</div>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="columns">
			<div class="column">
				<?= $entry->getDescription(); ?>
			</div>
		</div>
	</div>
</section>

<?php require_once 'includes/footer.php'; ?>