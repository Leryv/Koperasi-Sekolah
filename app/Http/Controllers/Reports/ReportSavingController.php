<?php

namespace App\Http\Controllers\Reports;

use PDF;
use App\User;
use App\Saving;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportSavingController extends Controller
{
    public function cetak()
    {
        $this->authorize('cetak', Saving::class);

        $users = User::role('anggota')->with('savings')->get();

        $pdf = PDF::loadView('cetak.saving', compact('users'))->setPaper('a4', 'landscape');

        return $pdf->stream('laporan_simpanan.pdf');
    }

}
