<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $totalRoom = Room::count();
        $totalRoom = $this->getRooms();

        return view('pages.dashboard.dashboard', [
            'title' => 'Dashboard',
            'totalRoom' => $totalRoom,
            'data' => Room::latest()->get(),
        ]);
    }
    private function getRooms()
       {
        return Room::all();
    }
}