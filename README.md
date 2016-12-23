# LaraGit
A Laravel interface for managing Github notifications.

## Introduction:

LaraGit was created as a personal project for learning Laravel, PHP and the Github API. This means that, when I started it, I didn't know anything about Laravel. They're probably lot's of things to improve, and I'm still learning. If you find one, please [open an issue](https://github.com/m1guelpf/github/issues/new) or [make a pull request](https://github.com/m1guelpf/github/pulls/compare).

## Features:

- Multi-user support: You can add all the users you want. In fact, anyone with a Github account can use it if you expose it on the internet!
- Uses Github Style: LaraGit uses [PrimeCSS](http://primercss.io/) and [Octicons](https://octicons.github.com) for having a github-like style!
- Caching: LaraGit uses notification caching to reduce load time and provide you an awesome experience!
- More coming soon: LaraGit is under active developement so, if you want to help or have ideas, go ahead and Contribute!

## Requirements:

- PHP >= 5.6.4
- Composer
- MySQL
- MySQL PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Installation:

1. Clone or download this repo to somewhere on your server.
2. Rename .env.example to .env and fill the database settings.
3. Run ```composer install```, ```php artisan key:generate``` and ```php artisan migrate```.
4. [Create a Github OAuth app](https://github.com/settings/applications/new) using ```[YOUR_URL]/callback``` as the **Authorization callback URL** and add them to ```config/eloquent-oauth.php```. As this is complex, you can use ours instead.
5. Enjoy!

## Credits:

- [PHP](https://php.net) - For his awesome work on developing PHP.
- [MySQL](https://mysql.com) - For that awesome DB software.
- [Laravel](https://laravel.com) - For this awesome framework.
- [Github](https://github.com) - For his [API](https://developers.github.com/v3) and the awesome people at [Github Support](https://github.com/contact).
- [KNP Labs](https://knplabs.com) - For his awesome [php-github-api](https://github.com/KnpLabs/php-github-api).
- [Graham Campbell](https://gjcampbell.co.uk/) - For his awesome [Laravel Github](https://github.com/GrahamCampbell/Laravel-GitHub).
