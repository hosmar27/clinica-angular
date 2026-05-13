<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'dentist_id', 'date_time', 'status'];

    public function patient() { return $this->belongsTo(Patient::class); }
    public function dentist() { return $this->belongsTo(Dentist::class); }
}
