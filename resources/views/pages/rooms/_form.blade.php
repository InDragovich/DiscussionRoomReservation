@csrf
<div class="row">
  <div class="col-md-4">
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
  <div class="col-md-4">
    <div class="mb-3">
      <label for="capacity">Kapasitas Ruangan</label>
      <input class="form-control form-control @error('capacity') is-invalid @enderror" name="capacity" id="capacity"
        value="{{ $data['capacity'] ?? '' }}" type="number" placeholder="Masukkan Kapasitas Ruangan" min="1" onchange="updateCategory()">
      @error('capacity')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
  <div class="col-md-4">
    <div class="mb-3">
      <label for="category">Kategori Ruangan 
        <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" 
           title="Kecil: ≤ 5 orang&#10;Sedang: 6-10 orang&#10;Besar: 11-20 orang"></i>
      </label>
      <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" id="category" 
             value="{{ $data['category'] ?? '' }}" readonly>
      @error('category')
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
      <label for="image">Gambar Ruangan</label>
      <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="image" onchange="previewImage(this)">
      @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <img id="imagePreview" 
           src="{{ isset($data) && $data->image ? asset('storage/' . $data->image) : asset('storage/public/room_img/no_image.jpg') }}" 
           alt="Pratinjau Gambar" 
           style="max-width: 200px; height: auto;">
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
