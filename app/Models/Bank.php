<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'nama_bank',
])]

class Bank extends Model
{
    protected $table = 'bank';

    public function branches()
    {
        return $this->hasMany(BankBranch::class);
    }

    public function transaksiNasabah()
    {
        return $this->hasMany(TransaksiNasabah::class);
    }
}
