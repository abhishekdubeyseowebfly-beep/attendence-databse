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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->string('employee_name');
            $table->date('employee_dob');
            $table->string('gender');
            $table->text('permanent_address');
            $table->text('temporary_address');
            $table->string('contact_no');
            $table->string('alternate_no')->nullable();
            $table->string('email')->unique();
            $table->date('date_of_joining');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('aadhar_card_no');
            $table->string('pan_card_no');
            $table->string('employee_image')->nullable();
            $table->string('aadhar_document')->nullable();
            $table->string('pan_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
