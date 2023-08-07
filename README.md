# andaluh-php
Transliterate español (spanish) spelling to andaluz proposals using PHP

## Table of Contents

- [Description](#description)
- [Usage](#usage)
- [Installation](#installation)
- [Support](#support)
- [Contributing](#contributing)

## Description

The **Andalusian varieties of [Spanish]** (Spanish: *andaluz*; Andalusian) are spoken in Andalusia, Ceuta, Melilla, and Gibraltar. They include perhaps the most distinct of the southern variants of peninsular Spanish, differing in many respects from northern varieties, and also from Standard Spanish. Further info: https://en.wikipedia.org/wiki/Andalusian_Spanish.

This package introduces transliteration functions to convert *español* (spanish) spelling to andaluz. As there's no official or standard andaluz spelling, andaluh-php is adopting the **EPA** and **PAO** proposals _(Êttanda Pal Andaluh)_. 

Further info:
**EPA proposal** https://andaluhepa.wordpress.com
**PAO proposal** http://pao-andalu.com/



## Usage

```php
<?php

namespace Examples;

use Andaluh\Andaluh;

class MyClass 
{   

    public function translate()
    {
        $andaluh = new Andaluh();
        // Transliterate to EPA proposal
        echo 'EPA = '.$andaluh->transliterate_Epa('Todo Xenomorfo dice: [haber], que el Éxito y el éxtasis asfixian, si no eres un xilófono Chungo.');
        // Transliterate to PAO proposal
        echo 'PAO = '.$andaluh->transliterate_Pao('Lleva un Guijarrito el ABuelo, ¡Qué Bueno! ¡para la VERGÜENZA!');
    }
}      
```
## Installation

Install it with composser

```bash
composer require andalugeeks/andaluh
```
## Support

Please [open an issue](https://github.com/andalugeeks/andaluh-php/issues/new) for support.

## Contributing

Please contribute using [Github Flow](https://guides.github.com/introduction/flow/). Create a branch, add commits, and open a pull request.