<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $table = 'installments';

    protected $guarded = [];

     public function loan()
     {
         return $this->belongsTo(Loan::class);
     }

}
