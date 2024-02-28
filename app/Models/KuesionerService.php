<?php

namespace App\Models;

use App\Models\MyWebService;

class UserService extends MyWebService {
    public function __construct() {
        parent::__construct('kuesioner');
    }

    public function getListDosenAktif() {
        return $this->get(null, '/dosen-aktif');
    }

    public function getMatkulDiampuByDosen($dosenId) {
        $query = "/dosen-aktif/$dosenId/matkul-diampu";

        return $this->get(null, $query);
    }
}
