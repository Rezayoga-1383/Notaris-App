<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    
    public function index()
    {
        $banks = Bank::latest()->get();

        return view('bank.bank', compact('banks'));
    }

    public function create()
    {
        return view('bank.create-bank');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bank'     => [
                'required',
                'string',
                'max:255',
                'unique:bank,nama_bank',
            ],
        ]);

        Bank::create($validated);

        return redirect()
            ->route('bank.read')
            ->with('success', 'Data Bank berhasil ditambahkan.');
    }
}
