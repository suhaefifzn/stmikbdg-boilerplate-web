<?php

namespace App\Models;

use App\Models\MyWebService;

class AdminSuratKeluarService extends MyWebService
{
    /**
     * Selengkapnya cek dokumentasi API
     * untuk sistem surat masuk dan keluar
     */
    public function __construct() {
        parent::__construct('surat/keluar');
    }

    public function getListSurat() {
        return $this->get(null, '/list');
    }

    public function editSurat(array $payload) {
        return $this->put($payload, '/update');
    }

    public function deleteSurat(int $id) {
        return $this->delete([
            'surat_keluar_id' => $id
        ], '/delete');
    }

    public function addSurat(array $payload) {
        return $this->post($payload, '/add');
    }

    public function getListStaffUntukDisposisi() {
        return $this->get(null, '/staff/list?target=all');
    }

    public function rekapSurat(string $date, int $statusId) {
        return $this->get(null, ('/rekap?date=' . $date . '&status_id=' . $statusId));
    }

    public function getListStatus() {
        return $this->get(null, '/status/list-by-admin');
    }
}
