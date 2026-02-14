# Mattermost notifications channel for Laravel

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![StyleCI](https://styleci.io/repos/925234502/shield)](https://styleci.io/repos/925234502)

## Contents

- [What is Mattermost?](#what-is-mattermost)
- [Installation](#installation)
    - [Setting up the Mattermost service](#setting-up-the-mattermost-service)
- [Usage](#usage)
    - [Available Message Methods](#available-message-methods)
- [Changelog](#changelog)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## What is Mattermost?
Mattermost is an open-source, self-hostable online chat service with file sharing,
search, and third party application integrations.
It is designed as an internal chat for organizations and companies,
and mostly markets itself as an open-source alternative to Slack and Microsoft Teams.
For more information visit [Mattermost Website](https://mattermost.com/).

## Installation

You can install the package via composer:

``` bash
composer require laravel-notification-channels/mattermost
```

### Setting up the Mattermost service

Add your Mattermost config to your `config/services.php`:

```php
// config/services.php
...
'mattermost' => [
    'token' => env('MATTERMOST_TOKEN'),
    'server_url' => env('MATTERMOST_SERVER_URL'),
    'channel_id' => env('MATTERMOST_CHANNEL_ID'),
],
...
```


## Usage

Now you can use the channel in your `via()` method inside the notification:

``` php
use NotificationChannels\Mattermost\MattremostChannel;
use NotificationChannels\Mattermost\MattremostMessage;
use Illuminate\Notifications\Notification;

class ProjectCreated extends Notification
{
    public function via($notifiable)
    {
        return [MattremostChannel::class];
    }

    public function toMattermost($notifiable)
    {
        return MattremostMessage::create("Some Text")
            ->headingLevel1("Heading 1")
            ->boldText("This text is bold")
            ->italidText("This text is italic", false);
    }
}
```


### Available Message Methods

- `headingLevel1('')`
- `headingLevel2('')`
- `headingLevel3('')`
- `headingLevel4('')`
- `headingLevel5('')`
- `headingLevel6('')`
- `text('')`
- `boldText('')`
- `italicText('')`


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email faizan.amin@media-xpertz.com instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Faizan Amin](https://github.com/faakher)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
