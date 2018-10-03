<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Session;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::where('status', 1)->get();
        return view('pages.admin.member.index')
            ->withMember($members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.member.create');
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
            'nama'  => 'required',
            'alamat'    => 'nullable',
            'telp'   => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_identitas'  => 'required',
            'instagram' => 'nullable',
            'twitter'   => 'nullable',
            'facebook'  => 'nullable',
        ]);

        $members = new Member;
        $members->nama = request('nama', 'member-XYZ');
        $members->alamat = request('alamat', '-');
        $members->telp = request('telp','0');
        $members->tempat_lahir = request('tempat_lahir', '-');
        $members->tanggal_lahir = request('tanggal_lahir', '-');
        $members->no_identitas = request('no_identitas', '0');
        $members->instagram = request('instagram', '-');
        $members->twitter = request('twitter', '-');
        $members->facebook = request('facebook', '-');

        //kode member, TMM-0001
        $lastRegisteredMember = Member::orderBy('nomor_registrasi','desc')->first();
        if(!$lastRegisteredMember){
            $members->nomor_registrasi = 1;
            $members->kode_member = 'TMM-0001';
        }else{
            $getkodesum = (int)$lastRegisteredMember->nomor_registrasi + 1;
            $kodeMember = '';

            if($getkodesum >= 1 && $getkodesum < 9){
                $kodeMember = '000'.$getkodesum;
            }
            elseif ($getkodesum >= 10 && $getkodesum <= 99) {
                $kodeMember = '00'.$getkodesum; 
            } elseif ($getkodesum >= 100 && $getkodesum <= 999) {
                $kodeMember = '0'.$getkodesum;
            } elseif($getkodesum >= 1000){
                $kodeMember = (string)$getkodesum;
            }

            $members->nomor_registrasi = $getkodesum;
            $members->kode_member = 'TMM-'.$kodeMember;
        }

        $members->status = 1;
        $members->is_premium = 0;
        
        if ($members->save()) {
            //pesan flash berhasi simpan
            Session::flash('success', 'Berhasil menyimpan data');
            //redirect ke index
            return redirect()->route('member.index');
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
        $thisKategori = Member::findOrFail($id);
        
        return view('pages.admin.member.edit')->withMember($thisKategori);
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
        $members = Member::findOrFail($id);
        $members->nama = request('nama', 'member-XYZ');
        $members->alamat = request('alamat', '-');
        $members->telp = request('telp','0');
        $members->tempat_lahir = request('tempat_lahir', '-');
        $members->tanggal_lahir = request('tanggal_lahir', '-');
        $members->no_identitas = request('no_identitas', '0');
        $members->instagram = request('instagram', '-');
        $members->twitter = request('twitter', '-');
        $members->facebook = request('facebook', '-');
        
        if ($members->save()) {
            //pesan flash berhasi simpan
            Session::flash('success', 'Berhasil memperbaharui data');
            //redirect ke index
            return redirect()->route('member.index');
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
        $members = Member::findOrFail($id);
        $members->status = 0;
        if ($members->save()) {
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('member.index');
        }
        Session::flash('failed', 'Gagal menghapus data');
        return redirect()->route('member.index');
    }
}
