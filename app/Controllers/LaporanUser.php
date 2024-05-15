<?php

namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\ModelUser;
use App\Models\MDivisi;
use App\Models\MRole;
use App\Models\ModelAbsen;
use App\Models\ModelAktivitas;


Class LaporanUser extends Controller
{
    function __construct(){
        $this -> users = new ModelUser();
        $this -> divisi = new MDivisi();
        $this -> role = new MRole();
        $this -> absen = new ModelAbsen();
        $this -> aktivitas = new ModelAktivitas();
        helper(['form','url']);
        
    }

    public function index($id_user)
    {
        $this->data['aktif'] = "Laporan";
        // $this->data["users"]= $this->users
        // ->join('divisi','divisi.id_divisi=users.id_divisi')
        // ->join('role','role.id_role=users.id_role')
        // ->findAll();
        $this->data["users"] = $this->users
        ->where("id_user",$id_user)
        ->first();

        $this->data["absen"]= $this->absen
        ->join("users","absen.id_user = users.id_user")
        ->where("absen.id_user",$id_user)
        ->findAll();

        $this->data["aktivitas"]= $this->aktivitas
        ->findAll();

        $today = date('Y-m-d');
        $this->data["aktivitas2"] = $this->aktivitas
        ->where("absen.id_user", session()->id_user)
        ->join("absen", "aktivitas.id_absen = absen.id_absen")
        ->where("absen.tanggal", $today)
        ->findAll();
        
        return view('vw_laporan_user', $this->data);
    }

}