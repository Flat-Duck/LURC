<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'gender',
        'picture',
        'phone',
        'email',
        'birth_date',
        'percentage',
        'specialty',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'birth_date' => 'date',
        'percentage' => 'decimal:2',
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
