<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseDependency extends Model
{
    use HasFactory;

    public function caseRegistration()
    {
        return $this->belongsTo(CaseRegistration::class, 'regid');
    }
}
