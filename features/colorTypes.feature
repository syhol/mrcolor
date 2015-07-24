Feature: Hex objects can be converted to HSLA or RGBA

  Scenario Outline: A hex object can be converted to HSLA
    Given I have a hex object with value <hex>
    And I convert it to HSLA
    Then It should have correct hue <hue>, saturation <saturation> and lightness <lightness>
    Examples:
      | hex     | hue | saturation | lightness |
      | #eeeeee | 0   | 0          | 93        |
      | #cccccc | 0   | 0          | 80        |
      | #005daa | 207 | 100        | 33        |
      | #1fda4e | 135 | 75         | 49        |
      | #ff00ae | 319 | 100        | 50        |

  Scenario Outline: A hex object can be converted to RGBA
    Given I have a hex object with value <hex>
    And I convert it to RGBA
    Then It should have correct red <red>, green <green> and blue <blue>
    Examples:
      | hex     | red | green | blue |
      | #eeeeee | 238 | 238   | 238  |
      | #cccccc | 204 | 204   | 204  |
      | #005daa | 0   | 93    | 170  |
      | #1fda4e | 31  | 218   | 78   |
      | #ff00ae | 255 | 0     | 174  |

  Scenario Outline: A HSLA object can be converted to Hex
    Given I have a HSLA object with values hue <hue>, saturation <saturation> and lightness <lightness>
    And I convert it to Hex
    Then it should have hexcode <hex>
    Examples:
      | hex     | hue | saturation | lightness |
      | #eeeeee | 0   | 0          | 93        |
      | #cccccc | 0   | 0          | 80        |
      | #005daa | 207 | 100        | 33        |
      | #1fda4e | 135 | 75         | 49        |
      | #ff00ae | 319 | 100        | 50        |