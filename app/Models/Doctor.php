<?php

namespace App\Models;

use Carbon\Carbon;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\HybridRelations;
use MongoDB\Laravel\Eloquent\DocumentModel;
use MongoDB\Laravel\Auth\User as Authenticatable;
use MongoDB\Laravel\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class Doctor extends Authenticatable
{
    // Remove HybridRelations trait
    use DocumentModel, Notifiable;

    protected $connection = 'mongodb';
    protected $collection = 'doctors';

    protected $fillable = [
        'name',
        'email',
        'specialty',
        'department_id',
        'hospital_id',
        'password'
        // 'available_hours',
        // 'max_appointments_per_day'
    ];

    // protected $casts = [
    //     'available_hours' => 'array',
    //     'max_appointments_per_day' => 'integer'
    // ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function getAvailableSlots($date)
    {
        $slots = [];
        foreach ($this->available_hours as $hour => $available) {
            if ($available) {
                $slotTime = Carbon::parse($date . ' ' . $hour);
                if (!$this->hasAppointmentAt($slotTime)) {
                    $slots[] = $slotTime;
                }
            }
        }
        return $slots;
    }

    private function hasAppointmentAt($slotTime)
    {
        return $this->appointments()
            ->where('date_time', $slotTime->format('Y-m-d H:i'))
            ->exists();
    }
}
