<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Applicant;
use App\Models\User;

class Jobs extends Model
{
    protected $fillable = [
        'id',
        'job_title',
        'address',
        'job_type',
        'kategori',
        'contact',
        'description',
        'salary',
        'provider_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }
    public function app()
    {
        return $this->belongsToMany(Applicant::class);
    }
}
