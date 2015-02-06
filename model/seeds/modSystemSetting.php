<?php
/*-----------------------------------------------------------------
 * Lexicon keys for System Settings follows this format:
 * Name: setting_ + $key
 * Description: setting_ + $key + _desc
 -----------------------------------------------------------------*/
return array(
        array(
            'key'  		=>     'slacknotify.webHookUrl',
    		'value'		=>     '',
    		'xtype'		=>     'textfield',
    		'namespace' => 'slacknotify',
    		'area' 		=> 'slacknotify:default'
        ),
        array(
            'key'       =>     'slacknotify.channel',
            'value'     =>     '#dev-ops',
            'xtype'     =>     'textfield',
            'namespace' => 'slacknotify',
            'area'      => 'slacknotify:default'
        ),
        array(
            'key'       =>     'slacknotify.username',
            'value'     =>     'modx-bot',
            'xtype'     =>     'textfield',
            'namespace' => 'slacknotify',
            'area'      => 'slacknotify:default'
        ),
);
/*EOF*/