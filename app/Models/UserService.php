<?php

namespace App\Models;

use App\Models\MyWebService;

class UserService extends MyWebService {
    /**
     * UserService digunakan untuk mengatur akun pengguna itu sendiri
     * seperti get profile, ganti password, dan ganti foto.
     */

    public function __construct() {
        parent::__construct(false, 'users');
    }

    public function getMyProfile() {
        return $this->get(null, '/me');
    }

    public function updateMyPassword($currentPassword, $newPassword) {
        $payload = [
            'current_password' => $currentPassword,
            'new_password' => $newPassword,
        ];

        return $this->put($payload, '/me/password');
    }

    public function updateMyImage($imagePath) {
        return $this->postFile($imagePath, '/me/image');
    }
}
