<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = User::role('anggota')->get();

        return view('users.anggota.index', compact('anggotas'));
    }

    public function create()
    {
        $roles = Role::whereIn('name', ['anggota'])->get();

        return view('users.anggota.create', compact('roles'));
    }


    // Cetak Anggota PDF
}
