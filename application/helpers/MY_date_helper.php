<?php

/**
 * Rewrites CI's timespan function
 * Leaving only years and months
 * @param int $seconds Number of Seconds
 * @param string $time Unix Timestamp
 * @return string String representaton of date difference
 */
function timespan($seconds = 1, $time = '')
{
    $CI =& get_instance();
    $CI->lang->load('date');

    if ( ! is_numeric($seconds))
    {
        $seconds = 1;
    }

    if ( ! is_numeric($time))
    {
        $time = time();
    }

    if ($time <= $seconds)
    {
        $seconds = 1;
    }
    else
    {
        $seconds = $time - $seconds;
    }

    $str = '';
    $years = floor($seconds / 31536000);

    if ($years > 0)
    {
        $str .= $years.' '.lcfirst($CI->lang->line((($years	> 1) ? 'date_years' : 'date_year'))).', ';
    }

    $seconds -= $years * 31536000;
    $months = floor($seconds / 2628000);

    if ($years > 0 OR $months > 0)
    {
        if ($months > 0)
        {
            $str .= $months.' '.lcfirst($CI->lang->line((($months	> 1) ? 'date_months' : 'date_month'))).', ';
        }
    }

    return substr(trim($str), 0, -1);
}

/**
 * Custom form validation callback function
 * @param string $value Date string
 * @return int Timestamp
 */
function date_to_timestamp($value)
{
    if(!empty($value))
    {
        $dt = DateTime::createFromFormat('m/Y', $value);
        return $dt->getTimestamp();
    }
    else
    {
        $date = new DateTime();
        return $date->getTimestamp();
    }
}

/**
 * Formats timestamp for displaying in datepicker form field
 * @param int $value Timestamp
 * @return string Date string
 */
function timestamp_to_date($value)
{
    if (!empty($value))
    {
        return date('m/Y', $value);
    }
    else
    {
        return '';
    }

}