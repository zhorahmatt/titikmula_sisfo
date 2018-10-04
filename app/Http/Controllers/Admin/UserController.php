<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Access;
use App\Models\Role;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('pages.admin.user.index')
            ->withUser($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('status', 1)->get();
        return view('pages.admin.user.create')
            ->withRoles($roles);
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
            'name'  => 'required',
            'email' => 'required|unique:users',
            'password'  => 'required|min:6|max:15',
        ]);

        $user = new User;
        $user->name = request('name', 'User-XYZ');
        $user->email = request('email', 'userxyz@titikmula.com');
        $user->password = bcrypt(request('password', 'userxyz12345'));
        
        //find roles
        $role = Role::where('nama_roles', request('roles'))->first();
        if ($role) {
            if ($user->save()) {
                $user->roles()->attach($role);

                // pesan berhasil
                Session::flash('success', 'Berhasil menyimpan data');
                return redirect()->route('user.index');
            }
            //pesan flash gagal simpan
            Session::flash('failed', 'Gagal menyimpan data');
            //redirect back
            return back();
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
        $user = User::findOrFail($id);
        $roles = Role::where('status', 1)->get();
        return view('pages.admin.user.edit')
            ->withUser($user)
            ->withRoles($roles);
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
        $user = User::findOrFail($id);
        $user->name = request('name', 'User-XYZ');
        
        //find roles
        $role = Role::where('nama_roles', request('roles'))->first();
        if ($role) {
            if ($user->save()) {
                $user->roles()->attach($role);

                // pesan berhasil
                Session::flash('success', 'Berhasil memperbaharui data');
                return redirect()->route('user.index');
            }
            //pesan flash gagal simpan
            Session::flash('failed', 'Gagal memperbaharui data');
            //redirect back
            return back();
        }
        //pesan flash gagal simpan
        Session::flash('failed', 'Gagal memperbaharui data');
        //redirect back
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
