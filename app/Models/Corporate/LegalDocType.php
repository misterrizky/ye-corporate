<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalDocType extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function doc ()
    {
        return $this->hasMany(LegalDoc::class,'doc_type_id','id');
    }
}
