@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">DATA MAHASISWA PEMBAYARAN</h1>
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
            <td>Rp. {{ $post->pembayaran }}</td>
            <td><a href="{{ asset('storage/' . $post->image) }}"><button class="btn btn-success" type="button">Bukti Pembayaran</button></a></div></td>
           
            <td>
                <a href="/dashboard/keuangan/{{ $post->id }}"
                 class="badge bg-info"> <span data-feather="eye"></span></a>

                <a href="/dashboard/keuangan/{{ $post->id }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
                
                
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