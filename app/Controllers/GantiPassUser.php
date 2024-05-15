<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Models\ModelUser;

class GantiPassUser extends BaseController
{
    public function index()
    {
        $this->user = new ModelUser();

        $this->data["user"] = $this->user
            ->where("id_user", session()->id_user)
            ->find();


        return view('vw_gantipass_user', $this->data);
    }

    public function cekPassLama(string $str, string $fields, array $data): bool
    {
        $id_user = session()->id_user;

        $userModel = new ModelUser();
        $user = $userModel
            ->where("id_user", $id_user)
            ->first();

        $hashedPassword = $user['password'];

        return password_verify($str, $hashedPassword);
    }


    public function ganti_password()
    {
        $userModel = new ModelUser();

        // $this->data["pembimbing"] = $pembimbingModel
        //     ->where("NIPEG", session()->id_pembimbing)
        //     ->first();

        if (!$this->validate([
            'PassLama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Lama harus diisi',
                ]
            ],
            'PassBaru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Baru harus diisi',
                ]
            ],
            'ConfPassBaru' => [
                'rules' => 'required|matches[PassBaru]',
                'errors' => [
                    'required' => 'Konfirmasi Password Baru harus diisi',
                    'matches' => 'Konfirmasi Password Baru harus sama dengan Password Baru',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $id_user = session()->id_user;
            $cek = $userModel
                ->where("id_user", $id_user)
                ->first();

            $password_lama = $this->request->getVar('PassLama');
            $password_baru = $this->request->getVar('PassBaru');
            $validate = password_verify($password_lama, $cek['password']);
            // dd($validate);
            if ($validate == false) {
                session()->setFlashdata('error', 'Password Lama Salah');
                return redirect()->to('/gantipassuser');
            } else {
                $validate2 = password_verify($password_baru, $cek['password']);
                if ($validate2 == false) {
                    $userModel->update($id_user, [
                        'password' => password_hash($this->request->getVar('PassBaru'), PASSWORD_BCRYPT),
                    ]);
                    return redirect()->to('/');
                } else {

                    session()->setFlashdata('error', 'Password Baru sama dengan Password Lama');
                    return redirect()->to('/gantipassuser');
                }
            }
        }
    }

    public function ganti_password_edit()
    {
        $userModel = new ModelUser();
        $id_user = $this->request->getVar('id_password');
        // $this->data["pembimbing"] = $pembimbingModel
        //     ->where("NIPEG", session()->id_pembimbing)
        //     ->first();

        if (!$this->validate([
            'PassBaru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Baru harus diisi',
                ]
            ],
            'ConfPassBaru' => [
                'rules' => 'required|matches[PassBaru]',
                'errors' => [
                    'required' => 'Konfirmasi Password Baru harus diisi',
                    'matches' => 'Konfirmasi Password Baru harus sama dengan Password Baru',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $userModel->update($id_user, [
                'password' => password_hash($this->request->getVar('PassBaru'), PASSWORD_BCRYPT),
            ]);
            return redirect()->to('/users');
        }
    }
}
