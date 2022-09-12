<?php

namespace App\Http\Controllers\Savings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Saving;
use App\User;
use PDF;

class SavingController extends Controller
{
    public function index()
    {
        $users = Saving::all();
        return view('savings.index', compact('users'));
    }
    public function create()
    {
        $roles = User::all();
        return view('savings.create', compact('roles'));
    }

    public function store(Request $request)
    {
        Saving::create([
            'user_id'   => request('user_id'),
            'saldo'     => request('saldo'),
        ]);
        flash('Tabungan Anda Berhasil Ditambahkan.')->success();

        return redirect()->route('savings.anggota');
    }

    public function edit($id)
    {
        $saving = Saving::findOrFail($id);

        return view('savings.edit', compact('saving'));
    }
    
    public function update(Request $request, $id)
    {
        $saving = Saving::findOrFail($id);

        $hitung = $saving->saldo + $request->saldo;
        $saving->update([
            'saldo' => $hitung
        ]);

        flash('Tabungan anda berhasil ditambahkan.')->success();

        return redirect()->route('savings.anggota');
    }

    public function cetak()
    {
        $this->authorize('cetak', Saving::class);

        $users = User::role('anggota')->with('savings')->get();

        $pdf = PDF::loadView('cetak.savings.saving', compact('users'))->setPaper('a4', 'landscape');

        return $pdf->stream('laporan_simpanan.pdf');
    }


    
}
