<?php

namespace App\Http\Controllers\Reports;

use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class ReportAnggotaController extends Controller
{
    public function month(Request $request)
    {
        if ($request->has('tgl_awal')) {
            $users = User::whereBetween('created_at', [request('tgl_awal'), request('tgl_akhir')])
            ->get();
        }

        $pdf = PDF::loadView('cetak.anggota.month', compact('users'))->setPaper('a3', 'landscape');

        return $pdf->stream('laporan_bulanan_anggota.pdf');
    }
    
    public function all(Request $request)
    {
        $users= User::all();

        $pdf = PDF::loadView('cetak.anggota.all', compact('users'))->setPaper('a3', 'landscape');

        return $pdf->stream('laporan_all_anggota.pdf');
    }


}
