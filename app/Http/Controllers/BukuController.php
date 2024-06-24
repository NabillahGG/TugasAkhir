<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model BukuModel
use App\Models\BukuModel;

use App\Models\KategoriModel;

class BukuController extends Controller
{
    //method untuk tampil data buku
    public function bukutampil()
    {
        $databuku = BukuModel::orderby('kd_buku', 'ASC')
        ->paginate(5);

        return view('halaman/buku',['buku'=>$databuku]);
    }

    //method untuk tambah data buku
    public function bukutambah(Request $request)
    {
        $this->validate($request, [
            'kd_buku' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required'
        ]);

        BukuModel::create([
            'kd_buku' => $request->kd_buku,
            'judul' => $request->judul,
            'kategori'=> $request->kategori,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah
        ]);

        return redirect('/buku');
    }

     //method untuk hapus data buku
     public function bukuhapus($kd_buku)
     {
         $databuku=BukuModel::find($kd_buku);
         $databuku->delete();
 
         return redirect()->back();
     }

     //method untuk edit data buku
    public function bukuedit($kd_buku, Request $request)
    {
        $this->validate($request, [
            'kd_buku' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required'
        ]);

        $kd_buku = BukuModel::find($kd_buku);
        $kd_buku->kd_buku   = $request->kd_buku;
        $kd_buku->judul      = $request->judul;
        $kd_buku->kategori  = $request->kategori;
        $kd_buku->deskripsi   = $request->deskripsi;
        $kd_buku->jumlah   = $request->jumlah;

        $kd_buku->save();

        return redirect()->back();
    }

    public function search(Request $request){

        $search = $request->input('search');

        $databuku = BukuModel::where('kd_buku',$search)->paginate(5)->appends(['search'=> $search]);
        return view('halaman/buku',['buku'=>$databuku]);
    }

    public function create(){
        $kategoribuku = KategoriModel::all();

        return view('halaman/buku',['KategoriModel'=>$kategoribuku]);
    }

    public function store(Request $request) {

        $kategoribuku = KategoriModel::create($request->all());
          
    }
}



