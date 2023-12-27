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
        Schema::create('Books', function (Blueprint $table) {
            $table->id();
            $table->string('Books_name');
            $table->string('Books_Desc');
            $table->enum('Books_Marker', ['Ebook', 'Sách giấy']);
            $table->string('Book_image');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Books');
    }
};
