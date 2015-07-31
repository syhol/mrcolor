<?php

namespace MrColor;

/**
 * Class ColorDictionary
 * @package MrColor
 */
class ColorDictionary
{
    /**
     * Full array of named colors, their hex, RGB and HSL values
     * @var array
     */
    public static $colors = [
        "aliceblue" => ["hex" => "#F0F8FF", "rgb" => [240, 248, 255], "hsl" => [208, 100, 97]],
        "antiquewhite" => ["hex" => "#FAEBD7", "rgb" => [250, 235, 215], "hsl" => [34, 78, 91]],
        "aqua" => ["hex" => "#00FFFF", "rgb" => [0, 255, 255], "hsl" => [180, 100, 50]],
        "aquamarine" => ["hex" => "#7FFFD4", "rgb" => [127, 255, 212], "hsl" => [160, 100, 75]],
        "azure" => ["hex" => "#F0FFFF", "rgb" => [240, 255, 255], "hsl" => [180, 100, 97]],
        "beige" => ["hex" => "#F5F5DC", "rgb" => [245, 245, 220], "hsl" => [60, 56, 91]],
        "bisque" => ["hex" => "#FFE4C4", "rgb" => [255, 228, 196], "hsl" => [33, 100, 88]],
        "black" => ["hex" => "#000000", "rgb" => [0, 0, 0], "hsl" => [0, 0, 0]],
        "blanchedalmond" => ["hex" => "#FFEBCD", "rgb" => [255, 235, 205], "hsl" => [36, 100, 90]],
        "blue" => ["hex" => "#0000FF", "rgb" => [0, 0, 255], "hsl" => [240, 100, 50]],
        "blueviolet" => ["hex" => "#8A2BE2", "rgb" => [138, 43, 226], "hsl" => [271, 76, 53]],
        "brown" => ["hex" => "#A52A2A", "rgb" => [165, 42, 42], "hsl" => [0, 59, 41]],
        "burlywood" => ["hex" => "#DEB887", "rgb" => [222, 184, 135], "hsl" => [34, 57, 70]],
        "cadetblue" => ["hex" => "#5F9EA0", "rgb" => [95, 158, 160], "hsl" => [182, 25, 50]],
        "chartreuse" => ["hex" => "#7FFF00", "rgb" => [127, 255, 0], "hsl" => [90, 100, 50]],
        "chocolate" => ["hex" => "#D2691E", "rgb" => [210, 105, 30], "hsl" => [25, 75, 47]],
        "coral" => ["hex" => "#FF7F50", "rgb" => [255, 127, 80], "hsl" => [16, 100, 66]],
        "cornflowerblue" => ["hex" => "#6495ED", "rgb" => [100, 149, 237], "hsl" => [219, 79, 66]],
        "cornsilk" => ["hex" => "#FFF8DC", "rgb" => [255, 248, 220], "hsl" => [48, 100, 93]],
        "crimson" => ["hex" => "#DC143C", "rgb" => [220, 20, 60], "hsl" => [348, 83, 47]],
        "cyan" => ["hex" => "#00FFFF", "rgb" => [0, 255, 255], "hsl" => [180, 100, 50]],
        "darkblue" => ["hex" => "#00008B", "rgb" => [0, 0, 139], "hsl" => [240, 100, 27]],
        "darkcyan" => ["hex" => "#008B8B", "rgb" => [0, 139, 139], "hsl" => [180, 100, 27]],
        "darkgoldenrod" => ["hex" => "#B8860B", "rgb" => [184, 134, 11], "hsl" => [43, 89, 38]],
        "darkgray" => ["hex" => "#A9A9A9", "rgb" => [169, 169, 169], "hsl" => [0, 0, 66]],
        "darkgreen" => ["hex" => "#006400", "rgb" => [0, 100, 0], "hsl" => [120, 100, 20]],
        "darkkhaki" => ["hex" => "#BDB76B", "rgb" => [189, 183, 107], "hsl" => [56, 38, 58]],
        "darkmagenta" => ["hex" => "#8B008B", "rgb" => [139, 0, 139], "hsl" => [300, 100, 27]],
        "darkolivegreen" => ["hex" => "#556B2F", "rgb" => [85, 107, 47], "hsl" => [82, 39, 30]],
        "darkorange" => ["hex" => "#FF8C00", "rgb" => [255, 140, 0], "hsl" => [33, 100, 50]],
        "darkorchid" => ["hex" => "#9932CC", "rgb" => [153, 50, 204], "hsl" => [280, 61, 50]],
        "darkred" => ["hex" => "#8B0000", "rgb" => [139, 0, 0], "hsl" => [0, 100, 27]],
        "darksalmon" => ["hex" => "#E9967A", "rgb" => [233, 150, 122], "hsl" => [15, 72, 70]],
        "darkseagreen" => ["hex" => "#8FBC8F", "rgb" => [143, 188, 143], "hsl" => [120, 25, 65]],
        "darkslateblue" => ["hex" => "#483D8B", "rgb" => [72, 61, 139], "hsl" => [248, 39, 39]],
        "darkslategray" => ["hex" => "#2F4F4F", "rgb" => [47, 79, 79], "hsl" => [180, 25, 25]],
        "darkturquoise" => ["hex" => "#00CED1", "rgb" => [0, 206, 209], "hsl" => [181, 100, 41]],
        "darkviolet" => ["hex" => "#9400D3", "rgb" => [148, 0, 211], "hsl" => [282, 100, 41]],
        "deeppink" => ["hex" => "#FF1493", "rgb" => [255, 20, 147], "hsl" => [328, 100, 54]],
        "deepskyblue" => ["hex" => "#00BFFF", "rgb" => [0, 191, 255], "hsl" => [195, 100, 50]],
        "dimgray" => ["hex" => "#696969", "rgb" => [105, 105, 105], "hsl" => [0, 0, 41]],
        "dimgrey" => ["hex" => "#696969", "rgb" => [105, 105, 105], "hsl" => [0, 0, 41]],
        "dodgerblue" => ["hex" => "#1E90FF", "rgb" => [30, 144, 255], "hsl" => [210, 100, 56]],
        "firebrick" => ["hex" => "#B22222", "rgb" => [178, 34, 34], "hsl" => [0, 68, 42]],
        "floralwhite" => ["hex" => "#FFFAF0", "rgb" => [255, 250, 240], "hsl" => [40, 100, 97]],
        "forestgreen" => ["hex" => "#228B22", "rgb" => [34, 139, 34], "hsl" => [120, 61, 34]],
        "fuchsia" => ["hex" => "#FF00FF", "rgb" => [255, 0, 255], "hsl" => [300, 100, 50]],
        "gainsboro" => ["hex" => "#DCDCDC", "rgb" => [220, 220, 220], "hsl" => [0, 0, 86]],
        "ghostwhite" => ["hex" => "#F8F8FF", "rgb" => [248, 248, 255], "hsl" => [240, 100, 99]],
        "gold" => ["hex" => "#FFD700", "rgb" => [255, 215, 0], "hsl" => [51, 100, 50]],
        "goldenrod" => ["hex" => "#DAA520", "rgb" => [218, 165, 32], "hsl" => [43, 74, 49]],
        "gray" => ["hex" => "#808080", "rgb" => [128, 128, 128], "hsl" => [0, 0, 50]],
        "grey" => ["hex" => "#808080", "rgb" => [128, 128, 128], "hsl" => [0, 0, 50]],
        "green" => ["hex" => "#008000", "rgb" => [0, 128, 0], "hsl" => [120, 100, 25]],
        "greenyellow" => ["hex" => "#ADFF2F", "rgb" => [173, 255, 47], "hsl" => [84, 100, 59]],
        "honeydew" => ["hex" => "#F0FFF0", "rgb" => [240, 255, 240], "hsl" => [120, 100, 97]],
        "hotpink" => ["hex" => "#FF69B4", "rgb" => [255, 105, 180], "hsl" => [330, 100, 71]],
        "indianred" => ["hex" => "#CD5C5C", "rgb" => [205, 92, 92], "hsl" => [0, 53, 58]],
        "indigo" => ["hex" => "#4B0082", "rgb" => [75, 0, 130], "hsl" => [275, 100, 25]],
        "ivory" => ["hex" => "#FFFFF0", "rgb" => [255, 255, 240], "hsl" => [60, 100, 97]],
        "khaki" => ["hex" => "#F0E68C", "rgb" => [240, 230, 140], "hsl" => [54, 77, 75]],
        "lavender" => ["hex" => "#E6E6FA", "rgb" => [230, 230, 250], "hsl" => [240, 67, 94]],
        "lavenderblush" => ["hex" => "#FFF0F5", "rgb" => [255, 240, 245], "hsl" => [340, 100, 97]],
        "lawngreen" => ["hex" => "#7CFC00", "rgb" => [124, 252, 0], "hsl" => [90, 100, 49]],
        "lemonchiffon" => ["hex" => "#FFFACD", "rgb" => [255, 250, 205], "hsl" => [54, 100, 90]],
        "lightblue" => ["hex" => "#ADD8E6", "rgb" => [173, 216, 230], "hsl" => [195, 53, 79]],
        "lightcoral" => ["hex" => "#F08080", "rgb" => [240, 128, 128], "hsl" => [0, 79, 72]],
        "lightcyan" => ["hex" => "#E0FFFF", "rgb" => [224, 255, 255], "hsl" => [180, 100, 94]],
        "lightgoldenrodyellow" => ["hex" => "#FAFAD2", "rgb" => [250, 250, 210], "hsl" => [60, 80, 90]],
        "lightgray" => ["hex" => "#D3D3D3", "rgb" => [211, 211, 211], "hsl" => [0, 0, 83]],
        "lightgrey" => ["hex" => "#D3D3D3", "rgb" => [211, 211, 211], "hsl" => [0, 0, 83]],
        "lightgreen" => ["hex" => "#90EE90", "rgb" => [144, 238, 144], "hsl" => [120, 73, 75]],
        "lightpink" => ["hex" => "#FFB6C1", "rgb" => [255, 182, 193], "hsl" => [351, 100, 86]],
        "lightsalmon" => ["hex" => "#FFA07A", "rgb" => [255, 160, 122], "hsl" => [17, 100, 74]],
        "lightseagreen" => ["hex" => "#20B2AA", "rgb" => [32, 178, 170], "hsl" => [177, 70, 41]],
        "lightskyblue" => ["hex" => "#87CEFA", "rgb" => [135, 206, 250], "hsl" => [203, 92, 75]],
        "lightslategray" => ["hex" => "#778899", "rgb" => [119, 136, 153], "hsl" => [210, 14, 53]],
        "lightsteelblue" => ["hex" => "#B0C4DE", "rgb" => [176, 196, 222], "hsl" => [214, 41, 78]],
        "lightyellow" => ["hex" => "#FFFFE0", "rgb" => [255, 255, 224], "hsl" => [60, 100, 94]],
        "lime" => ["hex" => "#00FF00", "rgb" => [0, 255, 0], "hsl" => [120, 100, 50]],
        "limegreen" => ["hex" => "#32CD32", "rgb" => [50, 205, 50], "hsl" => [120, 61, 50]],
        "linen" => ["hex" => "#FAF0E6", "rgb" => [250, 240, 230], "hsl" => [30, 67, 94]],
        "magenta" => ["hex" => "#FF00FF", "rgb" => [255, 0, 255], "hsl" => [300, 100, 50]],
        "maroon" => ["hex" => "#800000", "rgb" => [128, 0, 0], "hsl" => [0, 100, 25]],
        "mediumaquamarine" => ["hex" => "#66CDAA", "rgb" => [102, 205, 170], "hsl" => [160, 51, 60]],
        "mediumblue" => ["hex" => "#0000CD", "rgb" => [0, 0, 205], "hsl" => [240, 100, 40]],
        "mediumorchid" => ["hex" => "#BA55D3", "rgb" => [186, 85, 211], "hsl" => [288, 59, 58]],
        "mediumpurple" => ["hex" => "#9370DB", "rgb" => [147, 112, 219], "hsl" => [260, 60, 65]],
        "mediumseagreen" => ["hex" => "#3CB371", "rgb" => [60, 179, 113], "hsl" => [147, 50, 47]],
        "mediumslateblue" => ["hex" => "#7B68EE", "rgb" => [123, 104, 238], "hsl" => [249, 80, 67]],
        "mediumspringgreen" => ["hex" => "#00FA9A", "rgb" => [0, 250, 154], "hsl" => [157, 100, 49]],
        "mediumturquoise" => ["hex" => "#48D1CC", "rgb" => [72, 209, 204], "hsl" => [178, 60, 55]],
        "mediumvioletred" => ["hex" => "#C71585", "rgb" => [199, 21, 133], "hsl" => [322, 81, 43]],
        "midnightblue" => ["hex" => "#191970", "rgb" => [25, 25, 112], "hsl" => [240, 64, 27]],
        "mintcream" => ["hex" => "#F5FFFA", "rgb" => [245, 255, 250], "hsl" => [150, 100, 98]],
        "mistyrose" => ["hex" => "#FFE4E1", "rgb" => [255, 228, 225], "hsl" => [6, 100, 94]],
        "moccasin" => ["hex" => "#FFE4B5", "rgb" => [255, 228, 181], "hsl" => [38, 100, 85]],
        "navajowhite" => ["hex" => "#FFDEAD", "rgb" => [255, 222, 173], "hsl" => [36, 100, 84]],
        "navy" => ["hex" => "#000080", "rgb" => [0, 0, 128], "hsl" => [240, 100, 25]],
        "oldlace" => ["hex" => "#FDF5E6", "rgb" => [253, 245, 230], "hsl" => [39, 85, 95]],
        "olive" => ["hex" => "#808000", "rgb" => [128, 128, 0], "hsl" => [60, 100, 25]],
        "olivedrab" => ["hex" => "#6B8E23", "rgb" => [107, 142, 35], "hsl" => [80, 60, 35]],
        "orange" => ["hex" => "#FFA500", "rgb" => [255, 165, 0], "hsl" => [39, 100, 50]],
        "orangered" => ["hex" => "#FF4500", "rgb" => [255, 69, 0], "hsl" => [16, 100, 50]],
        "orchid" => ["hex" => "#DA70D6", "rgb" => [218, 112, 214], "hsl" => [302, 59, 65]],
        "palegoldenrod" => ["hex" => "#EEE8AA", "rgb" => [238, 232, 170], "hsl" => [55, 67, 80]],
        "palegreen" => ["hex" => "#98FB98", "rgb" => [152, 251, 152], "hsl" => [120, 93, 79]],
        "paleturquoise" => ["hex" => "#AFEEEE", "rgb" => [175, 238, 238], "hsl" => [180, 65, 81]],
        "palevioletred" => ["hex" => "#DB7093", "rgb" => [219, 112, 147], "hsl" => [340, 60, 65]],
        "papayawhip" => ["hex" => "#FFEFD5", "rgb" => [255, 239, 213], "hsl" => [37, 100, 92]],
        "peachpuff" => ["hex" => "#FFDAB9", "rgb" => [255, 218, 185], "hsl" => [28, 100, 86]],
        "peru" => ["hex" => "#CD853F", "rgb" => [205, 133, 63], "hsl" => [30, 59, 53]],
        "pink" => ["hex" => "#FFC0CB", "rgb" => [255, 192, 203], "hsl" => [350, 100, 88]],
        "plum" => ["hex" => "#DDA0DD", "rgb" => [221, 160, 221], "hsl" => [300, 47, 75]],
        "powderblue" => ["hex" => "#B0E0E6", "rgb" => [176, 224, 230], "hsl" => [187, 52, 80]],
        "purple" => ["hex" => "#800080", "rgb" => [128, 0, 128], "hsl" => [300, 100, 25]],
        "red" => ["hex" => "#FF0000", "rgb" => [255, 0, 0], "hsl" => [0, 100, 50]],
        "rosybrown" => ["hex" => "#BC8F8F", "rgb" => [188, 143, 143], "hsl" => [0, 25, 65]],
        "royalblue" => ["hex" => "#4169E1", "rgb" => [65, 105, 225], "hsl" => [225, 73, 57]],
        "saddlebrown" => ["hex" => "#8B4513", "rgb" => [139, 69, 19], "hsl" => [25, 76, 31]],
        "salmon" => ["hex" => "#FA8072", "rgb" => [250, 128, 114], "hsl" => [6, 93, 71]],
        "sandybrown" => ["hex" => "#F4A460", "rgb" => [244, 164, 96], "hsl" => [28, 87, 67]],
        "seagreen" => ["hex" => "#2E8B57", "rgb" => [46, 139, 87], "hsl" => [146, 50, 36]],
        "seashell" => ["hex" => "#FFF5EE", "rgb" => [255, 245, 238], "hsl" => [25, 100, 97]],
        "sienna" => ["hex" => "#A0522D", "rgb" => [160, 82, 45], "hsl" => [19, 56, 40]],
        "silver" => ["hex" => "#C0C0C0", "rgb" => [192, 192, 192], "hsl" => [0, 0, 75]],
        "skyblue" => ["hex" => "#87CEEB", "rgb" => [135, 206, 235], "hsl" => [197, 71, 73]],
        "slateblue" => ["hex" => "#6A5ACD", "rgb" => [106, 90, 205], "hsl" => [248, 53, 58]],
        "slategray" => ["hex" => "#708090", "rgb" => [112, 128, 144], "hsl" => [210, 13, 50]],
        "snow" => ["hex" => "#FFFAFA", "rgb" => [255, 250, 250], "hsl" => [0, 100, 99]],
        "springgreen" => ["hex" => "#00FF7F", "rgb" => [0, 255, 127], "hsl" => [150, 100, 50]],
        "steelblue" => ["hex" => "#4682B4", "rgb" => [70, 130, 180], "hsl" => [207, 44, 49]],
        "tan" => ["hex" => "#D2B48C", "rgb" => [210, 180, 140], "hsl" => [34, 44, 69]],
        "teal" => ["hex" => "#008080", "rgb" => [0, 128, 128], "hsl" => [180, 100, 25]],
        "thistle" => ["hex" => "#D8BFD8", "rgb" => [216, 191, 216], "hsl" => [300, 24, 80]],
        "tomato" => ["hex" => "#FF6347", "rgb" => [255, 99, 71], "hsl" => [9, 100, 64]],
        "turquoise" => ["hex" => "#40E0D0", "rgb" => [64, 224, 208], "hsl" => [174, 72, 56]],
        "violet" => ["hex" => "#EE82EE", "rgb" => [238, 130, 238], "hsl" => [300, 76, 72]],
        "wheat" => ["hex" => "#F5DEB3", "rgb" => [245, 222, 179], "hsl" => [39, 77, 83]],
        "white" => ["hex" => "#FFFFFF", "rgb" => [255, 255, 255], "hsl" => [0, 0, 100]],
        "whitesmoke" => ["hex" => "#F5F5F5", "rgb" => [245, 245, 245], "hsl" => [0, 0, 96]],
        "yellow" => ["hex" => "#FFFF00", "rgb" => [255, 255, 0], "hsl" => [60, 100, 50]],
        "yellowgreen" => ["hex" => "#9ACD32", "rgb" => [154, 205, 50], "hsl" => [80, 61, 50]]
    ];

