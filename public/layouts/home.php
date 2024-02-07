<?php
$slug = 'home';
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

// print_r($entry);

?>


<?php require_once 'includes/header.php'; ?>

<?php 
	global $blocks; $blocks = $entry->getBlocks();
	// print_r($blocks);
	require_once 'partials/_blocks.php'; 
?>


<?php require_once 'includes/footer.php'; ?>