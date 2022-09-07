<?php

namespace App\Models\Regional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = false;
}
