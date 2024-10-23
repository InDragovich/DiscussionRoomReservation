<x-_layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <!-- Content Row -->

  {{-- <div class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white">
    <h1 class="mb-3 h2"><b>Reservasi Discussion Room</b></h1>

    <h2 class="h4">
      <b></b>
    </h2>
  </div> --}}

  {{-- Lokasi Kalendar--}}
  
  <div class="card shadow mb-4">
    <!-- Card Header - Button -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Kalendar</h6>
        <div>
          @auth
            <a href="{{ route('user.reservations.create') }}" class="btn btn-primary">
                Reservasi Ruangan
            </a>
            @else
            <a href="#" class="btn btn-secondary" onclick="alert('Anda harus login untuk melakukan reservasi ruangan!');">
              Pesan Ruangan
          </a>
          @endauth
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="calendar-area">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Ketentuan Reservasi Ruangan</h6>
  </div>
  <div class="card-body">
    {{-- <ol>
      <li>Ruang berbayar diberlakukan untuk mahasiswa yang akan menggunakan ruang diskusi di atas kapasitas 10 orang.</li>
      <li>Dosen atau pegawai yang memakai ruang mini studio diberikan tarif peminjaman ruangan sesuai ketentuan.</li>
      <li>Khusus kegiatan perkuliahan/unit di Telkom University tidak diberlakukan tarif peminjaman.</li>
      <li>Anggota hanya dapat merequest peminjaman maksimal sebanyak 2x hingga admin melalukan approval/reject.</li>
      <li>Ketika admin sudah memberikan approval, anggota dapat datang ke bagian sirkulasi untuk mengambil kunci pada jam yang telah dipilih.</li>
      <li>Seluruh Anggota diwajibkan memberikan jaminan kartu identitas baik ktm/karpeg/ktp untuk ditukarkan dengan kunci.</li>
      <li>Jika admin sudah memberikan approval tetapi anggota tidak datang pada jam yang dipesan sebanyak 2x, maka akan dilakukan Blacklist pada bulan itu.</li>
      <li>
        Anggota yang melakukan pemesanan ruangan dengan durasi:
        <ul>
          <li>30 menit, pengambilan kunci paling lambat 15 menit setelah jam awal pemesanan.</li>
          <li>60 menit, pengambilan kunci paling lambat 30 menit setelah jam awal pemesanan.</li>
          <li>90-120 menit, pengambilan kunci paling lambat 60 menit setelah jam awal pemesanan.</li>
        </ul>
      </li>
    </ol> --}}
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
