# andaluh-php
Transliterate español (spanish) spelling to andaluz proposals using PHP

## Description

The **Andalusian varieties of [Spanish]** (Spanish: *andaluz*; Andalusian) are spoken in Andalusia, Ceuta, Melilla, and Gibraltar. They include perhaps the most distinct of the southern variants of peninsular Spanish, differing in many respects from northern varieties, and also from Standard Spanish. Further info: https://en.wikipedia.org/wiki/Andalusian_Spanish.

This package introduces transliteration functions to convert *español* (spanish) spelling to andaluz. As there's no official or standard andaluz spelling, andaluh-py is adopting the **EPA proposal (Er Prinzipito Andaluh)**. Further info: https://andaluhepa.wordpress.com. Other andaluz spelling proposals are planned to be added as well.

## Usage example

```php
<?php

namespace Examples;

use Andaluh\AndaluhEpa;

class MyClass 
{   

    public function translate()
    {
        $andaluh = new AndaluhEpa();
        echo $andaluh->transliterate('Todo Xenomorfo dice: [haber], que el Éxito y el éxtasis asfixian, si no eres un xilófono Chungo.');
        echo $andaluh->transliterate('Lleva un Guijarrito el ABuelo, ¡Qué Bueno! ¡para la VERGÜENZA!');
    }
}      
```