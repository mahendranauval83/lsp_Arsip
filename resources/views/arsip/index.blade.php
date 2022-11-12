@extends('layouts.master')
@section('title','Arsip Surat')
<link rel="shortcut icon" href="{{asset('AdminLTE-3.2.0')}}/dist/img/dinas.png" type="image/x-icon">

@section('content')
<div class="container ">
    @if(Session::has('sucess'))
    <div class="alert alert-sucess " role="alert">
        {{Session::get('sucess')}}</div>
        @endif
<div class="d-flex flex-column pt-3 pb-2 mb-4 arsip-header" style="margin-left: 50px">
  <h1 class="h2">Arsip Surat</h1>
  <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</p>
  <p>Klik "lihat" pada kolom aksi untuk menampilkan surat.</p>
</div>

<div class="col-9 mt-5">
  <form action="/arsip">
    <div class="mb-3 row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Cari Surat</label>
      <div class="col-sm-5">
        <div class="input-group mb-3 input-group-sm">
          <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
          <button  type="submit" class="btn btn-dark" type="button" id="button-addon2">Cari</button>
        </div>
      </div>
    </div>
  </form>
</div>

@if ($archives->isEmpty())

@else 
<div class="table-responsive col-lg-9">
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">Nomor Surat</th>
        <th scope="col">Kategori</th>
        <th scope="col">Judul</th>
        <th scope="col">Waktu Pengerjaan</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($archives as $archive)
        <tr>
          <td>{{ $archive->nomor_surat }}</td>
          <td>{{ $archive->kategori }}</td>
          <td>{{ $archive->judul}}</td>
          <td>{{ $archive->created_at }}</td>
          <td class="d-flex align-items-center gap-1">
            <form id="deleteSubmit" action="{{ url('/arsip/'. $archive->id .'/delete') }}" method="POST">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button type="submit" class="badge btn btn-danger delete-data">
                Hapus
              </button>
            </form>
            <a href="{{ asset('storage/'. $archive->upload_file) }}" download>
              <button type="button" class="badge btn btn-warning mx-1 border-0">
                Unduh
              </button>
            </a>
            <a href="{{ url('/arsip/'. $archive->id .'/view') }}">
              <button type="button" class="badge btn btn-primary mx-1 border-0">
                Lihat >>
              </button>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @endif

  <a href="/arsip/create" class="btn btn-success btn-sm">Arsipkan Surat...</a>

</div>

@endsection