<?php

use Hashids\Hashids;

if (!function_exists('hashidEncode')) {
  function hashidEncode($id)
  {
    $salt    = new Hashids('PiscokLumer');
    $hashids = $salt->encode([$id, 54715]);
    return $hashids;
  }
}

if (!function_exists('hashidDecode')) {
  function hashidDecode($id)
  {
    $salt    = new Hashids('PiscokLumer');
    $hashids = $salt->decode($id);
    return $hashids;
  }
}