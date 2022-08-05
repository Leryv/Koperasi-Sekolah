<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saving;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaction = Saving::all();        
        return view('transaksi.index', compact('transaction'));
    }
}
