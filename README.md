# MrColor #

![MrColor](https://raw.github.com/syholloway/mrcolor/7b9c9de839453581f9707752076cd3e4cd63a962/docs/logo.png)

MrColor is a color manipulation library for PHP.

Check the docs/example.php file and the wiki here https://github.com/syholloway/mrcolor/wiki to get some good knowledge proper good like.

The package requires PHP 5.3 and is PSR-0 and PSR-1 compliant, I have tried to stick to PSR-2, but can not guarantee it throughout.

Basic Functionality
-------------------

``` php
<?php

use SyHolloway\MrColor\Color;

//Create a new color object with the default value of black
$color = Color::create();

//Create a new color object setting the red, green and blue values
$color2 = Color::create(array(
			    'red' => 200,
			    'green' => 200,
			    'blue' => 100
			));
```

Using with composer
---------------------------------------------

If you want to use this package via composer you can add it to your applications composer.json file like this

``` json
"require" {
	"syholloway/mrcolor" : "0.*"
}
```

Now run a composer update command at the location of your applications composer.json file

Using without composer
---------------------------------------------

If you want to use this package without composer you can use the following 2 lines to start an autoloader thats has been configured for this package

``` php
<?php

use SyHolloway\MrColor\Color;

require_once('path/to/this/package/' . 'manual-init.php');
```
