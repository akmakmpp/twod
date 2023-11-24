<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyData extends Model
{
    use HasFactory;

    protected $fillable = ['morning_set','morning_value','evening_set',
    'evening_value','evening_internet','evening_modern',
'morning_modern','morning_internet','date'];
}
