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
