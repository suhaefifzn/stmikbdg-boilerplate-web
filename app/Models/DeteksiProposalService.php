<?php

namespace App\Models;

use App\Models\MyWebService;

class DeteksiProposalService extends MyWebService
{
    /**
     * Semua method yang ada di sini merupakan implementasi
     * untuk penggunaan API Sistem Deteksi Proposal Skripsi
     * 
     * Cek dokumentasi API STMIK Bandung menu SIKPS
     */
    public function __construct()
    {
        parent::__construct(false, 'sikps');
    }

    /**
     * START - Service utuk mahasiswa
     */
    public function addHasilDeteksiByMahasiswa(array $payload) {
        return $this->post($payload, '/mahasiswa/deteksi/hasil/add');
    }

    public function getListHasilDeteksiByMahasiswa() {
        return $this->get(null, '/mahasiswa/deteksi/hasil/list');
    }

    public function updateProposalHasilDeteksiByMahasiswa(array $payload) {
        return $this->put($payload, '/mahasiswa/deteksi/hasil/update');
    }

    public function deleteHasilDeteksiByMahasiswa($id) {
        return $this->delete([
            'similarity_id' => (int) $id
        ], '/mahasiswa/deteksi/hasil/delete');
    }
    /**
     * END - Service untuk mahasiswa
     */

    /**
     * START - Service untuk admin
     */
    public function addFingerprintByAdmin(array $payload) {
        return $this->post([
            'fingerprints' => $payload
        ], '/deteksi/fingerprints/add');
    }

    public function getListFingerprintByAdmin() {
        return $this->get(null, '/deteksi/fingerprints/list');
    }

    public function updateFingerprintProposalByAdmin(array $payload) {
        return $this->put($payload, '/deteksi/fingerprints/update');
    }

    public function deleteFingerprintByAdmin($id) {
        return $this->delete([
            'fingerprint_id' => (int) $id,
        ], '/deteksi/fingerprints/delete');
    }

    public function getListHasilDeteksiByAdmin() {
        return $this->get(null, '/deteksi/riwayat');
    }
    /**
     * END - Service untuk admin
     */
}
