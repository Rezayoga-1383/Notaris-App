<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'bank_id',
    'nama_cabang',
    'kota',
])]

class BankBranch extends Model
{
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function transaksiNasabah()
    {
        return $this->hasMany(
            TransaksiNasabah::class,
            'bank_branch_id'
        );
    }
}
