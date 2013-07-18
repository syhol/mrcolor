<?php

// get file directory locations
$mc = __DIR__ . '/src/SyHolloway/MrColor/';
$ex = $mc . 'Extension/';
$fm = $mc . 'Format/';

// include all classes
include($mc . 'Color.php');
include($mc . 'Extension.php');
include($mc . 'Format.php');
include($mc . 'ExtensionCollection.php');
include($mc . 'FormatCollection.php');
include($ex . 'Test.php');
include($ex . 'Toolkit.php');
include($ex . 'Formatter.php');
include($fm . 'Rgb.php');
include($fm . 'Hsl.php');
