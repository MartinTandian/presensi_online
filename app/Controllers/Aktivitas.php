<?php namespace App\Controllers;
 
date_default_timezone_set('Asia/Jakarta');

use CodeIgniter\Controller;
use App\Models\ModelAktivitas;
use App\Models\ModelAbsen;
use App\Models\ModelUser;

class Aktivitas extends BaseController{

    public function index()
    {
        $this->data['aktif'] = "Aktivitas";
        $this->aktivitas= new ModelAktivitas();
        $this->absen= new ModelAbsen();

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

        return view('vw_absen', $this->data);
    }

    public function tambah_aktivitas()
    {
        if (!$this->validate([
            'aktivitas' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => 'Aktivitas harus diisi',
                    'min_length' => 'Isi minimal 4 Karakter',
                    'max_length' => 'Isi maksimal 100 Karakter',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[4]|max_length[200]',
                'errors' => [
                    'required' => 'Deskripsi harus diisi',
                    'min_length' => 'Isi minimal 4 Karakter',
                    'max_length' => 'Isi maksimal 200 Karakter',
                ]
            ],
        ]))
        {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        // dd($this->request->getVar());
        $aktivitas = new ModelAktivitas();
        $aktivitas->insert([
            'id_absen' => $this->request->getVar('absen'),
            'id_user' =>  $this->request->getVar('users'),
            'aktivitas' => $this->request->getVar('aktivitas'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        return redirect()->to('/absen');
    }

    public function edit_aktivitas($id_absen)
    {
        if (!$this->validate([
            'aktivitas' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => 'Aktivitas harus diisi',
                    'min_length' => 'Isi minimal 4 Karakter',
                    'max_length' => 'Isi maksimal 100 Karakter',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[4]|max_length[200]',
                'errors' => [
                    'required' => 'Deskripsi harus diisi',
                    'min_length' => 'Isi minimal 4 Karakter',
                    'max_length' => 'Isi maksimal 200 Karakter',
                ]
            ],
        ])) 
        {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        // dd($this->request->getVar());
        $aktivitas = new ModelAktivitas();
        $aktivitas->where('id_absen', $id_absen)->set([
            'aktivitas' => $this->request->getVar('aktivitas'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ])->update();
        
        return redirect()->to('/absen');
    }
}