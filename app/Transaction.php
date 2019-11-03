<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $dates = ['transaction_date'];


    public static function account($account_id)
    {
        return Account::find($account_id);
    }


}
