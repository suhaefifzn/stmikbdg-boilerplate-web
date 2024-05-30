<?php

namespace App\Models\Admin;

use App\Models\MyWebService;

class SidangService extends MyWebService
{
    public function __construct()
    {
        parent::__construct('antrian/sidang');
    }

    public function getListSidang() {
        return $this->get(null, '/list');
    }

    public function getDetailSidang(int $sidangId) {
        return $this->get(null, "/detail/$sidangId");
    }

    public function addSidang(array $payload) {
        return $this->post($payload, '/add');
    }

    public function updateSidang(array $payload) {
        return $this->put($payload, '/update');
    }

    public function deleteSidang(int $sidangId) {
        $payload = [
            'sidang_id' => $sidangId
        ];

        return $this->delete($payload, '/delete');
    }
}
