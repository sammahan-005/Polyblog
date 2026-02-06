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
        Schema::table('communities', function (Blueprint $table) {
            $table->boolean('is_private')->default(false)->nullable();
            $table->foreignId('user_id')->constrained('users')->nullable()->cascadeOnDelete();
            DB::table('communities')->update(['user_id' => 1]);
            
        });

        Schema::table('communities', function (Blueprint $table) {
        
        $table->foreignId('user_id')->nullable(false)->change();
        });

        Schema::create('community_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('community_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('communities', function (Blueprint $table) {
            $table->dropColumn(['is_private', 'user_id']);
        });
    }
};
