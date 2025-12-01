<?php

namespace App\Controllers;

use App\Models\MateriModel;
use App\Models\MapelModel;
use App\Controllers\BaseController;

class Materi extends BaseGuru
{
    protected $materiModel;

    public function __construct()
    {
        $this->materiModel = new MateriModel();
    }

    public function index()
    {
        $id_guru = session()->get('id_user');

        $materi = $this->materiModel
            ->select('tb_materi.*, tb_mapel.nama_mapel')
            ->join('tb_mapel', 'tb_mapel.id_mapel = tb_materi.id_mapel')
            ->where('tb_materi.id_guru', $id_guru)
            ->orderBy('tb_materi.nomor_materi', 'ASC')
            ->findAll();

        return view('guru/materi/daftar_materi', ['materi' => $materi]);
    }
    public function tambah()
    {
        $mapelModel = new MapelModel();
        $data['mapel'] = $mapelModel->findAll();
        return view('guru/materi/tambah_materi', $data);
    }

    public function simpan()
    {
        $materiModel = new \App\Models\MateriModel();
        $id_guru = session()->get('id_user');

        $videoFile = $this->request->getFile('video_file');
        $videoLinkInput = $this->request->getPost('video_link');
        if (strpos($videoLinkInput, 'watch?v=') !== false) {
            $videoLinkInput = str_replace('watch?v=', 'embed/', $videoLinkInput);
            $videoLinkInput = preg_replace('/&.+$/', '', $videoLinkInput);
        }
        $fileMateri = $this->request->getFile('file_materi');
        $gambarFiles = $this->request->getFiles()['gambar'] ?? [];

        $videoFileName = $videoFile->isValid() && !$videoFile->hasMoved()
            ? $videoFile->move('materi/video', $videoFile->getRandomName())
            : null;

        $fileMateriName = $fileMateri->isValid() && !$fileMateri->hasMoved()
            ? $fileMateri->move('materi/file', $fileMateri->getRandomName())
            : null;

        $gambarNames = [];
        foreach ($gambarFiles as $img) {
            if ($img->isValid() && !$img->hasMoved()) {
                $mime = $img->getClientMimeType();
                if (strpos($mime, 'image/') === 0) { // hanya proses jika gambar
                    $newName = $img->getRandomName();
                    $img->move('materi/gambar', $newName);
                    $gambarNames[] = $newName;
                }
            }
        }


        $materiModel->insert([
            'id_guru'       => $id_guru,
            'id_mapel'      => $this->request->getPost('id_mapel'),
            'nomor_materi'  => $this->request->getPost('nomor_materi'),
            'judul'         => $this->request->getPost('judul'),
            'tahun_target'  => $this->request->getPost('tahun_target'),
            'kelas'         => $this->request->getPost('kelas'),
            'semester'      => $this->request->getPost('semester'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'video_link'    => $videoLinkInput,
            'video_file'    => $videoFile->isValid() ? $videoFile->getName() : null,
            'file_materi'   => $fileMateri->isValid() ? $fileMateri->getName() : null,
            'gambar_json'   => json_encode($gambarNames),
        ]);

        return redirect()->to('guru/materi')->with('success', 'Materi berhasil disimpan.');
    }
    public function edit($id)
    {
        $materiModel = new \App\Models\MateriModel();
        $mapelModel = new \App\Models\MapelModel();

        $data['materi'] = $materiModel->find($id);
        $data['mapel'] = $mapelModel->findAll();

        if (!$data['materi']) {
            return redirect()->to('guru/materi')->with('error', 'Materi tidak ditemukan.');
        }

        return view('guru/materi/edit_materi', $data);
    }
    public function update($id)
    {
        $materiModel = new \App\Models\MateriModel();
        $data = $materiModel->find($id);
        if (!$data) {
            return redirect()->to('guru/materi')->with('error', 'Data tidak ditemukan');
        }

        $videoFile = $this->request->getFile('video_file');
        $videoLinkInput = $this->request->getPost('video_link');
        if (strpos($videoLinkInput, 'watch?v=') !== false) {
            $videoLinkInput = str_replace('watch?v=', 'embed/', $videoLinkInput);
            $videoLinkInput = preg_replace('/&.+$/', '', $videoLinkInput);
        }
        $fileMateri = $this->request->getFile('file_materi');
        $gambarFiles = $this->request->getFiles()['gambar'] ?? [];

        $videoFileName = $videoFile->isValid() ? $videoFile->getRandomName() : $data['video_file'];
        if ($videoFile->isValid()) $videoFile->move('materi/video', $videoFileName);

        $fileMateriName = $fileMateri->isValid() ? $fileMateri->getRandomName() : $data['file_materi'];
        if ($fileMateri->isValid()) $fileMateri->move('materi/file', $fileMateriName);

        $gambarNames = json_decode($data['gambar_json'], true) ?? [];
        foreach ($gambarFiles as $img) {
            if ($img->isValid()) {
                $mime = $img->getClientMimeType();
                if (strpos($mime, 'image/') === 0) {
                    $newName = $img->getRandomName();
                    $img->move('materi/gambar', $newName);
                    $gambarNames[] = $newName;
                }
            }
        }


        $materiModel->update($id, [
            'id_mapel'      => $this->request->getPost('id_mapel'),
            'nomor_materi'  => $this->request->getPost('nomor_materi'),
            'judul'         => $this->request->getPost('judul'),
            'tahun_target'  => $this->request->getPost('tahun_target'),
            'kelas'         => $this->request->getPost('kelas'),
            'semester'      => $this->request->getPost('semester'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'video_link'    => $videoLinkInput,
            'video_file'    => $videoFileName,
            'file_materi'   => $fileMateriName,
            'gambar_json'   => json_encode($gambarNames),
        ]);



        return redirect()->to('guru/materi')->with('success', 'Materi berhasil diperbarui.');
    }
    public function hapus($id)
    {
        $materiModel = new \App\Models\MateriModel();
        $materi = $materiModel->find($id);

        if ($materi) {
            $materiModel->delete($id);
            // (Opsional) unlink file video/gambar/file jika perlu
        }

        return redirect()->to('guru/materi')->with('success', 'Materi berhasil dihapus.');
    }
    public function tambah_referensi($id_materi)
    {
        $file = $this->request->getFile('file');
        $fileName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('public/materi/file', $fileName);
        }

        $referensiModel = new \App\Models\ReferensiModel();
        $referensiModel->insert([
            'id_materi'      => $id_materi,
            'nama_referensi' => $this->request->getPost('nama_referensi'),
            'link'           => $this->request->getPost('link'),
            'file'           => $fileName
        ]);

        return redirect()->to('guru/materi/edit/' . $id_materi);
    }
    public function hapus_referensi($id_referensi, $id_materi)
    {
        $referensiModel = new \App\Models\ReferensiModel();
        $referensiModel->delete($id_referensi);
        return redirect()->to('guru/materi/edit/' . $id_materi);
    }
}
