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
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
              <tr>
                {{-- <td>{{ $item->room }}</td>
                <td>{{ $item->capacity }}</td>
                <td>{{ $item->description }}</td> --}}
                <td>Room 3</td>
                <td>100</td>
                <td>Room 3</td>
                <td>
                  <div class="d-flex justify-content-center">
                    <!-- Tombol Edit -->
                    <a href="{{ url('rooms/' . hashidEncode($item->id_user) . '/edit') }}">
                      <button class="btn btn-primary">
                        <i class="far fa-edit"></i>
                      
                      </button>
                    </a>

                    <!-- Tombol Delete -->
                    <form action="{{ url('rooms/' . hashidEncode($item->id_user)) }}" method="POST"
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
