# Slim Facades

## Introduction

SlimFacades is a package to provide facades for 
[Slim PHP framework](https://www.slimframework.com). This package is based on [slim-facdes](https://github.com/zhshize/slim-facades) by @zhangshize.

Facades is a noun from [Laravel](https://laravel.com)(also a PHP Framework).  Facades provide a
 "static" interface to classes that are available in the application's service 
 container.
 
Laravel facades serve as "static proxies" to underlying classes in the service 
container, providing the benefit of a terse, expressive syntax while maintaining
more testability and flexibility than traditional static methods, so does 
Slim-Facades.

## Requirement

+ PHP >= 7.2
+ Slim >= 4.0

## Installation

Using [composer](https://getcomposer.org/):<br>
`composer require alitalaghat/slim-facades`

## Usage

After the installation, you can update your code like this:

```php
    //... Something not important ...
    use SlimFacades\Facade;
    use SlimFacades\Route;
    use SlimFacades\App;
    
    // Create Container using PHP-DI
    $container = new Container();

    // Set container to create App with on AppFactory
    AppFactory::setContainer($container);
    
    $app = AppFactory::create();
    // initialize the Facade class
    Facade::setFacadeApplication($app);
    
    Route::get('/', function (Request $req, Response $res) {
        $res->getBody()->write("Hello");
        return $res;
    });
    
    App::run();
```

## Default Facades

The following facades are provided by Slim-Facades:

### App

Use it just like using $app!

```php
    App::run();
```

### Container

Use it just like using $container!

```php
    Container::has('view');
```

### Route

```php
    Route::get('/', function (Request $req, Response $res) {
        $res->getBody()->write("Hello");
        return $res;
    });
```

## Custom Facades

The code for creating a custom facades for a service in the container is the 
following:

```php
using SlimFacades\Facade;
class CustomFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        //Change 'serviceName' to you want.
        return 'serviceName';
    }
}
```

The code for creating a custom facades for an instance is the following:

```php
using SlimFacades\Facade;
class CustomFacade extends Facade
{
    public static function self()
    {
        //Change the returned value to you want.
        return self::$app->getContainer()->get('myservice');
    }
}
```

## Licence

[Apache License Version 2.0.](LICENSE)
