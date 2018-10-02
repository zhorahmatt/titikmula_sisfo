<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::where('status', 1)->get();
        return view('pages.admin.kategori.index')
            ->withKategori($kategori);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request
        $request->validate([
            'nama_kategori'  => 'required|unique:master_kategori',
            'alamat'    => 'nullable',
            'telp'   => 'nullable'
        ]);

        $kategori = new Kategori;
        $kategori->nama_kategori = request('nama_kategori', 'Anonim');
        $kategori->deskripsi_kategori = request('deskripsi_kategori', '-');
        $kategori->status = 1;
        
        if ($kategori->save()) {
            //pesan flash berhasi simpan
            Session::flash('success', 'Berhasil menyimpan data');
            //redirect ke index
            return redirect()->route('kategori.index');
        }
        
        //pesan flash gagal simpan
        Session::flash('failed', 'Gagal menyimpan data');
        //redirect back
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thisKategori = Kategori::findOrFail($id);
        
        return view('pages.admin.kategori.edit')->withKategori($thisKategori);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = request('nama_kategori', 'Anonim');
        $kategori->deskripsi_kategori = request('deskripsi_kategori', '-');
        
        if ($kategori->save()) {
            //pesan flash berhasi simpan
            Session::flash('success', 'Berhasil memperbaharui data');
            //redirect ke index
            return redirect()->route('kategori.index');
        }
        
        //pesan flash gagal simpan
        Session::flash('failed', 'Gagal memperbaharui data');
        //redirect back
        return back();
    }
    /**
     * Remove the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->status = 0;
        if ($kategori->save()) {
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('kategori.index');
        }
        Session::flash('failed', 'Gagal menghapus data');
        return redirect()->route('kategori.index');
    }
}
