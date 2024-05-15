<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelUser;
use App\Models\ModelPembimbing;

class Login extends Controller
{
    public function index()
    {
        if (session()->logged_in == true) {
            return redirect()->to('/');
        }
        return view('vw_login');
    }

    public function index_pembimbing()
    {
        if (session()->logged_in == true) {
            return redirect()->to('/');
        }
        return view('vw_login_pembimbing');
    }

    public function process()
    {
        $users = new ModelUser();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users
            ->select('users.*, role.nama_role, divisi.nama_divisi, pembimbing.NAMA, pembimbing.E_MAIL pembimbingemail')
            ->join('role', 'role.id_role = users.id_role')
            ->join('divisi', 'divisi.id_divisi = users.id_divisi')
            ->join('pembimbing', 'pembimbing.NIPEG = users.pembimbing', 'left')
            ->where('email', $username)->orWhere('username', $username)
            ->first();

        if ($dataUser != NULL) {
            $tanggalSelesaiMagang = strtotime($dataUser["tanggal_selesai"]);
            $today = strtotime('today');
            $admin = 1;
            $user = 2;
            $admin_divisi = 3;

            if (password_verify($password, $dataUser["password"])) {

                if ($tanggalSelesaiMagang < $today && $dataUser["id_role"] == $user) {
                    session()->setFlashdata('error', 'Username tidak berlaku');
                    return redirect()->back();
                } else {
                    session()->set([
                        'username' => $dataUser["username"],
                        'nama' => $dataUser["nama"],
                        'email' => $dataUser["email"],
                        'id_user' => $dataUser["id_user"],
                        'role' => $dataUser["id_role"],
                        'divisi' => $dataUser["id_divisi"],
                        'nama_divisi', $dataUser['nama_divisi'],
                        'asal' => $dataUser["asal"],
                        'pilih' => $dataUser["pilih"],
                        'pembimbing' => $dataUser["NAMA"],
                        'tanggal_mulai' => $dataUser["tanggal_mulai"],
                        'tanggal_selesai' => $dataUser["tanggal_selesai"],
                        'logged_in' => TRUE
                    ]);

                    return redirect()->to(base_url('home'));
                }
            } else {
                // dd($this->request->getVar());
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username tidak terdaftar');
            return redirect()->back();
        }
    }

    public function process_pembimbing()
    {
        $pembimbing_data = new ModelPembimbing();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        // $default_pass = password_hash("1234", PASSWORD_BCRYPT);

        $cek = $pembimbing_data->where('E_MAIL', $username)->first();
        if ($cek["password"] == NULL) {
            $pembimbing_data->update($cek["NIPEG"], [
                'password' => password_hash("1234", PASSWORD_BCRYPT)
            ]);
        }

        $dataPembimbing = $pembimbing_data
            ->select('pembimbing.*, role.nama_role, users.id_user')
            ->join('role', 'role.id_role = pembimbing.id_role', 'left')
            ->join('users', 'pembimbing.NIPEG = users.pembimbing', 'left')
            ->where('E_MAIL', $username)
            ->first();

        if ($dataPembimbing) {
            $today = strtotime('today');
            
            if (password_verify($password, $dataPembimbing["password"])) {
                session()->set([
                    'username' => $dataPembimbing["E_MAIL"],
                    'nama' => $dataPembimbing["NAMA"],
                    'email' => $dataPembimbing["E_MAIL"],
                    'id_pembimbing' => $dataPembimbing["NIPEG"],
                    'id_user' => $dataPembimbing["id_user"],
                    'role' => $dataPembimbing["id_role"],
                    'logged_in' => TRUE
                ]);

                return redirect()->to(base_url('home'));
            } else {
                // dd($this->request->getVar());
                session()->setFlashdata('error', 'Username atau Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username tidak terdaftar');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
