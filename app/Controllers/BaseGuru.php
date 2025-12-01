<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Config\Services;

class BaseGuru extends BaseController
{
    protected $notifikasiBaru = [];

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);

        // Pastikan login sebagai guru
        if (session()->get('status') !== 'guru') {
            return redirect()->to('/login')->send();
        }

        $db     = \Config\Database::connect();
        $idGuru = session()->get('id_user');
        
        $sql = "
            SELECT 
                d.*,
                m.judul AS judul_materi,
                d.created_at AS tanggal
            FROM tb_diskusi d
            JOIN tb_materi m ON m.id_materi = d.id_materi

            LEFT JOIN tb_diskusi_terbaca t
                ON t.id_user = :idGuru:
               AND t.id_materi = d.id_materi

            WHERE d.role = 'murid'
              AND m.id_guru = :idGuru:
              AND (t.terakhir_dibuka IS NULL OR d.created_at > t.terakhir_dibuka)

            ORDER BY d.created_at DESC
        ";

        $this->notifikasiBaru = $db->query($sql, ['idGuru' => $idGuru])->getResultArray();

        Services::renderer()->setVar('notifikasi_baru', $this->notifikasiBaru);
    }

    protected function render($view, $data = [])
    {
        $data['notifikasi_baru'] = $this->notifikasiBaru;
        return view($view, $data);
    }
}
