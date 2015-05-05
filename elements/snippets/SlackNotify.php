<?php
/**
 * @name SlackNotify
 * @description SlackNotify snippet for posting directly to Slack
 *
 * USAGE
 *
 *  [[!SlackNotify? 
 *  &channel=`#general`
 * 	&botname=`modx-bot`
 *  &text=`*Error report for: abc.com*` 
 *  &color=`#d00000` 
 *  &fields=`[
 *  	{"title":"email_address","value":"abc@123.com","short":true},
 *  	{"title":"name","value":"Test Name","short":true},
 *  	{"title":"URL","value":"https://extras.modxau.local","short":false}
 *  	]`
 *  ]]
 *
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

//Grab system settings
$webHookUrl = $modx->getOption('slacknotify.webHookUrl', null);
$channel = $modx->getOption('slacknotify.channel', null);
$username = $modx->getOption('slacknotify.username', null);

//Grab script properties settings
$text = $modx->getOption('text', $scriptProperties,'');
$color = $modx->getOption('color', $scriptProperties,'#D0000');
$fields = $modx->getOption('fields', $scriptProperties,null);

// Override system settings if set on scriptPorperties
$channel = $modx->getOption('channel', $scriptProperties, $channel);
$username = $modx->getOption('username', $scriptProperties, $username);

$payload = array(
	'username'=>$username,
	'channel'=>$channel,
	'text'=>$text
	);

if(!empty($fallback) && !empty($fields) && !empty($color)){
	//if we have all the required fields, add attachemnts

	$fieldsArray = json_decode($fields);
	$fallback = "";
	foreach ($fieldsArray as $key => $value) {
		$fallback .= $value->title . ": " . $value->value .', ';
	}
	$attachments = array(array(
		'fallback'=>$fallback,
		'color'=>$color,
		'fields'=> $fieldsArray
		));

	$payload['attachments'] = $attachments;
}

try {
	$client = new GuzzleHttp\Client();
    $request = $client->createRequest('POST', $webHookUrl);
    $postBody = $request->getBody();
    $postBody->setField('payload',json_encode($payload));
    $response = $client->send($request);
} catch (Exception $e) {
	$modx->log(MODX::LOG_LEVEL_ERROR, 'Error sending slack notification: Request='.$e->getRequest().' Response: '.$e->getResponse())
	$modx->log(MODX::LOG_LEVEL_ERROR, 'Slack Request: '.$e->getRequest());
	$modx->log(MODX::LOG_LEVEL_ERROR, 'Slack Response: '.$e->getResponse());
}