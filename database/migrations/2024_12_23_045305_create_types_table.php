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
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String('type_title');
            $table->String('type_description')->nullable();
            $table->String('type_file');
            $table->Integer('type_must');
            $table->enum('type_status',['0','1']);
            $table->Integer('type_categori_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
