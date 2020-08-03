<?php

    use Carbon\Carbon;
 
if (!function_exists('date_format')) {
   
    function date_format($date, $format)
    {
       return Carbon::parse($date)->format($format);
    }

}