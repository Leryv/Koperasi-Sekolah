<?php

namespace App\Http\Controllers\Reports;

use PDF;
use App\Installment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportInstallmentController extends Controller
{
        public function monthly(Request $request)
    {
        $installments = [];
        if ($request->has('tgl_awal')){
            $installments = Installment::whereBetween('tanggal_bayar', [request('tgl_awal'), request('tgl_akhir')])->get();
        }

        $pdf = PDF::loadView('cetak.installments.month', compact('installments'))->setPaper('a3', 'landscape');
        return $pdf->stream('laporan_bulanan_angsuran.pdf');
    }
    
    public function all()
    {
        $installments = Installment::all();

        $pdf = PDF::loadView('cetak.installments.all', compact('installments'))->setPaper('a3', 'landscape');
        return $pdf->stream('laporan_data_angsuran.pdf');
    }

}
