![](https://www.seven.io/wp-content/uploads/Logo.svg "seven Logo")

# seven plugin for Kanboard

Adds seven provider for sending text messages (SMS) instead of the default TOTP system.

## Prerequisites

- An [API key](https://help.seven.io/en/api-key-access) from [seven](https://www.seven.io)
- [Kanboard](https://kanboard.org/) installation (tested with 1.2.x)
- PHP 7.2+

## Installation

### Via FTP

Download
the [latest release](https://github.com/seven-io/kanboard/releases/latest/download/seven-kanboard-latest.zip)
and extract the archive to `/path/to/kanboard/plugins/`.

### Via git

- `cd /var/www/html/plugins`
- `git clone https://github.com/seven-io/kanboard Seven`

**Attention:** The plugin folder is *case-sensitive*.

## Setup

1. Open up your Kanboard administration
2. Go to **Settings -> Integrations -> seven**
3. **API Key:** Enter your seven API Key
4. **Sender Identifier:** Optionally enter a sender identifier being displayed as the SMS
   sender - max. 11 alphanumeric or 16 numeric characters, country specific restrictions
   may apply

See the example [screenshot](_screenshots/configuration.png).

## Usage

### Set User Phone Number

1. Go to your user profile
2. Go to **Actions -> Integrations -> seven**
3. Enter your mobile phone number in the field **Phone Number** and click **Save**

See the example [screenshot](_screenshots/edit_user.png).

### Enable Two-Factor Authentication

1. Go to the user profile
2. Go to **Actions -> Two-factor authentication** and click **Enable two-factor
   authentication**
3. Enter the code sent to your phone device in the field named **Code** and click **Check
   my code**

See the example screenshots [before validation](_screenshots/2fa_before_validation.png),
[awaiting validation](_screenshots/2fa_awaiting_validation.png)
and [after validation](_screenshots/2fa_after_validation.png).

## Support

Need help? Feel free to [contact us](https://www.seven.io/en/company/contact/).

[![MIT](https://img.shields.io/badge/License-MIT-teal.svg)](LICENSE)
