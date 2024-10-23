<?php

use Hashids\Hashids;

// if (!function_exists('timeUntil')) {
//   function timeUntil($datetime)
//   {

//     // Cek jika $datetime adalah string yang valid untuk DateTime
//     if (!strtotime($datetime)) {
//       return  $datetime;
//     }

//     $now = new DateTime;
//     $future = new DateTime($datetime);
//     $diff = $now->diff($future);

//     // Check if $future (datetime) is in the past compared to $now
//     $isExpired = $future < $now;

//     if ($isExpired) {
//       return 'Sudah Kedaluarsa';
//     }

//     if ($diff->y >= 1) {
//       return 'Kurang dari ' . ($diff->y + 1) . ' tahun';
//     }

//     if ($diff->m > 0) {
//       return 'Kurang dari ' . ($diff->m + 1) . ' bulan';
//     }

//     if ($diff->d > 0) {
//       return $diff->d . ' hari lagi';
//     }

//     if ($diff->h > 0) {
//       return $diff->h . ' jam lagi';
//     }

//     if ($diff->i > 0) {
//       return $diff->i . ' menit lagi';
//     }

//     return 'baru saja';
//   }
// }

// if (!function_exists('getRoleBadge')) {
//   function getRoleBadge($role)
//   {
//     switch ($role) {
//       case \App\Enums\UserRole::Admin:
//         return '<span class="badge badge-success">Admin</span>';
//       case \App\Enums\UserRole::User:
//         return '<span class="badge badge-primary">User</span>';
//       default:
//         return '<span class="badge badge-secondary">Role tidak diketahui</span>';
//     }
//   }
// }
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