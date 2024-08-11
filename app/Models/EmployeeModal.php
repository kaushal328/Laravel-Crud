<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModal extends Model
{
    use HasFactory;
   protected $fillable = [
           'name', 'birthday', 'gender', 'state_id', 'city_id', 'education',
           'year_of_completion', 'profile_photo', 'skills', 'certificates',
           'profession', 'company_name', 'job_started_from', 'business_name',
           'location', 'email', 'mobile_no'
       ];

       protected $casts = [
           'education' => 'array',
           'year_of_completion' => 'array',
           'skills' => 'array',
           'certificates' => 'array',
       ];

       public function state()
       {
           return $this->belongsTo(State::class);
       }

       public function city()
       {
           return $this->belongsTo(City::class);
       }
}
