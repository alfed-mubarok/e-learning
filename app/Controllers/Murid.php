<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\UserModel;
use App\Models\RiwayatKelasModel;

class Murid extends BaseGuru
{
    public function index()
    {
        $siswaModel = new SiswaModel();
        $data['siswa'] = $siswaModel->findAll();
        return view('guru/siswa/daftarsiswa', $data);
    }

    public function tambah()
    {
        return view('guru/siswa/tambahsiswa');
    }

    public function simpan()
    {
        $rules = [
            'id_siswa'     => 'required|is_unique[tb_siswa.id_siswa]',
            'password'     => 'required|min_length[6]',
            'nama'         => 'required',
            'kelas'        => 'required',
            'semester'     => 'required|in_list[ganjil,genap]',
            'no_absen'     => 'required|numeric',
            'tahun_masuk'  => 'required|numeric|exact_length[4]',
            'foto'         => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('validation', $this->validator)
                ->with('error', 'Validasi gagal. Periksa kembali input Anda.');
        }

        $foto = $this->request->getFile('foto');
        if (! $foto->isValid()) {
            return redirect()->back()->withInput()->with('error', 'Upload foto gagal: ' . $foto->getErrorString());
        }

        $namaFoto = $foto->getRandomName();
        $uploadPath = FCPATH . 'siswa';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        $foto->move($uploadPath, $namaFoto);

        $siswaModel = new SiswaModel();
        $id_siswa = $this->request->getPost('id_siswa');
        $kelas = $this->request->getPost('kelas');
        $semester = strtolower($this->request->getPost('semester'));
        $tahun_masuk = $this->request->getPost('tahun_masuk');

        $dataSiswa = [
            'id_siswa'        => $id_siswa,
            'nama'            => $this->request->getPost('nama'),
            'kelas'           => $kelas,
            'kelas_sekarang'  => $kelas,
            'no_absen'        => $this->request->getPost('no_absen'),
            'tahun_masuk'     => $tahun_masuk,
            'foto'            => $namaFoto
        ];

        $insert = $siswaModel->insert($dataSiswa);

        if ($insert === false) {
            return redirect()->back()->withInput()
                ->with('error', 'Gagal menyimpan data siswa: ' . json_encode($siswaModel->errors()));
        }


        $riwayatModel = new RiwayatKelasModel();
        $existingRiwayat = $riwayatModel->where('id_siswa', $id_siswa)->findAll();

        if ($existingRiwayat) {
            $riwayatModel->where('id_siswa', $id_siswa)->set(['aktif' => 0])->update();
        }


        $existing = $riwayatModel->where([
            'id_siswa'     => $id_siswa,
            'kelas'        => $kelas,
            'semester'     => $semester,
            'tahun_ajaran' => $tahun_masuk
        ])->first();

        if ($existing) {
            $riwayatModel->update($existing['id'], ['aktif' => 1]);
        } else {
            $riwayatModel->insert([
                'id_siswa'     => $id_siswa,
                'kelas'        => $kelas,
                'semester'     => $semester,
                'tahun_ajaran' => $tahun_masuk,
                'aktif'        => 1
            ]);
        }

        $userModel = new UserModel();
        $dataLogin = [
            'id_user'  => $id_siswa,
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'status'   => 'murid'
        ];

        if ($userModel->insert($dataLogin) === false) {
            return redirect()->back()->withInput()
                ->with('error', 'Gagal menyimpan ke login: ' . json_encode($userModel->errors()));
        }

        return redirect()->to('/guru/murid/tambah')->with('success', 'Data siswa berhasil disimpan!');
    }

    public function edit($id_siswa)
    {
        $siswaModel = new SiswaModel();
        $data['siswa'] = $siswaModel->find($id_siswa);

        if (!$data['siswa']) {
            return redirect()->to('/guru/murid')->with('error', 'Data siswa tidak ditemukan.');
        }

        return view('guru/siswa/editsiswa', $data);
    }

    public function update($id_siswa)
    {
        $rules = [
            'nama'         => 'required',
            'kelas'        => 'required',
            'no_absen'     => 'required|numeric',
            'tahun_masuk'  => 'required|numeric|exact_length[4]',
            'semester'     => 'required|in_list[ganjil,genap]',
            'foto'         => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('validation', $this->validator)
                ->with('error', 'Validasi gagal. Periksa kembali input Anda.');
        }

        $siswaModel = new SiswaModel();
        $siswa = $siswaModel->find($id_siswa);
        if (!$siswa) {
            return redirect()->to('/guru/murid')->with('error', 'Data siswa tidak ditemukan.');
        }

        $kelasBaru = $this->request->getPost('kelas');
        $semester = strtolower($this->request->getPost('semester'));
        $tahun_masuk = $this->request->getPost('tahun_masuk');

        $dataUpdate = [
            'nama'            => $this->request->getPost('nama'),
            'kelas'           => $kelasBaru,
            'kelas_sekarang'  => $kelasBaru,
            'no_absen'        => $this->request->getPost('no_absen'),
            'tahun_masuk'     => $tahun_masuk,
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();

            if (!empty($siswa['foto']) && file_exists(FCPATH . 'siswa/' . $siswa['foto'])) {
                unlink(FCPATH . 'siswa/' . $siswa['foto']);
            }

            $foto->move(FCPATH . 'siswa', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
        }

        $siswaModel->update($id_siswa, $dataUpdate);

        $riwayatModel = new RiwayatKelasModel();
        $existingRiwayat = $riwayatModel->where('id_siswa', $id_siswa)->findAll();

        if ($existingRiwayat) {
            $riwayatModel->where('id_siswa', $id_siswa)->set(['aktif' => 0])->update();
        }


        $existing = $riwayatModel->where([
            'id_siswa'     => $id_siswa,
            'kelas'        => $kelasBaru,
            'semester'     => $semester,
            'tahun_ajaran' => $tahun_masuk
        ])->first();

        if ($existing) {
            $riwayatModel->update($existing['id'], ['aktif' => 1]);
        } else {
            $riwayatModel->insert([
                'id_siswa'     => $id_siswa,
                'kelas'        => $kelasBaru,
                'semester'     => $semester,
                'tahun_ajaran' => $tahun_masuk,
                'aktif'        => 1
            ]);
        }

        return redirect()->to('/guru/murid')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function hapus($id_siswa)
    {
        $siswaModel = new SiswaModel();
        $siswa = $siswaModel->find($id_siswa);
        if ($siswa) {
            if (!empty($siswa['foto']) && file_exists(FCPATH . 'siswa/' . $siswa['foto'])) {
                unlink(FCPATH . 'siswa/' . $siswa['foto']);
            }
            $siswaModel->delete($id_siswa);
        }

        $userModel = new UserModel();
        $userModel->delete($id_siswa);

        $riwayatModel = new RiwayatKelasModel();
        $riwayatModel->where('id_siswa', $id_siswa)->delete();

        return redirect()->to('/guru/murid')->with('success', 'Data siswa berhasil dihapus.');
    }
}
