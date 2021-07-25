Laravel Trello
======

[![Latest Stable Version](https://poser.pugx.org/presttec/laravel-trello/v/stable)](https://packagist.org/packages/presttec/laravel-trello)
[![Total Downloads](https://poser.pugx.org/presttec/laravel-trello/downloads)](https://packagist.org/packages/presttec/laravel-trello)
[![License](https://poser.pugx.org/presttec/laravel-trello/license)](https://packagist.org/packages/presttec/laravel-trello)

An interface for interaction with the Trello API in Laravel.

## Installation

Install the package through [Composer](http://getcomposer.org/). Run the Composer require command from the Terminal:

```bash
composer require presttec/laravel-trello
```

Package will be installed automaticlly through composer package discovery. If not, then you need to register 
the `PrestTEC\Trello\TrelloService` service provider in your config/app.php.

Optionally, you can add the alias if you prefer to use the Facade

```php
'Trello' => PrestTEC\Trello\Facades\Trello::class
```

## Configuration

To get started, you'll need to publish all vendor assets.

```bash
php artisan vendor:publish --provider=PrestTEC\Trello\TrelloServiceProvider
```

Then open `config\trello.php` to fill your Trello api credentials in

Now you can use the Trello API in your Laravel project.

### Lumen

Copy the config file from the package to your projects config directory:

```bash
cp vendor/presttec/laravel-trello/config/trello.php config/trello.php
```

Then open `config\trello.php` to fill your Trello api credentials in.

To finish this, register the config file and the service provider in `bootstrap/app.php`:

```php
$app->configure('trello');
$app->register(PrestTEC\Trello\TrelloServiceProvider::class);
```

Now you can use the Trello API in your Lumen project.

## Basic Usage

You can call your Trello API directly by calling the `\Trello::{TrelloAPIFUNCTION}` facade.

If you prefer dependency injection, you can inject the manager like this:

```php
use PrestTEC\Trello\TrelloManager;

class TrelloController extends Controller
{
    private $trelloManager;

    public function __construct(TrelloManager $trelloManager)
    {
        $this->trelloManager = $trelloManager;
    }

    public function index()
    {
        $this->trelloManager->execute('GetInvoice', ['invoiceid' => '1337']);
    }
}
```
**Hint**: The execute command will also support your self-created Trello api commands.


## Support

[Please open an issue in trello](https://trello.com/presttec/laravel-trello/issues)

## License

This package is released under the MIT License. See the bundled
[LICENSE](https://trello.com/presttec/laravel-trello/blob/master/LICENSE.md) file for details.
