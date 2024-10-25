<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ReservationController extends Controller
{
    public function index() {
        // $rooms = Room::all();
        // return view('admin.rooms.index', compact('rooms'));
        // $roomOptions = RoomController::select('name')->distinct()->pluck('name');

        return view('pages.reservations.index', [
            'title' => 'Reservasi',
            // 'roomOptions' => $roomOptions,
            'data' => Reservation::latest()->get(),
        ]);
    }

    public function getCalendarData()
{
    $rooms = Room::all()->map(function($room) {
        return [
            'id' => $room->id,
            'title' => $room->name
        ];
    });

    $reservations = Reservation::with('room')->get()->map(function($reservation) {
        return [
            'id' => $reservation->id,
            'resourceId' => $reservation->room_id,
            'title' => $reservation->title,
            'start' => $reservation->start_time,
            'end' => $reservation->end_time
        ];
    });

    return response()->json([
        'resources' => $rooms,
        'events' => $reservations
    ]);
}
    
    public function create()
    {
        $rooms = Room::all();
        return view('pages.reservations.create', [
            'title' => 'Reservasi Ruangan',
            'rooms' => $rooms,
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'unit_id' => 'required|exists:units,id',
        'start_time' => 'required|date|after:now',
        'end_time' => 'required|date|after:start_time',
    ]);

    // $user = auth()->user();
    
    // Cek jumlah reservasi aktif
    $activeReservations = $user->reservations()->where('status', 'active')->count();
    if ($activeReservations >= 2) {
        return back()->with('error', 'Anda sudah memiliki 2 reservasi aktif.');
    }

    $startTime = Carbon::parse($request->start_time);
    $endTime = Carbon::parse($request->end_time);
    $duration = $startTime->diffInMinutes($endTime);
    
    $fineAmount = 0;
    $fineInterval = 10; // Interval denda dalam menit
    $fineRate = 10000; // Jumlah denda per interval
    $maxDuration = 75; // Durasi maksimal untuk perhitungan denda

    if ($duration > $fineInterval) {
        $fineableDuration = min($duration, $maxDuration) - $fineInterval;
        $fineIntervals = floor($fineableDuration / $fineInterval);
        $fineAmount = $fineIntervals * $fineRate;
    }

    Reservation::create([
        'user_id' => $user->id,
        'unit_id' => $request->unit_id,
        'start_time' => $startTime,
        'end_time' => $endTime,
        'fine_amount' => $fineAmount,
    ]);

    return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil dibuat.');
}
}