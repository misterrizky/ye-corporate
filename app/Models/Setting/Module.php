<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function modules ()
    {
        return $this->hasMany(Module::class,'module_id','id');
    }
    public function privileges ()
    {
        return $this->hasMany(ModulePrivilege::class,'module_id','id');
    }
}
