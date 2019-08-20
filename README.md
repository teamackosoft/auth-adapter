
### Installation

This package is specially for lumen micro auth service client app.

```sh
$ composer require ackosoft/auth-adapter
```

Create config folder in your root directory. then add the following code into config/auth.php

```php
<?php
return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    'guards' => [
        'api' => [
            'driver' => 'passport',
            'provider' => 'users'
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \App\User::class
        ]
    ],
    'auth_connection'=>'mysql2'
];

```
Add service provider into bootstrap/app.php file
```php
$app->register(\Ackosoft\AuthAdapter\AppServiceProvider::class);
$app->configure('auth');
```
Add the following middleware in bootstrap/app.php file
```php
$app->routeMiddleware([
     'auth' => \Ackosoft\AuthAdapter\Middleware\AuthMiddleware::class,
 ]);
 
```

### Todos

 - Add more features

License
----

MIT
