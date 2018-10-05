<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Access;
use Session;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $access = Access::where('status', 1)->get();
        return view('pages.admin.access.index')
            ->withAccess($access);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.access.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_access'  => 'required',
            'keterangan' => 'nullable'
        ]);

        $access = new Access;
        $access->nama_access = request('nama_access');
        $access->keterangan = request('keterangan', '-');
        
        //find roles
        if ($access->save()) {
            // pesan berhasil
            Session::flash('success', 'Berhasil menyimpan data');
            return redirect()->route('access.index');
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
        $access = Access::findOrFail($id);
        return view('pages.admin.access.edit')
            ->withAccess($access);
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
        $access = Access::findOrFail($id);
        $access->nama_access = request('nama_access');
        $access->keterangan = request('keterangan', '-');
        
        
        if ($access->save()) {
            // pesan berhasil
            Session::flash('success', 'Berhasil memperbaharui data');
            return redirect()->route('access.index');
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
        $access = Access::findOrFail($id);
        $access->status = 0;
        if ($access->save()) {
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('access.index');
        }
        Session::flash('failed', 'Gagal menghapus data');
        return redirect()->route('access.index');
    }
}
