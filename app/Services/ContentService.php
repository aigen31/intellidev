<?php

namespace App\Services;

class ContentService
{
  public static function getReadTime($content = null, $wordsPerMinute = 200): int
  {
    $wordsPerMinute = 200;
    $text = strip_tags($content);
    $wordCount = str_word_count($text);

    return ceil($wordCount / $wordsPerMinute);
  }
}
