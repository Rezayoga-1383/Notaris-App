<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankBranch;
use App\Models\TransaksiNasabah;
use App\Models\TransaksiNasabahDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{

    public function index()
    {
        $transaksi = TransaksiNasabah::with([
            'bank',
            'bankBranch',
            'user',
            'details',
        ])
        ->latest()->get();

        return view('transaksi.transaksi', compact('transaksi'));
    }

    public function create()
    {
        $banks = Bank::orderBy('nama_bank')->get();
        $marketings = User::where('role', 'Karyawan')->orderBy('name')->get();

        return view('transaksi.create', compact('banks','marketings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_nasabah'      => 'required|string|max:255',
            'tanggal_transaksi' => 'required|date',

            'bank_id'           => 'required|exists:bank,id',
            'bank_branch_id'    => 'required|exists:bank_branches,id',

            'user_id'           => 'required|exists:users,id',

            'status'            => 'required|in:Belum,Lunas',

            'keterangan_status' => 'required_if:status,Belum|nullable|string',

            'keterangan'        => 'required|array|min:1',
            'keterangan.*'      => 'required|string',

            'nominal'           => 'required|array|min:1',
            'nominal.*'         => 'required|numeric|min:1',
        ]);

        DB::transaction(function () use ($validated) {
            $transaksi = TransaksiNasabah::create([
                'nama_nasabah'      => $validated['nama_nasabah'],
                'tanggal_transaksi' => $validated['tanggal_transaksi'],

                'bank_id'           => $validated['bank_id'],
                'bank_branch_id'    => $validated['bank_branch_id'],

                'user_id'           => $validated['user_id'],

                'status'            => $validated['status'],
                'keterangan_status' => $validated['keterangan_status'] ?? null,
            ]);

            foreach ($validated['keterangan'] as $index => $keterangan) {
                TransaksiNasabahDetails::create([
                    'transaksi_nasabah_id'  => $transaksi->id,
                    'keterangan'            => $keterangan,
                    'nominal'               => $validated['nominal'][$index],
                ]);
            }
        });

        return redirect()->route('transaksi.read')->with('success', 'Data Transaksi berhasil disimpan');
    }

    public function getBranches($bankId)
    {
        $branches = BankBranch::where('bank_id', $bankId)
            ->orderBy('nama_cabang')
            ->get([
                'id',
                'nama_cabang',
                'kota'
            ]);

        return response()->json($branches);
    }
}
