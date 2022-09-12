<?php

namespace App\Http\Controllers;

use App\Saving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WithdrawalController extends Controller
{
    public function index()
    {
        $savings = Saving::whereUserId(Auth::id())->with('with')->get();

        return view('withdrawals.index', compact('savings'));
    }

}
