<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// W?Services
use App\Models\KuesionerService;

class TestController extends Controller
{
    public function home() {
        $kuesionerService = new KuesionerService();
        $data = $kuesionerService->getMatkulDiampuByDosen(573)->getData('data')['data']['dosen'];
        // $data = $kuesionerService->getListDosenAktif()->getData('data')['data']['dosen_aktif'];

        return view('welcome', [
            'data' => $data,
        ]);
    }
}
