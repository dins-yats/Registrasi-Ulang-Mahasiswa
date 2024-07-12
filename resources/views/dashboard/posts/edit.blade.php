@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Data Registrasi </h1>
</div>

<div class="col-lg-8">
  <form method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Mahasiswa</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus 
      value="{{ old('nama', $post->nama) }}">
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="NIM" class="form-label">NIM</label>
      <input type="text" class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM" required autofocus 
      value="{{ old('NIM', $post->NIM) }}">
      @error('NIM')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="SEMESTER" class="form-label">SEMESTER</label>
      <input type="text" class="form-control @error('SEMESTER') is-invalid @enderror" id="SEMESTER" name="SEMESTER" disa autofocus 
      value="{{ old('SEMESTER', $post->SEMESTER) }}">
      @error('SEMESTER')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" disabled autofocus 
      value="{{ old('alamat', $post->alamat) }}">
      @error('alamat')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="no_hp" class="form-label">No Hp</label>
      <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" disabled autofocus 
      value="{{ old('no_hp', $post->no_hp) }}">
      @error('no_hp')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="pembayaran" class="form-label">Pembayaran</label>
      <input type="text" class="form-control @error('pembayaran') is-invalid @enderror" id="pembayaran" name="pembayaran" disabled autofocus 
      value="{{ old('pembayaran', $post->pembayaran) }}">
      @error('pembayaran')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="status_pembayaran" class="form-label">Status Pembayaran </label>
      <input type="text" class="form-control @error('status_pembayaran') is-invalid @enderror" id="status_pembayaran" name="status_pembayaran" disabled autofocus 
      value="{{ old('status_pembayaran', $post->status_pembayaran) }}">
      @error('status_pembayaran')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
   
    <div class="mb-3">
      <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
      <input type="text" class="form-control @error('tanggal_pembayaran') is-invalid @enderror" id="tanggal_pembayaran" name="tanggal_pembayaran" disabled autofocus 
      value="{{ old('tanggal_pembayaran', $post->tanggal_pembayaran) }}">
      @error('tanggal_pembayaran')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="sisa" class="form-label">Sisa Pembayaran</label>
      <input type="text" class="form-control @error('sisa') is-invalid @enderror" id="sisa" name="sisa" disabled autofocus 
      value="{{ old('sisa', $post->sisa) }}">
      @error('sisa')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="bts_tgl" class="form-label">Batas Tanggal Pelunasan</label>
      <input type="text" class="form-control @error('bts_tgl') is-invalid @enderror" id="bts_tgl" name="bts_tgl" disabled autofocus 
      value="{{ old('bts_tgl', $post->bts_tgl) }}">
      @error('bts_tgl')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" id="slug" name="slug" hidden readonly value="{{ old('slug', $post->slug) }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Data Registrasi</button>
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