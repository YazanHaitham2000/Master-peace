<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToHomesTable extends Migration
{
    public function up()
    {
        Schema::table('homes', function (Blueprint $table) {
            // Add new columns
            $table->decimal('price', 10, 2)->nullable(); // Price column
            $table->integer('area')->nullable(); // Area column in sq. ft.
            $table->integer('rooms')->nullable(); // Rooms column
            $table->integer('bathrooms')->nullable(); // Bathrooms column
        });
    }

    public function down()
    {
        Schema::table('homes', function (Blueprint $table) {
            // Drop the columns if rolling back
            $table->dropColumn(['price', 'area', 'rooms', 'bathrooms']);
        });
    }
}
