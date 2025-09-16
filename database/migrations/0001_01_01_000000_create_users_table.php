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
        Schema::connection('mongodb')->create('users', function ($collection) {
            $collection->index('email'); // create index
        });

        // Password reset tokens collection
        Schema::connection('mongodb')->create('password_reset_tokens', function ($collection) {
            $collection->index('email');
        });

        // Sessions collection
        Schema::connection('mongodb')->create('sessions', function ($collection) {
            $collection->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->drop('users');
        Schema::connection('mongodb')->drop('password_reset_tokens');
        Schema::connection('mongodb')->drop('sessions');
    }
};
