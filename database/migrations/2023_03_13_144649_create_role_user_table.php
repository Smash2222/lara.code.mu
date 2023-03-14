<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('roles_users', function (Blueprint $table) {
            $table->dropForeign('role_user_role_id_foreign');
            $table->dropColumn('role_id');
            $table->dropForeign('role_user_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('role_user');
    }
};
