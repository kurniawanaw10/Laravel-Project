<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function mobil()
    {
        return $this->belongsTo(DataMobil::class, 'mobil_id', 'id');
    }

    public function category()
    {
        return $this->hasMany(Category_harga::class, 'mobil_id');
    }
}
