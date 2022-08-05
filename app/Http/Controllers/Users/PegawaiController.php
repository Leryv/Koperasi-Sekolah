<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class PegawaiController extends Controller
{
    public function index()
    {
    $pegawais = User::all();
    return view('users.pegawai.index', compact('pegawais'));
    }
}
