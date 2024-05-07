<?php

namespace App\Models;

use App\Models\MyWebService;

class MahasiswaKuesionerService extends MyWebService
{
    /**
     * untuk penjelasan lebih lanjut akseslah API Documentation STMIK Bandung
     * dan kunjungi halaman kuesioner di menu Web -> Kuesioner
     */
    public function __construct() {
        parent::__construct('kuesioner/mahasiswa');
    }

    /**
     * * START - Kuesioner Perkuliahan
     */

    /**
     * digunakan untuk get list mata kuliah
     * yang tersedia untuk kuesioner berdasarkan tahun ajaran aktif
     */
    public function getListKuesionerPerkuliahan() {
        return $this->get(null, '/perkuliahan/list-matkul');
    }

    /**
     * digunakan untuk get list pertanyaan kuesioner matakuliah
     * jika sudah pernah mengisi kuesioner, maka pertanyaaan tidak akan muncul
     */
    public function getPertanyaanKuesionerForMatkul($kelasKuliahId) {
        return $this->get("/perkuliahan/pertanyaan?kelas_kuliah_id=$kelasKuliahId");
    }

    /**
     * digunakan untuk mengirim jawaban kuesioner perkuliahan
     * berdasarkan kuesioner perkuliahan id dan kelas kuliah id
     * 
     * format list_jawaban = [
     *    'pertanyaan_id' => 1,
     *    'jawaban' => 'S',
     * ];
     * 
     * lihat dokumentasi untuk contoh lengkap payload
     * 
     */
    public function sendJawabanKuesionerPerkuliahan($kuesionerPerkuliahanId, $kelasKuliahId, array $listJawaban) {
        $payload = [
            'kuesioner_perkuliahan_id' => $kuesionerPerkuliahanId,
            'kelas_kuliah_id' => $kelasKuliahId,
            'list_jawaban' => $listJawaban,
        ];

        return $this->post($payload, '/perkuliahan/pertanyaan/kirim-jawaban');
    }

    /**
     * digunakan mengirim saran untuk mata kuliah.
     * nilai 'kuesioner_perkuliahan_mahasiswa_id' didapat pada response
     * setelah berhasil mengirim jawaban kuesioner perkuliahan
     */
    public function sendSaranForMatkul($kuesionerPerkuliahanMahasiswaId, $saran) {
        $payload = [
            'kuesioner_perkuliahan_mahasiswa_id' => $kuesionerPerkuliahanMahasiswaId,
            'saran' => $saran
        ];

        return $this->post($payload, '/perkuliahan/pertanyaan/kirim-saran');
    }

    /**
     * * END - Kuesioner Perkuliahan
     */



     /**
      * * START - Kuesioner Kegiatan
      */

      /**
       * digunakan untuk get list kuesioner kegiatan yang tersedia
       */
      public function getListKuesionerKegiatan() {
        return $this->get(null, '/kegiatan/list');
      }

      /**
       * digunakan untuk get list pertanyaan kuesioner kegiatan
       * jika sudah pernah mengisi kuesioner yang sama, maka pertanyaan tidak akan muncul
       */
      public function getListPertanyaanKuesionerKegiatan($kuesionerKegiatanId) {
        return $this->get(null, "/kegiatan/pertanyaan?kuesioner_kegiatan_id=$kuesionerKegiatanId");
      }

      /**
       * digunakan untuk kirim jawaban kuesioner kegiatan mahasiswa
       * 
       * format list_jawaban = [
       *    'pertanyaan_id' => 23,
       *    'jawaban' => 'SS',
       * ];
       */
      public function sendJawabanKuesionerKegiatan($kuesionerKegiatanId, array $listJawaban) {
        $payload = [
            'kuesioner_kegiatan_id' => $kuesionerKegiatanId,
            'list_jawaban' => $listJawaban
        ];

        return $this->post($payload, '/kegiatan/pertanyaan/kirim-jawaban');
      }

      /**
       * digunakan untuk mengirim saran terhadap kegiatan.
       * gunakan setelah berhasil mengirim jawaban, karena nilai 'kuesioner_kegiatan_mahasiswa_id'
       * didapat pada response jika berhasil mengirim jawaban kuesioner kegiatan milik mahasiswa
       */
      public function sendSaranForKegiatan($kuesionerKegiatanMahasiswaId, $saran) {
        $payload = [
            'kuesioner_kegiatan_mahasiswa_id' => $kuesionerKegiatanMahasiswaId,
            'saran' => $saran
        ];

        return $this->post($payload, '/kegiatan/pertanyaan/kirim-saran');
      }

      /**
       * * END - Kuesioner Kegiatan
       */
}
