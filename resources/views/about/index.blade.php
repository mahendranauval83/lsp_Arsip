@extends('layouts.master')
@section('title','About')
<link rel="shortcut icon" href="{{asset('AdminLTE-3.2.0')}}/dist/img/dinas.png" type="image/x-icon">

@section('content')

<div class="container ">
    @if(Session::has('sucess'))
    <div class="alert alert-sucess " role="alert">
        {{Session::get('sucess')}}</div>
        @endif
        <div class="car-body">
        <h1>About</h1>

</div>
<div class="panel-heading " >
      
            </div>
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

                <div class="panel-body py-10">
                    
     <p style=”text-align:justify;”><img src="{{asset('AdminLTE-3.2.0')}}/dist/img/fotosaya.jpg"  style=”float:right;” width="200" height = "200"/> 
     &ensp;
    <table style="float:right" border="0">
        
        <tbody>
            <tr>
                <td>Aplikasi Ini Dibuat Oleh :</td>
            
            </tr>
            <tr>
                <td>Nama   </td>
                <td>: Ahmad Nauval Aulia Mahendra</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>NIM </td>
                <td>: 2031730154</td>
            </tr>
        </tfoot>
        <tfoot>
            <tr>
                <td>Tanggal</td>
                <td>: 02 November 2022</td>
            </tr>
        </tfoot>
    </table>
                
                
               </p>
                   <br>
               

                  
                </div>
            </div>
        </div>

        </div>
            </div>
        </div>
    </div>

    @stop

@push('scripts')
<script>
$(function() {
    $('#table-arsip').DataTable();
});
</script>

@endpush

