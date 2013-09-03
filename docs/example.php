<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <title>MrColor</title>

        <link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />

        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" media="all" >

    </head>

    <body>

        <div class="container">

            <header>

                <h1>MrColor</h1>

            </header>

            <section>

                <?php

                use SyHolloway\MrColor\Color;

                require_once(dirname(__DIR__) . '/manual-init.php');

                //Run a test to check the core color syncing works
                echo '<h2>Test Results</h2>';

                $results = Color::test(50);

                var_dump($results);

                echo '<h2>Create default color</h2>';

                //Create a default color
                $color1 = Color::create();

                $color1->dump();

                echo '<h2>Create color with RGB values</h2>';

                //Create a color with RGB values
                $color2 = Color::create(
                    array(
                        'red' => 200,
                        'green' => 200,
                        'blue' => 100
                    )
                );

                $color2->dump();

                echo '<h2>Manipulating color with properties</h2>';

                $color3 = Color::create(
                    array(
                        'red' => 200,
                        'green' => 200,
                        'blue' => 100
                    )
                );

                $color3->dump();

                $color3->hue = 100;

                $color3->lightness = $color3->lightness - 0.1;

                $color3->alpha -= 1.2;

                $color3->alpha++;

                var_dump($color3->red);

                $color3->dump();

                echo '<h2>Copy and syncing colors</h2>';

                $color4 = Color::create(
                    array(
                        'red' => 200,
                        'green' => 200,
                        'blue' => 100
                    )
                );

                //Grab a copy of color4 and save it to color5
                $color5 = $color4->copy();

                $color5->hue = 300;

                $color5->lightness = $color5->saturation = 0.5;

                $color4->dump();

                $color5->dump();

                //Sync the properties of color5 to color4
                $color4->sync($color5);

                $color4->dump();

                echo '<h2>Bulk update</h2>';

                $color6 = Color::create();

                $color6->bulkUpdate(
                    array(
                        'hue' => 40,
                        'saturation' => 0.7,
                        'lightness' => 0.2
                    )
                );

                $color6->dump();

                echo '<h2>toString</h2>';

                $color7 = Color::create(
                    array(
                        'hue' => 40,
                        'saturation' => 0.7,
                        'lightness' => 0.2
                    )
                );

                echo $color7;

                echo '<h2>Using color tools</h2>';

                $color8 = Color::create(
                    array(
                        'red' => 90,
                        'green' => 50,
                        'blue' => 20
                    )
                );

                $color8->dump();

                echo '<p>';
                echo 'color is light: ' . var_export($color8->isLight(), true);
                echo '<br>';
                echo 'color is dark: ' . var_export($color8->isDark(), true);
                echo '</p>';

                $color8->lighten(60);

                $color8->dump();

                echo '<p>';
                echo 'color is light: ' . var_export($color8->isLight(), true);
                echo '<br>';
                echo 'color is dark: ' . var_export($color8->isDark(), true);
                echo '</p>';

                $color9 = $color8->copy()->getComplementary();

                echo '<p>complementary</p>';

                $color9->dump();

                echo '<p>CSS Gradient</p>';

                print_r($color9->getCssGradient());

                echo '<h2>Using color formatter</h2>';

                $color10 = Color::load('rgba(20, 40, 200, 0.8);');

                $color10->dump();

                echo 'HSL: ' . $color10->getHslaString() . '<br>';

                $color11 = Color::load('#ccc');

                $color11->dump();

                echo 'RGB: ' . $color11->getRgbString();

                ?>

            </section>

        </div>

    </body>

</html>
