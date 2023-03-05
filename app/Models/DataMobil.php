<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataMobil extends Model
{
    use HasFactory;

    protected $table = 'data_mobil';
    protected $guarded = ['id'];

    public function category()
    {
        return $this->hasMany(Category_harga::class);
    }
    
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
