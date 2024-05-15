<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Models\ModelPembimbing;

class GantiPass extends BaseController
{
    public function index()
    {
        $this->pembimbing = new ModelPembimbing();

        $this->data["pembimbing"] = $this->pembimbing
            ->where("pembimbing.NIPEG", session()->id_pembimbing)
            ->find();


        return view('vw_gantipass', $this->data);
    }

    public function cekPassLama(string $str, string $fields, array $data): bool
    {
        $id_pembimbing = session()->id_pembimbing;

        $pembimbingModel = new ModelPembimbing();
        $pembimbing = $pembimbingModel
            ->where('NIPEG', $id_pembimbing)
            ->first();

        $hashedPassword = $pembimbing['password'];

        return password_verify($str, $hashedPassword);
    }


    public function ganti_password()
    {
        $pembimbingModel = new ModelPembimbing();

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
            $id_pembimbing = session()->id_pembimbing;
            $cek = $pembimbingModel
                ->where('NIPEG', $id_pembimbing)
                ->first();

            $password_lama = $this->request->getVar('PassLama');
            $password_baru = $this->request->getVar('PassBaru');
            $validate = password_verify($password_lama, $cek['password']);
            // dd($validate);
            if ($validate == false) {
                session()->setFlashdata('error', 'Password Lama Salah');
                return redirect()->to('/gantipass');
            } else {
                $validate2 = password_verify($password_baru, $cek['password']);
                if ($validate2 == false) {
                    $pembimbingModel->update($id_pembimbing, [
                        'password' => password_hash($this->request->getVar('PassBaru'), PASSWORD_BCRYPT),
                    ]);
                    return redirect()->to('/');
                } else {

                    session()->setFlashdata('error', 'Password Baru sama dengan Password Lama');
                    return redirect()->to('/gantipass');
                }
            }
        }
    }
}
