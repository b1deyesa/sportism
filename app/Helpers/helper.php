<?php

use Carbon\Carbon;

if (!function_exists('format_date')) {
    function format_date($date, $format = 'j F Y') {
        if (!$date) return null;
        return Carbon::parse($date)->format($format);
    }
}
