<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penulis;
use Session;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penulis = Penulis::where('status', 1)->get();
        return view('pages.admin.penulis.index')
            ->withPenulis($penulis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.penulis.create');
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
            'nama_penulis'  => 'required|unique:master_penulis',
            'alamat'    => 'nullable',
            'facebook_penulis'  => 'nullable',
            'instagram_penulis' => 'nullable',
            'twitter_penulis'   => 'nullable'
        ]);

        $penulis = new Penulis;
        $penulis->nama_penulis = request('nama_penulis', 'Anonim');
        $penulis->alamat = request('alamat', '-');
        $penulis->instagram_penulis = request('instagram', '-');
        $penulis->facebook_penulis = request('facebook', '-');
        $penulis->twitter_penulis = request('twitter', '-');
        $penulis->status = 1;
        
        if ($penulis->save()) {
            //pesan flash berhasi simpan
            Session::flash('success', 'Berhasil menyimpan data');
            //redirect ke index
            return redirect()->route('penulis.index');
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
        $thisPenulis = Penulis::findOrFail($id);
        
        return view('pages.admin.penulis.edit')->withPenulis($thisPenulis);
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
        $penulis = Penulis::findOrFail($id);
        $penulis->nama_penulis = request('nama_penulis', 'Anonim');
        $penulis->alamat = request('alamat', '-');
        $penulis->instagram_penulis = request('instagram', '-');
        $penulis->facebook_penulis = request('facebook', '-');
        $penulis->twitter_penulis = request('twitter', '-');
        
        if ($penulis->save()) {
            //pesan flash berhasi simpan
            Session::flash('success', 'Berhasil memperbaharui data');
            //redirect ke index
            return redirect()->route('penulis.index');
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
        $penulis = Penulis::findOrFail($id);
        $penulis->status = 0;
        if ($penulis->save()) {
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('penulis.index');
        }
        Session::flash('failed', 'Gagal menghapus data');
        return redirect()->route('penulis.index');
    }
}
