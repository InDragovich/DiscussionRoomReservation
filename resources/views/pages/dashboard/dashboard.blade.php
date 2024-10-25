<x-_layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  {{-- Kalendar --}}
  <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Kalendar</h6>
          <div>
              {{-- @auth --}}
                  <a href="{{ route('reservations.index') }}" class="btn btn-primary">
                      Reservasi Ruangan
                  </a>
              {{-- @else --}}
                  {{-- <a href="#" class="btn btn-secondary" onclick="alert('Anda harus login untuk melakukan reservasi ruangan!');">
                      Reservasi Ruangan
                  </a> --}}
              {{-- @endauth --}}
          </div>
      </div>
      <div class="card-body">
          <div class="calendar-area">
              <div id="calendar"></div>
          </div>
      </div>
  </div>

  {{-- Ketentuan Reservasi --}}
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Ketentuan Reservasi Ruangan</h6>
      </div>
      <div class="card-body">
          <ol>
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
              <li>Etiam feugiat ipsum non ligula facilisis, quis placerat risus tincidunt.</li>
              <li>Curabitur placerat turpis at turpis tincidunt, in gravida lacus suscipit.</li>
              <li>Nulla tristique ipsum accumsan magna venenatis, consectetur condimentum massa mollis.</li>
              <li>In a mi ut tortor gravida tincidunt non sit amet nisi.</li>
          </ol>
      </div>
  </div>
</x-_layout>