<?php

namespace App\Models\Admin;

use App\Models\MyWebService;

class BimbinganService extends MyWebService
{
    public function __construct()
    {
        parent::__construct('antrian/bimbingan');
    }

    public function getListBimbingan(bool $isSudah = null) {
        $query = is_null($isSudah) ? '' : '?sudah=' . $isSudah;

        return $this->get(null, ('/list' . $query));
    }

    public function getDetailBimbingan(int $bimbinganId) {
        return $this->get(null, "/detail/$bimbinganId");
    }

    public function addBimbingan(string $nim, string $namaMahasiswa, string $namaDosen, string $tanggal) {
        $payload = [
            'nim' => $nim,
            'nm_mhs' => $namaMahasiswa,
            'dosen_pembimbing' => $namaDosen,
            'tgl_bimbingan' => $tanggal,
        ];

        return $this->post($payload, '/add');
    }

    public function updateStatusBimbingan(int $bimbinganId, bool $isSudah) {
        $payload = [
            'bimbingan_id' => $bimbinganId,
            'sudah' => $isSudah
        ];

        return $this->put($payload, '/status/update');
    }

    public function updateBimbingan(int $bimbinganId, string $nim, string $namaMahasiswa, string $namaDosen, string $tanggal) {
        $payload = [
            'bimbingan_id' => $bimbinganId,
            'nim' => $nim,
            'nm_mhs' => $namaMahasiswa,
            'dosen_pembimbing' => $namaDosen,
            'tgl_bimbingan' => $tanggal
        ];

        return $this->put($payload, '/update');
    }

    public function deleteBimbingan(int $bimbinganId) {
        $payload = [
            'bimbingan_id' => $bimbinganId
        ];

        return $this->delete($payload, '/delete');
    }
}
