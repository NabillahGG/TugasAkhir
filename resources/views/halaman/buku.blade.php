@extends('index')
@section('title', 'buku')

@section('isihalaman')
    <h3><center>Daftar Buku Perpustakaan Digital</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBukuTambah"> 
        Tambah Data Buku 
    </button>
    <br>
    <form action="/search" method="get">
        <button type="submit" class="btn btn-primary" style="top:7px"> Cari </button>
        <input type="text" name="search" style="margin-top:7px">
    </form>


    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">Kode Buku</td>
                <td align="center">Judul Buku</td>
                <td align="center">kategori</td>
                <td align="center">deskripsi</td>
                <td align="center">jumlah</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($buku as $index=>$bk)
                <tr>
                    <td align="center" scope="row">{{ $index + $buku->firstItem() }}</td>
                    <td>{{$bk->kd_buku}}</td>
                    <td>{{$bk->judul}}</td>
                    <td>{{$bk->kategori}}</td>
                    <td>{{$bk->deskripsi}}</td>
                    <td>{{$bk->jumlah}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalBukuEdit{{$bk->kd_buku}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Buku -->
                        <div class="modal fade" id="modalBukuEdit{{$bk->kd_buku}}" tabindex="-1" role="dialog" aria-labelledby="modalBukuEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalBukuEditLabel">Form Edit Data Buku</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formbukuedit" id="formbukuedit" action="/buku/edit/{{ $bk->kd_buku}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="kd_buku" class="col-sm-4 col-form-label">Kode Buku</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kd_buku" name="kd_buku" placeholder="Masukan Kode Buku">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $bk->judul}}">
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
                                            <div class="form-group row">
                                                <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $bk->deskripsi}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $bk->jumlah}}">
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
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="buku/hapus/{{$bk->kd_buku}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $buku->currentPage() }} <br />
    Jumlah Data : {{ $buku->total() }} <br />
    Data Per Halaman : {{ $buku->perPage() }} <br />

    {{ $buku->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalBukuTambah" tabindex="-1" role="dialog" aria-labelledby="modalBukuTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBukuTambahLabel">Form Input Data Buku</h5>
                </div>
                <div class="modal-body">
                    <form name="formbukutambah" id="formbukutambah" action="/buku/tambah" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="kd_buku" class="col-sm-4 col-form-label">Kode Buku</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kd_buku" name="kd_buku" placeholder="Masukan Kode Buku">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Buku">
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
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan deskripsi">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan jumlah">
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
    <!-- Akhir Modal tambah data buku -->
    
@endsection