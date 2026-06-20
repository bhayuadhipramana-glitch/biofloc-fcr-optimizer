<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyMetric extends Model
{
    use HasFactory;

    protected $fillable = [
        'pond_id',
        'suhu',
        'ph',
        'do',       // Mengizinkan pengambilan & pengisian data DO
        'amonia',   // Mengizinkan pengambilan & pengisian data Amonia
        'pakan',
        'berat',
        'fcr_aktual',
        'date'
    ];

    /**
     * Relasi Kebalikan (Belongs To)
     * Menghubungkan kembali setiap baris data metrik ke kolam pemiliknya.
     */
    public function pond()
    {
        return $this->belongsTo(Pond::class);
    }

    /**
     * Relasi 1:1 ke Tabel Rekomendasi AI
     */
    public function aiRecommendation()
    {
        return $this->hasOne(AiRecommendation::class);
    }
}