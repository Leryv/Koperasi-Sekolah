<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;

class LoanController extends Controller
{
    public function index()
    {
        return view('loans.index')->with(['loans' => loan::all()]);
    }
}