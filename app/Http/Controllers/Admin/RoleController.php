<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Access;
use Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::where('status', 1)->get();
        return view('pages.admin.role.index')
            ->withRoles($role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $access = Access::where('status', 1)->get();
        return view('pages.admin.role.create')
            ->withAccess($access);
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
            'nama_roles'  => 'required',
            'keterangan' => 'nullable'
        ]);

        $role = new Role;
        $role->nama_roles = request('nama_roles');
        $role->keterangan = request('keterangan', '-');
        
        //find roles
        if ($role->save()) {
            //attach access to role
            $role->addPermission(request('access'));

            // pesan berhasil
            Session::flash('success', 'Berhasil menyimpan data');
            return redirect()->route('role.index');
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
        $role = Role::findOrFail($id);
        return view('pages.admin.role.edit')
            ->withRoles($role);
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
        $role = Role::findOrFail($id);
        $role->nama_roles = request('nama_roles');
        $role->keterangan = request('keterangan', '-');
        
        
        if ($role->save()) {
            // pesan berhasil
            Session::flash('success', 'Berhasil memperbaharui data');
            return redirect()->route('role.index');
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
        $role = Role::findOrFail($id);
        $role->status = 0;
        if ($role->save()) {
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('role.index');
        }
        Session::flash('failed', 'Gagal menghapus data');
        return redirect()->route('role.index');
    }
}
