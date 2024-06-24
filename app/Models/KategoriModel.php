<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = "kategori_buku";

    protected $primaryKey = "id_kategori";
    protected $casts = ['id_kategori' => 'string',];

    protected $fillable = ['id_kategori','kategori'];
}

