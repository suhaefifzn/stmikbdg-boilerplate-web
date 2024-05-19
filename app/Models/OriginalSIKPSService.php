<?php

namespace App\Models;

use App\Models\MyWebService;

class OriginalSIKPSService extends MyWebService
{
    /**
     * Service ini berasal langsung dari web SIKPS
     */
    public function __construct()
    {
        parent::__construct(true, 'kp_skripsi');
    }

    public function getAllProposal() {
        return $this->get();
    }
}
