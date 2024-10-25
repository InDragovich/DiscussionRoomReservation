<x-_layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="mb-3">
    <a href="{{ url('/reservasstions') }}" class="btn btn-primary">Kembali</a>
  </div>
  <!-- DataTables -->
  <div class="card shadow mb-4">
    <div class="card-body">
      @csrf
      <form action="{{ url('/reservations') }}" method="post">
        @include('pages.reservations._form', ['data' => old()])
      </form>
    </div>
  </div>


</x-_layout>
