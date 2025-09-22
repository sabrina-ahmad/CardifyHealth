<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;
use MongoDB\Laravel\Eloquent\DocumentModel;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use MongoDB\Laravel\Relations\BelongsTo;

// class Hospital extends Model
class Hospital extends Authenticatable
{
    // /** @use HasFactory<\Database\Factories\HospitalFactory> */
    // use HasFactory;

    // use HasFactory, Notifiable;
    use DocumentModel;

    protected $fillable = [
        'hospital_name',
        'license_number',
        'contact_person',
        'phone_number',
        'email',
        'password',
        'address',
        "first_time",
        'status',
        'department_count',
        'appointment_count',
        'doctor_count'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function department()
    {
        return $this->hasMany(Department::class);
    }

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
