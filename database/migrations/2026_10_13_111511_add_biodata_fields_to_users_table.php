<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable();
            $table->string('rt_rw')->nullable();
            $table->string('age')->nullable();
            $table->string('category')->nullable(); // Pengurus Inti, Anggota Aktif, Alumni
            $table->string('position')->nullable(); // Ketua, Wakil, dll
            $table->text('bio')->nullable();
            $table->longText('photo')->nullable();
            $table->boolean('is_completed_biodata')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone_number', 'rt_rw', 'age', 'category', 'position', 'bio', 'photo', 'is_completed_biodata']);
        });
    }
};