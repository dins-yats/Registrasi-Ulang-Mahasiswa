@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-4">
       <div class="col-lg-8">
 
 
          <h1 class="mb-3">{{ $post->title }}</h1>
            <div class="mb-3">
          <a href="/dashboard/posts" class="btn btn-primary"><span data-feather="arrow-left"></span> Kembali Ke Menu Data Mahasiswa</a>
          <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
          <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger border-0" onclick="return confirm('apakah yakin ingin menghapus data')">
              <span data-feather="trash-2"></span>Hapus</button>
            </form>
         </div>


         <div class="col-lg-8">
              @csrf
              <div class="mb-3">
                <label for="NIM" class="form-label">NIM</label>
                <input type="text" class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM" disabled autofocus value="{{ old('NIM', $post->NIM) }}">
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" disabled autofocus value="{{ old('nama', $post->nama ) }}">
              </div>
              <div class="mb-3">
                <label for="category" class="form-label">Jurusan</label>
                <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" disabled autofocus value="{{ old('category', $post->category->name ) }}">
              </div>
              {{-- jurusan  --}}
              <div class="mb-3">
                <label for="SEMESTER" class="form-label">Semester</label>
                <input type="text" class="form-control @error('SEMESTER') is-invalid @enderror" id="SEMESTER" name="SEMESTER" disabled autofocus value="{{ old('SEMESTER', $post->SEMESTER) }}">
              
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" disabled autofocus value="{{ old('alamat', $post->alamat) }}">
             
              </div>
              <div class="mb-3">
                <label for="no_hp" class="form-label">NO HANDPHONE</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" disabled autofocus value="{{ old('no_hp', $post->no_hp) }}">
             
              </div>
              <div class="mb-3">
                <label for="pembayaran" class="form-label">Jumlah Bayar</label>
                <input type="text" class="form-control @error('pembayaran') is-invalid @enderror" id="pembayaran" name="pembayaran" disabled autofocus value="{{ old('pembayaran', $post->pembayaran) }}">
              
              </div>
              <div class="mb-3">
                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                <input type="text" class="form-control @error('status_pembayaran') is-invalid @enderror" id="status_pembayaran" name="status_pembayaran" disabled autofocus value="{{ old('status_pembayaran', $post->status_pembayaran) }}">
             
              </div>
              <div class="mb-3">
                <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
                <input type="text" class="form-control @error('tanggal_pembayaran') is-invalid @enderror" id="tanggal_pembayaran" name="tanggal_pembayaran" disabled autofocus value="{{ old('tanggal_pembayaran', $post->tanggal_pembayaran) }}">
             
              </div>
              <div class="mb-3">
                <label for="status_registrasi" class="form-label">Status Registrasi</label>
                <input type="text" class="form-control @error('status_registrasi') is-invalid @enderror" id="status_registrasi" name="status_registrasi" disabled autofocus value="{{ old('status_registrasi', $post->status_registrasi) }}">
               
              </div>
          </div>
                  {{-- @if ($post->image)
                  <div style="max-height: 600px; overflow:hidden">
                  <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                  </div>
                  @else
                  <img src="https://source.unsplash.com/1000x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                  @endif
          <article class="my-5">
 
             {!! $post->body !!}
             {{ $post->body }}
          </article>
          --}}

       </div>
    </div>
 </div>
 

@endsection