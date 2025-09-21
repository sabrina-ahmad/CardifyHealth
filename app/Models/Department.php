<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\DocumentModel;
use Illuminate\Notifications\Notifiable;
use MongoDB\Laravel\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;

class Department extends Model
{
    use DocumentModel, Notifiable;

    protected $connection = 'mongodb';
    protected $collection = 'departments';

    protected $fillable = [
        'name',
        'description',
        'hospital_id',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
