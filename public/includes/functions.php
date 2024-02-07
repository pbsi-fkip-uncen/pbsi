<?php
	
	function truncate($text, $chars = 80) {		
		echo mb_strimwidth($text, 0, $chars, "...");
	}

	function _404() {
    require_once '404.php';
    // require_once 'includes/footer.php';
    exit();		
	}

	function setMetaTags($entry) {
		if ($entry->getMetaTitle() != null) { 
			global $metaTitle; $metaTitle = $entry->getMetaTitle(); 
		}
		
		if ($entry->getMetaDescription() != null) { 
			global $metaDescription; $metaDescription = $entry->getMetaDescription(); 
		}
		
//		if ($entry->getMetaKeywords() != null) { 
//			global $metaKeywords; $metaKeywords = $entry->getMetaKeywords(); 
//		}
	}

	function getImage($image, $class = '', $massive = 0, $large = 1440, $medium = 780, $small = 320) {
		$imageSize = new \Contentful\File\ImageOptions;

		// smallest size first
		$imageSize->setWidth($small);
		$src = $image->getFile()->getUrl($imageSize);

		$imageSize->setWidth($medium);
		$srcset = $image->getFile()->getUrl($imageSize) . ' ' . $medium . 'w';

		$imageSize->setWidth($large);
		$srcset .= ', ' . $image->getFile()->getUrl($imageSize) . ' ' . $large . 'w';

		if ($massive > 0) {
			$imageSize->setWidth($massive);
			$srcset .= ', ' . $image->getFile()->getUrl($imageSize) . ' ' . $massive . 'w';
		}
	?>
		
		<img<?php echo $class != '' ? ' class="' . $class . '"' : ''; ?> src="<?php echo $src; ?>" srcset="<?php echo $srcset; ?>"  />
		
	<?php
	}

?>