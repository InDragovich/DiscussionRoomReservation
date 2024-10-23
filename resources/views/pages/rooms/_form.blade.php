@csrf
<div class="row">
  <div class="col-md-6">
    <div class="mb-3">
      <label for="name">Nama Ruangan</label>
      <input class="form-control form-control @error('name') is-invalid @enderror" name="name" id="name"
        value="{{ $data['name'] ?? '' }}" type="text" placeholder="Masukkan Ruangan">
      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>

  <div class="col-md-6">
    <div class="mb-3">
      <label for="capacity">Kapasitas Ruangan</label>
      <input class="form-control form-control @error('capacity') is-invalid @enderror" name="capacity" id="capacity"
        value="{{ $data['capacity'] ?? '' }}" type="text" placeholder="Masukkan Kapasitas Ruangan">
      @error('capacity')
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
      <label for="description">Deskripsi</label>
      <textarea class="form-control @error('description') is-invalid @enderror" name="description"
        id="description" placeholder="Masukkan Deskripsi">{{ $data['description'] ?? '' }}</textarea>
      @error('description')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
</div>

<button class="btn btn-secondary" type="submit">Simpan</button>
