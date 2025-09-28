<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\HybridRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminSettings extends Model
{
    /** @use HasFactory<\Database\Factories\AdminSettingsFactory> */
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'appointments';

    protected $fillable = [
        'payment_method',
    ];
}
