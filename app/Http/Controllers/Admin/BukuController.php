<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Penulis;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::where('status', 1)->get();
        return view('pages.admin.buku.index')
            ->withBuku($buku);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penulis = Penulis::where('status', 1)->select('id','nama_penulis')->get();
        $penerbit = Penerbit::where('status',1)->select('id','nama_penerbit')->get();
        $kategori = Kategori::where('status', 1)->select('id','nama_kategori')->get();
        return view('pages.admin.buku.create')
            ->withPenulis($penulis)
            ->withPenerbit($penerbit)
            ->withKategori($kategori);
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
            'judul_buku'  => 'required',
            'kategori'    => 'required',
            'penulis'   => 'required',
            'penerbit' => 'required',
            'deskripsi' => 'nullable',
            'jml_halaman'   => 'nullable'
        ]);

        $buku = new Buku;
        $buku->judul_buku = request('judul_buku', 'buku-XYZ');
        $buku->kategori = request('kategori','000');
        $buku->penulis = request('penulis','000');
        $buku->penerbit = request('penerbit','000');
        $buku->deskripsi = request('deskripsi', '-');
        $buku->jml_halaman = request('jml_halaman', '0');
        
        //kode buku , TMB-0001
        $lastRegisteredBook = Buku::orderBy('nomor_registrasi_buku','desc')->first();
        if(!$lastRegisteredBook){
            $buku->nomor_registrasi_buku = 1;
            $buku->kode_buku = 'TMB-0001';
        }else{
            $getkodesum = (int)$lastRegisteredBook->nomor_registrasi_buku + 1;
            $kodeBuku = '';

            if($getkodesum >= 1 && $getkodesum < 9){
                $kodeBuku = '000'.$getkodesum;
            }
            elseif ($getkodesum >= 10 && $getkodesum <= 99) {
                $kodeBuku = '00'.$getkodesum; 
            } elseif ($getkodesum >= 100 && $getkodesum <= 999) {
                $kodeBuku = '0'.$getkodesum;
            } elseif($getkodesum >= 1000){
                $kodeBuku = (string)$getkodesum;
            }

            $buku->nomor_registrasi_buku = $getkodesum;
            $buku->kode_buku = 'TMM-'.$kodeBuku;
        }
        $buku->status = 1;
        
        if ($buku->save()) {
            //pesan flash berhasi simpan
            Session::flash('success', 'Berhasil menyimpan data');
            //redirect ke index
            return redirect()->route('buku.index');
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
        $thisBuku = Buku::findOrFail($id);
        $penulis = Penulis::where('status', 1)->select('id','nama_penulis')->get();
        $penerbit = Penerbit::where('status',1)->select('id','nama_penerbit')->get();
        $kategori = Kategori::where('status', 1)->select('id','nama_kategori')->get();
        return view('pages.admin.buku.edit')
            ->withBuku($thisBuku)
            ->withPenulis($penulis)
            ->withPenerbit($penerbit)
            ->withKategori($kategori);
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
        $buku = Buku::findOrFail($id);
        $buku->judul_buku = request('judul_buku', 'buku-XYZ');
        $buku->kategori = request('kategori','000');
        $buku->penulis = request('penulis','000');
        $buku->penerbit = request('penerbit','000');
        $buku->deskripsi = request('deskripsi', '-');
        $buku->jml_halaman = request('jml_halaman', '0');
        if ($buku->save()) {
            //pesan flash berhasi simpan
            Session::flash('success', 'Berhasil memperbaharui data');
            //redirect ke index
            return redirect()->route('buku.index');
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
        $buku = Buku::findOrFail($id);
        $buku->status = 0;
        if ($buku->save()) {
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('buku.index');
        }
        Session::flash('failed', 'Gagal menghapus data');
        return redirect()->route('buku.index');
    }
}
