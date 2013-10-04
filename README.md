# MrColor #

![MrColor](http://hollowaydesign.com/mrcolor/MrColor.jpg)

MrColor is a color manipulation library for PHP.

Check the docs/example.php file and the wiki here https://github.com/syholloway/mrcolor/wiki to get some good knowledge  

The library will soon be available on packagist/composer

Basic Functionality
-------------------

``` php
<?php

//Create a new color object with the default value of black
$color = Color::create();

//Create a new color object setting the red, green and blue values
$color2 = Color::create(array(
			    'red' => 200,
			    'green' => 200,
			    'blue' => 100
			));
```

Using outside composer and a PSR-0 autoloader
---------------------------------------------

if you want to use this package without composer and a PSR-0 autoloader you can use the following 2 lines of code to set up the classes ready to be used

``` php
<?php

use SyHolloway\MrColor\Color;

require_once('path/to/this/package/' . 'manual-init.php');
```
