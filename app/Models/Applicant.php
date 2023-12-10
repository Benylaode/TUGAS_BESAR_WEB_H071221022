<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jobs;

class Applicant extends Model
{
    use  HasFactory;
    protected $fillable = [
        'id',
        'name' ,
        'address',
        'work_experience' ,
        'education' ,
        'other_details' ,
        'portfolio_url' ,
        'applicant_id' ,
        'job_id' ,
    ];
    public function jobs()
    {
        return $this->belongsToMany(Jobs::class);
    }

}
