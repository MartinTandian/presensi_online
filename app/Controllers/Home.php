<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use CodeIgniter\Controller;
use App\Models\ModelAbsen;
use App\Models\ModelAktivitas;
use App\Models\ModelUser;
use App\Models\ModelPembimbing;

class Home extends BaseController
{
    public function index()
    {
        helper('divisi_helper');

        $this->data['aktif'] = "Home";
        $this->absen = new ModelAbsen();
        $this->aktivitas = new ModelAktivitas();
        $this->user = new ModelUser();
        $this->pembimbing = new ModelPembimbing();

        $this->db = \Config\Database::connect();
        $this->divisi = $this->db->table('divisi');

        $query = $this->divisi->get();
        $this->data['divisi'] = $query->getResult();

        $this->data["absen"] = $this->absen
            ->where("id_user", session()->id_user)
            ->orderBy("id_absen", "desc")
            ->findAll();

        $this->data["aktivitas"] = $this->aktivitas
            ->findAll();

        $this->data["absen2"] = $this->absen
            ->where("id_user", session()->id_user)
            ->orderBy("id_absen", "desc")
            ->limit(1)
            ->find();

        $today = date('Y-m-d');
        $this->data["all_aktif"] = $this->user
                ->where("users.id_role", 2)
                ->where('users.tanggal_selesai >=', $today)
                ->findAll();

        $today = date('Y-m-d');
        $this->data["divisi_aktif"] = $this->user
                ->where("users.id_role", 2)
                ->where("users.id_divisi", session()->divisi)
                ->where('users.tanggal_selesai >=', $today)
                ->findAll();

        $today = date('Y-m-d');
        $this->data["pembimbing_aktif"] = $this->user
                ->where("users.id_role", 2)
                ->where("users.pembimbing", session()->id_pembimbing)
                ->where('users.tanggal_selesai >=', $today)
                ->findAll();

        $today = date('Y-m-d');
        $this->data["absen_today"] = $this->aktivitas
            ->select('absen.*, users.nama, users.id_divisi, users.asal, users.pilih, users.tanggal_mulai, users.tanggal_selesai')
            ->join("absen", "aktivitas.id_absen = absen.id_absen")
            ->join("users", "absen.id_user = users.id_user")
            ->where("absen.tanggal", $today)
            ->findAll();

        $today = date('Y-m-d');
        $divisiUser = session()->divisi;
        $this->data["absen_today_2"] = $this->aktivitas
            ->select('absen.*, users.nama, users.id_divisi, users.asal, users.pilih, users.tanggal_mulai, users.tanggal_selesai')
            ->join("absen", "aktivitas.id_absen = absen.id_absen")
            ->join("users", "absen.id_user = users.id_user")
            ->where("absen.tanggal", $today)
            ->where("users.id_divisi", $divisiUser)
            ->findAll();

        $today = date('Y-m-d');
        $pembimbing = session()->id_pembimbing;
        $this->data["absen_today_3"] = $this->aktivitas
                ->select('absen.*, users.nama, users.id_divisi, users.asal, users.pilih, users.tanggal_mulai, users.tanggal_selesai')
                ->join("absen", "aktivitas.id_absen = absen.id_absen")
                ->join("users", "absen.id_user = users.id_user")
                ->where("absen.tanggal", $today)
                ->where("users.pembimbing", $pembimbing)
                ->findAll();

        $this->data["aktivitas2"] = $this->aktivitas
            ->where("users.id_user", session()->id_user)
            ->where("absen.tanggal", date('Y-m-d'))
            ->join("absen", "aktivitas.id_absen = absen.id_absen")
            ->join("users", "absen.id_user = users.id_user")
            ->findAll();

        $this->data["absen4"] = $this->absen
            ->select("SUM(nilai_total_jam) as selisih_waktu")
            ->where("id_user", session()->id_user)
            ->first();

        //role admin divisi
        $today = date('Y-m-d');
        $this->data["pkl_divisi_aktif"] = $this->user
            ->where("users.id_role", 2)
            ->where("users.id_divisi", session()->divisi)
            ->where("users.pilih", "PKL")
            ->where('users.tanggal_selesai >=', $today)
            ->orderBy("id_user", "asc")
            ->findAll();

        $jumlah_pkl_divisi_aktif = count($this->data["pkl_divisi_aktif"]);
        $this->data['jumlah_pkl_divisi_aktif'] = $jumlah_pkl_divisi_aktif;

        $tahun_ini = date('Y');
        $this->data["pkl_divisi_tahun_ini"] = $this->user
            ->where("users.id_role", 2)
            ->where("users.id_divisi", session()->divisi)
            ->where("users.pilih", "PKL")
            ->where("YEAR(users.tanggal_mulai)", $tahun_ini)
            ->orderBy("id_user", "asc")
            ->findAll();

        $jumlah_pkl_divisi_tahun_ini = count($this->data["pkl_divisi_tahun_ini"]);
        $this->data['jumlah_pkl_divisi_tahun_ini'] = $jumlah_pkl_divisi_tahun_ini;

        $today = date('Y-m-d');
        $this->data["intern_divisi_aktif"] = $this->user
            ->where("users.id_role", 2)
            ->where("users.id_divisi", session()->divisi)
            ->where("users.pilih", "Internship")
            ->where('users.tanggal_selesai >=', $today)
            ->orderBy("id_user", "asc")
            ->findAll();

        $jumlah_intern_divisi_aktif = count($this->data["intern_divisi_aktif"]);
        $this->data['jumlah_intern_divisi_aktif'] = $jumlah_intern_divisi_aktif;

        $tahun_ini = date('Y');
        $this->data["intern_divisi_tahun_ini"] = $this->user
            ->where("users.id_role", 2)
            ->where("users.id_divisi", session()->divisi)
            ->where("users.pilih", "Internship")
            ->where("YEAR(users.tanggal_mulai)", $tahun_ini)
            ->orderBy("id_user", "asc")
            ->findAll();

        $jumlah_intern_divisi_tahun_ini = count($this->data["intern_divisi_tahun_ini"]);
        $this->data['jumlah_intern_divisi_tahun_ini'] = $jumlah_intern_divisi_tahun_ini;

        //role pembimbing 

        $this->data["pembimbing"] = $this->pembimbing
        ->where("pembimbing.NIPEG", session()->id_user)
        ->find();

        $today = date('Y-m-d');
        $this->data["pkl_pembimbing_aktif"] = $this->user
            ->where("users.id_role", 2)
            ->where("users.pembimbing", session()->id_pembimbing)
            ->where("users.pilih", "PKL")
            ->where('users.tanggal_selesai >=', $today)
            ->orderBy("users.id_user", "asc")
            ->findAll();

        $jumlah_pkl_pembimbing_aktif = count($this->data["pkl_pembimbing_aktif"]);
        $this->data['jumlah_pkl_pembimbing_aktif'] = $jumlah_pkl_pembimbing_aktif;

        $tahun_ini = date('Y');
        $this->data["pkl_pembimbing_tahun_ini"] = $this->user
            ->where("users.id_role", 2)
            ->where("users.pembimbing", session()->id_pembimbing)
            ->where("users.pilih", "PKL")
            ->where("YEAR(users.tanggal_mulai)", $tahun_ini)
            ->orderBy("users.id_user", "asc")
            ->findAll();

        $jumlah_pkl_pembimbing_tahun_ini = count($this->data["pkl_pembimbing_tahun_ini"]);
        $this->data['jumlah_pkl_pembimbing_tahun_ini'] = $jumlah_pkl_pembimbing_tahun_ini;

        
        $today = date('Y-m-d');
        $this->data["intern_pembimbing_aktif"] = $this->user
            ->where("users.id_role", 2)
            ->where("users.pembimbing", session()->id_pembimbing)
            ->where("users.pilih", "Internship")
            ->where('users.tanggal_selesai >=', $today)
            ->orderBy("users.id_user", "asc")
            ->findAll();

        $jumlah_intern_pembimbing_aktif = count($this->data["intern_pembimbing_aktif"]);
        $this->data['jumlah_intern_pembimbing_aktif'] = $jumlah_intern_pembimbing_aktif;

        $tahun_ini = date('Y');
        $this->data["intern_pembimbing_tahun_ini"] = $this->user
            ->where("users.id_role", 2)
            ->where("users.pembimbing", session()->id_pembimbing)
            ->where("users.pilih", "Internship")
            ->where("YEAR(users.tanggal_mulai)", $tahun_ini)
            ->orderBy("users.id_user", "asc")
            ->findAll();

        $jumlah_intern_pembimbing_tahun_ini = count($this->data["intern_pembimbing_tahun_ini"]);
        $this->data['jumlah_intern_pembimbing_tahun_ini'] = $jumlah_intern_pembimbing_tahun_ini;

        //role admin
        $today = date('Y-m-d');
        $this->data["pkl_aktif"] = $this->user
            ->where("users.id_role", 2)
            ->where("users.pilih", "PKL")
            ->where('users.tanggal_selesai >=', $today)
            ->orderBy("id_user", "asc")
            ->findAll();

        $jumlah_pkl_aktif = count($this->data["pkl_aktif"]);
        $this->data['jumlah_pkl_aktif'] = $jumlah_pkl_aktif;

        $tahun_ini = date('Y');
        $this->data["pkl_tahun_ini"] = $this->user
            ->where("users.id_role", 2)
            ->where("users.pilih", "PKL")
            ->where("YEAR(users.tanggal_mulai)", $tahun_ini)
            ->orderBy("id_user", "asc")
            ->findAll();

        $jumlah_pkl_tahun_ini = count($this->data["pkl_tahun_ini"]);
        $this->data['jumlah_pkl_tahun_ini'] = $jumlah_pkl_tahun_ini;

        $today = date('Y-m-d');
        $this->data["intern_aktif"] = $this->user
            ->where("users.id_role", 2)
            ->where("users.pilih", "Internship")
            ->where('users.tanggal_selesai >=', $today)
            ->orderBy("id_user", "asc")
            ->findAll();

        $jumlah_intern_aktif = count($this->data["intern_aktif"]);
        $this->data['jumlah_intern_aktif'] = $jumlah_intern_aktif;

        $tahun_ini = date('Y');
        $this->data["intern_tahun_ini"] = $this->user
            ->where("users.id_role", 2)
            ->where("users.pilih", "Internship")
            ->where("YEAR(users.tanggal_mulai)", $tahun_ini)
            ->orderBy("id_user", "asc")
            ->findAll();

        $jumlah_intern_tahun_ini = count($this->data["intern_tahun_ini"]);
        $this->data['jumlah_intern_tahun_ini'] = $jumlah_intern_tahun_ini;

        $start = date('Y-m-d', strtotime('monday this week'));
        $end = date('Y-m-d', strtotime('friday this week'));
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $total_jam = 0;
        $current_day = date('l');
        $total_jam_tanpa_hari_ini = 0;

        foreach ($days as $day) {
            $absensi = $this->absen
                ->where("id_user", session()->id_user)
                ->where("DAYNAME(tanggal)", $day)
                ->where("tanggal BETWEEN '" . $start . "' AND '" . $end . "'")
                ->findAll();

            foreach ($absensi as $ab) {
                $clock_in = strtotime($ab['clock_in']);
                $clock_out = strtotime($ab['clock_out']);
                $diff = $clock_out - $clock_in;
                $total_jam += $diff;
            }
        }

        foreach ($days as $day) {
            if ($day !== $current_day) {
                $absensi = $this->absen
                    ->where("id_user", session()->id_user)
                    ->where("DAYNAME(tanggal)", $day)
                    ->where("tanggal BETWEEN '" . $start . "' AND '" . $end . "'")
                    ->findAll();

                foreach ($absensi as $ab) {
                    $clock_in = strtotime($ab['clock_in']);
                    $clock_out = strtotime($ab['clock_out']);
                    $diff = $clock_out - $clock_in;
                    $total_jam_tanpa_hari_ini += $diff;
                }
            }
        }

        $this->data['total_jam'] = gmdate('H.i', $total_jam);
        $this->data['total_jam_tanpa_hari_ini'] = gmdate('H.i', $total_jam_tanpa_hari_ini);

        return view('index', $this->data);
    }

    
}
