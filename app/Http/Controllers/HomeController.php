<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct() {
        // buat instance dari web service di sini
    }

    public function home() {
        if (isset(Session::get('role')['is_admin'])) {
            /**
             * jika yang login adalah admin
             */

            return view('dashboard.admin.home', [
                'title' => 'Home',
            ]);
        }
    }
}
