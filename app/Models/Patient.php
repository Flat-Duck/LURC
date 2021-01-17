<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Patient extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'patients';

    protected $appends = [
        'picture',
    ];

    const GENDER_SELECT = [
        'male'   => 'ذكر',
        'female' => 'أنثى',
    ];

    const STATUS_SELECT = [
        'continue' => 'مستمر',
        'finish'   => 'مكتمل',
    ];

    protected $dates = [
        'birth_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PAYMENT_SELECT = [
        'cash'  => 'كاش',
        'card'  => 'بطاقة',
        'check' => 'شيك',
    ];

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'email',
        'birth_date',
        'notes',
        'blood_type',
        'status',
        'payment',
        'debt',
        'payed',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function patientAppointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id', 'id');
    }

    public function patientOperations()
    {
        return $this->hasMany(Operation::class, 'patient_id', 'id');
    }

    public function patientPrescriptions()
    {
        return $this->hasMany(Prescription::class, 'patient_id', 'id');
    }

    public function getPictureAttribute()
    {
        $file = $this->getMedia('picture')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getBirthDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}