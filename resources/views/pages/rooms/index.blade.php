<x-_layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="mb-3">
    <a href="{{ url('rooms/create') }}" class="btn btn-primary">Tambah Data Ruangan</a>
  </div>

  <!-- DataTables -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataRoom" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Ruangan</th>
              <th>Kapasitas</th>
              <th>Kategori</th>
              <th>Deskripsi</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
              <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->capacity }}</td>
                <td class="capitalize">{{ $item->category }}</td>
                <td>{!! strip_tags($item->description) !!}</td>
                <td>
                  <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('storage/room_img/no_image.jpg') }}" 
                       alt="{{ $item->name }}" 
                       class="img-thumbnail" 
                       style="max-width: 100px; max-height: 100px;">
                </td>
                
                <td>
                  <div class="d-flex justify-content-center">
                    <!-- Tombol Edit -->
                    <a href="{{ url('rooms/'. hashidEncode($item->id_room). '/edit') }}">
                      <button class="btn btn-primary">
                        <i class="far fa-edit"></i>
                      
                      </button>
                    </a>

                    <!-- Tombol Delete -->
                    <form action="{{ url('rooms/') }}" method="POST"
                      class="mx-2">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt" style="color: #ffffff"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</x-_layout>
