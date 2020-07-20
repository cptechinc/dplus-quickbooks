<?php
	use QuickBooksOnline\API\Facades\Customer as QbCustomer;
	header('Content-Type: application/json');
	$quickbooks = $modules->get('QuickBooksCustomer');
	$quickbooks->connect();
	//$result = $quickbooks->dplus->update('BECKER');
	//$result = $quickbooks->qb->qb_customer('10');
	//$result = $quickbooks->exists_id_qb('58');

	$result = $quickbooks->dplus->create_from_id('ABC123');
	echo json_encode($result);