@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Data Pembayaran </h1>
</div>

<div class="col-lg-8">
  <form method="POST" action="/dashboard/keuangan/{{ $post->id }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="NIM" class="form-label">NIM</label>
      <input type="text" class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM" disabled autofocus 
      value="{{ old('NIM', $post->NIM) }}">
      @error('NIM')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Mahasiswa</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" disabled autofocus 
      value="{{ old('nama', $post->nama) }}">
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  
    <div class="mb-3">
      <label for="SEMESTER" class="form-label">SEMESTER</label>
      <input type="text" class="form-control @error('SEMESTER') is-invalid @enderror" id="SEMESTER" name="SEMESTER" disabled autofocus 
      value="{{ old('SEMESTER', $post->SEMESTER) }}">
      @error('SEMESTER')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Jurusan</label>
      <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" disabled autofocus 
      value="{{ old('category', $post->category->name) }}">
      @error('category')
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
      <input type="text" class="form-control @error('pembayaran') is-invalid @enderror" id="pembayaran" name="pembayaran" required autofocus 
      value="{{ old('pembayaran', $post->pembayaran) }}">
      @error('pembayaran')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <div>
        <label for="jenis_bayar" class="form-label">Jenis Pembayaran</label>
      <select class="form-select" id="jenis_bayar" name="jenis_bayar" required value="{{ old('jenis_bayar') }}">
        <option selected>-- Pilih Pembayaran --</option>
        <option value="UKT">UKT</option>
        <option value="Kunjungan Industri">Kunjungan Industri</option>
        <option value="Kerja Praktek">Kerja Praktek</option>
        <option value="Sidang Proposal">Sidang Proposal</option>
        <option value="Sidang Komprehefsip">Sidang Komprehensif</option>
      </select>
    </div>
    </div>
    <div class="mb-3">
      <div>
        <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
      <select class="form-select" id="status_pembayaran" name="status_pembayaran" required value="{{ old('status_pembayaran') }}">
        <option selected>-- Pilih Status --</option>
        <option value="SUDAH LUNAS">SUDAH LUNAS</option>
        <option value="BELUM LUNAS">BELUM LUNAS</option>
        <option value="BAYAR SETENGAH">BAYAR SETENGAH</option>
      </select>
    </div>
    </div>
    <div class="mb-3">
      <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
      <input type="text" class="form-control @error('tanggal_pembayaran') is-invalid @enderror" id="tanggal_pembayaran" name="tanggal_pembayaran" required autofocus 
      value="{{ old('tanggal_pembayaran', $post->tanggal_pembayaran) }}">
      @error('tanggal_pembayaran')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="sisa" class="form-label">Sisa Pembayaran</label>
      <input type="text" class="form-control @error('sisa') is-invalid @enderror" id="sisa" name="sisa" required autofocus 
      value="{{ old('sisa', $post->sisa) }}">
      @error('sisa')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="bts_tgl" class="form-label">Batas Tanggal Pelunasan</label>
      <input type="text" class="form-control @error('bts_tgl') is-invalid @enderror" id="bts_tgl" name="bts_tgl" required autofocus 
      value="{{ old('bts_tgl', $post->bts_tgl) }}">
      @error('bts_tgl')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Bukti Pembayaran</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
       name="image" onchange="previewImage()" required>
      @error('image')
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror    </div>
    <div class="mb-3">
      <div>
        <label for="status_registrasi" class="form-label">Status Registrasi</label>
      <select class="form-select" id="status_registrasi" name="status_registrasi" required value="{{ old('status_registrasi') }}">
        <option selected>-- Pilih Status --</option>
        <option value="SUDAH REGISTRASI">SUDAH REGISTRASI</option>
        <option value="BELUM REGISTRASI">BELUM REGISTRASI</option>
      </select>
    </div>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" id="slug" name="slug" hidden readonly value="{{ old('slug', $post->slug) }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Data Pembayaran</button>
  </form>
</div>




<script>
  const nama= document.querySelector('#nama');
    const slug= document.querySelector('#slug');


    nama.addEventListener('change', function() {
      fetch('/dashboard/posts/checkSlug?nama=' + nama.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });


    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })


    // image previewImage
    function previewImage(){
      const image      = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;

      }
    }


</script>


@endsection