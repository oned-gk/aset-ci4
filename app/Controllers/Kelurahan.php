<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Model;
use App\Models\KelurahanModel;

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
        $model = model(KelurahanModel::class);
        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $data = array();        

            $search = $postData['search'];

            // Fetch record
            if(isset($postData['search'])){
            $kelurahanlist = $model->select('id,kelurahan')
                ->like('kelurahan',$search)
                ->orderBy('kelurahan')
                ->findAll(10);
            foreach ($kelurahanlist as $kelurahan) {
                $data[] = array(
                    "value" => $kelurahan['id'],
                    "label" => $kelurahan['kelurahan'],
                );
            }
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }
}
