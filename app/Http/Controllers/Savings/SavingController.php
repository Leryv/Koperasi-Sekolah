<?php

namespace App\Http\Controllers\Savings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Saving;
class SavingController extends Controller
{
    public function index()
    {
        $users = Saving::all();
        return view('savings.index', compact('users'));
    }
}
