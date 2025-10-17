<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('car_id');
            $table->string('brand');
            $table->string('model');
            $table->integer('year')->nullable();
            $table->string('transmission')->nullable();
            $table->string('fuel_type')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            // no timestamps (model sets public $timestamps = false)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
