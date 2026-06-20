<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pond extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kolam', 
        'kapasitas_ikan'
    ];

    /**
     * Relasi 1:N (One to Many)
     * Hubungan ke tabel daily_metrics untuk menarik data parameter air.
     */
    public function dailyMetrics()
    {
        return $this->hasMany(DailyMetric::class);
    }
}