<?php

namespace Andaluh\Rules\PAO;

abstract class BaseRule
{
    # Useful for calculate the circumflex equivalents.
    const VOWELS = [
        'notilde' => 'aeiouAEIOU',
        'tilde' => 'áéíóúÁÉÍÓÚ',
        'circumflex' => 'âêîôûÂÊÎÔÛ',
    ];

    # EPA character for Voiceless alveolar fricative /s/
    # https://en.wikipedia.org/wiki/Voiceless_alveolar_fricative
    const VAF = ''; // 'ç';
    const VAF_S = 's';
    const VAF_Z = 'z';

    # EPA character for Voiceless velar fricative /x/
    # https://en.wikipedia.org/wiki/Voiceless_velar_fricative
    const VVF = 'j'; // 'h';

    static function keepCase(string $word, string $replacementWord): string
    {
        if (self::isLowerCase($word)) {
            return mb_convert_case($replacementWord, MB_CASE_LOWER, "UTF-8");
        }
        if (self::isUpperCase($word)) {
            return mb_convert_case($replacementWord, MB_CASE_UPPER, "UTF-8");
        }
        if (self::isTitleCase($word)) {
            return mb_convert_case($replacementWord, MB_CASE_TITLE, "UTF-8");
        }

        return $replacementWord;
    }

    static function toLowerCase(string $word): string
    {
        return mb_convert_case($word, MB_CASE_LOWER, "UTF-8");
    }

    static function isLowerCase(string $word): bool
    {
        return self::toLowerCase($word) === $word;
    }

    static function toUpperCase(string $word): string
    {
        return mb_convert_case($word, MB_CASE_UPPER, "UTF-8");
    }

    static function isUpperCase(string $word): bool
    {
        return self::toUpperCase($word) === $word;
    }

    static function toTitleCase(string $word): string
    {
        return mb_convert_case($word, MB_CASE_TITLE, "UTF-8");
    }

    static function isTitleCase(string $word): bool
    {
        return self::toTitleCase($word) === $word;
    }

    /**
     * Get circumflexs vowel equivalent 
     *
     * @param string $vowel
     * @return string circumlfexed vowel
     */
    static function getVowelCircumflexs(string $vowel): string
    {
        if (mb_strlen($vowel) > 1) {
            throw new \Exception('getVowelCircumflexs can only transform 1 vowel');
        }

        [
            'notilde' => $notildeVowels,
            'tilde' => $tildeVowels,
            'circumflex' => $circumflexVowels
        ] = self::VOWELS;

        // If circumflex or tilde return vowel
        if (mb_strpos($circumflexVowels, $vowel) !== false || mb_strpos($tildeVowels, $vowel) !== false) {
            return $vowel;
        }

        if (($notildeIndex = mb_strpos($notildeVowels, $vowel)) === false) {
            throw new \Exception('Not a vowel');
        }

        return mb_substr(
            $circumflexVowels,
            $notildeIndex,
            1
        );
    }

    /**
     * Get vowel tilde equivalent
     *
     * @param string $vowel
     * @return string tilde vowel
     */
    static function getVowelTilde(string $vowel): string
    {
        if (mb_strlen($vowel) > 1) {
            throw new \Exception('getVowelTilde can only transform 1 vowel');
        }

        [
            'notilde' => $notildeVowels,
            'tilde' => $tildeVowels,
            'circumflex' => $circumflexVowels
        ] = self::VOWELS;

        // If circumflex or tilde return vowel
        if (mb_strpos($circumflexVowels, $vowel) !== false || mb_strpos($tildeVowels, $vowel) !== false) {
            return $vowel;
        }

        if (($notildeIndex = mb_strpos($notildeVowels, $vowel)) === false) {
            throw new \Exception('Not a vowel');
        }

        return mb_substr($tildeVowels, $notildeIndex, 1);
    }

    static function containsTildeVowel(string $text)
    {
        return preg_match('/á|é|í|ó|ú/iu', $text);
    }
}
