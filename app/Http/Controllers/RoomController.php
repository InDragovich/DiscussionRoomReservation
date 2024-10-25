<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


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
        $room = new Room();
        return view('pages.rooms.create',compact('room'), [
            'title' => 'Tambah Ruangan',
        ]);
        // return view('admin.rooms.create');
    }

    private function uploadImage(Request $request, $oldImage = null)
    {
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            $path = $image->storeAs('room_img', $imageName, 'public');
            
            if ($path) {
                Log::info('Gambar berhasil diupload: ' . $path);
                return $path;
            } else {
                Log::error('Gagal mengupload gambar');
                return null;
            }
        }
        return $oldImage; // Kembalikan gambar lama jika tidak ada upload baru
    }

    public function store(Request $request) {
        
        // $room = Room::create($request->all());
        // return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully.');
        $request->validate([
            'name' => 'required',
            'capacity' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'name.required' => 'Nama ruangan wajib diisi',
            'capacity.required' => 'Kapasistas ruangan wajib diisi',
            'category.required' => 'Kategori ruangan wajib diisi',
            'description.required' => 'Deskripsi Wajib Diisi',
            'image.required' => 'Gambar Wajib Diisi',
            'image.image' => 'File harus gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);
        
        $data = $request->all();
        $data['image'] = $this->uploadImage($request);
        // dd($data);

//         if ($request->hasFile('image')) {
//         $imageName = time() . '.' . $request->image->extension();
//     $request->image->storeAs('public/room_img', $imageName);
//     $data['image'] = 'room_img/' . $imageName;
// }

        Room::create($data);
        notify()->success('Data Berhasil Dimasukkan');
        return redirect('rooms');
    }

    public function edit(string $id_room) {
        $data = Room::find(hashidDecode($id_room))->first();
        
        return view('pages.rooms.update', [
            'title' => 'Room',
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id_room) {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Nama ruangan wajib diisi',
            'capacity.required' => 'Kapasistas ruangan wajib diisi',
            'description.required' => 'Deskripsi Wajib Diisi',
            'image.required' => 'Gambar Wajib Diisi',
            'image.image' => 'File harus gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);
        // dd($request->all());
        $room = Room::find(hashidDecode($id_room))->first();
        $data = $request->all();
        
        $data['image'] = $this->uploadImage($request, $room->image);
        // dd($data);
    
        $room->update($data);
        notify()->success('Data Berhasil Diupdate');
        return redirect('rooms');
    }

    public function destroy($id_room) {
        // $room = Room::findOrFail($id_room);
        // $room->delete();
        // return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully.');

        $room = Room::find(hashidDecode($id_room))->first();

        $room->delete();
        
        notify()->success('Data Berhasil Dihapus');

        return redirect('rooms');
    }
}