<p align="center">
  <img src="https://www.seven.io/wp-content/uploads/Logo.svg" width="250" alt="seven logo" />
</p>

<h1 align="center">seven 2FA for Kanboard</h1>

<p align="center">
  Replace the default TOTP-based two-factor authentication in <a href="https://kanboard.org/">Kanboard</a> with SMS one-time codes via the seven gateway.
</p>

<p align="center">
  <a href="LICENSE"><img src="https://img.shields.io/badge/License-MIT-teal.svg" alt="MIT License" /></a>
  <img src="https://img.shields.io/badge/Kanboard-1.2%2B-blue" alt="Kanboard 1.2+" />
  <img src="https://img.shields.io/badge/PHP-7.2%2B-purple" alt="PHP 7.2+" />
</p>

---

## Features

- **SMS-Based 2FA** - Replace TOTP with one-time codes delivered via SMS
- **Per-User Phone Number** - Each user manages their own mobile number from their profile
- **Custom Sender ID** - Up to 11 alphanumeric or 16 numeric characters

## Prerequisites

- A [Kanboard](https://kanboard.org/) 1.2.x installation
- PHP 7.2+
- A [seven account](https://www.seven.io/) with API key ([How to get your API key](https://help.seven.io/en/developer/where-do-i-find-my-api-key))

## Installation

### Via release

Download the [latest release](https://github.com/seven-io/kanboard/releases/latest/download/seven-kanboard-latest.zip) and extract it into `/path/to/kanboard/plugins/`.

### Via git

```bash
cd /var/www/html/plugins
git clone https://github.com/seven-io/kanboard Seven
```

> **Heads up:** The plugin folder name is *case-sensitive* and must be `Seven`.

## Configuration

1. Open the Kanboard admin.
2. Go to **Settings > Integrations > seven**.
3. Fill in:

| Field | Description |
|-------|-------------|
| API Key | Your seven API key |
| Sender Identifier | Optional. Up to 11 alphanumeric or 16 numeric characters |

See [`_screenshots/configuration.png`](_screenshots/configuration.png) for a reference screenshot.

## Usage

### Set the user's phone number

1. Open the user profile.
2. Go to **Actions > Integrations > seven**.
3. Type the mobile number into **Phone Number** and click **Save**.

See [`_screenshots/edit_user.png`](_screenshots/edit_user.png).

### Enable two-factor authentication

1. Open the user profile.
2. Go to **Actions > Two-factor authentication** and click **Enable two-factor authentication**.
3. Type the code received via SMS into **Code** and click **Check my code**.

Reference screenshots: [before validation](_screenshots/2fa_before_validation.png), [awaiting validation](_screenshots/2fa_awaiting_validation.png), [after validation](_screenshots/2fa_after_validation.png).

## Support

Need help? Feel free to [contact us](https://www.seven.io/en/company/contact/) or [open an issue](https://github.com/seven-io/kanboard/issues).

## License

[MIT](LICENSE)
