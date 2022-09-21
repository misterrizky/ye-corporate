<?php

namespace App\Models\CRM;

use App\Models\HRM\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeadActivity extends Model
{
    use HasFactory,SoftDeletes;
    protected $casts = [
        'date' => 'date',
        'completed_at' => 'datetime',
    ];
    public function employee ()
    {
        return $this->belongsTo(Employee::class);
    }
}
