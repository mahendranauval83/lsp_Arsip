@extends('layouts.master')
@section('title','Arsip Surat')
<link rel="shortcut icon" href="{{asset('AdminLTE-3.2.0')}}/dist/img/dinas.png" type="image/x-icon">

@section('content')
<div class="container ">
    @if(Session::has('sucess'))
    <div class="alert alert-sucess " role="alert">
        {{Session::get('sucess')}}</div>
        @endif
<div class="d-flex flex-column pt-3 mb-3 arsip-header" style="margin-left: 50px">
  <h1 class="h2">Arsip Surat >> Lihat</h1>
  <p>Nomor: {{ $archive->nomor_surat}}</p>
  <p>Kategori: {{ $archive->kategori}}</p>
  <p>Judul: {{ $archive->judul}}</p>
  <p>Waktu Unggah: {{ $archive->created_at}}</p>
</div>

<iframe src="{{ asset('/storage/'. $archive->upload_file) }}" width="100%" height="370px"></iframe>

<div class="d-flex align-items-center gap-1 mt-3">
  <a href="/arsip">
    <button type="button" class="btn btn-primary mx-1 btn-sm">
     << Kembali
    </button>
  </a>
  <a href="{{ asset('storage/'. $archive->upload_file) }}" download>
    <button type="button" class="btn btn-warning mx-1 btn-sm">
      Unduh
    </button>
  </a>
  <a href="{{ url('/arsip/'. $archive->id .'/edit') }}">
    <button type="button" class="btn btn-secondary mx-1 btn-sm">
    Edit/Ganti File
    </button>
  </a>
</div>


@endsection