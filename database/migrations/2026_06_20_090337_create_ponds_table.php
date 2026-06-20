<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daily_metrics', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel ponds
            $table->foreignId('pond_id')->constrained()->cascadeOnDelete(); 
            
            // Parameter Ekosistem Bioflok
            $table->float('suhu'); // Suhu air (Celcius)
            $table->float('ph'); // Kadar pH air
            $table->float('do')->nullable(); // Dissolved Oxygen (Oksigen Terlarut)
            $table->float('amonia')->nullable(); // Kandungan amonia
            
            // Parameter Pertumbuhan & FCR
            $table->float('pakan'); // Jumlah pakan dalam gram
            $table->float('berat')->nullable(); // Penambahan berat ikan
            $table->float('fcr_aktual')->nullable(); // Hasil kalkulasi sistem
            
            $table->date('date'); // Tanggal pencatatan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_metrics');
    }
};