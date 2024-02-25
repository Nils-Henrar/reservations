<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->string('name', 60)->change(); // Ne fonctionne pas avec Enum
            $table->renameColumn('name', 'firstname');
            //deplacer la colone password existante

            $table->string('lastname', 60)->after('name');
            $table->string('login', 30)->after('id');
            $table->string('langue', 2)->after('remember_token');
            $table->enum('role', ['admin', 'member'])->default('member');
            $table->unique('login', 'users_login_unique');
        });

        DB::statement('ALTER TABLE users MODIFY COLUMN firstname VARCHAR(60)');
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_login_unique');

            $table->dropColumn(['role', 'langue', 'login', 'lastname']);
            $table->string('firstname', 255)->change(); // Fonctionne
            $table->renameColumn('firstname', 'name');
        });
    }
};
