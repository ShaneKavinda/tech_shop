<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
        "product_id",
        "name",
        "price",
        "mfd_date",
        "exp_date"
    ];
}
