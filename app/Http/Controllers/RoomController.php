<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;


class RoomController extends Controller
{
    public function index() {
        // $rooms = Room::all();
        // return view('admin.rooms.index', compact('rooms'));

        return view('pages.rooms.index', [
            'title' => 'Room',
            'data' => Room::latest()->get(),
        ]);
    }

    public function create() {
        return view('pages.rooms.create', [
            'title' => 'Tambah Ruangan',
        ]);
        // return view('admin.rooms.create');
    }

    public function store(Request $request) {
        // $room = Room::create($request->all());
        // return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully.');
        $request->validate([
            'name' => 'required',
            'capacity' => 'required',
            'nama_sediaan' => 'required',
        ], [
            'name.required' => 'Nama ruangan wajib diisi',
            'capacity.required' => 'Kapasistas ruangan wajib diisi',
            'description' => 'Deskripsi Wajib Diisi',
        ]);
    
        $data = $request->all();
    
        Room::create($data);
        notify()->success('Data Berhasil Dimasukkan');
        return redirect('rooms');
    }

    public function edit($id_user) {
        // $room = Room::findOrFail($id_user);
        // return view('admin.rooms.edit', compact('room'));
        $data = Room::find(hashidDecode($id_user))->first();
        return view('pages.room.update', [
            'title' => 'Room',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id_user) {
        // $room = Room::findOrFail($id_user);
        // $room->update($request->all());
        // return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully.');
        $request->validate([
            'name' => 'required',
            'capacity' => 'required',
            'nama_sediaan' => 'required',
        ], [
            'name.required' => 'Nama ruangan wajib diisi',
            'capacity.required' => 'Kapasistas ruangan wajib diisi',
            'description' => 'Deskripsi Wajib Diisi',
        ]);
        
        $room = Room::find(hashidDecode($id_user))->first();

        $data = $request->all();
    
        $room->update($data);
        notify()->success('Data Berhasil Diupdate');
        return redirect('rooms');
    }

    public function destroy($id_user) {
        // $room = Room::findOrFail($id_user);
        // $room->delete();
        // return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully.');

        $room = Room::find(hashidDecode($id_user))->first();

        $room->delete();
        
        notify()->success('Data Berhasil Dihapus');

        return redirect('rooms');
    }
}