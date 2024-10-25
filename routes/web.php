<?php

use App\Enums\UserRole;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;



// Route::resource('reservations', ReservationController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('pages.dashboard.dashboard');
// });

  Route::get('/', [DashboardController::class, 'index'], function () {
    return view('pages.dashboard.dashboard', ['title' => 'Dashboard']);
  });

  // Ruangan
  // Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
  Route::resource('rooms', RoomController::class);
  // Route::put('rooms/{id_room}', [RoomController::class, 'update'])->name('rooms.update');
  // Route::post('rooms/update', [RoomController::class, 'index']);

  // Reservasi
  Route::resource('reservations', ReservationController::class);
  // Route::resource('reservations', ReservationController::class);
  // Route::post('/reservations/submit', [ReservationController::class, 'submit'])->name('reservations.submit');

  Route::get('logout', [AuthController::class, 'logout']);
  
  Route::middleware('guest')->group(function () {
  Route::get('login', [AuthController::class, 'login'])->name('login');
  Route::post('login', [AuthController::class, 'authenticated']);
  });


  
  Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
      Route::get('overview', [DashboardController::class, 'index'], function () {
        return view('pages.dashboard.dashboard', ['title' => 'Dashboard']);
      })->name('ds');
      // Route::resource('rooms', RoomController::class);
      // Route::post('rooms/filter', [RoomController::class, 'filter']);
      Route::middleware(['auth', 'role:' . UserRole::Admin])->group(function () {
        Route::resource('users', UserController::class);
      });
      // Route::get('/reservations/create', [ReservationController::class, 'create'])->name('user.reservations.create');
    });
  });

// ... kode yang ada sebelumnya ...

// Route::middleware(['auth', 'role:' . UserRole::Admin])->group(function () {
//   // Rute-rute untuk admin
//   Route::prefix('admin')->group(function () {
//       // Kelola ruangan
//       Route::resource('rooms', RoomController::class);
      
//       // Kelola user
//       Route::resource('users', UserController::class);
      
//       // Kelola reservasi
//       Route::get('reservations', [ReservationController::class, 'adminIndex'])->name('admin.reservations.index');
//       Route::get('reservations/{reservation}', [ReservationController::class, 'adminShow'])->name('admin.reservations.show');
//       Route::put('reservations/{reservation}', [ReservationController::class, 'adminUpdate'])->name('admin.reservations.update');
//       Route::delete('reservations/{reservation}', [ReservationController::class, 'adminDestroy'])->name('admin.reservations.destroy');
//   });
// });

// Route::middleware(['auth', 'role:' . UserRole::User])->group(function () {
//   // Rute-rute untuk user (mahasiswa)
//   Route::prefix('user')->group(function () {
//       // Riwayat pemesanan
//       Route::get('reservations', [ReservationController::class, 'index'])->name('user.reservations.index');
      
//       // Reservasi ruangan
//       Route::get('reservations/create', [ReservationController::class, 'create'])->name('user.reservations.create');
//       Route::post('reservations', [ReservationController::class, 'store'])->name('user.reservations.store');
//       Route::get('reservations/{reservation}', [ReservationController::class, 'show'])->name('user.reservations.show');
//   });
// });

// ... kode yang ada setelahnya ...



  
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     // Rute-rute untuk admin
// });

// Route::middleware(['auth', 'role:user'])->group(function () {
//     // Rute-rute untuk user biasa
// });

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/rooms', [RoomController::class, 'index']);
//     Route::get('/admin/rooms/create', [RoomController::class, 'create']);
//     Route::post('/admin/rooms/store', [RoomController::class, 'store']);
//     Route::get('/admin/rooms/edit/{id_room}', [RoomController::class, 'edit']);
//     Route::post('/admin/rooms/update/{id_room}', [RoomController::class, 'update']);
//     Route::delete('/admin/rooms/delete/{id_room}', [RoomController::class, 'destroy']);
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/reservations', [ReservationController::class, 'index'])->name('user.reservations.index');
//     Route::get('/reservations/create', [ReservationController::class, 'create'])->name('user.reservations.create');
//     Route::post('/reservations/store', [ReservationController::class, 'store'])->name('user.reservations.store');
//     Route::delete('/reservations/delete/{id}', [ReservationController::class, 'destroy'])->name('user.reservations.delete');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('user.activitylogs.index');
// });