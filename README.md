#Slack Notify

On install, please add a webhooks url and set some defaults in the slacknotify section of your system settings

channel and username are also set in system settings, but can be overridden in the snippet call

##Usage

###Example with text and channel and username override.

```
  [[!SlackNotify? 
 	&channel=`#general`
 	&username=`modx-bot`
  	&text=`*Error report for: abc.com*`
  	]]
```

###Example with attachments

```
  [[!SlackNotify? 
 	&channel=`#general`
 	&username=`modx-bot`
  	&text=`*Error report for: abc.com*` 
  	&color=`#d00000` 
  	&fields=`[
  		{"title":"email_address","value":"abc@123.com","short":true},
  		{"title":"name","value":"Test Name","short":true},
  		{"title":"URL","value":"https://extras.modxau.local","short":false}
  		]`
  	]]
```

Author: Jason Carney <jason@dashmedia.com.au>