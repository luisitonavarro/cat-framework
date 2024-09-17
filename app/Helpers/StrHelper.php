<?php

namespace App\Helpers;

class StrHelper
{
    // Basic String Methods

    public static function classBasename($class)
    {
        return basename(str_replace('\\', '/', $class));
    }

    public static function e($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    public static function pregReplaceArray($pattern, $replacements, $subject)
    {
        return preg_replace($pattern, $replacements, $subject);
    }

    // Str Methods

    public static function after($subject, $search)
    {
        $pos = strpos($subject, $search);
        if ($pos === false) {
            return $subject;
        }
        return substr($subject, $pos + strlen($search));
    }

    public static function afterLast($subject, $search)
    {
        $pos = strrpos($subject, $search);
        if ($pos === false) {
            return $subject;
        }
        return substr($subject, $pos + strlen($search));
    }

    public static function apa($subject, $search)
    {
        // Placeholder for custom function if needed
        return str_ireplace($search, '', $subject);
    }

    public static function ascii($subject)
    {
        return iconv('utf-8', 'ascii//TRANSLIT', $subject);
    }

    public static function before($subject, $search)
    {
        $pos = strpos($subject, $search);
        if ($pos === false) {
            return $subject;
        }
        return substr($subject, 0, $pos);
    }

    public static function beforeLast($subject, $search)
    {
        $pos = strrpos($subject, $search);
        if ($pos === false) {
            return $subject;
        }
        return substr($subject, 0, $pos);
    }

    public static function between($subject, $start, $end)
    {
        $startPos = strpos($subject, $start);
        $endPos = strpos($subject, $end, $startPos + strlen($start));
        if ($startPos === false || $endPos === false) {
            return '';
        }
        return substr($subject, $startPos + strlen($start), $endPos - $startPos - strlen($start));
    }

    public static function betweenFirst($subject, $start, $end)
    {
        $startPos = strpos($subject, $start);
        $endPos = strpos($subject, $end, $startPos + strlen($start));
        if ($startPos === false || $endPos === false) {
            return '';
        }
        return substr($subject, $startPos + strlen($start), $endPos - $startPos - strlen($start));
    }

    public static function camel($subject)
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $subject))));
    }

    public static function charAt($subject, $index)
    {
        return $subject[$index] ?? '';
    }

    public static function chopStart($subject, $chop)
    {
        return preg_replace('/^' . preg_quote($chop, '/') . '/u', '', $subject);
    }

    public static function chopEnd($subject, $chop)
    {
        return preg_replace('/' . preg_quote($chop, '/') . '$/u', '', $subject);
    }

    public static function contains($subject, $search)
    {
        return strpos($subject, $search) !== false;
    }

    public static function containsAll($subject, array $searches)
    {
        foreach ($searches as $search) {
            if (strpos($subject, $search) === false) {
                return false;
            }
        }
        return true;
    }

    public static function deduplicate($subject)
    {
        return implode(' ', array_unique(explode(' ', $subject)));
    }

    public static function endsWith($subject, $search)
    {
        return substr($subject, -strlen($search)) === $search;
    }

    public static function excerpt($subject, $length = 100, $end = '...')
    {
        return Str::limit($subject, $length, $end);
    }

    public static function finish($subject, $suffix)
    {
        return rtrim($subject, $suffix) . $suffix;
    }

    public static function headline($subject)
    {
        return ucwords(str_replace(['-', '_'], ' ', $subject));
    }

    public static function inlineMarkdown($subject)
    {
        // Placeholder for inline markdown processing
        return $subject;
    }

    public static function is($subject, $pattern)
    {
        return fnmatch($pattern, $subject);
    }

    public static function isAscii($subject)
    {
        return mb_check_encoding($subject, 'ASCII');
    }

    public static function isJson($subject)
    {
        json_decode($subject);
        return (json_last_error() === JSON_ERROR_NONE);
    }

    public static function isUlid($subject)
    {
        return preg_match('/^[0-9A-F]{26}$/i', $subject);
    }

    public static function isUrl($subject)
    {
        return filter_var($subject, FILTER_VALIDATE_URL) !== false;
    }

    public static function isUuid($subject)
    {
        return preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}$/i', $subject);
    }

    public static function kebab($subject)
    {
        return strtolower(preg_replace('/[A-Z]/', '-$0', lcfirst($subject)));
    }

    public static function lcfirst($subject)
    {
        return lcfirst($subject);
    }

    public static function length($subject)
    {
        return mb_strlen($subject);
    }

    public static function limit($subject, $limit = 100, $end = '...')
    {
        return mb_strlen($subject) > $limit ? mb_substr($subject, 0, $limit) . $end : $subject;
    }

    public static function lower($subject)
    {
        return strtolower($subject);
    }

    public static function markdown($subject)
    {
        // Placeholder for markdown processing
        return $subject;
    }

    public static function mask($subject, $mask = '***')
    {
        return preg_replace('/./u', $mask, $subject);
    }

    public static function orderedUuid()
    {
        return (string) \Ramsey\Uuid\Uuid::uuid4();
    }

    public static function padBoth($subject, $length, $padString = ' ')
    {
        return str_pad($subject, $length, $padString, STR_PAD_BOTH);
    }

    public static function padLeft($subject, $length, $padString = ' ')
    {
        return str_pad($subject, $length, $padString, STR_PAD_LEFT);
    }

    public static function padRight($subject, $length, $padString = ' ')
    {
        return str_pad($subject, $length, $padString, STR_PAD_RIGHT);
    }

    public static function password($length = 12)
    {
        return bin2hex(random_bytes($length / 2));
    }

    public static function plural($subject, $count = 2)
    {
        return $count > 1 ? str_plural($subject) : $subject;
    }

    public static function pluralStudly($subject, $count = 2)
    {
        return $count > 1 ? str_plural($subject) : $subject;
    }

    public static function position($subject, $search)
    {
        return strpos($subject, $search);
    }

    public static function random($length = 16)
    {
        return bin2hex(random_bytes($length / 2));
    }

    public static function remove($subject, $search)
    {
        return str_replace($search, '', $subject);
    }

    public static function repeat($subject, $times)
    {
        return str_repeat($subject, $times);
    }

    public static function replace($subject, $search, $replace)
    {
        return str_replace($search, $replace, $subject);
    }

    public static function replaceArray($subject, array $replace)
    {
        return strtr($subject, $replace);
    }

    public static function replaceFirst($subject, $search, $replace)
    {
        $pos = strpos($subject, $search);
        if ($pos === false) {
            return $subject;
        }
        return substr_replace($subject, $replace, $pos, strlen($search));
    }

    public static function replaceLast($subject, $search, $replace)
    {
        $pos = strrpos($subject, $search);
        if ($pos === false) {
            return $subject;
        }
        return substr_replace($subject, $replace, $pos, strlen($search));
    }

    public static function replaceMatches($subject, $pattern, $replacement)
    {
        return preg_replace($pattern, $replacement, $subject);
    }

    public static function replaceStart($subject, $search, $replace)
    {
        return preg_replace('/^' . preg_quote($search, '/') . '/', $replace, $subject);
    }

    public static function replaceEnd($subject, $search, $replace)
    {
        return preg_replace('/' . preg_quote($search, '/') . '$/', $replace, $subject);
    }

    public static function reverse($subject)
    {
        return strrev($subject);
    }

    public static function singular($subject)
    {
        return rtrim($subject, 's');
    }

    public static function slug($subject, $separator = '-')
    {
        return strtolower(preg_replace('/[^a-z0-9]+/', $separator, trim($subject)));
    }

    public static function snake($subject, $delimiter = '_')
    {
        return strtolower(preg_replace('/[A-Z]/', $delimiter . '$0', lcfirst($subject)));
    }

    public static function squish($subject)
    {
        return preg_replace('/\s+/', ' ', $subject);
    }

    public static function start($subject, $prefix)
    {
        return str_starts_with($subject, $prefix) ? $subject : $prefix . $subject;
    }

    public static function startsWith($subject, $search)
    {
        return str_starts_with($subject, $search);
    }

    public static function studly($subject)
    {
        return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $subject)));
    }

    public static function substr($subject, $start, $length = null)
    {
        return substr($subject, $start, $length);
    }

    public static function substrCount($subject, $search)
    {
        return substr_count($subject, $search);
    }

    public static function substrReplace($subject, $replacement, $start, $length = null)
    {
        return substr_replace($subject, $replacement, $start, $length);
    }

    public static function swap($subject, array $replacements)
    {
        return strtr($subject, $replacements);
    }

    public static function take($subject, $length)
    {
        return substr($subject, 0, $length);
    }

    public static function title($subject)
    {
        return ucwords(str_replace(['-', '_'], ' ', $subject));
    }

    public static function toBase64($subject)
    {
        return base64_encode($subject);
    }

    public static function toHtmlString($subject)
    {
        return htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
    }

    public static function transliterate($subject)
    {
        return iconv('utf-8', 'ascii//TRANSLIT', $subject);
    }

    public static function trim($subject, $characterMask = null)
    {
        return trim($subject, $characterMask);
    }

    public static function ltrim($subject, $characterMask = null)
    {
        return ltrim($subject, $characterMask);
    }

    public static function rtrim($subject, $characterMask = null)
    {
        return rtrim($subject, $characterMask);
    }

    public static function ucfirst($subject)
    {
        return ucfirst($subject);
    }

    public static function ucsplit($subject, $length)
    {
        return implode(' ', str_split($subject, $length));
    }

    public static function upper($subject)
    {
        return strtoupper($subject);
    }

    public static function ulid()
    {
        return (string) \Ulid\Ulid::generate();
    }

    public static function unwrap($subject)
    {
        return trim($subject, "\t\n\r\0\x0B");
    }

    public static function uuid()
    {
        return (string) \Ramsey\Uuid\Uuid::uuid4();
    }

    public static function wordCount($subject)
    {
        return str_word_count($subject);
    }

    public static function wordWrap($subject, $width = 75, $break = "\n", $cut = false)
    {
        return wordwrap($subject, $width, $break, $cut);
    }

    public static function words($subject, $words = 100, $end = '...')
    {
        return implode(' ', array_slice(explode(' ', $subject), 0, $words)) . (count(explode(' ', $subject)) > $words ? $end : '');
    }

    public static function wrap($subject, $width = 75, $break = "\n", $cut = false)
    {
        return wordwrap($subject, $width, $break, $cut);
    }

    // Fluent Methods

    public static function afterFluent($subject, $search)
    {
        return (new static)->after($subject, $search);
    }

    public static function beforeFluent($subject, $search)
    {
        return (new static)->before($subject, $search);
    }

    // Add more fluent methods here as needed
}
