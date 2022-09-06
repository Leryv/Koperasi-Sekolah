<?php

namespace App\Http\Controllers\Savings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Saving;
use App\User;

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

    public function edit()
    {

    }

    public function update()
    {

    }
    
}
