<?php

/*-----------------------------------------------------
| Bootstrap the MrColor library
|------------------------------------------------------
| If you are not using composer in your project you
| can require this file instead to include all the
| MrColor goodness that you would ever need.
*/
require("src/Contracts/Jsonable.php");
require("src/Color.php");
require("src/ColorFactory.php");
require("src/ColorDictionary.php");
require("src/Types/TypeInterface.php");
require("src/Types/ColorType.php");
require("src/Types/Hex.php");
require("src/Types/HSLA.php");
require("src/Types/RGBA.php");
require("src/Types/Transformers/TransformerInterface.php");
require("src/Types/Transformers/HexToRgb.php");
require("src/Types/Transformers/HslToRgb.php");
require("src/Types/Transformers/RgbToHex.php");
require("src/Types/Transformers/RgbToHsl.php");