<?php

namespace Baka\Support;

class Time
{
    /**
     * Calculate how long ago was this time compare to now.
     *
     * Example: x mins from last update
     *
     * @param  string  $time
     * @param  boolean $timestamp
     * @return string
     */
    public static function howLongAgo(string $time): string
    {
        $ts = strtotime($time);

        $now = time();
        $diff = $now - $ts;

        $minute = 60;
        $hour = $minute * 60;
        $day = $hour * 24;
        $month = $day * 30;

        if ($diff < $minute) {
            $text = _('< 1 min.');

            return sprintf(_('%s ago'), $text);
        } elseif ($diff < $hour) {
            $mins = floor($diff / $minute);

            return sprintf(ngettext('%d min. ago', '%d mins. ago', $mins), $mins);
        } elseif ($diff < $day) {
            $hrs = floor($diff / $hour);
            $mins = floor(($diff - $hrs * $hour) / $minute);

            $text = sprintf(ngettext('%d hr.', '%d hrs.', $hrs), $hrs);

            if ($mins > 0) {
                $text .= ' ' . sprintf(ngettext('%d min.', '%d mins.', $mins), $mins);
            }

            return sprintf(_('%s ago'), $text);

            return $text;
        } elseif ($diff < $month) {
            $days = floor($diff / $day);

            $text = sprintf(ngettext('%d day', '%d days', $days), $days);

            if ($days < 2) {
                $hrs = floor(($diff - $days * $day) / $hour);
                $text .= ' ' . sprintf(ngettext('%d hr.', '%d hrs.', $hrs), $hrs);
            }

            return sprintf(_('%s ago'), $text);
        } else {
            return date('Y-m-d', $ts);
        }
    }
}
