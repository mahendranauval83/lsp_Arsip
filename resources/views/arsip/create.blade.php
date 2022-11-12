@extends('layouts.master')
@section('title','Arsip Surat')
<link rel="shortcut icon" href="{{asset('AdminLTE-3.2.0')}}/dist/img/dinas.png" type="image/x-icon">

@section('content')
<div class="container ">
    @if(Session::has('sucess'))
    <div class="alert alert-sucess " role="alert">
        {{Session::get('sucess')}}</div>
        @endif
<div class="d-flex flex-column py-3 pb-2 mb-5 arsip-header">
  <h1 class="h2">Arsip Surat >> Unggah</h1>
  <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
  <p>Catatan: </p>
  <p style="text-indent: 25px;">● Gunakan file berformat pdf</p>
</div>

<div class="col-9">
  <form action="/arsip" method="POST" enctype="multipart/form-data">
    @csrf
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-3 col-form-label">Nomor Surat</label>
    <div class="col-sm-5">
      <input required value="{{ old('nomor_surat') }}" name="nomor_surat" type="text" class="form-control form-control-sm" id="inputPassword">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword2" class="col-sm-3 col-form-label">Kategori</label>
    <div class="col-sm-5">
      <select required value="{{ old('kategori') }}" class="form-select form-select-sm" aria-label="Default select example" name="kategori">
        <option selected value="Undangan">Undangan</option>
        <option value="Pengumuman">Pengumuman</option>
        <option value="Nota Dinas">Nota Dinas</option>
        <option value="Pemberitahuan">Pemberitahuan</option>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword3" class="col-sm-3 col-form-label">Judul</label>
    <div class="col-sm-5">
      <input required value="{{ old('judul') }}" name="judul" type="text" class="form-control form-control-sm" id="inputPassword3">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword3" class="col-sm-3 col-form-label">File Surat (PDF)</label>
    <div class="col-sm-5">
      <input required value="{{ old('uppload_file') }}" name="upload_file" type="file" class="form-control form-control-sm @error('upload_file') is-invalid @enderror" accept="application/pdf" id="inputPassword3">
      @error('upload_file') 
        <div class="invalid-feedback">
           {{ $message }}
        </div>
      @enderror
    </div>
  </div>
    <a href="/arsip">
      <button type="button" class="btn btn-primary btn-sm">
      << Kembali
      </button>
    </a>
    <button type="submit" class="btn btn-secondary btn-sm">Simpan</button>
  </form>
</div>

@endsection
