<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use app\Models\KabKotModel;
class Wilayah extends BaseController
{
    public function index()
    {
        return 'mboh';
    }
    public function kabkot()    
    {
$request = service('request');
        $postData = $request()->getPost();
        $response = array();
        $response['token'] = csrf_hash();
        $data = array();

        if (isset($postData['search'])) {
            $model = model(KabKotModel::class);
            $search = $postData['search'];
            $kabkotlist = $model->select('id,kabupaten_kota')
                ->like('kabupaten_kota', $search)
                ->orderBy('kabupaten_kota')
                ->findAll(10);

            foreach ($kabkotlist as $kabkot) {
                $data[] = array(
                    "value" => $kabkot['id'],
                    "label" => $kabkot['kabupaten_kota'],
                );
            }
            $response['data'] = $data;
            return $this->response->setJSON($response);
        }
    }
}
