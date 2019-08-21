
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
    'auth_connection'=>env('AUTH_DB_CONNECTION','mysql')
];

```
If you use seperate mysql connection for Passport Authentication so you can do it by chaning env variable. Example:
```php
AUTH_DB_CONNECTION=mysql2
``` 

Modify bootstrap/app.php file for enabling the package
```php
// Enable Facades
$app->withFacades();

// Enable Eloquent
$app->withEloquent();

$app->register(Laravel\Passport\PassportServiceProvider::class);
$app->register(\Ackosoft\AuthAdapter\AppServiceProvider::class);
$app->routeMiddleware([
     'auth' => \Ackosoft\AuthAdapter\Middleware\AuthMiddleware::class,
 ]);

$app->configure('auth'); //Add this line if not working properly
```

Make sure your user model uses Passport's HasApiTokens trait, eg.:
```php
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use HasApiTokens, Authenticatable, Authorizable;

    /* rest of the model */
}
 
```
If you use seprate database for authentication so add the connection in User model
```php
    protected $connection = 'mysql2'; 
```

### Todos

 - Add more features

License
----

MIT
