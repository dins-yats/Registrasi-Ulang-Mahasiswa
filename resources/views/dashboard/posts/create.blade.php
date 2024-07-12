@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Mahasiswa Baru</h1>
</div>

<div class="col-lg-8">
  <form method="POST" action="{{ url('/dashboard/posts/store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="NIM" class="form-label">NIM</label>
      <input type="text" class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM" required autofocus value="{{ old('NIM') }}">
      @error('NIM')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Mahasiswa</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Jurusan</label>
      <select class="form-select" name="category_id">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="SEMESTER" class="form-label">Semester</label>
      <input type="text" class="form-control @error('SEMESTER') is-invalid @enderror" id="SEMESTER" name="SEMESTER" required autofocus value="{{ old('SEMESTER') }}">
      @error('SEMESTER')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
      <input type="text" class="form-control @error('tahun_akademik') is-invalid @enderror" id="tahun_akademik" name="tahun_akademik" required autofocus value="{{ old('tahun_akademik') }}">
      @error('tahun_akademik')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
   
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"  autofocus value="{{ old('alamat') }}">
      @error('alamat')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="no_hp" class="form-label">NO HANDPHONE</label>
      <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" required autofocus value="{{ old('no_hp') }}">
      @error('no_hp')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
   
    
   
    <div class="mb-3">
      <input type="text" class="form-control" id="slug"  hidden name="slug" >
    </div>

    <button type="submit" class="btn btn-primary">Tambah Data Mahasiswa</button>
  </form>
</div>



<script>
  const title= document.querySelector('#nama');
    const slug= document.querySelector('#slug');


    title.addEventListener('change', function() {
      fetch('/dashboard/posts/checkSlug?nama=' + nama.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });


    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })



</script>


@endsection