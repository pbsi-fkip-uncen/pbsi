<?php
	global $setting;
	$company = 'Pendidikan Bahasa dan Sastra Indonesia';

	$query = new \Contentful\Delivery\Query;
	$query->setContentType('settings')
				->where('fields.prodiName', $company);
	$entries = $client->getEntries($query);

	if ($entries->getTotal() > 0) {
		 $setting = $entries[0];
	}
?>