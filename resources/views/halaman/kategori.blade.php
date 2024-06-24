@extends('index')
@section('title', 'Kategori')

@section('isihalaman')
    <h3><center>Daftar Kategori Buku Perpustakaan Digital</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalKategoriTambah"> 
        Tambah Kategori 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Kategori</td>
                <td align="center">Kategori</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($kategori as $index=>$bk)
                <tr>
                    <td align="center" scope="row">{{ $index + $kategori->firstItem() }}</td>
                    <td>{{$bk->id_kategori}}</td>
                    <td>{{$bk->kategori}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalKategoriEdit{{$bk->id_kategori}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Buku -->
                        <div class="modal fade" id="modalKategoriEdit{{$bk->id_kategori}}" tabindex="-1" role="dialog" aria-labelledby="modalKategoriEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalKategoriEditLabel">Form Edit Data Kategori</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formkategoriedit" id="formkategoriedit" action="/kategori/edit/{{ $bk->id_kategori}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_kategori" class="col-sm-4 col-form-label">ID kategori</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="Masukan ID Kategori">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $bk->kategori}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="bukutambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data kategori -->
                        |
                        <a href="kategori/hapus/{{$bk->id_kategori}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $kategori->currentPage() }} <br />
    Jumlah Data : {{ $kategori->total() }} <br />
    Data Per Halaman : {{ $kategori->perPage() }} <br />

    {{ $kategori->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data kategori -->
    <div class="modal fade" id="modalKategoriTambah" tabindex="-1" role="dialog" aria-labelledby="modalKategoriTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKategoriTambahLabel">Form Input Data Kategori</h5>
                </div>
                <div class="modal-body">
                    <form name="formkategiritambah" id="formkategoritambah" action="/kategori/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_kategori" class="col-sm-4 col-form-label">ID Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="Masukan ID Kategori">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukan Kategori">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="bukutambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data kategori -->
    
@endsection