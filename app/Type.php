<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Loan;

class Type extends Model
{
    protected $table = 'types';

     protected $guarded = [];

     public function loans()
     {
        return $this->hasMany(Loan::class);
     }

}
