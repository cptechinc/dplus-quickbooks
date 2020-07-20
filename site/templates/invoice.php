<?php
	use QuickBooksOnline\API\Facades\Invoice as InvoiceApi;
	header('Content-Type: application/json');
	$model = $modules->get('QuickBooksInvoiceModel');
	$order = $model->order('0004126200');
	$invoice = InvoiceApi::create($model->qb_invoice_array($order));
	$api = $modules->get('QuickBooksInvoiceApi');
	$api->connect();
	$result = $api->create($invoice);
	echo json_encode($result);