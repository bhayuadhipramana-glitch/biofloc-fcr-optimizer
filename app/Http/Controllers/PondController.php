<?php

namespace App\Http\Controllers;

use App\Models\Pond;
use Illuminate\Http\Request;
use Inertia\Inertia; // Wajib dipanggil karena kita menggunakan Inertia/React

class PondController extends Controller
{
    /**
     * Fungsi untuk mengambil data dan menampilkannya di halaman Dashboard Frontend
     */
    public function index()
    {
        // 1. Sintaks untuk mengambil seluruh data kolam + metrik hariannya dari MySQL
        $datasetKolam = Pond::with('dailyMetrics')->get();

        // (Opsional nanti) Di sinilah Anda bisa menambahkan logika cURL/HTTP Request 
        // untuk mengirim $datasetKolam ke FastAPI agar dianalisis oleh AI.

        // 2. Mengirimkan dataset tersebut ke Frontend React (Inertia)
        return Inertia::render('Dashboard/Index', [
            'dataKolam' => $datasetKolam
        ]);
    }
}