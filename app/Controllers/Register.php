<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelUser;
use App\Models\ModelPembimbing;
use Config\Services\Email;

class Register extends Controller
{
    public function index()
    {
        $this->db = \Config\Database::connect();
        $this->role = $this->db->table('role');

        $query = $this->role->get();
        $this->data['role'] = $query->getResult();

        $this->divisi = $this->db->table('divisi');

        $query = $this->divisi->get();
        $this->data['divisi'] = $query->getResult();

        $this->pembimbing = $this->db->table('pembimbing');

        $query = $this->pembimbing->get();
        $this->data['pembimbing'] = $query->getResult();

        if (session()->logged_in == true) {
            return redirect()->to('/');
        }
        return view('vw_register', $this->data);
    }

    public function process()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'min_length' => 'Nama minimal 4 Karakter',
                    'max_length' => 'Nama maksimal 100 Karakter',
                ]
            ],
            'email' => [
                'rules' => 'required|min_length[4]|max_length[100]|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'min_length' => 'Email minimal 4 Karakter',
                    'max_length' => 'Email maksimal 100 Karakter',
                    'valid_email' => 'Email yang anda masukkan tidak valid',

                ]
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'min_length' => 'Username minimal 4 Karakter',
                    'max_length' => 'Username maksimal 20 Karakter',

                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 4 Karakter',
                    'max_length' => 'Password maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi',
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
            'asal' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => 'Asal Sekolah / Kampus harus diisi',
                    'min_length' => 'Asal Sekolah / Kampus minimal 4 Karakter',
                    'max_length' => 'Asal Sekolah / Kampus maksimal 100 Karakter',
                ]
            ],
            'pilih' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu',
                ]
            ],
            'NIPEG' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Pembimbing',
                ]
            ],
            'tanggal_mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal mulai harus diisi',
                ]
            ],
            'tanggal_selesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal selesai harus diisi',
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->users = new ModelUser();
        // dd($this->request->getVar());
        $check_username = $this->users
            ->where("username", $this->request->getVar('username'))
            ->findAll();
        $check_email = $this->users
            ->where("email", $this->request->getVar('email'))
            ->findAll();
        if ($check_username == NULL) {
            if ($check_email == NULL) {
                $this->users->insert([
                    'nama' => $this->request->getVar('nama'),
                    'email' => $this->request->getVar('email'),
                    'id_divisi' => $this->request->getVar('id_divisi'),
                    'id_role' => $this->request->getVar('id_role'),
                    'username' => $this->request->getVar('username'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                    'asal' => $this->request->getVar('asal'),
                    'pilih' => $this->request->getVar('pilih'),
                    'pembimbing' => $this->request->getVar('NIPEG'),
                    'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
                    'tanggal_selesai' => $this->request->getVar('tanggal_selesai'),
                ]);

                $pembimbing_email = $this->getPembimbingEmail($this->request->getVar('NIPEG'));
                $tanggal_mulai = date("d M Y", strtotime($this->request->getVar('tanggal_mulai')));
                $tanggal_selesai = date("d M Y", strtotime($this->request->getVar('tanggal_selesai')));
                
                $customSettings = [
                    'table_open' => '<table border="1" cellpadding="2" cellspacing="1">',
                ];
                $table = new \CodeIgniter\View\Table($customSettings);
                $table->setHeading(['Nama Pengguna', 'Asal Sekolah / Kampus', 'Durasi ' . $this->request->getVar('pilih')]);
                $table->addRow([$this->request->getVar('nama'), $this->request->getVar('asal'), $tanggal_mulai . ' - ' . $tanggal_selesai]);

                $email = \Config\Services::email();
                $email->setFrom('your@example.com');
                $email->setTo($pembimbing_email);
                $email->setSubject('Pemberitahuan Registrasi Akun');
                $email->setMessage("Seorang pengguna baru telah mendaftar !! \r\n " . $table->generate());
                // $email->setMessage('Seorang pengguna baru telah mendaftar.' . "\r\n" . 
                // 'Nama pengguna: ' . $this->request->getVar('nama') . "\r\n" . 
                // 'Asal Sekolah / Kampus: ' . $this->request->getVar('asal') . "\r\n" . 
                // 'Durasi ' . $this->request->getVar('pilih') . ': ' . $tanggal_mulai . ' - ' . $tanggal_selesai);
                //nama, asal, tanggal_mulai - tanggal_selesai
                
                if(!$email->send()){
                    exit($email->printDebugger());
                } else {
                    $email->send();
                }
                return redirect()->to('/login');
            // } 
            } else{
                session()->setFlashdata('error', 'Email sudah terdaftar!');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Username sudah terdaftar!');
            return redirect()->back()->withInput();
        }
    }

    public function getPembimbingEmail($NIPEG)
    {
        $pembimbingModel = new ModelPembimbing(); 
        $pembimbing = $pembimbingModel->find($NIPEG);

        if ($pembimbing) {
            return $pembimbing['E_MAIL'];
        }
    }
}
