@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-4">
       <div class="col-lg-8">
 
 
          <h1 class="mb-3">{{ $post->title }}</h1>
            <div class="mb-3">
          <a href="/dashboard/keuangan" class="btn btn-primary"><span data-feather="arrow-left"></span> Kembali Ke Menu Data Mahasiswa</a>
          <a href="/dashboard/keuangan/{{ $post->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
          <div class="btn-group">
            <button type="button" class="btn btn-info">Download Data Mahasiswa</button>
            <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Download</a></li>
            </ul>
          </div>
         </div>


         <div class="col-lg-8">
              @csrf
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" disabled autofocus value="{{ old('nama', $post->nama ) }}">
                
              </div>
              {{-- jurusan  --}}
              <div class="mb-3">
                <label for="SEMESTER" class="form-label">Semester</label>
                <input type="text" class="form-control @error('SEMESTER') is-invalid @enderror" id="SEMESTER" name="SEMESTER" disabled autofocus value="{{ old('SEMESTER', $post->SEMESTER) }}">
              
              </div>
              <div class="mb-3">
                <label for="NIM" class="form-label">NIM</label>
                <input type="text" class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM" disabled autofocus value="{{ old('NIM', $post->NIM) }}">
               
              </div>
              <div class="mb-3">
                <label for="NIK" class="form-label">NIK</label>
                <input type="text" class="form-control @error('NIK') is-invalid @enderror" id="NIK" name="NIK" disabled autofocus value="{{ old('NIK', $post->NIK) }}">
              
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
                <label for="tanggal_pembayaran" class="form-label">Tanggal Bayar</label>
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