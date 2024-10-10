<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBedroomsAndLocationToHomesTable extends Migration
{
    public function up()
    {
        Schema::table('homes', function (Blueprint $table) {
            // Add new columns
            $table->integer('bedrooms')->nullable(); // Bedrooms column
            $table->string('location')->nullable();   // Location column
        });
    }

    public function down()
    {
        Schema::table('homes', function (Blueprint $table) {
            // Drop the columns if rolling back
            $table->dropColumn(['bedrooms', 'location']);
        });
    }
}
