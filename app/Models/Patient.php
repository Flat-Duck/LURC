<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'birth_date',
        'gender',
        'blood_type',
        'notes',
        'status',
        'payment',
        'debt',
        'payed',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'birth_date' => 'date',
        'debt' => 'double',
        'payed' => 'double',
    ];


    public function appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class);
    }

    public function operations()
    {
        return $this->hasMany(\App\Models\Operation::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(\App\Models\Prescription::class);
    }
}
