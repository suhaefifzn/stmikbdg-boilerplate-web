<?php

namespace App\Models;

use App\Models\MyWebService;

class WisudaService extends MyWebService
{
    public function __construct() {
        parent::__construct('wisuda');
    }

    /**
     * Digunakan untuk mengirim pengajuan pendaftaran wisuda oleh mahasiswa
     * * Target role: mahasiswa
     */
    public function addPengajuanByMahasiswa(array $payload) {
        return $this->post($payload, '/pengajuan');
    }

    /**
     * Digunakan untuk mendapatkan detail pengajuan mahasiswa yang login
     *  * Target role: mahasiswa
     */
    public function getDetailPengajuanByMahasiswa(string $nim) {
        return $this->get(null, "/pengajuan/$nim");
    }

    /**
     * Digunakan untuk mendapatkan status pengajuan pendaftaran mahasiswa yang login
     * * Target role: mahasiswa
     */
    public function getDetailStatusPengajuanByMahasiswa(string $nim) {
        return $this->get(null, "/pengajuan/$nim/status");
    }

    /**
     * Digunakan untuk add pengajuan pendaftaran wisuda oleh admin
     * * Target role: admin
     */
    public function addPengajuanByAdmin(array $payload) {
        return $this->post($payload, '/pengajuan/add-by-admin');
    }

    /**
     * Digunakan untuk get list pengajuan pendaftaran wisuda
     * * Target role: admin
     */
    public function getListPengajuanMahasiswaByAdmin() {
        return $this->get(null, '/pengajuan/list/pendaftar');
    }

    /**
     * Digunakan untuk get list status yang disediakan
     * * Target role: admin
     */
    public function getListStatusAvailableByAdmin() {
        return $this->get(null, '/pengajuan/list/status-tersedia');
    }

    /**
     * Digunakan untuk get detail pengajuan milik mahasiswa berdasarkan nim
     * * Target role: admin
     */
    public function getDetailPengajuanByAdmin(string $nim) {
        return $this->get(null, "/pengajuan/detail/$nim");
    }

    /**
     * Digunakan untuk memperbarui data pengajuan milik mahasiswa
     * seperti status pengajuam
     * * Target role: admin
     */
    public function updatePengajuanMahasiswaByAdmin(array $payload, string $nim) {
        return $this->put($payload, "/pengajuan/detail/$nim");
    }

    /**
     * Digunakan untuk menghapus pengajuan mahasiswa berdasarkan nim
     * * Target role: admin
     */
    public function deletePengajuanMahasiswaByAdmin(string $nim) {
        return $this->delete(null, "/pengajuan/$nim/delete");
    }

    /**
     * Digunakan untuk mendapatkan angka total pengajuan pendaftaran wisuda
     * * Target role: admin
     */
    public function getStatistikPengajuanByAdmin() {
        return $this->get(null, '/pengajuan/statistik/pendaftaran');
    }
}
