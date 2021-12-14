![](https://www.sms77.io/wp-content/uploads/2019/07/sms77-Logo-400x79.png "sms77 Logo")

# sms77 plugin for Kanboard

Adds sms77 provider for sending text messages (SMS) instead of the default TOTP system.

## Prerequisites

- An API key from [sms77](https://www.sms77.io) which you can create in
  your [developer dashboard](https://app.sms77.io/developer)
- [Kanboard](https://kanboard.org/) installation (tested with 1.2.x)
- PHP 7.2+

## Installation

### Via FTP

Download
the [latest release](https://github.com/sms77io/kanboard/releases/latest/download/sms77-kanboard-latest.zip)
and extract the archive to `/path/to/kanboard/plugins/`.

### Via git

- `cd /var/www/html/plugins`
- `git clone https://github.com/sms77io/kanboard Sms77`

**Attention:** The plugin folder is *case-sensitive*.

## Setup

1. Open up your Kanboard administration
2. Go to **Settings -> Integrations -> sms77**
3. **API Key:** Enter your sms77 API Key
4. **Sender Identifier:** Optionally enter a sender identifier being displayed as the SMS
   sender - max. 11 alphanumeric or 16 numeric characters, country specific restrictions
   may apply

See the example [screenshot](_screenshots/configuration.png).

## Usage

### Set User Phone Number

1. Go to your user profile
2. Go to **Actions -> Integrations -> sms77**
3. Enter your mobile phone number in the field **Phone Number** and click **Save**

See the example [screenshot](_screenshots/edit_user.png).

### Enable Two-Factor Authentication

1. Go to the user profile
2. Go to **Actions -> Two factor authentication** and click **Enable two-factor
   authentication**
3. Enter the code sent to your phone device in the field named **Code** and click **Check
   my code**

See the example screenshots [before validation](_screenshots/2fa_before_validation.png),
[awaiting validation](_screenshots/2fa_awaiting_validation.png)
and [after validation](_screenshots/2fa_after_validation.png).

## Support

Need help? Feel free to [contact us](https://www.sms77.io/en/company/contact/).

[![MIT](https://img.shields.io/badge/License-MIT-teal.svg)](LICENSE)
