<?php
	$quickbooksAuth = $modules->get('QuickBooksAuthentication');
	$quickbooksAuth->import_token($page->fullURL);
	
	if ($session->returnto) {
		$url = $session->returnto;
		$session->remove('returnto');
		$session->redirect($url);
	}
