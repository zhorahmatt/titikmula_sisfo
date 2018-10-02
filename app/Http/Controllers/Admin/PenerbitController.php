<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Session;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = Penerbit::where('status', 1)->get();
        return view('pages.admin.penerbit.index')
            ->withPenerbit($penerbit);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.penerbit.create');
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
            'nama_penerbit'  => 'required|unique:master_penerbit',
            'alamat'    => 'nullable',
            'telp'   => 'nullable'
        ]);

        $penerbit = new Penerbit;
        $penerbit->nama_penerbit = request('nama_penerbit', 'Anonim');
        $penerbit->alamat = request('alamat', '-');
        $penerbit->telp = request('telp', '0');
        $penerbit->status = 1;
        
        if ($penerbit->save()) {
            //pesan flash berhasi simpan
            Session::flash('success', 'Berhasil menyimpan data');
            //redirect ke index
            return redirect()->route('penerbit.index');
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
        $thisPenerbit = Penerbit::findOrFail($id);
        
        return view('pages.admin.penerbit.edit')->withPenerbit($thisPenerbit);
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
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->nama_penerbit = request('nama_penerbit', 'Anonim');
        $penerbit->alamat = request('alamat', '-');
        $penerbit->telp = request('telp', '0');
        
        if ($penerbit->save()) {
            //pesan flash berhasi simpan
            Session::flash('success', 'Berhasil memperbaharui data');
            //redirect ke index
            return redirect()->route('penerbit.index');
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
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->status = 0;
        if ($penerbit->save()) {
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('penerbit.index');
        }
        Session::flash('failed', 'Gagal menghapus data');
        return redirect()->route('penerbit.index');
    }
}
