<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use CodeIgniter\Controller;
use App\Models\ModelAbsen;
use App\Models\ModelAktivitas;
use App\Models\ModelUser;

class Cetak extends BaseController{

    public function index()
    {
        $this->data['aktif'] = "Cetak";
        $this->absen= new ModelAbsen();
        $this->aktivitas= new ModelAktivitas();
        $this->user = new ModelUser();

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
        $day_of_week = date('N', strtotime($today));
        $diff_to_monday = $day_of_week - 1;
        $diff_to_friday = 5 - $day_of_week;
        
        $tanggal_awal = $this->request->getVar('tanggal_awal');
        $tanggal_akhir = $this->request->getVar('tanggal_akhir');

        $senin = date('Y-m-d', strtotime("$today -$diff_to_monday days"));
        $jumat = date('Y-m-d', strtotime("$today +$diff_to_friday days"));

        $this->data["absen_mingguan"] = $this->absen->get_presensi($senin, $jumat);
        
        $this->data["awal"] = '';
        $this->data["akhir"] = '';

        return view ('vw_cetak',$this->data);
    }

    public function filter()
{
    $this->data['aktif'] = "Cetak";
    $tanggal_awal = $this->request->getPost('tanggal_awal');
    $tanggal_akhir = $this->request->getPost('tanggal_akhir');

    $this->data["awal"] = $tanggal_awal;
    $this->data["akhir"] = $tanggal_akhir;

    $this->absen= new ModelAbsen();
    $this->aktivitas= new ModelAktivitas();
    $this->user = new ModelUser();

    $this->data["aktivitas"] = $this->aktivitas
        ->findAll();

    $this->data["absen_mingguan"] = $this->absen
        ->where('tanggal >=', $tanggal_awal)
        ->where('tanggal <=', $tanggal_akhir)
        ->findAll();

    return view('vw_cetak',$this->data);
}


}