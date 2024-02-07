<?php
	/* Contentful */
	$liveKey = '372ZNnFoThzM31NPlE_-1eFrBPFnXXdnmqZIq2woCdo';
	$previewKey = '1LZ5VHm1nA5ygL4UUBMeMoSTe3GhP6d8UErcdd5EvDg';
	$spaceID = 'au4ep6ta88v5';

	/* Calling the api */	
	$client = new \Contentful\Delivery\Client($liveKey, $spaceID, false);

	define('PAGES_TYPE', 'page'); 

	// markdown
	$parser = new \cebe\markdown\Markdown();
?>