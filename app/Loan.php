<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use App\User;
use App\Installments;


class Loan extends Model
{
    protected $table = 'loans';

    protected $guarded = [];

    protected $casts = [
        'terverifikasi'       => 'boolean',
        'tanggal_pengajuan'   => 'date',
        'tanggal_persetujuan' => 'date',
    ];

    public function user()
    { 
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }

}
