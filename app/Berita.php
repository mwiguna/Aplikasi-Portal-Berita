<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul', 'kategori', 'foto', 'isi', 'path' 
    ];
}
