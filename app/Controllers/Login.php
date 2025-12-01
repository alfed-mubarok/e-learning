<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form']);  // load form helper
    }

    public function index()
    {
        if (! $this->request->is('post')) {
            return view('pages/login', ['title' => 'Login']);
        }

        $rules = [
            'id_user'  => 'required',
            'password' => 'required'
        ];

        if (! $this->validate($rules)) {
            return view('pages/login', [
                'validation' => $this->validator,
                'title' => 'Log in'
            ]);
        }

        $id_user = $this->request->getPost('id_user');
        $password = $this->request->getPost('password');

        // Ambil user berdasarkan id_user saja
        $user = $this->userModel->getUserById($id_user);

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Password benar, cek status dan redirect
                session()->set([
                    'id_user' => $user['id_user'],
                    'status' => $user['status'],
                    'logged_in' => true
                ]);
                if ($user['status'] === 'guru') {

                    // Ambil foto dari tb_guru
                    $guruModel = new \App\Models\GuruModel();
                    $guru = $guruModel->find($user['id_user']);

                    session()->set([
                        'id_user'   => $user['id_user'],
                        'status'    => $user['status'],
                        'logged_in' => true,
                        'foto_guru' => $guru['foto'] ?? null,
                        'nama_guru' => $guru['nama_guru'] ?? ''
                    ]);

                    return redirect()->to('/guru/dashboard');
                } elseif ($user['status'] === 'murid') {

                    $siswaModel = new \App\Models\SiswaModel();
                    $siswa = $siswaModel->where('id_siswa', $user['id_user'])->first();

                    if (!$siswa) {
                        session()->setFlashdata('error', 'Data siswa tidak ditemukan.');
                        return redirect()->back()->withInput();
                    }

                    session()->set([
                        'id_user'      => $user['id_user'],
                        'status'       => $user['status'],
                        'logged_in'    => true,
                        'kelas'        => $siswa['kelas'],
                        'tahun_masuk'  => $siswa['tahun_masuk'],
                        'foto_siswa'   => $siswa['foto'] ?? null,
                        'nama_siswa'   => $siswa['nama'] ?? ''
                    ]);

                    return redirect()->to('/siswa/dashboard');
                }
            } else {
                // Password salah
                session()->setFlashdata('error', 'Password salah');
                return redirect()->back()->withInput();
            }
        } else {
            // User tidak ditemukan
            session()->setFlashdata('error', 'ID User tidak ditemukan');
            return redirect()->back()->withInput();
        }
    }
    public function logout()
    {
        session()->destroy(); // Hapus semua data sesi
        return redirect()->to('/'); // Arahkan kembali ke halaman login
    }
}
