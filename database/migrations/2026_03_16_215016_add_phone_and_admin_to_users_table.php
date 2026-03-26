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
        Schema::table('users', function (Blueprint $table) {
            // Agregar campo phone después de email
            $table->string('phone')->nullable()->after('email');
            
            // Agregar campo is_admin después de phone (por defecto false = 0)
            $table->boolean('is_admin')->default(false)->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar los campos si se hace rollback
            $table->dropColumn(['phone', 'is_admin']);
        });
    }
};