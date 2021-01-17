<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'medicine_id',
        'prescription_id',
        'rx',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'medicine_id' => 'integer',
        'prescription_id' => 'integer',
    ];


    public function medicine()
    {
        return $this->belongsTo(\App\Models\Medicine::class);
    }

    public function prescription()
    {
        return $this->belongsTo(\App\Models\Prescription::class);
    }

    public function medicine()
    {
        return $this->belongsTo(\App\Models\Medicine::class);
    }

    public function prescription()
    {
        return $this->belongsTo(\App\Models\Prescription::class);
    }
}
