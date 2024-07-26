<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'salary',
        'installment_per_month',
        'years',
    ];
}
