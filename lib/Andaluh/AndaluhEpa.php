<?php

namespace Andaluh;

use Andaluh\Helpers\ArrayHelper;

class AndaluhEpa
{
    public $defs;

    public function __construct()
    {
        if (file_exists($defs = __DIR__ . '/defs.php')) {
            $this->defs = require $defs;
        }
    }

    public function getVowelCircumflexs(string $vowel): string
    {
        if (strlen($vowel) > 1) {
            throw new \Exception('Can only transform 1 vowel');
        }

        [
            'notilde' => $notildeVowels,
            'tilde' => $tildeVowels,
            'circumflex' => $circumflexVowels
        ] = ArrayHelper::get($this->defs, 'vowels');

        // If circumflex or tilde return vowel
        if (mb_strpos($circumflexVowels, $vowel) !== false || mb_strpos($tildeVowels, $vowel) !== false) {
            return $vowel;
        }

        if (($notildeIndex = mb_strpos($notildeVowels, $vowel)) === false) {
            throw new \Exception('Not a vowel');
        }

        return mb_substr($circumflexVowels, $notildeIndex, 1);
    }
}
