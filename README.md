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

// Create a new color object with the default value of black
$color = Color::create();

// Create a new color object setting the red, green and blue values
$color2 = Color::create(array(
    'red' => 200,
    'green' => 200,
    'blue' => 100
));
```

Now you have your MrColor object you can read and write to color formats as if they were properties.

``` php
<?php

use SyHolloway\MrColor\Color;

// Create a new color object setting the hue, saturation and lightness values
$color = Color::create(array(
    'hue' => 200,
    'saturation' => 0.5,
    'lightness' => 0.9
));

// The object was built with hsl, but format conversion happens on the fly
echo 'Hue = ' . $color->hue;
echo 'Red = ' . $color->red;
echo 'Hex = #' . $color->hex;

// Feel free to edit these properties...
$color->blue = 123; // Set blue to 123 on the 0-255 scale
$color->green -= 20; // 20 less green on the 0-255 scale
$color->lightness += 0.23; // 23% lighter

// ...And expect the update to happen across all formats
echo $color->hue;
```

Now you can use extensions (methods attached to the object) to perform some powerful operations the object.

``` php
<?php

use SyHolloway\MrColor\Color;

// Create a new color object setting the red value
$red = Color::create(array(
    'red' => 200
));

// Create another color object setting the blue value
$blue = Color::create(array(
    'blue' => 200
));

// Lighten the red by 8%
$red->lighten(8);

// Darken the blue by 12%
$blue->darken(12);

// Using the merge function on its own would alter the object it was used on.
	// So first we will clone one of the colors
	$copyOfBlue = $blue->copy();

	// We can now merge the copy of blue with red to make purple
	$copyOfBlue->merge($red);
	$purple = $copyOfBlue;

// This could all be alot tidier if we do some method chaining, because merge() both alters the object and returns it
$purple = $blue->copy()->merge($red);

// Now if we want to get the complementry color to purple we can do so using the getComplementary() method.
$yellowyGreen = $purple->getComplementary();
```

Just remember if you are using an extension that alters and returns a color object, and you want the object you are useing to remain unchanged, use the copy() method like I did on the example above to create a clone of the object first. If I didnt copy() $blue before I merged it, then ($blue === $purple).

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
