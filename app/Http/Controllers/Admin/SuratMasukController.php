<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// ? Service
use App\Models\AdminSuratMasukService;
use App\Models\MainSuratService;

class SuratMasukController extends Controller
{
    protected $mainService;
    protected $suratMasukService;

    public function __construct()
    {
        $this->mainService = new MainSuratService();
        $this->suratMasukService = new AdminSuratMasukService();
    }

    public function disposisi() {
        $listSurat = $this->suratMasukService->getListSuratDisposisi()->getData('data')['data'];

        return view('dashboard.admin.surat-masuk.disposisi', [
            'title' => 'Data Disposisi Surat',
            'data' => [
                'list_surat' => $listSurat['list_disposisi']
            ]
        ]);
    }

    public function getListArsip() {
        $arsip = $this->mainService->getArsipSurat()->getData('data')['data'];

        return view('dashboard.admin.surat-masuk.arsip', [
            'title' => 'Data Arsip Surat',
            'data' => [
                'surat_masuk' => $arsip['list_arsip']['surat_masuk'],
                'surat_keluar' => $arsip['list_arsip']['surat_keluar']
            ]
        ]);
    }

    public function getListSurat() {
        $listSurat = $this->suratMasukService->getListSurat()->getData('data')['data'];

        return view('dashboard.admin.surat-masuk.list', [
            'title' => 'Data Surat Masuk',
            'data' => [
                'list_surat' => $listSurat['list_surat_masuk']
            ]
        ]);
    }
}
