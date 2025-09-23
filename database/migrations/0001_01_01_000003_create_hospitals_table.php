<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('hospitals', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_name');
            $table->string('license_number')->unique();
            $table->string('contact_person');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('first_time');
            $table->string('address')->nullable(); // add directly here
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            // $table->integer('department_count')->nullable();
            // $table->integer('appointment_count')->nullable();
            // $table->integer('doctor_count')->nullable();
            $table->timestamps();
        });

        Schema::table('hospitals', function (Blueprint $table) {
            $table->after('password', function (Blueprint $table) {
                $table->rememberToken();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
