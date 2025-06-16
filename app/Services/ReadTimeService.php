<?php

namespace App\Services;

use Carbon\CarbonInterval;

class ReadTimeService
{
  public static function calculate($content = null, $wordsPerMinute = 200): int
  {
    $text = strip_tags($content);
    $words = str_word_count($text);
    $interval = CarbonInterval::minutes(ceil($words / $wordsPerMinute));
    return $interval->totalMinutes;
  }

  public static function getCategory($readTime): string
  {
    if ($readTime <= 2) {
      return 0;
    } elseif ($readTime <= 5) {
      return 1;
    } else {
      return 2;
    }
  }

  public static function getCssClass($readTime)
  {
    $durationStatus = self::getCategory($readTime);

    switch ($durationStatus) {
      case 0:
        return 'green-500';
      case 1:
        return 'yellow-500';
      case 2:
        return 'red-500';
      default:
        return 'gray-500';
    }
  }

  public static function humanFormat($readTime)
  {
    return CarbonInterval::minutes($readTime)->cascade()->forHumans();
  }
}
