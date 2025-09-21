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
        // Doctors table
        // Schema::create('doctors', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('first_name');
        //     $table->string('last_name');
        //     $table->string('specialty');
        //     $table->timestamps();
        // });

        // Departments table
        // Schema::create('departments', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('description')->nullable();
        //     $table->timestamps();
        // });
        //
        // // Doctor Department pivot table
        // Schema::create('doctor_department', function (Blueprint $table) {
        //     $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
        //     $table->foreignId('department_id')->constrained()->onDelete('cascade');
        //     $table->primary(['doctor_id', 'department_id']);
        // });
        //
        // // Patients table
        // Schema::create('patients', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('full_name');
        //     $table->date('birth_date');
        //     $table->string('email')->unique();
        //     $table->string('phone_number');
        //     $table->timestamps();
        // });


        // Payments table
        //     Schema::create('payments', function (Blueprint $table) {
        //         $table->id();
        //         $table->foreignId('appointment_id')->constrained()->onDelete('cascade');
        //         $table->string('payment_method');
        //         $table->decimal('amount', 10, 2);
        //         $table->boolean('paid_status');
        //         $table->text('payment_details')->nullable();
        //         $table->timestamps();
        //     });
        //     Schema::create('appointments', function (Blueprint $table) {
        //         $table->id();
        //         $table->timestamps();
        //         $table->index('date_time');
        //         $table->index('status');
        //         $table->index('doctor_id');
        //         $table->index('user_id');
        //         $table->index(['date_time', 'status']);
        //     });

        // Appointments table
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->text('reason_for_visit')->nullable();
            $table->enum('medical_condition', [
                'General Checkup',
                'Symptom Evaluation',
                'Follow-up Visit',
                'Other'
            ]);
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
