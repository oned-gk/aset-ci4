<?php
namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\TiangModel;
class Depan extends BaseController
{
    public function view()
    {
        $page = 'dashboard';
        if (! is_file(APPPATH . 'Views/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view('templates/header', $data)
            . view($page)
            . view('templates/footer');
    }
    public function dashboard()
    {
        $model = model(TiangModel::class);
        $datagrafik1 = $model->select('kabupaten,kecamatan')->groupBy('kabupaten,kecamatan')->selectCount('id', 'jumlah')->where(' length(kecamatan)>3' )->findAll();
        $datagrid1=$model->select('kabupaten,kecamatan,kelurahan')->groupBy('kabupaten,kecamatan,kelurahan')->selectCount('id', 'jumlah')->where(' length(kecamatan)>3' )->findAll();
        $data = [
            'grafik1' => $datagrafik1,
            'title' => 'Dashboard',
            'grid1'=>$datagrid1
        ];
        return view('templates/header', $data)
            . view('dashboard')
            . view('templates/footer');
    }
}