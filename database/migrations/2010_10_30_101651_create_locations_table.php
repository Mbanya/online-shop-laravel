<?php
declare(strict_types=1);
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('house'); //1234
            $table->string('street'); // street name
            $table->string('parish')->nullable(); // Village or Town
            $table->string('ward')->nullable(); //Town
            $table->string('district')->nullable(); // Greater area
            $table->string('county')->nullable(); // Nairobi
            $table->string('postcode'); //00200 16263
            $table->string('country'); //Kenya
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
