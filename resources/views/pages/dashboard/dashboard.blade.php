<x-_layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  {{-- Kalendar --}}
  <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-calendar-alt"></i> Kalender Interaktif</h6>
          <div>
              {{-- @auth --}}
                  <a href="{{ route('reservations.create') }}" class="btn btn-primary">
                      Reservasi Ruangan
                  </a>
              {{-- @else --}}
                  {{-- <a href="#" class="btn btn-secondary" onclick="alert('Anda harus login untuk melakukan reservasi ruangan!');">
                      Reservasi Ruangan
                  </a> --}}
              {{-- @endauth --}}
          </div>
      </div>
        <div class="card-body p-0">
        <div class="calendar-scroll" style="overflow: auto; max-height: 400px;">
            <table class="table table-bordered m-0" style="min-width: 1000px;">
                <thead>
                    <tr>
                        <th style="position: sticky; left: 0; top: 0; background-color: #fff; z-index: 3;">Ruangan / Jam</th>
                        @for ($hour = 8; $hour <= 17; $hour++)
                            <th style="position: sticky; top: 0; background-color: #fff; z-index: 2;">{{ sprintf('%02d:00', $hour) }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->sortBy('name') as $room)
                        <tr>
                            <td style="position: sticky; left: 0; background-color: #fff; z-index: 1;">
                                <span data-toggle="tooltip" data-html="true" title="<img src='{{ $room->image_url }}' alt='{{ $room->name }}' style='max-width: 200px; max-height: 150px;'>">
                                    {{ $room->name }}
                                    
                                </span>
                            </td>
                            @for ($hour = 8; $hour <= 17; $hour++)
                                <td class="{{ getRandomStatus() }}"></td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
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