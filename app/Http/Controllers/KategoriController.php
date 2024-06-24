<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KategoriModel;

class KategoriController extends Controller
{
    //
    public function kategoritampil()
    {
        $datakategori = KategoriModel::orderby('id_kategori', 'ASC')
        ->paginate(5);

        return view('halaman/kategori',['kategori'=>$datakategori]);
    }

    //method untuk tambah data buku
    public function kategoritambah(Request $request)
    {
        $this->validate($request, [
            'id_kategori' => 'required',
            'kategori' => 'required'
        ]);

        KategoriModel::create([
            'id_kategori' => $request->id_kategori,
            'kategori' => $request->kategori
        ]);

        return redirect('/kategori');
    }

     //method untuk hapus data buku
     public function kategorihapus($id_kategori)
     {
         $datakategori=KategoriModel::find($id_kategori);
         $datakategori->delete();
 
         return redirect()->back();
     }

     //method untuk edit data buku
    public function kategoriedit($id_kategori, Request $request)
    {
        $this->validate($request, [
            'id_kategori' => 'required',
            'kategori' => 'required'
        ]);

        $id_kategori = KategoriModel::find($id_kategori);
        $id_kategori->id_kategori   = $request->id_kategori;
        $id_kategori->kategori  = $request->kategori;

        $id_kategori->save();

        return redirect()->back();
    
    }
}
