<?php

namespace App;

use App\Loan;
use App\Saving;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;
    
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function savings()
    {
        return $this->hasMany(Saving::class);
    }
    public function Totalsaldo()
    {
        return $this->savings()->sum('saldo');
    }
    public function pengajuanPinjaman()
    {
        return $this->loans()->whereTerverifikasi(false);
    }
    public function dataPinjaman()
    {
        return $this->loans()->whereTerverifikasi(true);
    }
     public function totalPinjaman()
     {
        return $this->loans()->whereTerverifikasi(true)->sum('jumlah_pinjaman');
     }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'nip',
        'name',
        
        'jenis_kelamin',
        'jabatan',
        'alamat',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
