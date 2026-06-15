<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'transaksi_nasabah_id',
    'keterangan',
    'nominal',
])]

class TransaksiNasabahDetails extends Model
{
    protected $table = 'transaksi_nasabah_details';

    protected function casts(): array
    {
        return [
            'nominal' => 'integer',
        ];
    }

    public function transaksi()
    {
        return $this->belongsTo(
            TransaksiNasabah::class,
            'transaksi_nasabah_id'
        );
    }
}
