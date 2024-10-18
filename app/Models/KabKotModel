<?php
namespace app\Models;
use codeigniter\Model;

class KabKotModel extends Model{
    protected $table = 'tbl_kabkot';
    protected $allowedFields = ['ibukota','kabupaten_kota','k_bsni','provinsi_id'];
    protected $primaryKey = 'id'; 

    public function getKabKot(int $cari = null)
    {
        if ($cari === null)
        {
            return $this->findAll();
        }
        return $this->where(['id_tiang'=>$$cari])->find();
    }    
}
