<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;

class SubmissionController extends Controller
{
    public function index(){
        $submissions = Loan::all();        
        return view('submissions.index', compact('submissions'));
    }
    
}
