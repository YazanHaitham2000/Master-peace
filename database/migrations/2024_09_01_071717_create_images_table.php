<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_create_images_table.php
public function up()
{
    Schema::create('images', function (Blueprint $table) {
        $table->id();
        $table->string('url');
        $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
        $table->foreignId('home_id')->nullable()->constrained('homes')->onDelete('set null');
        
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
