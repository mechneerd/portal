<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    // Define the table associated with the model (if different from the pluralized model name)
    protected $table = 'job_postings';

    // Define the fillable attributes
    protected $fillable = [
        'title',
        'description',
        'company_name',
        'location',
        'salary',
        'job_type',
        'logo',
        'expires_at',
    ];

    // Optionally, you can define date casting
    protected $dates = [
        'expires_at',
    ];
}
