<?php
namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
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
}