    /**
     * @param string $name
     * @return array|false
     */
    public static function color($name)
    {
        if (array_key_exists($name, static::$colors))
            return [$name, static::$colors[$name]];

        return false;
    }

    /**
     * Lookup a hex value
     *
     * @param string $hex
     * @return array|false
     */
    public static function hex($hex)
    {
        return static::getColorField($hex, 'hex');
    }

    /**
     * Lookup an RGB value
     *
     * @param $red
     * @param $green
     * @param $blue
     * @return array|false
     */
    public static function rgb($red, $green, $blue)
    {
        return static::getColorField([$red, $green, $blue], 'rgb');
    }

    /**
     * Lookup an HSL value
     *
     * @param $hue
     * @param $saturation
     * @param $lightness
     * @return array|false
     */
    public static function hsl($hue, $saturation, $lightness)
    {
        return static::getColorField([$hue, $saturation, $lightness], 'hsl');
    }

    /**
     * Search for a given subset (by type) in the dictionary
     *
     * @param $needle
     * @param string $type
     * @return array|false
     */
    private static function getColorField($needle, $type)
    {
        $found = false;

        foreach (static::$colors as $name => $colors)
        {
            if ($colors[$type] == $needle)
            {
                $found = [$name, $colors];
                break;
            }
        }

        return $found;
    }
}