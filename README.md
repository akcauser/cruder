<h1 align="center">CRUDER</h1>


This package allows you to create API and perform CRUD Scaffolding. It helps you avoid repetition while typing your codes and saves time.

# Installation

1- Include the package in your project with the command:

`composer require encodeurs/cruder`

2- Publish Vendor

php artisan vendor:publish

3- Add this lines to providers array in app.php

Encodeurs\Cruder\CruderServiceProvider::class,
App\Providers\BusinessServiceProvider::class,
App\Providers\DataServiceProvider::class,
        
# Usage

When create new API with command line:
`php artisan cruder:new {MODEL_NAME}`

Also you can use the builder interface:
- https://your-domain-address/builder

Then you will be able to see your APIs:
- https://your-domain-address/cruder


# Contributors

<a href="https://github.com/akcauser">
 <img src="https://avatars.githubusercontent.com/u/26525468?v=4" width="64" height="64">
</a>

<a href="https://github.com/mrvyldr">
 <img src="https://avatars.githubusercontent.com/u/46646075" width="64" height="64">
</a>

