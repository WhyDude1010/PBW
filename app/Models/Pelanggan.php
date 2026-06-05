<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    // Beritahu nama tabelnya (karena di migration kita pakai akhiran 's')
    protected $table = 'pelanggans'; 
    
    // Beritahu primary key-nya
    protected $primaryKey = 'id_pelanggan';

    // Kolom yang boleh diisi massal
    protected $fillable = ['nama', 'email', 'password', 'no_hp'];
}