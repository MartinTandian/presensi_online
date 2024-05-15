<?php 

namespace App\Controllers;
 
date_default_timezone_set('Asia/Jakarta');


use CodeIgniter\Controller;
use App\Models\ModelAbsen;
use App\Models\ModelAktivitas;

class Absen extends BaseController{

    public function index()
    {
        $this->data['aktif'] = "Absen";
        $this->absen= new ModelAbsen();
        $this->aktivitas= new ModelAktivitas();

        $this->data["absen"]=$this->absen
        ->where("id_user",session()->id_user)
        ->findAll();

        $this->data["aktivitas"]=$this->aktivitas
        ->where("id_user",session()->id_user)
        ->findAll();

        $this->data["absen2"]=$this->absen
        ->where("id_user",session()->id_user)
        ->orderBy("id_absen", "desc")
        ->limit(1)
        ->find();
        
        $today = date('Y-m-d');
        $this->data["aktivitas2"] = $this->aktivitas
        ->where("absen.id_user", session()->id_user)
        ->join("absen", "aktivitas.id_absen = absen.id_absen")
        ->where("absen.tanggal", $today)
        ->findAll();
        
        $this->data["aktivitas_kosong"] = $this->aktivitas
            ->where("users.id_user", session()->id_user)
            ->where("absen.tanggal", date('Y-m-d'))
            ->join("absen", "aktivitas.id_absen = absen.id_absen")
            ->join("users", "absen.id_user = users.id_user")
            ->findAll();

        return view('vw_absen',$this->data);
    }

    public function clock_in()
    {
        if (!$this->validate([
            'tanggal_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi',
                ]
            ],
            'jam_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Clock In harus diisi',
                ]
            ],
        ])) 
        {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $masuk = new ModelAbsen();
        $masuk->insert([
            'id_user' => $this->request->getVar('user'),
            'tanggal' => $this->request->getVar('tanggal_masuk'),
            'clock_in'=> $this->request->getVar('jam_masuk'),
        ]);
        return redirect()->to('/absen');
    }
    
    public function clock_out($id_absen)
    {
        $absen = new ModelAbsen();
        // dd($this->request->getVar());
        $absen->update($id_absen,[
            'clock_out'         => $this->request->getVar('jam_keluar'),
            'total_jam'         => $this->request->getVar('total_jam'),
            'nilai_total_jam'   => $this->request->getVar('nilai_total_jam')
        ]);
        return redirect()->to('/');
    }

}