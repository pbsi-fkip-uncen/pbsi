<?php
$params = $match['params'];
$slug = $params['slug'];
$section = 'artikel';

$query = new \Contentful\Delivery\Query;
$query->setContentType('profiles')
 ->where('fields.isLecturer', true)
 ->where('fields.isActive', true);
$entries = $client->getEntries($query);

if ($entries->getTotal() < 1) {
 _404();
}

$entry;
$others = [];
foreach ($entries as $ent) {
 if ($ent->getSlug() == $slug) {
  $entry = $ent;
 } else {
  array_push($others, $ent);
 }
}
// $entry = $entries[0];

// if (!$entry->getMetaTitle()) {
//  $entry_title = $entry->getTitle();
//  $metaTitle = $entry_title . '  - PBSI -';

// }

// print_r($entry);
?>

<?php include('includes/header.php'); ?>

<section class="section">
 <div class="container">
  <div class="columns is-multiline is-mobile">
   <div class="column is-9-tablet is-full-mobile">
    <div class="image mb-3r">
     <?php $src = 'assets/img/placeholder.webp';
     if ($entry->getThumbnail() != null) {
      $src = $entry->getThumbnail()->getFile()->getUrl();
     } ?>
     <img src="<?= $src; ?>" />
    </div>
    <h2 class="title is-3 mt-3r">
     <?= $entry->getName(); ?>
    </h2>
    <div class="columns is-multiline is-mobile">
     <div class="column is-2-tablet is-11-mobile"><strong>Nomor Telepon</strong></div>
     <div class="column is-1-tablet is-1-mobile txt-center">:</div>
     <div class="column is-9-tablet is-full-mobile">
      <?= $entry->getPhone(); ?>
     </div>
     <div class="column is-2-tablet is-11-mobile"><strong>Pos Elektronik</strong></div>
     <div class="column is-1-tablet is-1-mobile txt-center">:</div>
     <div class="column is-9-tablet is-full-mobile">
      <a href="mailto:<?= $entry->getEmail(); ?>">
       <?= $entry->getEmail(); ?>
      </a>
     </div>
     <div class="column is-2-tablet is-11-mobile"><strong>Alamat</strong></div>
     <div class="column is-1-tablet is-1-mobile txt-center">:</div>
     <?php $addr = $entry->getAddress();
     if ($entry->getAddress() == null) {
      $addr = '';
     } ?>
     <div class="column is-9-tablet is-full-mobile">
      <?= $addr; ?>
     </div>
     <div class="column is-2-tablet is-11-mobile"><strong>Mata Kuliah</strong></div>
     <div class="column is-1-tablet is-1-mobile txt-center">:</div>
     <?php $sub0 = '';
     $csub = count($entry->getSubjects());
     if ($csub != 0) { ?>
      <?php if ($csub > 0) { ?>
       <?php foreach ($entry->getSubjects() as $key => $sub) { ?>
        <?php if ($key == 0) { ?>
         <div class="column is-9-tablet is-full-mobile">
          <?= $sub->getTitle(); ?>
         </div>
        <?php } else { ?>
         <div class="column is-offset-3-tablet is-9-tablet is-full-mobile">
          <?= $sub->getTitle(); ?>
         </div>
        <?php } ?>
       <?php }
      } ?>
      <?php
     } else { ?>
      <div class="column is-8-tablet is-full-mobile">
       <?= $sub0; ?>
      </div>
     <?php } ?>
    </div>
   </div>
   <div class="column is-3-tablet is-full-mobile">
    <h2 class="mb-1r ls-normal">Dosen Lainnya</h2>
    <?php foreach ($others as $kl => $lecturer) { ?>
     <?php if ($kl < 3) { ?>
      <div class="mb-1r">
       <a class="txt-black" href="profil-dosen/<?= $lecturer->getSlug(); ?>">
        <div class="image">
         <?php $src = 'assets/img/placeholder.webp';
         if ($lecturer->getThumbnail() != null) {
          $src = $lecturer->getThumbnail()->getFile()->getUrl();
         } ?>
         <img src="<?= $src; ?>" />
        </div>
        <div class="border-card" style="padding: 1rem;">
         <p class="title is-5 mb-1r">
          <?= $lecturer->getName(); ?>
         </p>
         <div class="columns is-multiline is-mobile intro" style="margin:0;">
          <div class="column is-12" style="padding: 0;">
           <p>Mata Kuliah : </p>
          </div>
          <div class="column is-offset-1 is-11" style="padding: 0;">
           <p>
            <?php $subject = '';
            if ($lecturer->getSubjects() != null) {
             $subject = $lecturer->getSubjects()[0]->getTitle();
            } ?>
            <?= $parser->parse($subject); ?>
           </p>
          </div>
         </div>
        </div>
       </a>
      </div>
     <?php }
    } ?>
   </div>
  </div>
 </div>
</section>




<?php include('includes/footer.php'); ?>