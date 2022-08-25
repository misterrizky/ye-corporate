<?php

namespace App\Models\HRM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function position ()
    {
        return $this->belongsTo(Position::class);
    }
    public function module ()
    {
        return $this->belongsTo(Module::class);
    }
}
