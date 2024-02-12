<?php
$params = $match['params'];
$slug = $params['slug'];
$section = 'artikel';

$query = new \Contentful\Delivery\Query;
$query->setContentType('pages')
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
			<?php if ($slug == 'profil-dosen') { ?>
				<?php
				$query = new \Contentful\Delivery\Query;
				$query->setContentType('profiles')
					->where('fields.isLecturer', true)
					->where('fields.isActive', true);
				$lecturers = $client->getEntries($query);

				foreach ($lecturers as $lecturer) {
					?>
					<div class="column is-4-tablet is-full-mobile" style="padding: 2rem;">
						<a class="txt-black" href="profil-dosen/<?= $lecturer->getSlug(); ?>" target="_blank">
							<div class="image mb-2r">
								<?php $src = 'assets/img/placeholder.webp';
								if ($lecturer->getThumbnail() != null) {
									$src = $lecturer->getThumbnail()->getFile()->getUrl();
								} ?>
								<img src="<?= $src; ?>" />
							</div>
							<p class="title is-4 mt-2r">
								<?= $lecturer->getName(); ?>
							</p>
							<div class="columns is-multiline is-mobile intro" style="margin:0;">
								<div class="column is-4-tablet is-11-mobile" style="padding: 0;">
									<p>Mata Kuliah</p>
								</div>
								<div class="column is-1-tablet is-1-mobile" style="padding: 0;">
									<p>:</p>
								</div>
								<div class="column is-offset-1 is-12" style="padding: 0;">
									<p>
										<?php $subject = '';
										if ($lecturer->getSubjects() != null) {
											$subject = $lecturer->getSubjects()[0]->getTitle();
										} ?>
										<?= $parser->parse($subject); ?>
									</p>
								</div>
							</div>
							<div class="columns is-multiline is-mobile intro" style="margin:0;">
								<div class="column is-4-tablet is-11-mobile" style="padding: 0;">
									<p>Email</p>
								</div>
								<div class="column is-1-tablet is-11-mobile" style="padding: 0;">
									<p>:</p>
								</div>
								<div class="column is-offset-1 is-11" style="padding: 0;">
									<p>
										<?php $email = '';
										if ($lecturer->getEmail() != null) {
											$email = $lecturer->getEmail();
										} ?>
										<?= $parser->parse($email); ?>
									</p>
								</div>
							</div>
						</a>
					</div>
				<?php }
			} else { ?>
				<div class="column">
					<div class="image2 mb-3r">
						<?php $src = 'assets/img/placeholder.webp';
						if ($entry->getThumbnail() != null) {
							$src = $entry->getThumbnail()->getFile()->getUrl();
						} ?>
						<img src="<?= $src; ?>" />
					</div>
					<h2 class="title is-3 mt-3r">
						<?= $entry->getTitle(); ?>
					</h2>
					<div class="intro">
						<p>
							<?= $parser->parse($entry->getIntroduction()); ?>
						</p>
					</div>
					<div class="intro">
						<p>
							<?= $parser->parse($entry->getDescription()); ?>
						</p>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>




<?php include('includes/footer.php'); ?>