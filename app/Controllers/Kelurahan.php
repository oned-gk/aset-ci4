<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Model;
use App\Models\JawaModel;


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
                    "label" => $kelurahan['kelurahan'] . ', ' .$kelurahan['kecamatan'].', '.$kelurahan['kabupaten_kota'] ,', '.$kelurahan['provinsi'],
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

    // public function getkecamatan(int $id)
    // {
    //     $model = model(KecamatanModel::class);
    //     $kecamatanlist = $model->select('id,kecamatan,kabkot_id')
    //         ->where('id', $id)->find();
    //     $kecamatan = $kecamatanlist[0]['kecamatan'];
    //     $idkabkot = $kecamatanlist[0]['kabkot_id'];
    //     $kabkot = $this->getkabkot($idkabkot);
    //     return $kecamatan . ', ' . $kabkot;

    // }
    // public function getkabkot(int $id)
    // {
    //     $model = model(KabKotModel::class);
    //     $kabkotlist = $model->select('id,kabupaten_kota')
    //         ->where('id', $id)->find();
    //     $kabkot =    $kabkotlist[0]['kabupaten_kota'];
    //     return $kabkot;
    // }
    // public function getprovisi(int $id)
    // {
    //     $model = model(ProvinsiModel::class);
    //     $kecamatanlist = $model->select('id,kecamatan')
    //         ->where('id', $id)->find();
    //     return $kecamatanlist[0]['kecamatan'];
    // }
}