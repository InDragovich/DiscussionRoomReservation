@csrf
<div class="row">
  <div class="col-md-6">
    <div class="mb-3">
      <label for="id_room">Nama Ruangan</label>
      <select class="form-control @error('id_room') is-invalid @enderror" name="id_room" id="id_room">
        <option value="">Pilih Ruangan</option>
        @foreach($rooms as $room)
          <option value="{{ $room->id_room }}" {{ (old('id_room') == $room->id_room) ? 'selected' : '' }}>
            {{ $room->name }}
          </option>
        @endforeach
        {{-- <option value="">Pilih Ruangan</option>
        @foreach(['Ruang Rapat A', 'Ruang Rapat B', 'Ruang Konferensi', 'Ruang Seminar'] as $index => $roomName)
          <option value="{{ $index + 1 }}" {{ (old('id_room') == $index + 1) ? 'selected' : '' }}>
            {{ $roomName }}
          </option>
        @endforeach --}}
      </select>
      @error('id_room')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>

  <div class="col-md-6">
    <div class="mb-3">
      <label for="reservation_date">Tanggal Pemesanan</label>
      <input type="date" class="form-control @error('reservation_date') is-invalid @enderror" name="reservation_date" id="reservation_date" value="{{ old('reservation_date') }}">
      @error('reservation_date')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="mb-3">
      <label for="start_time">Jam Mulai</label>
      <select class="form-control @error('start_time') is-invalid @enderror" name="start_time" id="start_time">
        <option value="">Pilih Jam Mulai</option>
        @for($hour = 8; $hour < 22; $hour++)
          @foreach(['00', '30'] as $minute)
            <option value="{{ sprintf('%02d:%s', $hour, $minute) }}" {{ (old('start_time') == sprintf('%02d:%s', $hour, $minute)) ? 'selected' : '' }}>
              {{ sprintf('%02d:%s', $hour, $minute) }}
            </option>
          @endforeach
        @endfor
      </select>
      @error('start_time')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>

  <div class="col-md-6">
    <div class="mb-3">
      <label for="duration">Durasi (menit)</label>
      <select class="form-control @error('duration') is-invalid @enderror" name="duration" id="duration">
        <option value="">Pilih Durasi</option>
        @foreach([30, 60, 90, 120] as $duration)
          <option value="{{ $duration }}" {{ (old('duration') == $duration) ? 'selected' : '' }}>
            {{ $duration }} menit
          </option>
        @endforeach
      </select>
      @error('duration')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="mb-3">
      <label for="purpose">Tujuan</label>
      <textarea class="form-control @error('purpose') is-invalid @enderror" name="purpose" id="purpose" rows="3" placeholder="Masukkan tujuan pemesanan ruangan">{{ old('purpose') }}</textarea>
      @error('purpose')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="mb-3">
      <label for="members">Nama Anggota</label>
      <textarea class="form-control @error('members') is-invalid @enderror" name="members" id="members" rows="3" placeholder="Masukkan nama-nama anggota (satu nama per baris)">{{ old('members') }}</textarea>
      @error('members')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
</div>

<button class="btn btn-primary" type="submit">Simpan Reservasi</button>