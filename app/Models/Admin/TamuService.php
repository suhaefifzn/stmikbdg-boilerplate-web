<?php

namespace App\Models\Admin;

use App\Models\MyWebService;

class TamuService extends MyWebService
{
    /**
     * untuk setiap format payload dalam bentuk array
     * silahkan lihat dokumentasi api menu antrian tab tamu
     */
    public function __construct()
    {
        parent::__construct('antrian/tamu');
    }

    public function getListTamu() {
        return $this->get(null, '/list');
    }

    public function getDetailTamu(int $tamuId) {
        return $this->get(null, "/detail/$tamuId");
    }

    public function addTamu(array $payload) {
        return $this->post($payload, '/add');
    }

    public function updateTamu(array $payload) {
        return $this->put($payload, '/update');
    }

    public function deleteTamu(int $tamuId) {
        $payload = [
            'tamu_id' => $tamuId
        ];

        return $this->delete($payload, '/delete');
    }
}
