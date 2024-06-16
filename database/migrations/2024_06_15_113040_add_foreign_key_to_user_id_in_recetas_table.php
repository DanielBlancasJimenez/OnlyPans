<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('recetas', function (Blueprint $table) {
            // Verificar si la clave foránea ya existe antes de intentar agregarla
            $foreignKeys = DB::select("SELECT CONSTRAINT_NAME 
                                        FROM information_schema.KEY_COLUMN_USAGE 
                                        WHERE TABLE_NAME = 'recetas' 
                                        AND COLUMN_NAME = 'user_id' 
                                        AND CONSTRAINT_SCHEMA = DATABASE()");
            
            if (count($foreignKeys) === 0) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recetas', function (Blueprint $table) {
            // Verificar si la clave foránea existe antes de intentar eliminarla
            $foreignKeys = DB::select("SELECT CONSTRAINT_NAME 
                                        FROM information_schema.KEY_COLUMN_USAGE 
                                        WHERE TABLE_NAME = 'recetas' 
                                        AND COLUMN_NAME = 'user_id' 
                                        AND CONSTRAINT_SCHEMA = DATABASE()");
            
            if (count($foreignKeys) > 0) {
                $table->dropForeign(['user_id']);
            }
        });
    }
};
