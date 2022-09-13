<?php

namespace App\Http\Controllers\Reports;

use PDF;
use App\Loan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportLoanController extends Controller
{
    public function cetak(Request $request)
    {
        $this->authorize('cetak', Loan::class);

        if ($request->has('dari_tgl')) {
            $loans = Loan::with('user', 'type')->whereBetween('tanggal_persetujuan',[request('dari_tgl'), request('sampai_tgl')])->get();
        } else {
            $loans = Loan::with('user','type')->where('terverifikasi', true)->get();
        }
        $pdf = PDF::loadView('cetak.loan', compact('loans'))->setPaper('a4', 'landscape');

        return $pdf->stream('laporan_pinjaman.pdf');

    }
    public function print(Loan $loan)
    {
        if ($loan->terverifikasi == true) {
            abort(404);
        }

        $pdf = PDF::loadView('cetak.loans.loan', compact('loan'));

        return $pdf->stream('pengajuan-pinjaman.pdf');
    }



}
