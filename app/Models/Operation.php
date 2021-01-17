<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id',
        'doctor_id',
        'patient_id',
        'lab',
        'price',
        'notes',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'doctor_id' => 'integer',
        'patient_id' => 'integer',
        'lab' => 'decimal:2',
        'price' => 'decimal:2',
    ];


    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class);
    }

    public function doctor()
    {
        return $this->belongsTo(\App\Models\Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }

    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class);
    }

    public function doctor()
    {
        return $this->belongsTo(\App\Models\Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }
}
