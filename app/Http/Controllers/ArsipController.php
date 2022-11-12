<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archives = Arsip::latest();

        if(request('search')){
            $archives->where('judul', 'like', '%'. request('search') .'%');    
        }
        return view('arsip.index', [
            'title' => 'Arsip',
            'archives' => $archives->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arsip.create', [
            'title' => 'Arsip',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('upload_file');
        $fileName = $file->getClientOriginalName();

        $validatedData = $request->validate([
            "nomor_surat" => "required",
            "kategori" => "required",
            "judul" => "required",
            "upload_file" => "required|mimes:pdf",
        ]);

        if($request->file('upload_file')){
            $validatedData['upload_file'] = $file->storeAs('pdf_file', $fileName);
        }

        Arsip::create($validatedData);
        return redirect('/arsip')->with('success', 'Data berhasil diarsipkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Arsip::findOrFail($id);
        return view('arsip.view', [
            'title' => 'Arsip',
            'archive' => Arsip::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Arsip::findOrFail($id);
        return view('arsip.edit', [
            'title' => 'Arsip',
            'archive' => Arsip::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $file = $request->file('upload_file');
        
        if($request->file('upload_file')){
            $validatedData = $request->validate([
                "nomor_surat" => "required",
                "kategori" => "required",
                "judul" => "required",
                "upload_file" => "required|mimes:pdf",
            ]);
            //get original file name
            $fileName = $file->getClientOriginalName();

            if($request->oldPdfFile){
                Storage::delete($request->oldPdfFile);
            }
            $validatedData['upload_file'] = $file->storeAs('pdf_file', $fileName);

            Arsip::where('id', $id)->update($validatedData);
        }
        else{
            $validatedData = $request->validate([
                "nomor_surat" => "required",
                "kategori" => "required",
                "judul" => "required",
            ]);
            Arsip::where('id', $id)->update($validatedData);
        }
        
        return redirect('/arsip/'. $id .'/view')->with('updated', 'Berhasil diarsipkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $archive = Arsip::find($id);
        $archive->delete();
        
        if($archive->upload_file){
            Storage::delete($archive->upload_file);
        }
        
        return redirect('/arsip')->with('delete', 'Data berhasil dihapus!');
    }
}
