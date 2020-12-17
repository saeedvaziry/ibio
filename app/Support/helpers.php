<?php

/**
 * @return string
 */
function get_date_path()
{
    return date('Y') . '/' . date('m') . '/' . date('d');
}

/**
 * @param $key
 * @param $string
 * @param string $cipher
 * @return string
 */
function encrypt_string($key, $string, $cipher = 'AES-256-CBC')
{
    $newEncrypter = new \Illuminate\Encryption\Encrypter($key, $cipher);
    return $newEncrypter->encrypt($string);
}

/**
 * @param $key
 * @param $string
 * @param string $cipher
 * @return mixed
 */
function decrypt_string($key, $string, $cipher = 'AES-256-CBC')
{
    $newEncrypter = new \Illuminate\Encryption\Encrypter($key, $cipher);
    return $newEncrypter->decrypt($string);
}

/**
 * @param $strDateFrom
 * @param $strDateTo
 * @return array
 * @throws Exception
 */
function create_date_range($strDateFrom, $strDateTo)
{
    $aryRange = [];
    $from = new DateTime($strDateFrom);
    $to = new DateTime($strDateTo);
    $to->modify('+1 day');
    $period = new DatePeriod($from, new DateInterval('P1D'), $to);
    foreach ($period as $key => $value) {
        array_push($aryRange, $value->format('Y-m-d'));
    }

    return $aryRange;
}


/**
 * @param $money
 * @return string
 */
function custom_money_format($money)
{
    return number_format($money, 0, '', ',');
}

/**
 * @param $string
 * @return string|string[]
 */
function latin_number_to_persian($string)
{
    $latin = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $convertedLatinNums = str_replace($latin, $persian, $string);

    return str_replace(' ', '', $convertedLatinNums);
}

