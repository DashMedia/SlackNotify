<?php
/**
 * @name SlackNotify
 * @description Example Snippet
 *
 * USAGE
 *
 *  [[Example]]
 *
 * Always include an example!
 *
 * Copyright 2014 by You <you@email.com>
 * Created on 10-31-2014
 *
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package slacknotify
 */
// Your core_path will change depending on whether your code is running on your development environment
// or on a production environment (deployed via a Transport Package).  Make sure you follow the pattern
// outlined here. See https://github.com/craftsmancoding/repoman/wiki/Conventions for more info
$core_path = $modx->getOption('slacknotify.core_path', null, MODX_CORE_PATH.'components/slacknotify/');
include_once $core_path .'/vendor/autoload.php';
$webHookUrl = $modx->getOption('slacknotify.webHookUrl', null);
$channel = $modx->getOption('slacknotify.channel', null);
$username = $modx->getOption('slacknotify.username', null);
$payload = array(
	'username'=>$username,
	'channel'=>$channel,
	'text'=>'*Error report for: testsite.com*'
	);
$attachments = array(array(
	'fallback'=>'This is a fallback message',
	'color'=>'#D00000',
	'fields'=> array(
		array(
			'title'=>'email_address',
			'value'=>'abc@1q23.com',
			'short'=>true
			),
		array(
			'title'=>'name',
			'value'=>'John Smith',
			'short'=>true
			),
		array(
			'title'=>'phone',
			'value'=>'12345678',
			'short'=>true
			),
		array(
			'title'=>'url',
			'value'=>'testsite.com/page/enquire',
			'short'=>false
			)
		) 
	));
$payload['attachments'] = $attachments;
try {
	$client = new GuzzleHttp\Client();
    $request = $client->createRequest('POST', $webHookUrl);
    $postBody = $request->getBody();
    $postBody->setField('payload',json_encode($payload));
    $response = $client->send($request);
} catch (Exception $e) {
    echo '<p>'.$e->getRequest().'</p>';
    echo '<p>'.$e->getResponse().'</p>';
}

// $attachments = [];

// $attachment = {
// 	'fallback': 'Error message fallback text',
// 	'pretext' : 'This is pretext',
// 	'color': '#D00000',
// 	'fields': [
// 		'title':'Error',
// 		'value':'This is an error message'
// 	]
// };

// $attachments[] = $attachment;