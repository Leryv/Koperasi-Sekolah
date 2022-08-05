<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;

class LoanController extends Controller
{
    public function index()
    { 
        $data = 
        [
            'loans' => Loan::with('user','type')->where('terverifikasi', true) -> get(),
        ];
        return view('loans.index', $data);
    }
}