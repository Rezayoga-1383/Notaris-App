<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankBranch;
use Illuminate\Http\Request;

class BankBranchController extends Controller
{
    public function index()
    {
        $bankBranches = BankBranch::with('bank')->orderBy('nama_cabang')->get();
        return view('bank.bankbranch', compact('bankBranches'));
    }

    public function create()
    {
        $banks = Bank::orderBy('nama_bank')->get();
        return view('bank.create-bank-branch', compact('banks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bank_id'   => [
                'required',
                'exists:bank,id',
            ],

            'nama_cabang'   => [
                'required',
                'string',
                'max:255',
            ],

            'kota'  => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        BankBranch::create($validated);

        return redirect()
            ->route('bankbranch.read')
            ->with('success', 'Cabang Bank berhasil ditambahkan');
    }
}
