<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['patient_id', 'dentist_id', 'date_time', 'status'];
    protected $casts = ['date_time' => 'datetime'];

    public function patient() { return $this->belongsTo(Patient::class); }
    public function dentist() { return $this->belongsTo(Dentist::class); }
}