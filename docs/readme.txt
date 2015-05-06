Slack Notify

This is a simple MODX snippet for the Slack json api

System settings
- `slacknotify.webHookUrl`: The slack webhook to send data to, you can generate a webhook here: http://slack.com/services/new/incoming-webhook
- `slacknotify.channel`: The default channel to post messages to (regular channels start with a `#` you can also send as personal messages by setting this to `@your-user-name`)
  - Default: `#dev-ops`
- `slacknotify.username`: The username to post messages as (this user doesn't need to exist)
  - Default: `modx-bot`

Snippet args
- `text`: Message to post to Slack
- `channel`: Channel to post message to, overrides `slacknotify.channel`
- `botname`: Username to post meassage as, overrides `slacknotify.username`
- `color`: Colour to use as highlight colour beside attachments
- `fields` (json array of objects): Attachments/extra content
  - Json array of the format: `[{"title":"attachment title", "value": "attachment value", "short": false},...]`
    - `title`: Heading for attachment
    - `value`: Content of attachment
    - `short` (boolean, defaults to false): Display as 50% width (true), or 100% width (false)


Usage

Basic usage using the system defaults for channel and username

 [[!SlackNotify? &text=`This is a sample message`]]


Example with channel and username override.

  [[!SlackNotify? 
  &channel=`#general`
  &username=`modx-bot`
    &text=`This is a sample message`
    ]]

Example with attachments

  [[!SlackNotify? 
    &text=`*Error report for: abc.com*` 
    &color=`#d00000` 
    &fields=`[
      {"title":"email_address","value":"abc@123.com","short":true},
      {"title":"name","value":"Test Name","short":true},
      {"title":"URL","value":"[[~[[*id]]? &scheme=`full`]]","short":false}
      ]`
    ]]

Author: Jason Carney <jason@dashmedia.com.au>

Offical documentation and bugs: https://github.com/DashMedia/SlackNotify