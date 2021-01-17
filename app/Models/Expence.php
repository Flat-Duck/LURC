<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expence extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'material_id',
        'price',
        'invoice',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'material_id' => 'integer',
        'price' => 'decimal:2',
    ];


    public function material()
    {
        return $this->belongsTo(\App\Models\Material::class);
    }

    public function material()
    {
        return $this->belongsTo(\App\Models\Material::class);
    }
}
