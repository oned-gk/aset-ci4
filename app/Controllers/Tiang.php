<?php

namespace App\Controllers;

use App\Models\TiangModel;

class Tiang extends BaseController
{
    public function index()
    {
        $currentPage = $this->request->getVar('page_tiang') ? $this->request->getVar('page_tiang') : 1;
        $model = model(TiangModel::class);
        $data = [
            'daftar_tiang' => $model->orderBy('id_tiang')->paginate(10, 'tiang'),
            'title' => 'Tiang',
            'pager' => $model->pager,
            'currentPage' => $currentPage,
        ];
        return view('templates/header', $data)
            . view('aset/tiang')
            . view('templates/footer');
    }

    public function detail(int $id_tiang = null)
    {
        $model = model(TiangModel::class);
        $data = [
            'daftar_tiang' => $model->where(['id_tiang' => $id_tiang])->find(),
            'title' => 'Tiang ' . $id_tiang,
        ];
        return view('templates/header', $data)
            . view('aset/tiang_detail')
            . view('templates/footer');
    }

    public function new()
    {
        helper('form');
        $data = [
            'title'     => 'Detail Tiang'
        ];
        return view('templates/header', $data)
            . view('aset/tiang_baru')
            . view('templates/footer');
    }

    //Latitude: -85 to +85 (actually -85.05115 for some reason)
    //Longitude: -180 to +180

    public function insert()
    {
        helper('form');
        $data = $this->request->getPost(['no_tiang', 'latitude', 'longitude']);
        if (! $this->validateData($data, [
            'no_tiang' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ], [
            'no_tiang' => ['required' => 'Nomor tiang harap diisi!'],
            'latitude' => ['required' => 'Latitude harap diisi!'],
            'longitude' => ['required' => 'Longitude harap diisi!'],
        ])) {
            return $this->new();
        }

        $post = $this->validator->getValidated();
        $model = model(TiangModel::class);
        $image = $this->request->getFile('foto');

        $image->move(ROOTPATH . 'public\uploads\tiang', $image->getName());

        $model->save([
            'no_tiang' => $post['no_tiang'],
            'latitude' => $post['latitude'],
            'longitude' => $post['longitude'],
            'foto' => $image->getName(),
        ]);

        $data = ['title' => 'Tambah tiang baru'];
        session()->setFlashdata('pesan','Data berhasil ditambahkan');
        return redirect()->to('tiang');
    }
    public function update(int $id_tiang=null)
    {
        helper('form');
        $data = $this->request->getPost(['no_tiang', 'latitude', 'longitude']);
        if (! $this->validateData($data, [
            'no_tiang' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ], [
            'no_tiang' => ['required' => 'Nomor tiang harap diisi!'],
            'latitude' => ['required' => 'Latitude harap diisi!'],
            'longitude' => ['required' => 'Longitude harap diisi!'],
        ])) {
            return $this->new();
        }

        $post = $this->validator->getValidated();
        $model = model(TiangModel::class);
        $image = $this->request->getFile('foto');

        $image->move(ROOTPATH . 'public\uploads\tiang', $image->getName());

        $model->save([
            'id_tiang' => $id_tiang,
            'no_tiang' => $post['no_tiang'],
            'latitude' => $post['latitude'],
            'longitude' => $post['longitude'],
            'foto' => $image->getName(),
        ]);

        $data = ['title' => 'Tambah tiang baru'];
        session()->setFlashdata('pesan','Data berhasil diubah');
        return redirect()->to('tiang');
    }
    public function peta()
    {
        $model = model(TiangModel::class);
        $data = [
            'daftar_tiang' => $model->findAll(),
            'title' => 'Peta Tiang',
        ];

        return view('templates/header', $data)
            . view('aset/tiang_peta')
            . view('templates/footer');
    }

    public function delete(int $id_tiang=null)
    {
        model(TiangModel::class)->delete( ['id_tiang'=>$id_tiang]);
        session()->setFlashdata('pesan','Data berhasil dihapus.');
        return redirect()->to('tiang');
    }

    public function edit(int $id_tiang=null)
    {
        helper('form');
        $model = model(TiangModel::class);
        $data = [
            'daftar_tiang' => $model->where(['id_tiang' => $id_tiang])->find(),
            'title' => 'Edit Tiang ' . $id_tiang,
        ];
        return view('templates/header', $data)
            . view('aset/tiang_edit')
            . view('templates/footer');
    }
}
