@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">DATA MAHASISWA REGISTRASI</h1>
  {{-- <div class="btn-group">
    <button type="button" class="btn btn-info">Download Data Mahasiswa</button>
    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
      <span class="visually-hidden">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Download</a></li>
    </ul>
  </div> --}}
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>

@endif



<div class="row justify-content-center mb-3 col-lg-8">
  <div class="col-md-6">
    <form action="" method="get">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari Postingan" name="keyword"  aria-describedby="basic-addon2">
        <button class="input-group-text btn btn-secondary" id="basic-addon2">Cari</button>
      </div>
    </form>
  </div>
</div>


<a href="/dashboard/posts/create" class="btn btn-primary mb-3"><span data-feather="plus"></span>Tambah Data Mahasiswa</a>

<div class="table-responsive col-lg-12">

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Mahasiswa</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Status Bayar</th>
          <th scope="col">Status Registrasi</th>
          <th scope="col">Nominal Pembayaran</th>
          <th scope="col">Bukti Pembayaran</th>
          
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($posts as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->nama }}</td>
            <td>{{ $post->category->name }}</td>
            <td>{{ $post->status_pembayaran }}</td>
            <td>{{ $post->status_registrasi }}</td>
            <td>{{ $post->pembayaran }}</td>
            <td><a href="{{ asset('storage/' . $post->image) }}"><button class="btn btn-success" type="button">Bukti Pembayaran</button></a></div></td>
            <td>
                <a href="/dashboard/posts/{{ $post->slug }}"
                 class="badge bg-info"> <span data-feather="eye"></span></a>

                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
                
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('apakah yakin ingin menghapus data')">
                  <span data-feather="trash-2"></span></button>
                </form>
                
            </td>
          
          </tr>  
        @endforeach
       
      </tbody>
    </table>
  </div>

  <div class="d-flex justify-content-center">
    {{ $posts->withQueryString()->links() }}
  </div>
@endsection