<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\HybridRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\DocumentModel;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentFactory> */
    use HasFactory, HybridRelations;

    protected $connection = 'mongodb';
    protected $collection = 'appointments';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'department_id',
        'medical_condition',
        'appointment_date',
        'appointment_time',
        'reason_for_visit',
        'status',
    ];

    // protected $casts = [
    //     'date_time' => 'datetime',
    //     'duration_minutes' => 'integer'
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function getFormattedDateTimeAttribute()
    {
        return $this->date_time->format('M j, Y \a\t g:i A');
    }

    public function getDurationInHoursAttribute()
    {
        return $this->duration_minutes / 60;
    }
}
