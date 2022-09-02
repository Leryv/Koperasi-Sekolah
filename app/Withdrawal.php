<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Saving;

class Withdrawal extends Model
{
    protected $table = 'withdrawals';
     protected $guarded = [];

     public function saving()
     {
        return $this->belongsTo(Saving::class, 'savings_id','id');
     }

}
