<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Model;
use App\Models\JawaModel;
use App\Models\TiangModel;

class Kelurahan extends BaseController
{
    public function index()
    {
        $data['title'] = 'Kelurahan';

        return view('templates/header', $data)
            . view('wilayah/kelurahan')
            . view('templates/footer');
    }
    public function getkelurahan()
    {
        $model = model(JawaModel::class);
        $request = service('request');
        $postData = $request->getPost();
        $response = array();
        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $data = array();
        $search = $postData['search'];
        // Fetch record
        if (isset($postData['search'])) {
            $kelurahanlist = $model->select('id,kelurahan,kecamatan,kabupaten_kota,provinsi,kd_pos')
                ->like('tags', $search)
                ->orderBy('kelurahan')
                ->findAll(500);
            foreach ($kelurahanlist as $kelurahan) {
                $data[] = array(
                    "value" => $kelurahan['id'],
                    "label" => $kelurahan['kelurahan'] . ', ' . $kelurahan['kecamatan'] . ', ' . $kelurahan['kabupaten_kota'],
                    ', ' . $kelurahan['provinsi'],
                    "kelurahan" => $kelurahan['kelurahan'],
                    "kecamatan" => $kelurahan['kecamatan'],
                    "kabupaten" => $kelurahan['kabupaten_kota'],
                    "provinsi" => $kelurahan['provinsi'],
                    "pos" => $kelurahan['kd_pos'],
                );
            }
        }
        $response['data'] = $data;
        return $this->response->setJSON($response);
    }

    public function getjalan()
    {
        $request = service('request');
        $postData = $request->getPost();
        $model = model(TiangModel::class);
        $cari = 'budi';
        $datajalan = $model->select('jalan')->groupBy('jalan')->where(' length(jalan)>3')->like('jalan', $cari)->findAll();
        foreach ($datajalan as $kelurahan) {
            $data[] = array(
                "jalan" => $kelurahan['jalan'],
                "label" => $kelurahan['jalan']
            );
        }
        $response['data'] = $data;
        return $this->response->setJSON($response);
    }
}
