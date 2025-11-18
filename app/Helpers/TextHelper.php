<?php

namespace App\Helpers;

class TextHelper
{
    public static function chunkText($text, $maxLength = 800)
    {
        $chunks = [];
        $words = explode(' ', $text);
        $current = '';

        foreach ($words as $word) {
            if (strlen($current . ' ' . $word) > $maxLength) {
                $chunks[] = trim($current);
                $current = $word;
            } else {
                $current .= ' ' . $word;
            }
        }

        if (!empty($current)) {
            $chunks[] = trim($current);
        }

        return $chunks;
    }
}