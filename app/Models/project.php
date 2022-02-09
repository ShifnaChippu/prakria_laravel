<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $table = 'project';
    protected $fillable = [
        'project_title',
        'owner',
        'starting_date',
        'expected_duration'
    ];
}
