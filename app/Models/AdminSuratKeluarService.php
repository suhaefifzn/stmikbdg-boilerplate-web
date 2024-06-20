<?php

namespace App\Models;

use App\Models\MyWebService;

class AdminSuratKeluarService extends MyWebService
{
    public function __construct() {
        parent::__construct('surat/keluar');
    }
    
}
