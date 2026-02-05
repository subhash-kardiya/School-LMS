<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id(); // PK

            $table->string('name'); // Subject name
            $table->string('subject_code')->unique()->nullable(); // Subject code

            $table->foreignId('class_id')
                ->constrained('classes')
                ->onDelete('cascade'); // FK → classes.id

            $table->foreignId('teacher_id')
                ->nullable()
                ->constrained('teachers')
                ->onDelete('set null'); // FK → teachers.id

            $table->boolean('status')->default(1); // Active / Inactive

            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
