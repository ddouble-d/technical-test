<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'company_id', 'email'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
