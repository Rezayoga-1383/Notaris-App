<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'nama_nasabah',
    'tanggal_transaksi',

    'bank_id',
    'bank_branch_id',
    'user_id',

    'status',
    'keterangan_status',

    'insentif_ao',
    'insentif_sp',
    'insentif_adk',
    'insentif_pinca',
    'insentif_mp_spb',
])]

class TransaksiNasabah extends Model
{
    protected $table = 'transaksi_nasabah';

    protected function casts(): array
    {
        return [
            'tanggal_transaksi' => 'date',
            
            'insentif_ao' => 'integer',
            'insentif_sp' => 'integer',
            'insentif_adk' => 'integer',
            'insentif_pinca' => 'integer',
            'insentif_mp_spb' => 'integer',
        ];
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function bankBranch()
    {
        return $this->belongsTo(
            BankBranch::class,
            'bank_branch_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    public function details()
    {
        return $this->hasMany(
            TransaksiNasabahDetails::class,
            'transaksi_nasabah_id'
        );
    }
}
