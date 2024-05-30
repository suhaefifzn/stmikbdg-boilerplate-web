<?php

namespace App\Models\Admin;

use App\Models\MyWebService;

class DosenService extends MyWebService
{
    public function __construct()
    {
        parent::__construct('antrian/dosen');
    }

    public function getListDosen() {
        return $this->get(null, '/list');
    }

    public function getDetailDosen($dosenId) {
        return $this->get(null, "/detail/$dosenId");
    }

    public function addDosen(string $kdDosen, string $namaDosen, string $noCard) {
        $payload = [
            'kd_dosen' => $kdDosen,
            'nm_dosen' => $namaDosen,
            'no_card' => $noCard
        ];

        return $this->post($payload, '/add');
    }

    public function updateDosen(int $dosenId, string $kdDosen, string $namaDosen, string $noCard) {
        $payload = [
            'dosen_id' => $dosenId,
            'kd_dosen' => $kdDosen,
            'nm_dosen' => $namaDosen,
            'no_card' => $noCard
        ];

        return $this->put($payload, '/update');
    }

    public function deleteDosen(int $dosenId) {
        $payload = [
            'dosen_id' => $dosenId
        ];

        return $this->delete($payload, '/delete');
    }
}
