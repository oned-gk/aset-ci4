<?php

namespace App\Controllers;

use App\Models\TiangModel;

class Tiang extends BaseController
{
    public function index(int $id_tiang = null)
    {
        $currentPage = $this->request->getVar('page_tiang') ? $this->request->getVar('page_tiang') : 1;
        $model = model(TiangModel::class);
        $tampil = 'map';
        $data = [
            'daftar_tiang' => $model->paginate(10,'tiang'),
            'title' => 'Tiang',
            'pager' => $model->pager,
            'currentPage' => $currentPage,
        ];

        if ($id_tiang !== null) {
            $tampil = 'tiang_detail';
        }

        return view('templates/header', $data)
            . view('aset/' . $tampil)
            . view('templates/footer');
    }
    public function baru()
    {
        helper('form');
        $data = [
            'title'     => 'Tiang Baru'
        ];
        return view('templates/header', $data)
            . view('aset/tiang_baru')
            . view('templates/footer');
    }

    //Latitude: -85 to +85 (actually -85.05115 for some reason)
    //Longitude: -180 to +180
    
    public function tambah()
    {
        helper('form');
        $data = $this->request->getPost(['no_tiang','latitude','longitude']);
        if(! $this->validateData($data,[
            'no_tiang'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
        ],[
            'no_tiang'=>['required'=>'Nomor tiang harap diisi!'],
            'latitude'=>['required'=>'Latitude harap diisi!'],
            'longitude'=>['required'=>'Longitude harap diisi!'],
            ])){
               return $this->baru(); 
            }

        $post = $this->validator->getValidated();
        $model = model(TiangModel::class);
        $image = $this->request->getFile('foto');
        $image->move(ROOTPATH . 'public\uploads','sontoloyo.jpg');

        $model->save([
            'no_tiang'=>$post['no_tiang'],
            'latitude'=>$post['latitude'],
            'longitude'=>$post['longitude'],
            'foto'=>$image->getName(),
        ]);

        $data= ['title' => 'Tambah tiang baru'];

        return view('templates/header', $data)
        . view('aset/tiang_baru_success')
        . view('templates/footer');
    }   
}
