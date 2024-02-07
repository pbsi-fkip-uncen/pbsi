<?php
$params = $match['params'];
$slug = 'search';
$section = $slug;

function getPost($params)
{
	return isset($_GET[$params]) ? $_GET[$params] : '';
}
$keywords = $_GET['keywords'];


$query = new \Contentful\Delivery\Query;

$query->setContentType('page')
->where('fields.slug', $slug);
$entries = $client->getEntries($query);

$query = new \Contentful\Delivery\Query;
$query->setContentType('product')
->where('fields.title[match]', $keywords);
$products = $client->getEntries($query);

echo $keywords;

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



<section class="section">
	<div class="container">
		<div class="columns is-multiline is-mobile">
			<div class="">
				<h1 class="title is-centered ">Result</h1>
			</div>
		</div>

		<div class="columns is-multiline is-mobile">
			<?php foreach ($products as $product ) { ?>

			<div class="column is-4-tablet">
				<div class="card">
					<img src="<?= $product->getImages()[0]->getFile()->getUrl(); ?>" />
					<figure>
						
						<img src="<?= $product->getImages();?>" />

					</figure>
			<?php } ?>
	
		</div>
	</div>
</section>

<?php include('includes/footer.php');?>