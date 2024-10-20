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
            'daftar_tiang' => $model->orderBy('no_tiang')->paginate(10, 'tiang'),
            'title' => 'Tiang',
            'pager' => $model->pager,
            'currentPage' => $currentPage,
        ];
        return view('templates/header', $data)
            . view('aset/tiang')
            . view('templates/footer');
    }

    public function detail(int $id = null)
    {
        $model = model(TiangModel::class);
        $data = [
            'daftar_tiang' => $model->where(['id' => $id])->find(),
            'title' => 'Tiang ' . $id,
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
        $data = $this->request->getPost(['no_tiang', 'latitude', 'longitude', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'jalan']);
        $request = service('request');
        if (! $this->validateData($data, [
            'no_tiang' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'foto' => [
                'uploaded[foto]',
                'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[foto,4096]',
            ],
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
        $imagename = '';
        if (!empty($image->getName())) {
            $imagename = $image->getName();
            $image->move(ROOTPATH . 'public\uploads\tiang', $imagename);
        }
        $model->save([
            'no_tiang' => $post['no_tiang'],
            'latitude' => $post['latitude'],
            'longitude' => $post['longitude'],
            'foto' => $imagename,
            'kelurahan' =>  $request->getPost('kelurahan'),
            'kecamatan' => $request->getPost('kecamatan'),
            'kabupaten' => $request->getPost('kabupaten'),
            'provinsi' => $request->getPost('provinsi'),
            'jalan' => $request->getPost('jalan'),
        ]);

        $data = ['title' => 'Tambah tiang baru'];
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('tiang');
    }
    public function update(int $id = null)
    {
        $request = service('request');
        helper('form');
        $data = $this->request->getPost(['no_tiang', 'latitude', 'longitude', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'jalan']);
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
        $imagename = '';
        if (!empty($image->getName())) {
            $imagename = $image->getName();
            $image->move(ROOTPATH . 'public\uploads\tiang', $imagename);
            $model->save([
                'id' => $id,
                'no_tiang' => $post['no_tiang'],
                'latitude' => $post['latitude'],
                'longitude' => $post['longitude'],
                'foto' => $imagename,
                'kelurahan' =>  $request->getPost('kelurahan'),
                'kecamatan' => $request->getPost('kecamatan'),
                'kabupaten' => $request->getPost('kabupaten'),
                'provinsi' => $request->getPost('provinsi'),
                'jalan' => $request->getPost('jalan'),
            ]);
        } else {
            $model->save([
                'id' => $id,
                'no_tiang' => $post['no_tiang'],
                'latitude' => $post['latitude'],
                'longitude' => $post['longitude'],
                'kelurahan' =>  $request->getPost('kelurahan'),
                'kecamatan' => $request->getPost('kecamatan'),
                'kabupaten' => $request->getPost('kabupaten'),
                'provinsi' => $request->getPost('provinsi'),
                'jalan' => $request->getPost('jalan'),
            ]);
        }
        $data = ['title' => 'Tambah tiang baru'];
        session()->setFlashdata('pesan', 'Data berhasil diubah');
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

    public function delete(int $id = null)
    {
        model(TiangModel::class)->delete(['id' => $id]);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('tiang');
    }

    public function edit(int $id = null)
    {
        helper('form');
        $model = model(TiangModel::class);
        $data = [
            'daftar_tiang' => $model->where(['id' => $id])->find(),
            'title' => 'Edit Tiang ' . $id,
        ];
        return view('templates/header', $data)
            . view('aset/tiang_edit')
            . view('templates/footer');
    }
}
