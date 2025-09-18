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
        Schema::connection('mongodb')->create('warehouses', function (Blueprint $collection) {
            // By default MongoDB will add "_id"
            $collection->index('name');      // create index for name
            $collection->index('type');      // create index for type
            $collection->index('location');  // create index for location
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('warehouses');
    }
};
