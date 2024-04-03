<?php

namespace App\Http\Controllers;

use App\Models\WisudaService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $service;

    public function __construct() {
        $this->service = new WisudaService();
    }

    public function index() {
        $statistik = $this->service->getStatistikPengajuanByAdmin();

        return $statistik->getData('data')['data'];
    }
}
