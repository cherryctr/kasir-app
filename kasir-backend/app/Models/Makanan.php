<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Makanan extends Model
{
    use HasFactory,HasApiTokens;
    protected $table = 'makanans';
    protected $fillable = ['id','nama_makanan','kode_makanan','harga_makanan','kategori_makanan'];
}
