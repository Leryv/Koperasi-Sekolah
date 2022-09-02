<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use Nexmo\Laravel\Facade\Nexmo;

class SubmissionController extends Controller
{
    public function index(){
        $submissions = Loan::with('user','type')->where('terverifikasi', false)->get();        
        return view('submissions.index', compact('submissions'));
    }


    public function store(Loan $loan, Request $request)  // Loan berhubungan dengan user
    {
        $loan ->update([
            'terverifikasi'         =>  true,
            'tanggal_persetujuan'   =>  now(),
        ]);

        Nexmo::message()->send([
            'to'                    =>  '+62' . $loan->user->phone,
            'from'                  =>  'Koperasi Tadika Mesra',
            'text'                  =>  'Assalamualaikum wr. wb. kami dari SMK Tadika Mesra ingin memberitahukan bahwa pengajuan pinjaman anda sudah kami setujui berikut ini adalah perinciannya'
            . 'Nama Peminjam' . $loan->user->name
            . 'Jumlah Pinjaman' . $loan->jumlah_pinjaman
            . 'Jumlah Angsuran' . $loan-> jumlah_angsuran
            . 'Lama Angsuran' . $loan->lama_angsuran
            . 'Tanggal Angsuran' . $loan->created_at->format('Y-m-d')
            . 'Terima Kasih'
            . 'Pengurus Koperasi Tadika Mesra'

        ]);
        
        flash('Pengajuan Pinjaman Berhasil di ajukan')->success();
        return redirect()->route('submissions');
    }
    
}
