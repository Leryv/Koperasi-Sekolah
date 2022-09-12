<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use PDF;

class AnggotaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['role:bendahara']);
    // }
    /**
     * Mengambil data pengguna dengan akses anggota.
     */
    public function index()
    {
        $anggotas = User::role('anggota')->get();

        return view('users.anggota.index', compact('anggotas'));
    }
    /**
     * Menampilkan formulir anggota baru.
     */
    public function create()
    {
        $roles = Role::whereIn('name', ['anggota'])->get();

        return view('users.anggota.create', compact('roles'));
    }

    public function month(Request $request)
    {
        if ($request->has('tgl_awal')) {
            $users = User::whereBetween('created_at', [request('tgl_awal'), request('tgl_akhir')])
            ->get();
        }

        $pdf = PDF::loadView('cetak.anggota.month', compact('users'))->setPaper('a3', 'landscape');

        return $pdf->stream('laporan_bulanan_anggota.pdf');
    }
    
    public function all()
    {
        $users= User::all();

        $pdf = PDF::loadView('cetak.anggota.all', compact('users'))->setPaper('a3', 'landscape');

        return $pdf->stream('laporan_all_anggota.pdf');
    }

}
