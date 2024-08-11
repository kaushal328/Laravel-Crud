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
        Schema::create('employee_modals', function (Blueprint $table) {
            $table->id();
              $table->string('name');
                $table->string('birthday');
                $table->enum('gender', ['male', 'female', 'other']);
                $table->unsignedBigInteger('state_id');
                $table->unsignedBigInteger('city_id');
                $table->text('education')->nullable();
                $table->string('year_of_completion')->nullable();
                $table->string('profile_photo')->nullable();
                $table->text('skills')->nullable();
                $table->json('certificates')->nullable();
                $table->enum('profession', ['salaried', 'self-employed']);
                $table->string('company_name')->nullable();
                $table->date('job_started_from')->nullable();
                $table->string('business_name')->nullable();
                $table->string('location')->nullable();
                $table->string('email')->unique();
                $table->string('mobile_no')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_modals');
    }
};
