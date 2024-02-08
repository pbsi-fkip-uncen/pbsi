<?php
$slug = 'kemahasiswaan';
$section = $slug;

$query = new \Contentful\Delivery\Query;
$query->setContentType('pages')
 ->where('fields.slug', $slug);
$entries = $client->getEntries($query);

if ($entries->getTotal() < 1) {
 _404();
}

$entry = $entries[0];
// setMetaTags($entry);


?>

<?php include('includes/header.php'); ?>

<div id="introduction" class="container">
 <div class="center mt-3r">
  <div class="wrapper">
   <h1 class="big-title big-title-left big-title-blue mb-5">Kemahasiswaan</h1>
  </div>
 </div>
</div>

<section class="section">
 <div class="container">
  <div class="columns is-multiline is-mobile">
   <?php
   if (count($entry->getSubpages()) < 1) {
    ?>
    <div class="column">
     <div class="image2">
      <?php $src = 'assets/img/placeholder.webp';
      if ($entry->getThumbnail() != null) {
       $src = $entry->getThumbnail()->getFile()->getUrl();
      } ?>
      <img src="<?= $src; ?>" />
     </div>
     <h2 class="title is-3">
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
    <?php
   } else {
    $i = 0;
    foreach ($entry->getSubpages() as $subpages) {
     $position = 'big-title-left2';
     if ($i % 2 == 0) {
      $position = 'big-title-right2';
     } ?>
     <div class="title_news_home big-title <?= $position ?> big-title-blue">
      <?= $subpages->getTitle(); ?>
     </div>
     <div class="columns" style="<?= $i % 2 == 0 ? '' : 'flex-direction: row-reverse;' ?>">
      <?php // $display1 = 'block'; $display2 = 'none'; if($i%2 == 0 ) { $display1 = 'none'; $display2 = 'block'; } ?>
      <div class="column is-6-tablet is-full-mobile">
       <?php $src = 'assets/img/placeholder.webp';
       if ($subpages->getThumbnail() != null) {
        $src = $subpages->getThumbnail()->getFile()->getUrl();
       } ?>
       <img src="<?= $src; ?>" />
      </div>
      <div class="column is-6-tablet is-full-mobile">
       <div class="">
        <p><span>
          <?= $subpages->getIntroduction(); ?>
         </span></p>
       </div>
       <div>
        <a href="<?= $entry->getSlug() ?>/<?= $subpages->getSlug(); ?>">Lihat Selengkapnya</a>
       </div>
      </div>
     </div>
     <?php $i++;
    }
   } ?>
  </div>
 </div>
</section>

<?php include('includes/footer.php'); ?>