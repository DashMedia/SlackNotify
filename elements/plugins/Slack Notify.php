<?php
/**
 * @name Slack Notify
 * @description This is an example plugin.  List the events it attaches to in the PluginEvents.
 * @PluginEvents OnManagerPageInit,OnDocFormPrerender,OnDocFormSave
 */

// Your core_path will change depending on whether your code is running on your development environment
// or on a production environment (deployed via a Transport Package).  Make sure you follow the pattern
// outlined here. See https://github.com/craftsmancoding/repoman/wiki/Conventions for more info
$core_path = $modx->getOption('slacknotify.core_path', null, MODX_CORE_PATH.'components/slacknotify/');
include_once $core_path .'vendor/autoload.php';

switch ($modx->event->name) {

    case 'OnManagerPageInit':
        // Do something
        break;

    case 'OnDocFormPrerender':
        // Do something
        break;

    case 'OnDocFormSave':
        // Do something
        break;
}