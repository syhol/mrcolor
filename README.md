# MrColor #

MrColor is a color manipulation library for PHP.

The library will soon be available on packagist/composer

Basic Functionality
-------------------

``` php
<?php

//Create a new color object with the default value of black
$color 	= 	Color::create();

//Create a new color object setting the red, green and blue values
$color2 = Color::create(array(
			    'red' => 200,
			    'green' => 200,
			    'blue' => 100
			));
```