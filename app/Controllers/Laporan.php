<?php

namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\ModelUser;
use App\Models\MDivisi;
use App\Models\MRole;
use App\Models\ModelAbsen;
use App\Models\ModelAktivitas;
use App\Models\ModelPembimbing;


Class Laporan extends Controller
{
    function __construct(){
        $this -> users = new ModelUser();
        $this -> divisi = new MDivisi();
        $this -> role = new MRole();
        $this -> absen = new ModelAbsen();
        $this -> aktivitas = new ModelAktivitas();
        $this -> pembimbing = new ModelPembimbing();
        helper(['form','url']);
        
    }

    public function index()
    {
        $this->data['aktif'] = "Laporan";
        $this->data["users"]= $this->users
        ->where('users.id_role', 2)
        ->join('divisi','divisi.id_divisi=users.id_divisi')
        ->join('role','role.id_role=users.id_role')
        ->findAll();

        $this->data["divisi"]= $this->divisi
        ->findAll();

        $this->data["role"]= $this->role
        ->findAll();

        $this->data["pembimbing"] = $this->pembimbing
        ->findAll();

        $this->data["users2"]=$this->users
        ->where('users.id_role', 2)
        ->where("users.id_divisi",session()->divisi)
        ->join('divisi','divisi.id_divisi=users.id_divisi')
        ->join('role','role.id_role=users.id_role')
        ->join('pembimbing', 'pembimbing.NIPEG = users.pembimbing', 'left')
        ->findAll();

        $this->data["users3"]=$this->users
        ->where('users.id_role', 2)
        ->where("users.pembimbing",session()->id_pembimbing)
        ->join('divisi','divisi.id_divisi=users.id_divisi')
        ->join('role','role.id_role=users.id_role')
        ->join('pembimbing', 'pembimbing.NIPEG = users.pembimbing', 'left')
        ->findAll();

        return view('vw_laporan', $this->data);
    }

    public function edit($id_user)
    {
        if (!$this->validate([
            'divisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Divisi harus diisi',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus diisi',
                ]
            ],
        ])) 
        {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $users = new ModelUser();
        $users->update($id_user,[
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'id_divisi' => $this->request->getVar('divisi'),
            'id_role' => $this->request->getVar('role')
        ]);
        return redirect()->to('/users');
    }

    public function hapus($id_user)
    {
        // $this->absen
        // ->where('id_user', $id_user)
        // ->delete();
        // $this->aktivitas
        // ->where('id_user', $id_user)
        // ->delete();
        $this->users
        ->where('id_user', $id_user)
        ->delete();
        return redirect()->to('/users');

    }

}