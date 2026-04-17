<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add the role column to the default 'users' table
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('patient');
        });

        Schema::create('dentists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('cpf')->unique(); // Brazilian ID, keep as CPF or change to 'ssn' / 'id_number'
            $table->string('phone');
            $table->string('cip')->unique(); // Professional License Number
            $table->timestamps();
        });

        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('cpf')->unique();
            $table->string('phone');
            $table->date('birth_date');
            $table->timestamps();
        });

        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('dentist_id')->constrained()->onDelete('cascade');
            $table->dateTime('date_time');
            $table->enum('status', ['scheduled', 'completed', 'canceled'])->default('scheduled');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('patients');
        Schema::dropIfExists('dentists');
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
