<?php

namespace App\Http\Controllers;

use PDF;
use App\Loan;
use App\Type;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;


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

    public function create(Type $type)
    { 
        return view('loans.create', compact('type'));
    }

    // Untuk Menambah Hitungan Pinjaman
    public function kalkulasi (Type $type, Request $request)
    {
        $request->validate([
            'jumlah_pinjaman'   => 'required|numeric|gte:minimum_jumlah_pinjaman|lte:maksimum_jumlah_pinjaman',
            'lama_angsuran'     => 'required|numeric|gte:minimum_lama_angsuran|lte:maksimum_lama_angsuran',
        ]);

        $persen = $type ->bunga / 100;

        //  2 Variabel ini Yang akan di jumlahkan

        // Cicilan Pokok adalah hasil dari jumlah pinjaman dibagi lama angsuran     
        $cicilan_pokok = $request ->jumlah_pinjaman / $request -> lama_angsuran;

        // Bunga adalah hasil perkalian dari jumlah pinjaman dikali persen yg di ambil dri $persen
        $bunga = $request ->jumlah_pinjaman * $persen / $request-> lama_angsuran;

        // Penjumlahan Cicilan Pokok Dan bunga
        $angsuran = $cicilan_pokok + $bunga;

        return view ('loans.kalkulasi', compact('type', 'request', 'angsuran'));
    }


    // Untuk Menambah Data Pinjaman
    public function store (Type $type, Request $request)
    {
        Loan::create([
            'user_id'           =>  auth()->user()->id,
            'type_id'           =>  $type->id,
            'jumlah_pinjaman'   =>  $request->jumlah_pinjaman,
            'jumlah_angsuran'   =>  $request->jumlah_angsuran,
            'lama_angsuran'     =>  $request->lama_angsuran,
            'tanggal_pengajuan' =>  now()
        ]);

        flash('Pinjaman berhasil di ajukan')->success();

        return redirect()->route('submissions');
    }

    public function destroy(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);

        // Nexmo::message()->send([
        //     'to'                    =>  '+62' . $loan->user->phone,
        //     'from'                  =>  'Koperasi Tadika Mesra',
        //     'text'                  =>  'Assalamualaikum wr. wb. kami dari SMK Tadika Mesra ingin memberitahukan bahwa pengajuan pinjaman anda tidak dapat kami setujui karena saldo anda kurang dari Rp.2.000.000. terima kasih'
        //     . 'Pengurus Koperasi Tadika Mesra'
        // ]);

        $loan->delete($request->all());
        flash('Pengajuan Pinjaman Berhasil Ditolak');
        return redirect()->route('submissions');
    }

    public function cetak(Request $request)
    {
        $this->authorize('cetak', Loan::class);

        if ($request->has('dari_tgl')) {
            $loans = Loan::with('user', 'type')->whereBetween('tanggal_persetujuan',[request('dari_tgl'), request('sampai_tgl')])->get();
        } else {
            $loans = Loan::with('user','type')->where('terverifikasi', true)->get();
        }
        $pdf = PDF::loadView('cetak.loans.loan', compact('loans'))->setPaper('a4', 'landscape');

        return $pdf->stream('laporan_pinjaman.pdf');

    }


    public function print(Loan $loan)
    {
        if ($loan->terverifikasi == true) {
            abort(404);
        }

        $pdf = PDF::loadView('cetak.loans.loan', compact('loan'));

        return $pdf->stream('pengajuan-pinjaman.pdf');
    }

}