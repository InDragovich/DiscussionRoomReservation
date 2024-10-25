<x-_layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="mb-3">
    <a href="{{ url('rooms/') }}" class="btn btn-primary">Kembali</a>
  </div>
  <!-- DataTables -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="{{ url('rooms/' . hashidEncode($data->id_room)) }}" method="post"> 
        @method('PUT')
        @include('pages.rooms._form', ['data' => $data])
      </form>
    </div>
  </div>


</x-_layout>
