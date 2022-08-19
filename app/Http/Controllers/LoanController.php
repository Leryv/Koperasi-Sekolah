<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Type;

class LoanController extends Controller
{
    public function index()
    { 
        $data = 
        [
            'loans' => Loan::with('user','type')->where('terverifikasi', true) -> get(),
        ];
        return view('loans.index', $data);
    }

    public function create(Type $type)
    { 
        return view('loans.create', compact('type'));
    }

    public function kalkulasi (Type $type, Request $request)
    {
        $request->validate([
            'jumlah_pinjaman'   => 'required|numeric|gte:minimum_jumlah_pinjaman|lte:maksimum_jumlah_pinjaman',
            'lama_angsuran'     => 'required|numeric|gte:minimum_lama_angsuran|lte:maksimum_lama_angsuran',
        ]);

        $persen = $type ->bunga / 100;
        $cicilan_pokok = $request ->jumlah_pinjaman / $request -> lama_angsuran;
        $bunga = $request ->jumlah_pinjaman * $persen / $request-> lama_angsuran;
        $angsuran = $cicilan_pokok + $bunga;

        return view ('loans.kalkulasi', compact('type', 'request', 'angsuran'));
    }
}