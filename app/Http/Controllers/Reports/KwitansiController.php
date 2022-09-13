<?php

namespace App\Http\Controllers\Reports;

use PDF;
use App\Withdrawal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KwitansiController extends Controller
{
    public function show($id)
    {
        $withdrawals = Withdrawal::findOrFail($id);

        $pdf = PDF::loadView('transaksi.kwitansi', compact('withdrawals'))->setPaper('a5', 'potrait');

        return $pdf->stream('kwitansi.pdf');
    }

}
