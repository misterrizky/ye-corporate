<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactGroup extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function leads ()
    {
        return $this->hasMany(Lead::class);
    }
    public function clients ()
    {
        return $this->hasMany(Lead::class);
    }
}
