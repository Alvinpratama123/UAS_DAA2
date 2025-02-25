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
        Schema::create('tas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');         
            $table->integer('panjang');     
            $table->integer('lebar');       
            $table->integer('tinggi');      
            $table->text('Bungkus_kopi'); 
            $table->text('aksesoris');
            $table->text('jumlah_dibuat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tas');
    }
};
